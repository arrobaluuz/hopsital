<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CitaController extends Controller
{
    public function index(Doctor $model)
    {
        $doctores = Doctor::select('*')->get();
        return view('doctor.index', compact('doctores'));
    }
}
