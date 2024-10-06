<?php

namespace App\Http\Controllers;

use App\Http\Requests\InventoryCategoryRequest;
use App\Models\GDPRAdaptationQuestion;
use App\Models\InventoryCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Datatables;
class InventoryCategoryController extends Controller
{
    public function index(Request $request)
    {
        $data = InventoryCategory::all();

        if ($request->ajax()) {
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('status', function ($row_status) {
                    return ($row_status->is_active) ? '<span class="badge rounded-pill badge-light-success">'.__('messages.inventory_categories.form.02.01').'</span>' : '<span class="badge rounded-pill badge-light-danger">'.__('messages.inventory_categories.form.02.02').'</span>';
                })
                ->rawColumns(['status'])
                ->make(true);
        }

        return view('pages.inventory_categories.inventory_categories_index');
    }

    public function create()
    {
        return view('pages.inventory_categories.inventory_categories_create');
    }

    public function store(InventoryCategoryRequest $request)
    {
        $inventoryCategories = new InventoryCategory();
        $inventoryCategories->name = $request['input-name'];
        $inventoryCategories->is_active = $request['input-is_active'];
        $inventoryCategories->created_by = Auth::user()->id;
        $inventoryCategories->save();

        return redirect()->route('InventoryCategories.Index')
            ->with('result','success')
            ->with('title',__('messages.alerts.01'))
            ->with('content',__('messages.alerts.02'));
    }

    public function edit(string $id)
    {
        $inventoryCategory = InventoryCategory::find($id);
        return view('pages.inventory_categories.inventory_categories_edit', compact('inventoryCategory'));
    }

    public function update(InventoryCategoryRequest $request, string $id)
    {
        $inventoryCategories = InventoryCategory::find($id);
        $inventoryCategories->name = $request['input-name'];
        $inventoryCategories->is_active = $request['input-is_active'];
        $inventoryCategories->updated_by = Auth::user()->id;
        $inventoryCategories->save();

        return redirect()->route('InventoryCategories.Edit', $id)
            ->with('result','warning')
            ->with('title',__('messages.alerts.01'))
            ->with('content',__('messages.alerts.04'));
    }

    public function destroy(string $id)
    {
        $inventoryCategory = InventoryCategory::find($id);

        $inventoryCategory->update([
            'is_active' => false,
            'deleted_by' => Auth::user()->id
        ]);

        $inventoryCategory->delete();

        return response()->json([
            'status' => 'success',
            'title' => __('messages.alerts.01'),
            'message' => __('messages.alerts.03')
        ]);
    }
}
