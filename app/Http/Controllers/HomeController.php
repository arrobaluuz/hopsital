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
        return view('pages.dashboard', compact('citas'));
    }
}
