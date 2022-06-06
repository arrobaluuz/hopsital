<?php

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class EspecialidadModel extends Eloquent
{
    use HasFactory;
    public $timestamps=false;
    protected $connection = 'mongodb';
    protected $collection = 'especialidad';
    protected $fillable = [
        'nombre',
        'active'
    ];
}
