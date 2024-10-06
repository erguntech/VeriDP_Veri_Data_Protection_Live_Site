<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InventoryCategoryRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return match ($this->getMethod()) {
            "POST" => [
                'input-name' => 'required|min:2|max:200',
                'input-is_active' => 'required',
            ],
            "PUT" => [
                'input-name' => 'required|min:2|max:200',
                'input-is_active' => 'required'
            ],
            default => [],
        };
    }

    public function attributes()
    {
        return [
            'input-name' => __('messages.inventory_categories.form.01'),
            'input-is_active' => __('messages.inventory_categories.form.02'),
        ];
    }
}
