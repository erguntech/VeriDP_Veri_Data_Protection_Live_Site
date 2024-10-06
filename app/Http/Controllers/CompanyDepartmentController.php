<?php

namespace App\Http\Controllers;

use App\Http\Requests\CompanyDepartmentRequest;
use App\Models\CompanyDepartment;
use Illuminate\Http\Request;
use Datatables;
use Illuminate\Support\Facades\Auth;

class CompanyDepartmentController extends Controller
{
    public function index(Request $request)
    {
        $data = CompanyDepartment::all();

        if ($request->ajax()) {
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('status', function ($row_status) {
                    return ($row_status->is_active) ? '<span class="badge rounded-pill badge-light-success">'.__('messages.company_departments.form.02.01').'</span>' : '<span class="badge rounded-pill badge-light-danger">'.__('messages.company_departments.form.02.02').'</span>';
                })
                ->rawColumns(['status'])
                ->make(true);
        }

        return view('pages.company_departments.company_departments_index');
    }

    public function create()
    {
        return view('pages.company_departments.company_departments_create');
    }

    public function store(CompanyDepartmentRequest $request)
    {
        $companyDepartment = new CompanyDepartment();
        $companyDepartment->client_id = Auth::user()->linkedClient->id;
        $companyDepartment->department_name = $request['input-department_name'];
        $companyDepartment->is_active = $request['input-is_active'];
        $companyDepartment->created_by = Auth::user()->id;
        $companyDepartment->save();

        return redirect()->route('CompanyDepartments.Index')
            ->with('result','success')
            ->with('title',__('messages.alerts.01'))
            ->with('content',__('messages.alerts.02'));
    }

    public function edit(string $id)
    {
        $companyDepartment = CompanyDepartment::find($id);
        return view('pages.company_departments.company_departments_edit', compact('companyDepartment'));
    }

    public function update(CompanyDepartmentRequest $request, string $id)
    {
        $companyDepartment = CompanyDepartment::find($id);
        $companyDepartment->department_name = $request['input-department_name'];
        $companyDepartment->is_active = $request['input-is_active'];
        $companyDepartment->updated_by = Auth::user()->id;
        $companyDepartment->save();

        return redirect()->route('CompanyDepartments.Edit', $id)
            ->with('result','warning')
            ->with('title',__('messages.alerts.01'))
            ->with('content',__('messages.alerts.04'));
    }

    public function destroy(string $id)
    {
        $companyDepartment = CompanyDepartment::find($id);

        $companyDepartment->update([
            'is_active' => false,
            'deleted_by' => Auth::user()->id
        ]);

        $companyDepartment->delete();

        return response()->json([
            'status' => 'success',
            'title' => __('messages.alerts.01'),
            'message' => __('messages.alerts.03')
        ]);
    }
}
