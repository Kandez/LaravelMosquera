<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class grade extends Model
{
    protected $fillable = ['name', 'level'];

    public function petitions()
    {
        return $this->hasMany(petition::class);
    }
    public function students()    {
        return $this->belongsToMany(student::class, 'studies', 'id_grade', 'id_student');
    }
}
