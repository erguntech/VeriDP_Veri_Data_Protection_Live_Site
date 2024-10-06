<?php

namespace App\Http\Controllers;

use App\Http\Requests\AcademyContentRequest;
use App\Models\CompanyControlReport;
use Datatables;
use App\Models\AcademyContent;
use ErlandMuchasaj\LaravelFileUploader\FileUploader;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AcademyContentController extends Controller
{
    public function index(Request $request)
    {
        $data = AcademyContent::all();

        if ($request->ajax()) {
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('academy_content_type', function ($row_academy_content_type) {
                    if ($row_academy_content_type->academy_content_type == 1) {
                        return '<span class="badge rounded-pill badge-light-success">'.__('messages.academy_contents.index.datatables.02.01').'</span>';
                    } elseif ($row_academy_content_type->academy_content_type == 2) {
                        return '<span class="badge rounded-pill badge-light-primary">'.__('messages.academy_contents.index.datatables.02.02').'</span>';
                    } elseif ($row_academy_content_type->academy_content_type == 3) {
                        return '<span class="badge rounded-pill badge-light-warning">'.__('messages.academy_contents.index.datatables.02.03').'</span>';
                    }
                })
                ->addColumn('status', function ($row_status) {
                    return ($row_status->is_active) ? '<span class="badge rounded-pill badge-light-success">'.__('messages.academy_contents.form.05.01').'</span>' : '<span class="badge rounded-pill badge-light-danger">'.__('messages.academy_contents.form.05.02').'</span>';
                })
                ->rawColumns(['status', 'academy_content_type'])
                ->make(true);
        }

        return view('pages.academy_contents.academy_contents_index');
    }

    public function create()
    {
        return view('pages.academy_contents.academy_contents_create');
    }

    public function store(AcademyContentRequest $request)
    {
        $academyContent = new AcademyContent();
        $academyContent->academy_content_name = $request['input-academy_content_name'];
        $academyContent->academy_content_description = $request['input-academy_content_description'];
        $academyContent->document_url = $request['input-document_url'];
        $academyContent->academy_content_type = $request['input-academy_content_type'];
        $academyContent->is_active = $request['input-is_active'];
        $academyContent->created_by = Auth::user()->id;

        if ($request['input-document_file']) {
            $response = FileUploader::store($request['input-document_file']);
            $academyContent->document_path = $response['path'];
        }


        $academyContent->save();

        return redirect()->route('AcademyContents.Index')
            ->with('result','success')
            ->with('title',__('messages.alerts.01'))
            ->with('content',__('messages.alerts.02'));
    }

    public function edit(string $id)
    {
        $academyContent = AcademyContent::find($id);

        if ($academyContent->academy_content_type == 3) {
            $documentMeta = null;
        } else {
            $documentMeta = FileUploader::meta($academyContent->document_path);
        }

        return view('pages.academy_contents.academy_contents_edit', compact('documentMeta', 'academyContent'));
    }

    public function update(AcademyContentRequest $request, string $id)
    {
        $academyContent = AcademyContent::find($id);
        $academyContent->academy_content_name = $request['input-academy_content_name'];
        $academyContent->academy_content_description = $request['input-academy_content_description'];
        $academyContent->document_url = $request['input-document_url'];
        $academyContent->academy_content_type = $request['input-academy_content_type'];
        $academyContent->is_active = $request['input-is_active'];
        $academyContent->updated_by = Auth::user()->id;

        if ($request['input-document_file'] != null) {
            FileUploader::remove($academyContent->document_path);
            $response = FileUploader::store($request['input-document_file']);
            $academyContent->document_path = $response['path'];
        }

        $academyContent->save();

        return redirect()->route('AcademyContents.Edit', $id)
            ->with('result','warning')
            ->with('title',__('messages.alerts.01'))
            ->with('content',__('messages.alerts.04'));
    }

    public function destroy(string $id)
    {
        $academyContent = AcademyContent::find($id);
        FileUploader::remove($academyContent->document_path);
        $academyContent->update([
            'is_active' => false,
            'deleted_by' => Auth::user()->id
        ]);

        $academyContent->delete();

        return response()->json([
            'status' => 'success',
            'title' => __('messages.alerts.01'),
            'message' => __('messages.alerts.03')
        ]);
    }

    public function academyContentDocuments()
    {
        $academyContentDocuments = AcademyContent::where('academy_content_type', '1')->get();
        return view('pages.academy_contents.academy_contents_documents', compact('academyContentDocuments'));
    }

    public function academyContentPresentations()
    {
        $academyContentPresentations = AcademyContent::where('academy_content_type', '2')->get();
        return view('pages.academy_contents.academy_contents_presentations', compact('academyContentPresentations'));
    }

    public function academyContentVideos()
    {
        $academyContentVideos = AcademyContent::where('academy_content_type', '3')->get();
        return view('pages.academy_contents.academy_contents_videos', compact('academyContentVideos'));
    }

    public function downloadAcademyContent($id)
    {
        $academyContent = AcademyContent::find($id);
        $documentMeta = FileUploader::meta($academyContent->document_path);
        return FileUploader::download($academyContent->document_path, $documentMeta['name']);
    }
}
