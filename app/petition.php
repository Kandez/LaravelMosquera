<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class petition extends Model
{
    protected $fillable = ['type', 'n_students'];

    public function companies()
    {
        return $this->belongsTo(company::class);
    }

    public function grades()
    {
        return $this->belongsTo(grade::class, 'grades', 'id_grade');
    }
}
