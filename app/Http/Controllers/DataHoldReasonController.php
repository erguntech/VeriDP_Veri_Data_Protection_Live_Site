<?php

namespace App\Http\Controllers;

use App\Http\Requests\DataHoldReasonRequest;
use App\Models\DataHoldReason;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Datatables;

class DataHoldReasonController extends Controller
{
    public function index(Request $request)
    {
        $data = DataHoldReason::all();

        if ($request->ajax()) {
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('status', function ($row_status) {
                    return ($row_status->is_active) ? '<span class="badge rounded-pill badge-light-success">'.__('messages.data_hold_reasons.form.02.01').'</span>' : '<span class="badge rounded-pill badge-light-danger">'.__('messages.data_hold_reasons.form.02.02').'</span>';
                })
                ->rawColumns(['status'])
                ->make(true);
        }

        return view('pages.data_hold_reasons.data_hold_reasons_index');
    }

    public function create()
    {
        return view('pages.data_hold_reasons.data_hold_reasons_create');
    }

    public function store(DataHoldReasonRequest $request)
    {
        $dataHoldReason = new DataHoldReason();
        $dataHoldReason->content = $request['input-content'];
        $dataHoldReason->is_active = $request['input-is_active'];
        $dataHoldReason->created_by = Auth::user()->id;
        $dataHoldReason->save();

        return redirect()->route('DataHoldReasons.Index')
            ->with('result','success')
            ->with('title',__('messages.alerts.01'))
            ->with('content',__('messages.alerts.02'));
    }

    public function edit(string $id)
    {
        $dataHoldReason = DataHoldReason::find($id);
        return view('pages.data_hold_reasons.data_hold_reasons_edit', compact('dataHoldReason'));
    }

    public function update(DataHoldReasonRequest $request, string $id)
    {
        $dataHoldReason = DataHoldReason::find($id);
        $dataHoldReason->content = $request['input-content'];
        $dataHoldReason->is_active = $request['input-is_active'];
        $dataHoldReason->updated_by = Auth::user()->id;
        $dataHoldReason->save();

        return redirect()->route('DataHoldReasons.Edit', $id)
            ->with('result','warning')
            ->with('title',__('messages.alerts.01'))
            ->with('content',__('messages.alerts.04'));
    }

    public function destroy(string $id)
    {
        $inventoryCategory = DataHoldReason::find($id);

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
