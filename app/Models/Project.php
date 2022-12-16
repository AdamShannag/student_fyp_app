<?php

namespace App\Models;

use DateTime;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $gaurded = ['id'];
    protected $fillable = ['title', 'start_date', 'end_date','duration','progress','status'];

    public function student(){
        return $this->hasOne(Student::class);
    }

    public function lecturers(){
        return $this->belongsToMany(Lecturer::class,'lecturer_project')->withPivot(['job']);
    }

    public function getDuration($startDate,$endDate){
        $d1=new DateTime($endDate);
        $d2=new DateTime($startDate);
        $Months = $d2->diff($d1);
        return (($Months->y) * 12) + ($Months->m);
    }
}
