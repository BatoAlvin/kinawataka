<?php

namespace App\Exports;

use App\Models\Loans;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class LoansExport implements FromView,ShouldAutoSize
{
    public function view(): View
    {
        $loan = Loans::all();
        return view('loans.export',['loan' => $loan]);
    }
}
