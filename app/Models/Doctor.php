<?php

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Doctor extends Eloquent
{
    public $timestamps=false;
    protected $connection = 'mongodb';
    protected $collection = 'doctors';
    protected $fillable = [
        'nombres',
        'apellidos',
        'curp',
        'cedula',
        'telefono',
        'correo',
        'especialidad',
        'active'
    ];
}
