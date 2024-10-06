<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GDPRDecreeRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return match ($this->getMethod()) {
            "POST" => [
                'input-title' => 'required|min:2|max:50',
                'input-date' => 'required|min:2|max:50',
                'input-decree_no' => 'required',
                'input-content' => 'required|min:2|max:500',
                'input-sector_id' => 'required',
                'input-is_active' => 'required',
            ],
            "PUT" => [
                'input-title' => 'required|min:2|max:50',
                'input-date' => 'required|min:2|max:50',
                'input-decree_no' => 'required',
                'input-content' => 'required|min:2|max:500',
                'input-sector_id' => 'required',
                'input-is_active' => 'required'
            ],
            default => [],
        };
    }

    public function attributes()
    {
        return [
            'input-title' => __('messages.gdpr_decrees.form.01'),
            'input-date' => __('messages.gdpr_decrees.form.02'),
            'input-decree_no' => __('messages.gdpr_decrees.form.03'),
            'input-content' => __('messages.gdpr_decrees.form.04'),
            'input-sector_id' =>  __('messages.gdpr_decrees.form.05'),
            'input-is_active' =>  __('messages.gdpr_decrees.form.06')
        ];
    }
}
