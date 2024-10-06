<?php

namespace App\Http\Controllers;

use App\Http\Requests\CompanyDocumentRequest;
use App\Models\Client;
use App\Models\CompanyDocument;
use ErlandMuchasaj\LaravelFileUploader\FileUploader;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Datatables;

class CompanyDocumentController extends Controller
{
    public function index(Request $request)
    {
        $data = CompanyDocument::all();

        if ($request->ajax()) {
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('linkedClient', function ($row_linkedClient) {
                    return $row_linkedClient->linkedClient->company_name;
                })
                ->addColumn('createdTime', function ($row_createdTime) {
                    return date('d/m/Y', strtotime($row_createdTime->created_at));
                })
                ->addColumn('status', function ($row_status) {
                    return ($row_status->is_active) ? '<span class="badge rounded-pill badge-light-success">'.__('messages.company_documents.form.02.01').'</span>' : '<span class="badge rounded-pill badge-light-danger">'.__('messages.company_documents.form.02.02').'</span>';
                })
                ->rawColumns(['status'])
                ->make(true);
        }

        return view('pages.company_documents.company_documents_index');
    }

    public function create()
    {
        $clients = Client::all();
        return view('pages.company_documents.company_documents_create', compact('clients'));
    }

    public function store(CompanyDocumentRequest $request)
    {
        $companyDocument = new CompanyDocument();
        $companyDocument->document_name = $request['input-document_name'];
        $companyDocument->client_id = $request['input-client_id'];
        $companyDocument->is_active = $request['input-is_active'];
        $companyDocument->show_on_web = $request['input-show_on_web'];
        $companyDocument->created_by = Auth::user()->id;
        $response = FileUploader::store($request['input-document_file']);
        $companyDocument->document_path = $response['path'];
        $companyDocument->save();

        return redirect()->route('CompanyDocuments.Index')
            ->with('result','success')
            ->with('title',__('messages.alerts.01'))
            ->with('content',__('messages.alerts.02'));
    }

    public function edit(string $id)
    {
        $companyDocument = CompanyDocument::find($id);
        $documentMeta = FileUploader::meta($companyDocument->document_path);
        $clients = Client::all();

        return view('pages.company_documents.company_documents_edit', compact('companyDocument', 'clients', 'documentMeta'));
    }

    public function update(CompanyDocumentRequest $request, string $id)
    {
        $companyDocument = CompanyDocument::find($id);
        $companyDocument->document_name = $request['input-document_name'];
        $companyDocument->client_id = $request['input-client_id'];
        $companyDocument->is_active = $request['input-is_active'];
        $companyDocument->show_on_web = $request['input-show_on_web'];
        $companyDocument->updated_by = Auth::user()->id;

        if ($request['input-document_file'] != null) {
            FileUploader::remove($companyDocument->document_path);
            $response = FileUploader::store($request['input-document_file']);
            $companyDocument->document_path = $response['path'];
        }

        $companyDocument->save();

        return redirect()->route('CompanyDocuments.Edit', $id)
            ->with('result','warning')
            ->with('title',__('messages.alerts.01'))
            ->with('content',__('messages.alerts.04'));
    }

    public function destroy(string $id)
    {
        $companyDocument = CompanyDocument::find($id);
        FileUploader::remove($companyDocument->document_path);
        $companyDocument->update([
            'is_active' => false,
            'deleted_by' => Auth::user()->id
        ]);

        $companyDocument->delete();

        return response()->json([
            'status' => 'success',
            'title' => __('messages.alerts.01'),
            'message' => __('messages.alerts.03')
        ]);
    }

    public function kvkkDocuments()
    {
        $companyDocuments = CompanyDocument::where('client_id', Auth::user()->linkedClient->id)->where('is_active', true)->get();
        return view('pages.company_documents.company_documents_general', compact('companyDocuments'));
    }

    public function downloadKVKKDocument($id)
    {
        $companyDocument = CompanyDocument::find($id);
        $documentMeta = FileUploader::meta($companyDocument->document_path);
        return FileUploader::download($companyDocument->document_path, $documentMeta['name']);
    }
}
