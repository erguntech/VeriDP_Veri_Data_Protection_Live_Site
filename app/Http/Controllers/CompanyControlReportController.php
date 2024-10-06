<?php

namespace App\Http\Controllers;

use App\Http\Requests\CompanyControlReportRequest;
use App\Models\Client;
use App\Models\CompanyControlReport;
use ErlandMuchasaj\LaravelFileUploader\FileUploader;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Datatables;

class CompanyControlReportController extends Controller
{
    public function index(Request $request)
    {
        $data = CompanyControlReport::all();

        if ($request->ajax()) {
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('linkedClient', function ($row_linkedClient) {
                    return $row_linkedClient->linkedClient->company_name;
                })
                ->addColumn('datePeriod', function ($row_datePeriod) {
                    return date('d/m/Y', strtotime($row_datePeriod->created_at));
                })
                ->addColumn('status', function ($row_status) {
                    return ($row_status->is_active) ? '<span class="badge rounded-pill badge-light-success">'.__('messages.company_control_reports.form.05.01').'</span>' : '<span class="badge rounded-pill badge-light-danger">'.__('messages.company_control_reports.form.05.02').'</span>';
                })
                ->rawColumns(['status'])
                ->make(true);
        }

        return view('pages.company_control_reports.company_control_reports_index');
    }

    public function create()
    {
        $datePeriods = getDatePeriods(1,2020,12,2030);
        $clients = Client::all();
        return view('pages.company_control_reports.company_control_reports_create', compact('clients', 'datePeriods'));
    }

    public function store(CompanyControlReportRequest $request)
    {
        $companyControlReport = new CompanyControlReport();
        $companyControlReport->client_id = $request['input-client_id'];
        $companyControlReport->report_name = $request['input-report_name'];
        $companyControlReport->report_description = $request['input-report_description'];
        $companyControlReport->date_period = $request['input-date_period'];
        $companyControlReport->is_active = $request['input-is_active'];
        $companyControlReport->created_by = Auth::user()->id;
        $response = FileUploader::store($request['input-document_file']);
        $companyControlReport->document_path = $response['path'];
        $companyControlReport->report_data = $request['input-report_data'];
        $companyControlReport->save();

        return redirect()->route('CompanyControlReports.Index')
            ->with('result','success')
            ->with('title',__('messages.alerts.01'))
            ->with('content',__('messages.alerts.02'));
    }

    public function edit(string $id)
    {
        $datePeriods = getDatePeriods(1,2020,12,2030);
        $companyControlReport = CompanyControlReport::find($id);
        $documentMeta = FileUploader::meta($companyControlReport->document_path);
        $clients = Client::all();

        return view('pages.company_control_reports.company_control_reports_edit', compact('companyControlReport', 'clients', 'documentMeta', 'datePeriods'));
    }

    public function update(CompanyControlReportRequest $request, string $id)
    {
        $companyControlReport = CompanyControlReport::find($id);
        $companyControlReport->client_id = $request['input-client_id'];
        $companyControlReport->report_name = $request['input-report_name'];
        $companyControlReport->report_description = $request['input-report_description'];
        $companyControlReport->date_period = $request['input-date_period'];
        $companyControlReport->is_active = $request['input-is_active'];
        $companyControlReport->updated_by = Auth::user()->id;

        if ($request['input-document_file'] != null) {
            FileUploader::remove($companyControlReport->document_path);
            $response = FileUploader::store($request['input-document_file']);
            $companyControlReport->document_path = $response['path'];
        }

        $companyControlReport->report_data = $request['input-report_data'];
        $companyControlReport->save();

        return redirect()->route('CompanyControlReports.Edit', $id)
            ->with('result','warning')
            ->with('title',__('messages.alerts.01'))
            ->with('content',__('messages.alerts.04'));
    }

    public function destroy(string $id)
    {
        $companyControlReport = CompanyControlReport::find($id);
        FileUploader::remove($companyControlReport->document_path);
        $companyControlReport->update([
            'is_active' => false,
            'deleted_by' => Auth::user()->id
        ]);

        $companyControlReport->delete();

        return response()->json([
            'status' => 'success',
            'title' => __('messages.alerts.01'),
            'message' => __('messages.alerts.03')
        ]);
    }

    public function controlReports()
    {
        $companyControlReports = CompanyControlReport::where('client_id', Auth::user()->linkedClient->id)->where('is_active', true)->get();
        return view('pages.company_control_reports.company_control_reports_general', compact('companyControlReports'));
    }

    public function downloadControlReport($id)
    {
        $companyControlReport = CompanyControlReport::find($id);
        $documentMeta = FileUploader::meta($companyControlReport->document_path);
        return FileUploader::download($companyControlReport->document_path, $documentMeta['name']);
    }
}
