<?php

namespace App\Exports;

use App\Models\Saving;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class SavingsExport implements FromView,ShouldAutoSize
{
    public function view(): View
    {
        $savings = Saving::with('member')->get();
        return view('savings.export',['saving' => $savings]);
    }
}
