<?php

namespace App\Http\Controllers;

use App\Http\Requests\GDPRDecreeRequest;
use App\Models\GDPRDecree;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Datatables;

class GDPRDecreeController extends Controller
{
    public function index(Request $request)
    {
        $data = GDPRDecree::all();

        if ($request->ajax()) {
            return Datatables::of($data)
                ->addIndexColumn()
                ->make(true);
        }

        return view('pages.gdpr_decrees.gdpr_decrees_index');
    }

    public function create()
    {
        return view('pages.gdpr_decrees.gdpr_decrees_create');
    }

    public function store(GDPRDecreeRequest $request)
    {
        $gdprDecree = new GDPRDecree();
        $gdprDecree->title = $request['input-title'];
        $gdprDecree->date = $request['input-date'];
        $gdprDecree->decree_no = $request['input-decree_no'];
        $gdprDecree->content = $request['input-content'];
        $gdprDecree->sector_id = $request['input-sector_id'];
        $gdprDecree->is_active = $request['input-is_active'];
        $gdprDecree->created_by = Auth::user()->id;
        $gdprDecree->save();

        return redirect()->route('GDPRDecrees.Index')
            ->with('result','success')
            ->with('title',__('messages.alerts.01'))
            ->with('content',__('messages.alerts.02'));
    }

    public function edit(string $id)
    {
        $gdprDecree = GDPRDecree::find($id);
        return view('pages.gdpr_decrees.gdpr_decrees_edit', compact('gdprDecree'));
    }

    public function update(GDPRDecreeRequest $request, string $id)
    {
        $gdprDecree = GDPRDecree::find($id);
        $gdprDecree->title = $request['input-title'];
        $gdprDecree->date = $request['input-date'];
        $gdprDecree->decree_no = $request['input-decree_no'];
        $gdprDecree->content = $request['input-content'];
        $gdprDecree->sector_id = $request['input-sector_id'];
        $gdprDecree->is_active = $request['input-is_active'];
        $gdprDecree->updated_by = Auth::user()->id;
        $gdprDecree->save();

        return redirect()->route('GDPRDecrees.Edit', $id)
            ->with('result','warning')
            ->with('title',__('messages.alerts.01'))
            ->with('content',__('messages.alerts.04'));
    }

    public function destroy(string $id)
    {
        $gdprDecree = GDPRDecree::find($id);

        $gdprDecree->update([
            'deleted_by' => Auth::user()->id
        ]);

        if (User::role($gdprDecree->name)->get()->count() == 0 && count($gdprDecree->permissions) == 0) {
            $gdprDecree->delete();
            return response()->json([
                'status' => 'success',
                'title' => __('messages.alerts.01'),
                'message' => __('messages.alerts.03')
            ]);
        } else if(count($gdprDecree->permissions) != 0) {
            return response()->json([
                'status' => 'aborted',
                'title' => __('messages.alerts.05'),
                'message' => __('messages.roles.alerts.02')
            ]);
        } else if(User::role($gdprDecree->name)->get()->count() != 0) {
            return response()->json([
                'status' => 'aborted',
                'title' => __('messages.alerts.05'),
                'message' => __('messages.roles.alerts.01')
            ]);
        }
    }
}
