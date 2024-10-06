<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class KVKKPrecautionRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return match ($this->getMethod()) {
            "POST" => [
                'input-title' => 'required|min:2|max:200',
                'input-content' => 'required|min:2|max:200',
                'input-caution_type' => 'required',
                'input-is_active' => 'required',
            ],
            "PUT" => [
                'input-title' => 'required|min:2|max:200',
                'input-content' => 'required|min:2|max:200',
                'input-caution_type' => 'required|',
                'input-is_active' => 'required'
            ],
            default => [],
        };
    }

    public function attributes()
    {
        return [
            'input-title' => __('messages.kvkk_precautions.form.01'),
            'input-content' => __('messages.kvkk_precautions.form.02'),
            'input-caution_type' => __('messages.kvkk_precautions.form.03'),
            'input-is_active' => __('messages.kvkk_precautions.form.04'),
        ];
    }
}
