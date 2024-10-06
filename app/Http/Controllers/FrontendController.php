<?php

namespace App\Http\Controllers;

use App\Mail\AdaptationResultMail;
use App\Models\GDPRAdaptationQuestion;
use App\Models\GDPRAdaptationResult;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class FrontendController extends Controller
{
    public function pageHome()
    {
        return view('pages.frontend.home');
    }

    public function pageAdaptation ()
    {
        $adaptationQuestions = GDPRAdaptationQuestion::where('is_active', true)->get();
        return view('pages.frontend.adaptation', compact('adaptationQuestions'));
    }

    public function testResult(Request $request)
    {
        $uID = $request->uID;

        $result = new GDPRAdaptationResult();
        $result->exam_id = $uID;
        $result->question_answers = json_encode($request->examResults);
        $result->result_points = 100;
        $result->save();

        return response()->json([
            "status" => 'Success',
            'url' => url('/adaptationresult/'.$uID),
            "uID" => $uID,
        ]);
    }

    public function pageAdaptationResult($id)
    {
        $result = GDPRAdaptationResult::where('exam_id', $id)->first();
        return view('pages.frontend.adaptation_result', compact('result'));
    }

    public function sendAdaptationResult(Request $request)
    {
        $name = $request->name;
        $email = $request->email;

        Mail::to("erguntech@gmail.com")->send(new AdaptationResultMail([
            'title' => 'The Title',
            'body' => 'The Body',
        ]));

        return response()->json([
            "status" => 'Success',
        ]);
    }
}
