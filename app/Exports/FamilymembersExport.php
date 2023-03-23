<?php

namespace App\Exports;

use App\Models\Familymembers;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class FamilymembersExport implements FromView,ShouldAutoSize
{
    public function view(): View
    {
        $familymember = Familymembers::all();
        return view('familymembers.export',['familymember' => $familymember]);
    }
}
