<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GDPRAdaptationQuestionRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return match ($this->getMethod()) {
            "POST" => [
                'input-question_content' => 'required|min:2|max:1000',
                'input-question_answer' => 'required|min:2|max:1000',
                'input-question_vulnerabilities' => 'required|min:2|max:1000',
                'input-question_suggestions' => 'required|min:2|max:1000',
                'input-question_score' => 'required|min:2|max:500',
                'input-order' => 'required',
                'input-is_active' => 'required',
            ],
            "PUT" => [
                'input-question_content' => 'required|min:2|max:1000',
                'input-question_answer' => 'required|min:2|max:1000',
                'input-question_vulnerabilities' => 'required|min:2|max:1000',
                'input-question_suggestions' => 'required|min:2|max:1000',
                'input-question_score' => 'required|min:2|max:500',
                'input-order' => 'required',
                'input-is_active' => 'required'
            ],
            default => [],
        };
    }

    public function attributes()
    {
        return [
            'input-question_content' => __('messages.gdpr_adaptation_questions.form.01'),
            'input-question_answer' => __('messages.gdpr_adaptation_questions.form.02'),
            'input-question_vulnerabilities' => __('messages.gdpr_adaptation_questions.form.03'),
            'input-question_suggestions' => __('messages.gdpr_adaptation_questions.form.04'),
            'input-question_score' => __('messages.gdpr_adaptation_questions.form.05'),
            'input-order' => __('messages.gdpr_adaptation_questions.form.06'),
            'input-is_active' => __('messages.gdpr_adaptation_questions.form.07'),
        ];
    }
}
