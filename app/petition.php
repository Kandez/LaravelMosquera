<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class petition extends Model
{
    protected $fillable = ['id_grade','id_company','type', 'n_students'];

    public function companies()
    {
        return $this->belongsTo(company::class, 'id_company');
    }

    public function grades()
    {
        return $this->belongsTo(grade::class, 'id_grade');
    }
}
