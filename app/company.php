<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class company extends Model
{
    protected $fillable = ['name', 'city','cp'];


    public function petitions(){
        return $this->belongsTo(petition::class);
    }
}
