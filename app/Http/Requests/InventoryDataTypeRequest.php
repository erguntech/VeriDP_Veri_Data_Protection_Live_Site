<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InventoryDataTypeRequest extends FormRequest
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
                'input-is_data_special' => 'required',
            ],
            "PUT" => [
                'input-name' => 'required|min:2|max:200',
                'input-is_active' => 'required',
                'input-is_data_special' => 'required'
            ],
            default => [],
        };
    }

    public function attributes()
    {
        return [
            'input-name' => __('messages.inventory_data_types.form.01'),
            'input-is_active' => __('messages.inventory_data_types.form.02'),
            'input-is_data_special' => __('messages.inventory_data_types.form.03'),
        ];
    }
}
