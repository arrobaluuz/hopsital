<?php

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Doctor extends Eloquent
{
    protected $connection = 'mongodb';
    protected $collection = 'doctores';
    protected $fillable = [
        'nombres',
        'apellidos',
        'curp',
        'cedula',
        'telefono',
        'correo',
        'especialidad',
    ];
}
