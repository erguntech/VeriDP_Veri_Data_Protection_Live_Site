<?php

namespace App\Http\Controllers;

use App\Exports\InventoryReportExport;
use App\Models\CompanyDepartment;
use App\Models\InventoryDataSet;
use App\Models\InventoryReport;
use Illuminate\Http\Request;
use Datatables;
use Illuminate\Support\Facades\Auth;
use App\Models\Client;
use Excel;

class InventoryGenerateController extends Controller
{
    public function index(Request $request)
    {
        $data = InventoryReport::all();

        if ($request->ajax()) {
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('createdAT', function ($row_createdAT) {
                    return date('d/m/Y - H:i', strtotime($row_createdAT->created_at));
                })
                ->make(true);
        }

        $company = Auth::user()->linkedClient;
        $departmentCount = CompanyDepartment::where('client_id', $company->id)->get()->count();
        $dataSetCount = InventoryDataSet::where('client_id', $company->id)->get()->count();
        return view('pages.inventory_generates.inventory_generates_index',compact('company', 'departmentCount', 'dataSetCount'));
    }

    public function generateInventoryReport(Request $request) {

        $characters = '0123456789abcdefghijklmnopqrstuvwxyz';
        $charactersLength = strlen($characters);
        $randomString = '';

        for ($i = 0; $i < 8; $i++) {
            $randomString .= $characters[random_int(0, $charactersLength - 1)];
        }

        $client = Client::find($request['clientID']);

        $inventoryReport = new InventoryReport();
        $inventoryReport->client_id = $client->id;
        $inventoryReport->report_no = $randomString;
        $inventoryReport->created_by = Auth::user()->id;
        $inventoryReport->save();

        return response()->json([
            'status' => 'success'
        ]);
    }

    public function downloadInventoryReport(Request $request) {
        return Excel::download(new InventoryReportExport(), 'a.xlsx');
    }
}
