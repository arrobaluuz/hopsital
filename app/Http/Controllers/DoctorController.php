<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\EspecialidadModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class DoctorController extends Controller
{
    public function index(Doctor $model)
    {
        $doctores = Doctor::select('*')->get();
        return view('doctor.index', compact('doctores'));
    }
    public function store(Request $request)
    {
        try {
            $newDoctor = new Doctor;
            $newDoctor -> nombres = $request-> nombres;
            $newDoctor -> apellidos = $request-> apellidos;
            $newDoctor -> curp = $request-> curp;
            $newDoctor -> cedula = $request-> cedula;
            $newDoctor -> correo = $request-> correo;
            $newDoctor -> telefono = $request-> telefono;
            $newDoctor -> especialidad = $request-> especialidad;
            $newDoctor -> save();
            session()->flash('success','Doctor agregado');
            return back()->withInput();

        } catch (\Throwable $th) {
            response()->json($th, 500);
            session()->flash('danger',$th);
            return back()->withInput();
        }
    }
    public function update(Request $request, $id)
    {
        try {
            $updateDoctor = Doctor::select('*')->where('_id',$id)->first();
            $updateDoctor -> nombres = $request-> nombres;
            $updateDoctor -> apellidos = $request-> apellidos;
            $updateDoctor -> curp = $request-> curp;
            $updateDoctor -> cedula = $request-> cedula;
            $updateDoctor -> correo = $request-> correo;
            $updateDoctor -> telefono = $request-> telefono;
            $updateDoctor -> especialidad = $request-> especialidad;
            $updateDoctor -> update();

            session()->flash('success','Doctor actualizado');
            return back()->withInput();

        } catch (\Throwable $th) {
            response()->json($th, 500);
            session()->flash('danger',$th);
            return back()->withInput();
        }
    }
    public function indexEspecialidad()
    {
        $especialidades = EspecialidadModel::select('*')->get();
        return view('especialidad.index',compact('especialidades'));
    }
    public function storeEspecialidad(Request $request)
    {
        try {
            EspecialidadModel::create([
                'nombre' => $request->nombre,
            ]);
            session()->flash('success','Especialidad creada');
            return back()->withInput();
        } catch (\Throwable $th) {
            response()->json($th, 500);
            session()->flash('danger',$th);
            return back()->withInput();
        }
    }
    public function updateEspecialidad(Request $request, $id)
    {
        try {
            $update = EspecialidadModel::select('*')->where('_id',$id)->first();
            $update -> nombre = $request-> nombre;
            $update -> update();
            session()->flash('success','Especialidad actualizada');
            return back()->withInput();
        } catch (\Throwable $th) {
            response()->json($th, 500);
            session()->flash('danger',$th);
            return back()->withInput();
        }










        try {
            EspecialidadModel::create([
                'nombre' => $request->nombre,
            ]);
        } catch (\Throwable $th) {
            //throw $th;
        }
        $especialidades = EspecialidadModel::select('*')->get();
        return view('especialidad.index',compact('especialidades'));
    }

}