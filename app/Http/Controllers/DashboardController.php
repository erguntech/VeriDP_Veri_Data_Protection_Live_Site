<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\CompanyDepartment;
use App\Models\Employee;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        if (Auth::user()->user_type == "1") {
            $totalUserCount = User::all()->count();
            $totalCustomerCount = Client::all()->count();
            return view('pages.dashboards.dashboard_administration_index', compact('totalUserCount', 'totalCustomerCount'));
        } else if (Auth::user()->user_type == "3") {
            $totalEmployeeCount = Employee::where('client_id', Auth::user()->linkedClient->id)->get()->count();
            $totalDepartmentCount = CompanyDepartment::where('client_id', Auth::user()->linkedClient->id)->get()->count();
            return view('pages.dashboards.dashboard_clients_index', compact('totalEmployeeCount', 'totalDepartmentCount'));
        } else if (Auth::user()->user_type == "4") {
            return view('pages.dashboards.dashboard_employees_index');
        }
    }
}
