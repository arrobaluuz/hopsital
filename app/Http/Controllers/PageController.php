<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cita;
use App\Models\EspecialidadModel;
use App\Models\Doctor;
use Carbon\Carbon;

class PageController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display all the static pages when authenticated
     *
     * @param string $page
     * @return \Illuminate\View\View
     */
    public function index(string $page)
    {
        if (view()->exists("pages.{$page}")) {
            $now = Carbon::now()->format('Y-m-d');
            $citas= Cita::select('*')->where('dia', '>=', $now )->where('active',1)->orderBy('dia')->orderBy('hora')->get();
            foreach($citas as $item){
                //obtenemos el doctor de la cita
                $doctor = Doctor::select('*')->where('_id',$item->id_doctor)->first();
                //obtenemos la especialidad no?
                $especialidad= EspecialidadModel::select('nombre')->where('_id', $doctor->especialidad)->first();
                if(isset($especialidad)){
                    $item->name_esp = $especialidad->nombre;
                }else{
                    $item->name_esp = "Sin especialidad";
                }
                $item -> doctor = $doctor->nombres ." ".$doctor->apellidos;
            }
            return view("pages.{$page}", compact('citas'));
        }
        return abort(404);
    }
    
}
