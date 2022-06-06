<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cita;
use App\Models\Doctor;
use Carbon\Carbon;

class CitaController extends Controller
{
    public function index(Cita $model)
    {
        $citas = Cita::select('*')->get();
        foreach ($citas as $item) {
            $doctor = Doctor::select('*')->where('_id',$item->id_doctor)->first();
            $item -> doctor = $doctor->nombres ." ".$doctor->apellidos;
        }
        $doctores = Doctor::select('*')->where('active',1)->get();
        return view('citas.index', compact('citas','doctores'));
    }
    public function store(Request $request)
    {
        try {
            $newCita = new Cita;
            $newCita -> id_doctor = $request ->id_doctor;
            $newCita -> dia = $request -> dia;
            $newCita -> hora = $request -> hora;
            $newCita -> notas = $request -> notas;
            $newCita ->active = 1;
            $newCita -> save();
            session()->flash('success','Cita agendada');
            return back()->withInput();
        } catch (\Throwable $th) {
            response()->json($th, 500);
            session()->flash('danger',$th);
            return back()->withInput();
        }
    }
    public function update(Request $request,$id)
    {
        try {
            $newCita = Cita::select('*')->where('_id',$id)->first();;
            $newCita -> id_doctor = $request -> id_doctor;
            $newCita -> dia = $request -> dia;
            $newCita -> hora = $request -> hora;
            $newCita -> notas = $request -> notas;
            $newCita -> update();
            session()->flash('success','Cita actualizada');
            return back()->withInput();
        } catch (\Throwable $th) {
            response()->json($th, 500);
            session()->flash('danger',$th);
            return back()->withInput();
        }
    }
    public function active($id)
    {
        try {
            $updateCita = Cita::select('*')->where('_id',$id)->first();
            if($updateCita->active == 1 ){
                $updateCita -> active = 0;
            }else{
                $updateCita -> active = 1;
            }
            $updateCita -> update();
            session()->flash('success','Cita actualizada');
            return back()->withInput();

        } catch (\Throwable $th) {
            response()->json($th, 500);
            session()->flash('danger',$th);
            return back()->withInput();
        }
    }
}
