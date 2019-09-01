<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Asignacion extends Model
{

    protected $table = 'asignacion';

    protected $fillable = [
        'id',
        'id_recurso',
        'id_persona',
        'descripcion'
    ];
    protected $guarded = [];
}
