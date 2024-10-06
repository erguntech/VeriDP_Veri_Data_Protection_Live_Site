<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CompanyControlReportRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return match ($this->getMethod()) {
            "POST" => [
                'input-client_id' => 'required',
                'input-report_name' => 'required',
                'input-report_description' => 'required|min:2|max:500',
                'input-document_file' => 'required',
                'input-date_period' => 'required',
                'input-is_active' => 'required',
            ],
            "PUT" => [
                'input-client_id' => 'required',
                'input-report_name' => 'required',
                'input-report_description' => 'required|min:2|max:500',
                'input-date_period' => 'required',
                'input-is_active' => 'required'
            ],
            default => [],
        };
    }

    public function attributes()
    {
        return [
            'input-report_name' => __('messages.company_control_reports.form.01'),
            'input-report_description' => __('messages.company_control_reports.form.02'),
            'input-date_period' => __('messages.company_control_reports.form.03'),
            'input-client_id' => __('messages.company_control_reports.form.04'),
            'input-is_active' => __('messages.company_control_reports.form.05'),
            'input-document_file' => __('messages.company_control_reports.form.06'),
        ];
    }
}
