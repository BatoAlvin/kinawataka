<?php

namespace App\Imports;

use App\Models\Inlaws;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;

class ImportInlaw implements ToModel
{

    public function startRow(): int
    {
        return 2;
    }

    
    public function model(array $row)
   {
       return new Inlaws([
           'inlaw_name' => $row[0],
           'inlaw_names' => $row[1],
       ]);
   }
}
