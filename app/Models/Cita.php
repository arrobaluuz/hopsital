<?php

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Cita extends Eloquent
{
    public $timestamps=false;
    protected $connection = 'mongodb';
    protected $collection = 'cita';
    protected $fillable = [
        'id_doctor',
        'día',
        'hora',
        'notas'
    ];
}