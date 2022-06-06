<?php

namespace App\Http\Controllers;
use App\Models\Cita;
use App\Models\Doctor;
use Carbon\Carbon;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $now = Carbon::now()->format('Y-m-d');
        $citas= Cita::select('*')->where('dia', '>=', $now )->where('active',1)->orderBy('dia')->orderBy('hora')->get();
        foreach($citas as $item){
            $doctor = Doctor::select('*')->where('_id',$item->id_doctor)->first();
            $item -> doctor = $doctor->nombres ." ".$doctor->apellidos;
        }
        return view('pages.dashboard',compact('citas'));
    }
}
