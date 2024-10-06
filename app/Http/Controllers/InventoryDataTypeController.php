<?php

namespace App\Http\Controllers;

use App\Http\Requests\InventoryDataTypeRequest;
use App\Models\InventoryDataType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Datatables;

class InventoryDataTypeController extends Controller
{
    public function index(Request $request)
    {
        $data = InventoryDataType::all();

        if ($request->ajax()) {
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('status', function ($row_status) {
                    return ($row_status->is_active) ? '<span class="badge rounded-pill badge-light-success">'.__('messages.inventory_data_types.form.02.01').'</span>' : '<span class="badge rounded-pill badge-light-danger">'.__('messages.inventory_data_types.form.02.02').'</span>';
                })
                ->addColumn('dataType', function ($row_dataType) {
                    return ($row_dataType->is_data_special) ? '<span class="badge rounded-pill badge-light-success">'.__('messages.inventory_data_types.form.03.01').'</span>' : '<span class="badge rounded-pill badge-light-danger">'.__('messages.inventory_data_types.form.03.02').'</span>';
                })
                ->rawColumns(['status', 'dataType'])
                ->make(true);
        }

        return view('pages.inventory_data_types.inventory_data_types_index');
    }

    public function create()
    {
        return view('pages.inventory_data_types.inventory_data_types_create');
    }

    public function store(InventoryDataTypeRequest $request)
    {
        $inventoryDataType = new InventoryDataType();
        $inventoryDataType->name = $request['input-name'];
        $inventoryDataType->is_active = $request['input-is_active'];
        $inventoryDataType->is_data_special = $request['input-is_data_special'];
        $inventoryDataType->created_by = Auth::user()->id;
        $inventoryDataType->save();

        return redirect()->route('InventoryDataTypes.Index')
            ->with('result','success')
            ->with('title',__('messages.alerts.01'))
            ->with('content',__('messages.alerts.02'));
    }

    public function edit(string $id)
    {
        $inventoryDataType = InventoryDataType::find($id);
        return view('pages.inventory_data_types.inventory_data_types_edit', compact('inventoryDataType'));
    }

    public function update(InventoryDataTypeRequest $request, string $id)
    {
        $inventoryDataType = InventoryDataType::find($id);
        $inventoryDataType->name = $request['input-name'];
        $inventoryDataType->is_active = $request['input-is_active'];
        $inventoryDataType->is_data_special = $request['input-is_data_special'];
        $inventoryDataType->updated_by = Auth::user()->id;
        $inventoryDataType->save();

        return redirect()->route('InventoryDataTypes.Edit', $id)
            ->with('result','warning')
            ->with('title',__('messages.alerts.01'))
            ->with('content',__('messages.alerts.04'));
    }

    public function destroy(string $id)
    {
        $inventoryDataType = InventoryDataType::find($id);

        $inventoryDataType->update([
            'is_active' => false,
            'deleted_by' => Auth::user()->id
        ]);

        $inventoryDataType->delete();

        return response()->json([
            'status' => 'success',
            'title' => __('messages.alerts.01'),
            'message' => __('messages.alerts.03')
        ]);
    }
}
