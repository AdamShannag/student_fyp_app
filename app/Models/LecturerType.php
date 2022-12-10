<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LecturerType extends Model
{
    use HasFactory;

    public function lecturer(){
        return $this->belongsTo(Lecturer::class);
    }
}
