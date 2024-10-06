<?php

namespace App\Exports;

use App\Models\InventoryDataSet;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\FromView;

class InventoryReportExport implements FromView
{
    public function view(): View
    {
        return view('exports.inventory_report', ['inventoryDataSets' => InventoryDataSet::where('client_id', Auth::user()->linkedClient->id)->get()]);
    }
}
