<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    protected $gaurded = ['id'];
    protected $fillable = ['first_name', 'last_name', 'email','phone_number'];
    public function project(){
        return $this->belongsTo(Project::class);
    }
}
