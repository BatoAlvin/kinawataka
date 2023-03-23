<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    use HasFactory;

    protected $guarded = [];

    // public function staffrole(){
    //     return $this->belongsTo(Staffrole::class,'role','id');
    // }

    // public function speciality(){
    //     return $this->belongsTo(Speciality::class,'speciality_id','id');
    // }
}
