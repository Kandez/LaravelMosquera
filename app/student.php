<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class student extends Model
{
    protected $fillable = ['name', 'lastname', 'age'];

    public function grades(){
        return $this->belongsToMany(grade::class, 'studies', 'id_student', 'id_grade');
    }
}