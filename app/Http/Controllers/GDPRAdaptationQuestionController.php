<?php

namespace App\Http\Controllers;

use App\Http\Requests\GDPRAdaptationQuestionRequest;
use App\Models\GDPRAdaptationQuestion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Datatables;

class GDPRAdaptationQuestionController extends Controller
{
    public function index(Request $request)
    {
        $data = GDPRAdaptationQuestion::all();

        if ($request->ajax()) {
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('status', function ($row_status) {
                    return ($row_status->is_active) ? '<span class="badge rounded-pill badge-light-success">'.__('messages.gdpr_adaptation_questions.form.07.01').'</span>' : '<span class="badge rounded-pill badge-light-danger">'.__('messages.gdpr_adaptation_questions.form.07.02').'</span>';
                })
                ->rawColumns(['status'])
                ->make(true);
        }

        return view('pages.gdpr_adaptation_questions.gdpr_adaptation_questions_index');
    }

    public function create()
    {
        return view('pages.gdpr_adaptation_questions.gdpr_adaptation_questions_create');
    }

    public function store(GDPRAdaptationQuestionRequest $request)
    {
        $gdprAdaptationQuestion = new GDPRAdaptationQuestion();
        $gdprAdaptationQuestion->question_content = $request['input-question_content'];
        $gdprAdaptationQuestion->question_answer = $request['input-question_answer'];
        $gdprAdaptationQuestion->question_vulnerabilities = $request['input-question_vulnerabilities'];
        $gdprAdaptationQuestion->question_suggestions = $request['input-question_suggestions'];
        $gdprAdaptationQuestion->question_score = $request['input-question_score'];
        $gdprAdaptationQuestion->order = $request['input-order'];
        $gdprAdaptationQuestion->is_active = $request['input-is_active'];
        $gdprAdaptationQuestion->created_by = Auth::user()->id;
        $gdprAdaptationQuestion->save();

        return redirect()->route('GDPRAdaptationQuestions.Index')
            ->with('result','success')
            ->with('title',__('messages.alerts.01'))
            ->with('content',__('messages.alerts.02'));
    }

    public function edit(string $id)
    {
        $gdprAdaptationQuestion = GDPRAdaptationQuestion::find($id);
        return view('pages.gdpr_adaptation_questions.gdpr_adaptation_questions_edit', compact('gdprAdaptationQuestion'));
    }

    public function update(GDPRAdaptationQuestionRequest $request, string $id)
    {
        $gdprAdaptationQuestion = GDPRAdaptationQuestion::find($id);
        $gdprAdaptationQuestion->question_content = $request['input-question_content'];
        $gdprAdaptationQuestion->question_answer = $request['input-question_answer'];
        $gdprAdaptationQuestion->question_vulnerabilities = $request['input-question_vulnerabilities'];
        $gdprAdaptationQuestion->question_suggestions = $request['input-question_suggestions'];
        $gdprAdaptationQuestion->question_score = $request['input-question_score'];
        $gdprAdaptationQuestion->order = $request['input-order'];
        $gdprAdaptationQuestion->is_active = $request['input-is_active'];
        $gdprAdaptationQuestion->updated_by = Auth::user()->id;
        $gdprAdaptationQuestion->save();

        return redirect()->route('GDPRAdaptationQuestions.Edit', $id)
            ->with('result','warning')
            ->with('title',__('messages.alerts.01'))
            ->with('content',__('messages.alerts.04'));
    }

    public function destroy(string $id)
    {
        $gdprAdaptationQuestion = GDPRAdaptationQuestion::find($id);

        $gdprAdaptationQuestion->update([
            'is_active' => false,
            'deleted_by' => Auth::user()->id
        ]);

        $gdprAdaptationQuestion->delete();

        return response()->json([
            'status' => 'success',
            'title' => __('messages.alerts.01'),
            'message' => __('messages.alerts.03')
        ]);
    }
}
