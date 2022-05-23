<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use Illuminate\Support\Facades\Hash;

class DoctorController extends Controller
{
    public function index(Doctor $model)
    {
        return view('doctor.index', ['doctores' => $model->paginate(15)]);
    }
}