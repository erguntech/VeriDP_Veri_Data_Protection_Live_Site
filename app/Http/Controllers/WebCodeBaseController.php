<?php

namespace App\Http\Controllers;

use App\Models\CompanyDocument;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class WebCodeBaseController extends Controller
{
    public function index()
    {
        $templateFile = public_path('assets/custom/js/web_codes/template.js');
        $newFile = public_path('assets/custom/js/web_codes/'.Auth::user()->unique_id.'.js');
        $policyPageURL = url('').'/'.Auth::user()->unique_id.'/policies';
        $fileURL = url('').'/assets/custom/js/web_codes/'.Auth::user()->unique_id.'.js';
        file_put_contents($newFile, str_replace('**|||**',$policyPageURL, file_get_contents($templateFile)));

        return view('pages.web_code_base.web_code_base_index', compact('fileURL'));
    }

    public function update()
    {
        return redirect()->route('WebCodeBase.Index')
            ->with('result','warning')
            ->with('title',__('messages.alerts.01'))
            ->with('content',__('messages.alerts.04'));
    }
}
