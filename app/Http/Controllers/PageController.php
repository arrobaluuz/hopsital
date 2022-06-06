<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cita;
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
            if($page == 'dashboard'){
                $now = Carbon::now()->format('Y-m-d');
                $citas= Cita::select('*')->where('dia', '>=', $now )->orderBy('dia')->orderBy('hora')->get();
                foreach($citas as $item){
                    $doctor = Doctor::select('*')->where('_id',$item->id_doctor)->first();
                    $item -> doctor = $doctor->nombres ." ".$doctor->apellidos;
                }

                return view("pages.{$page}", compact('citas'));
            }else{
                return view("pages.{$page}");
            }
        }
        return abort(404);
    }
}
