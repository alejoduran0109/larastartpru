<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{

    protected $table = 'person';
    public $timestamps = false;

    protected $fillable = [
        'identificacion',
        'nombres',
        'apellidos'
    ];
    protected $guarded = [];
}
