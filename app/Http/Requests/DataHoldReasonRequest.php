<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DataHoldReasonRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return match ($this->getMethod()) {
            "POST" => [
                'input-content' => 'required|min:2|max:200',
                'input-is_active' => 'required',
            ],
            "PUT" => [
                'input-content' => 'required|min:2|max:200',
                'input-is_active' => 'required'
            ],
            default => [],
        };
    }

    public function attributes()
    {
        return [
            'input-content' => __('messages.data_hold_reasons.form.01'),
            'input-is_active' => __('messages.data_hold_reasons.form.02'),
        ];
    }
}
