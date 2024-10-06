<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InventoryDataSetRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return match ($this->getMethod()) {
            "POST" => [
                'input-department_id' => 'required',
                'input-data_title' => 'required|min:2|max:1000',
                'input-inventory_category_id' => 'required',
                'input-inventory_data_type_id' => 'required',
                'input-data_hold_reason_ids' => 'required',
                'input-related_to_id' => 'required',
                'input-legal_reason' => 'required|min:2|max:1000',
                'input-data_hold_place' => 'required|min:2|max:1000',
                'input-data_hold_time' => 'required|min:2|max:1000',
                'input-data_transfer_to_id' => 'required',
                'input-data_to_abroad' => 'required',
                'input-kvkk_precaution_ids' => 'required',
                'input-is_active' => 'required',
            ],
            "PUT" => [
                'input-department_id' => 'required',
                'input-data_title' => 'required|min:2|max:1000',
                'input-inventory_category_id' => 'required',
                'input-inventory_data_type_id' => 'required',
                'input-data_hold_reason_ids' => 'required',
                'input-related_to_id' => 'required',
                'input-legal_reason' => 'required|min:2|max:1000',
                'input-data_hold_place' => 'required|min:2|max:1000',
                'input-data_hold_time' => 'required|min:2|max:1000',
                'input-data_transfer_to_id' => 'required',
                'input-data_to_abroad' => 'required',
                'input-kvkk_precaution_ids' => 'required',
                'input-is_active' => 'required'
            ],
            default => [],
        };
    }

    public function attributes()
    {
        return [
            'input-department_id' => __('messages.inventory_data_sets.form.01'),
            'input-data_title' => __('messages.inventory_data_sets.form.02'),
            'input-inventory_category_id' => __('messages.inventory_data_sets.form.03'),
            'input-inventory_data_type_id' => __('messages.inventory_data_sets.form.04'),
            'input-data_hold_reason_ids' => __('messages.inventory_data_sets.form.05'),
            'input-related_to_id' => __('messages.inventory_data_sets.form.06'),
            'input-legal_reason' => __('messages.inventory_data_sets.form.07'),
            'input-data_hold_place' => __('messages.inventory_data_sets.form.08'),
            'input-data_hold_time' => __('messages.inventory_data_sets.form.09'),
            'input-data_transfer_to_id' => __('messages.inventory_data_sets.form.10'),
            'input-data_to_abroad' => __('messages.inventory_data_sets.form.11'),
            'input-kvkk_precaution_ids' => __('messages.inventory_data_sets.form.12'),
            'input-is_active' => __('messages.inventory_data_sets.form.13'),
        ];
    }
}
