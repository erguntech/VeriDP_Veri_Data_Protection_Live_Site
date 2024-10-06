<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CompanyDocumentRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return match ($this->getMethod()) {
            "POST" => [
                'input-document_name' => 'required|min:2|max:500',
                'input-client_id' => 'required',
                'input-document_file' => 'file|required',
                'input-is_active' => 'required',
                'input-show_on_web' => 'required',
            ],
            "PUT" => [
                'input-document_name' => 'required|min:2|max:500',
                'input-document_file' => 'file|sometimes',
                'input-client_id' => 'required',
                'input-is_active' => 'required',
                'input-show_on_web' => 'required'
            ],
            default => [],
        };
    }

    public function attributes()
    {
        return [
            'input-document_name' => __('messages.company_documents.form.01'),
            'input-document_file' => __('messages.company_documents.form.04'),
            'input-client_id' => __('messages.company_documents.form.03'),
            'input-is_active' => __('messages.company_documents.form.02'),
            'input-show_on_web' => __('messages.company_documents.form.06'),
        ];
    }
}
