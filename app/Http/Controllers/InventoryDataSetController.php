<?php

namespace App\Http\Controllers;

use App\Http\Requests\InventoryDataSetRequest;
use App\Models\CompanyDepartment;
use App\Models\DataHoldReason;
use App\Models\InventoryCategory;
use App\Models\InventoryDataSet;
use App\Models\InventoryDataType;
use App\Models\KVKKPrecaution;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Datatables;

class InventoryDataSetController extends Controller
{
    public function index(Request $request)
    {
        $data = InventoryDataSet::all();

        if ($request->ajax()) {
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('status', function ($row_status) {
                    return ($row_status->is_active) ? '<span class="badge rounded-pill badge-light-success">'.__('messages.inventory_data_sets.form.13.01').'</span>' : '<span class="badge rounded-pill badge-light-danger">'.__('messages.inventory_data_sets.form.13.02').'</span>';
                })
                ->addColumn('invCategory', function ($row_invCategory) {
                    return $row_invCategory->linkedInventoryCategory->name;
                })
                ->addColumn('invDataType', function ($row_invDataType) {
                    return $row_invDataType->linkedInventoryDataType->name;
                })
                ->addColumn('relatedToA', function ($row_relatedTo) {
                    switch ($row_relatedTo->related_to_id) {
                        case "1":
                            return __('messages.inventory_data_sets.form.06.01');
                        case "2":
                            return __('messages.inventory_data_sets.form.06.02');
                        case "3":
                            return __('messages.inventory_data_sets.form.06.03');
                    }
                })
                ->rawColumns(['status', 'invCategory', 'invDataType'])
                ->make(true);
        }

        return view('pages.inventory_data_sets.inventory_data_sets_index');
    }

    public function create()
    {
        $departments = CompanyDepartment::where('client_id', Auth::user()->linkedClient->id)->where('is_active', true)->get();
        $inventoryCategories = InventoryCategory::where('is_active', true)->get();
        $inventoryDataTypes = InventoryDataType::where('is_active', true)->get();
        $dataHoldReasons = DataHoldReason::where('is_active', true)->get();
        $kvkkPrecautions = KVKKPrecaution::where('is_active', true)->get();
        return view('pages.inventory_data_sets.inventory_data_sets_create', compact('departments', 'inventoryCategories', 'inventoryDataTypes', 'dataHoldReasons', 'kvkkPrecautions'));
    }

    public function store(InventoryDataSetRequest $request)
    {
        $inventoryDataSet = new InventoryDataSet();
        $inventoryDataSet->client_id = Auth::user()->linkedClient->id;
        $inventoryDataSet->department_id = $request['input-department_id'];
        $inventoryDataSet->data_title = $request['input-data_title'];
        $inventoryDataSet->inventory_category_id = $request['input-inventory_category_id'];
        $inventoryDataSet->inventory_data_type_id = $request['input-inventory_data_type_id'];
        $inventoryDataSet->data_hold_reason_ids = $request['input-data_hold_reason_ids'];
        $inventoryDataSet->related_to_id = $request['input-related_to_id'];
        $inventoryDataSet->legal_reason = $request['input-legal_reason'];
        $inventoryDataSet->data_hold_place = $request['input-data_hold_place'];
        $inventoryDataSet->data_hold_time = $request['input-data_hold_time'];
        $inventoryDataSet->data_transfer_to_id = $request['input-data_transfer_to_id'];
        $inventoryDataSet->data_to_abroad = $request['input-data_to_abroad'];
        $inventoryDataSet->kvkk_precaution_ids = $request['input-kvkk_precaution_ids'];
        $inventoryDataSet->is_active = $request['input-is_active'];
        $inventoryDataSet->created_by = Auth::user()->id;
        $inventoryDataSet->save();

        return redirect()->route('InventoryDataSets.Index')
            ->with('result','success')
            ->with('title',__('messages.alerts.01'))
            ->with('content',__('messages.alerts.02'));
    }

    public function edit(string $id)
    {
        $inventoryDataSet = InventoryDataSet::find($id);
        $departments = CompanyDepartment::where('client_id', Auth::user()->linkedClient->id)->where('is_active', true)->get();
        $inventoryCategories = InventoryCategory::where('is_active', true)->get();
        $inventoryDataTypes = InventoryDataType::where('is_active', true)->get();
        $dataHoldReasons = DataHoldReason::where('is_active', true)->get();
        $kvkkPrecautions = KVKKPrecaution::where('is_active', true)->get();
        return view('pages.inventory_data_sets.inventory_data_sets_edit', compact('inventoryDataSet', 'departments', 'inventoryCategories', 'inventoryDataTypes', 'dataHoldReasons', 'kvkkPrecautions'));
    }

    public function update(InventoryDataSetRequest $request, string $id)
    {
        $inventoryDataSet = InventoryDataSet::find($id);
        $inventoryDataSet->client_id = Auth::user()->linkedClient->id;
        $inventoryDataSet->department_id = $request['input-department_id'];
        $inventoryDataSet->data_title = $request['input-data_title'];
        $inventoryDataSet->inventory_category_id = $request['input-inventory_category_id'];
        $inventoryDataSet->inventory_data_type_id = $request['input-inventory_data_type_id'];
        $inventoryDataSet->data_hold_reason_ids = $request['input-data_hold_reason_ids'];
        $inventoryDataSet->related_to_id = $request['input-related_to_id'];
        $inventoryDataSet->legal_reason = $request['input-legal_reason'];
        $inventoryDataSet->data_hold_place = $request['input-data_hold_place'];
        $inventoryDataSet->data_hold_time = $request['input-data_hold_time'];
        $inventoryDataSet->data_transfer_to_id = $request['input-data_transfer_to_id'];
        $inventoryDataSet->data_to_abroad = $request['input-data_to_abroad'];
        $inventoryDataSet->kvkk_precaution_ids = $request['input-kvkk_precaution_ids'];
        $inventoryDataSet->is_active = $request['input-is_active'];
        $inventoryDataSet->updated_by = Auth::user()->id;
        $inventoryDataSet->save();

        return redirect()->route('InventoryDataSets.Edit', $id)
            ->with('result','warning')
            ->with('title',__('messages.alerts.01'))
            ->with('content',__('messages.alerts.04'));
    }

    public function destroy(string $id)
    {
        $inventoryDataSet = InventoryDataSet::find($id);

        $inventoryDataSet->update([
            'is_active' => false,
            'deleted_by' => Auth::user()->id
        ]);

        $inventoryDataSet->delete();

        return response()->json([
            'status' => 'success',
            'title' => __('messages.alerts.01'),
            'message' => __('messages.alerts.03')
        ]);
    }
}
