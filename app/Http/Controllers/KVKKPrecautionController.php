<?php

namespace App\Http\Controllers;

use App\Http\Requests\KVKKPrecautionRequest;
use App\Models\KVKKPrecaution;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Datatables;

class KVKKPrecautionController extends Controller
{
    public function index(Request $request)
    {
        $data = KVKKPrecaution::all();

        if ($request->ajax()) {
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('status', function ($row_status) {
                    return ($row_status->is_active) ? '<span class="badge rounded-pill badge-light-success">'.__('messages.kvkk_precautions.form.04.01').'</span>' : '<span class="badge rounded-pill badge-light-danger">'.__('messages.kvkk_precautions.form.04.02').'</span>';
                })
                ->addColumn('cautionType', function ($row_cautionType) {
                    if ($row_cautionType->caution_type == "I") {
                       return '<span class="badge rounded-pill badge-light-success">'.__('messages.kvkk_precautions.form.03.01').'</span>';
                    } elseif ($row_cautionType->caution_type == "T") {
                        return '<span class="badge rounded-pill badge-light-danger">'.__('messages.kvkk_precautions.form.03.02').'</span>';
                    }
                })
                ->rawColumns(['status', 'cautionType'])
                ->make(true);
        }

        return view('pages.kvkk_precautions.kvkk_precautions_index');
    }

    public function create()
    {
        return view('pages.kvkk_precautions.kvkk_precautions_create');
    }

    public function store(KVKKPrecautionRequest $request)
    {
        $kvkkPrecaution = new KVKKPrecaution();
        $kvkkPrecaution->title = $request['input-title'];
        $kvkkPrecaution->content = $request['input-content'];
        $kvkkPrecaution->caution_type = $request['input-caution_type'];
        $kvkkPrecaution->is_active = $request['input-is_active'];
        $kvkkPrecaution->created_by = Auth::user()->id;
        $kvkkPrecaution->save();

        return redirect()->route('KVKKPrecautions.Index')
            ->with('result','success')
            ->with('title',__('messages.alerts.01'))
            ->with('content',__('messages.alerts.02'));
    }

    public function edit(string $id)
    {
        $kvkkPrecaution = KVKKPrecaution::find($id);
        return view('pages.kvkk_precautions.kvkk_precautions_edit', compact('kvkkPrecaution'));
    }

    public function update(KVKKPrecautionRequest $request, string $id)
    {
        $kvkkPrecaution = KVKKPrecaution::find($id);
        $kvkkPrecaution->title = $request['input-title'];
        $kvkkPrecaution->content = $request['input-content'];
        $kvkkPrecaution->caution_type = $request['input-caution_type'];
        $kvkkPrecaution->is_active = $request['input-is_active'];
        $kvkkPrecaution->updated_by = Auth::user()->id;
        $kvkkPrecaution->save();

        return redirect()->route('KVKKPrecautions.Edit', $id)
            ->with('result','warning')
            ->with('title',__('messages.alerts.01'))
            ->with('content',__('messages.alerts.04'));
    }

    public function destroy(string $id)
    {
        $kvkkPrecaution = KVKKPrecaution::find($id);

        $kvkkPrecaution->update([
            'is_active' => false,
            'deleted_by' => Auth::user()->id
        ]);

        $kvkkPrecaution->delete();

        return response()->json([
            'status' => 'success',
            'title' => __('messages.alerts.01'),
            'message' => __('messages.alerts.03')
        ]);
    }
}
