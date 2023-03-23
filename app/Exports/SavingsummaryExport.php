<?php

namespace App\Exports;

use App\Models\Saving;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class SavingsummaryExport implements FromView,ShouldAutoSize
{
    public function view(): View
    {

        $savingsummary = Saving::with('member')->get();
        return view('savingsummary.export',['savingsummary' => $savingsummary]);
    }
}
