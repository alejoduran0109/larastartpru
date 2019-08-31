<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recurso extends Model
{

    protected $table = 'resource';
    public $timestamps = false;

    protected $fillable = [
        'id',
        'categoria',
        'codigo',
        'nombre',
        'marca',
        'serie'
    ];
    protected $guarded = [];
}
