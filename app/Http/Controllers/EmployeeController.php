<?php

namespace App\Http\Controllers;

use App\Http\Requests\EmployeeRequest;
use App\Models\CompanyDepartment;
use App\Models\Employee;
use App\Models\User;
use Illuminate\Http\Request;
use Datatables;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class EmployeeController extends Controller
{
    public function index(Request $request)
    {
        $data = Employee::where('client_id', Auth::user()->linkedClient->id)->get();
        $totalDataCount = $data->count();
        $totalDepartmentCount = CompanyDepartment::where('client_id', Auth::user()->linkedClient->id)->where('is_active', true)->get()->count();

        if ($request->ajax()) {
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('userFullName', function ($row_userFullName) {
                    return $row_userFullName->linkedUser->getUserFullName();
                })
                ->addColumn('userEmail', function ($row_userEmail) {
                    return $row_userEmail->linkedUser->email;
                })
                ->addColumn('departmentName', function ($row_departmentName) {
                    return $row_departmentName->linkedDepartment->department_name;
                })
                ->addColumn('userStatus', function ($row_userStatus) {
                    return ($row_userStatus->linkedUser->is_active) ? '<span class="badge rounded-pill badge-light-success">'.__('messages.users.form.05.01').'</span>' : '<span class="badge rounded-pill badge-light-danger">'.__('messages.users.form.05.02').'</span>';
                })
                ->rawColumns(['userStatus'])
                ->make(true);
        }

        return view('pages.employees.employees_index', compact('totalDataCount', 'totalDepartmentCount'));
    }

    public function create()
    {
        $employees = Employee::all();
        $departments = CompanyDepartment::where('client_id', Auth::user()->linkedClient->id)->get();
        return view('pages.employees.employees_create', compact('employees', 'departments'));
    }

    public function store(EmployeeRequest $request)
    {
        $password = '';

        for($i = 0; $i < 8; $i++) {
            $password .= mt_rand(0, 9);
        }

        $user = new User();
        $user->first_name = $request['input-first_name'];
        $user->last_name = $request['input-last_name'];
        $user->email = $request['input-email'];
        $user->password = bcrypt($password);
        $user->is_active = $request['input-is_active'];
        $user->email_verified_at = now();
        $user->remember_token = Str::random(10);
        $user->created_by = Auth::user()->id;
        $user->client_id = Auth::user()->linkedClient->id;
        $user->user_type = 4;
        $user->save();

        $employee = new Employee();
        $employee->user_id = $user->id;
        $employee->client_id = Auth::user()->linkedClient->id;
        $employee->department_id = $request['input-department_id'];
        $employee->created_by = Auth::user()->id;
        $employee->save();

        $user->assignRole("Şirket Kullanıcısı");

        return redirect()->route('Employees.Index')
            ->with('result','success')
            ->with('title',__('messages.alerts.01'))
            ->with('content',__('messages.alerts.02'));
    }

    public function edit(string $id)
    {
        $employee = Employee::find($id);
        $departments = CompanyDepartment::all();
        return view('pages.employees.employees_edit', compact('employee', 'departments'));
    }

    public function update(EmployeeRequest   $request, string $id)
    {
        $employee = Employee::find($id);
        $employee->department_id = $request['input-department_id'];
        $employee->updated_by = Auth::user()->id;
        $employee->save();

        $user = User::find($employee->user_id);
        $user->first_name = $request['input-first_name'];
        $user->last_name = $request['input-last_name'];
        $user->is_active = $request['input-is_active'];
        $user->updated_by = Auth::user()->id;
        $user->save();

        return redirect()->route('Employees.Edit', $id)
            ->with('result','warning')
            ->with('title',__('messages.alerts.01'))
            ->with('content',__('messages.alerts.04'));
    }

    public function destroy(string $id)
    {
        $employee = Employee::find($id);
        $user = User::find($employee->user_id);

        $employee->update([
            'is_active' => false,
            'deleted_by' => Auth::user()->id
        ]);

        $user->update([
            'is_active' => false,
            'deleted_by' => Auth::user()->id
        ]);

        $employee->delete();
        $user->delete();

        return response()->json([
            'status' => 'success',
            'title' => __('messages.alerts.01'),
            'message' => __('messages.alerts.03')
        ]);
    }
}
