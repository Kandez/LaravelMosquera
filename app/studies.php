<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class studies extends Model
{
    protected $fillable = ['id_student', 'id_grade'];

    public function studient(){
        return $this->belongsTo(student::class, 'id_student', 'id');
    }

    public function grade(){
        return $this->belongsto(grade::class, 'id_grade', 'id');
    }
}