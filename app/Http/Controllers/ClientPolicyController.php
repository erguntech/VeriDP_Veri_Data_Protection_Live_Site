<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\CompanyDocument;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Response;
use Illuminate\Http\Request;

class ClientPolicyController extends Controller
{
    public function index(Request $request)
    {
        $user = User::where('unique_id', $request->id)->first();
        $client = $user->linkedClient;
        $clientDocuments = CompanyDocument::where('client_id', $user->linkedClient->id)->where('is_active', true)->where('show_on_web', true)->get();
        return view('pages.policies.policies_index', compact('clientDocuments', 'client'));
    }

    public function downloadPolicy(Request $request)
    {
        $doc = CompanyDocument::where('id', $request->document_id)->first();
        $file = storage_path()."/app/".$doc->document_path;
        return Response::download($file);
    }

    public function downloadPolicyJS(Request $request)
    {
        $file = public_path()."/assets/custom/js/web_codes/".$request->id.".js";
        return Response::download($file);
    }
}
