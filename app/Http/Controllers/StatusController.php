<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StatusController extends Controller
{
    public function userDeactivated()
    {
        if (Auth::user()->is_active == false) {
            return view('pages.error_pages.account_deactivated');
        } else {
            if (Auth::user()->user_type == "1") {
                $totalUserCount = User::all()->count();
                $totalCustomerCount = Client::all()->count();
                return view('pages.dashboards.dashboard_administration_index', compact('totalUserCount', 'totalCustomerCount'));
            } else if (Auth::user()->user_type == "3") {
                return view('pages.dashboards.dashboard_clients_index');
            } else if (Auth::user()->user_type == "4") {
                return view('pages.dashboards.dashboard_employees_index');
            }
        }
    }
}
