<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CompanyDepartmentRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return match ($this->getMethod()) {
            "POST" => [
                'input-department_name' => 'required|min:2|max:500',
                'input-is_active' => 'required',
            ],
            "PUT" => [
                'input-department_name' => 'required|min:2|max:500',
                'input-is_active' => 'required'
            ],
            default => [],
        };
    }

    public function attributes()
    {
        return [
            'input-department_name' => __('messages.company_departments.form.01'),
            'input-is_active' => __('messages.company_departments.form.02'),
        ];
    }
}
