<?php

namespace App\Http\Controllers;
use App\Models\Cita;
use App\Models\Doctor;
use Carbon\Carbon;

class HomeController extends Controller
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
     * Show the application dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $citas = Cita::select('*')->get();
        return $citas;
        return view('pages.dashboard');
    }
}
