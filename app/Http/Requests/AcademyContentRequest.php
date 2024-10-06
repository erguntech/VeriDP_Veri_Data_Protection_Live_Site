<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AcademyContentRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return match ($this->getMethod()) {
            "POST" => [
                'input-academy_content_name' => 'required|min:2|max:200',
                'input-academy_content_description' => 'required|min:2|max:500',
                'input-document_url' => 'required_if:input-academy_content_type,3',
                'input-academy_content_type' => 'required',
                'input-is_active' => 'required',
            ],
            "PUT" => [
                'input-academy_content_name' => 'required|min:2|max:200',
                'input-academy_content_description' => 'required|min:2|max:500',
                'input-document_url' => 'required_if:input-academy_content_type,3',
                'input-academy_content_type' => 'required',
                'input-is_active' => 'required'
            ],
            default => [],
        };
    }

    public function attributes()
    {
        return [
            'input-academy_content_name' => __('messages.academy_contents.form.01'),
            'input-academy_content_description' => __('messages.academy_contents.form.02'),
            'input-document_url' => __('messages.academy_contents.form.03'),
            'input-academy_content_type' => __('messages.academy_contents.form.04'),
            'input-is_active' => __('messages.academy_contents.form.05'),
            'input-document_file' => __('messages.academy_contents.form.06'),
        ];
    }
}
