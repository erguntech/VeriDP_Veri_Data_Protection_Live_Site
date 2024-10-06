<?php

namespace App\Http\Controllers;

use App\Http\Requests\SystemSettingsRequest;

class SettingsController extends Controller
{
    public function generalSettings()
    {
        return view('pages.settings.general_settings_index');
    }

    public function generalSettingsUpdate(SystemSettingsRequest $request)
    {
        return redirect()->route('GeneralSettings.Index')
            ->with('result','warning')
            ->with('title',__('messages.alerts.01'))
            ->with('content',__('messages.alerts.04'));
    }

    public function systemSettings()
    {
        return view('pages.settings.system_settings_index');
    }

    public function systemSettingsUpdate(SystemSettingsRequest $request)
    {
        settings()->set([
            'app_auto_logout_duration' => $request['input-auto_logout_duration']
        ]);

        return redirect()->route('SystemSettings.Index')
            ->with('result','warning')
            ->with('title',__('messages.alerts.01'))
            ->with('content',__('messages.alerts.04'));
    }
}
