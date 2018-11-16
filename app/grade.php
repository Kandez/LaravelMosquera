<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class grade extends Model
{
    protected $fillable = ['name', 'level'];

    public function petitions()
    {
        return $this->hasMany(petition::class, 'petitions', 'id');
    }
}
