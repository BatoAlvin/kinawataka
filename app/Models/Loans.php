<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Loans extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function memberloan(){
        return $this->belongsTo(Familymembers::class,'family_id','id');
    }
}
