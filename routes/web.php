<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\CitaController;
use App\Models\Doctor;
use App\Models\EspecialidadModel;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Auth::routes();

Route::get('/', function () {
	$doctores = Doctor::select('*')->get();
	foreach($doctores as $doctor){
		$especialidad = EspecialidadModel::select('nombre')->where('_id', $doctor->especialidad)->first();
		$doctor->name_esp = $especialidad->nombre;
	}
    return view('welcome',compact('doctores'));
});

Route::get('/users',[UserController::class, 'index'])->name('users.index');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => 'auth'], function () {
	Route::resource('user', 'App\Http\Controllers\UserController', ['except' => ['show']]);
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'App\Http\Controllers\ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'App\Http\Controllers\ProfileController@update']);
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'App\Http\Controllers\ProfileController@password']);
});

Route::group(['middleware' => 'auth'], function () {
	Route::get('{page}', ['as' => 'page.index', 'uses' => 'App\Http\Controllers\PageController@index']);

	Route::prefix('dr')->group(function(){
		Route::get('index', [DoctorController::class, 'index'])->name('doctor.index');
		Route::post('doctor', [DoctorController::class, 'store'])->name('doctor.store');
		Route::put('doctor/{id}', [DoctorController::class, 'update'])->name('doctor.update');
		Route::get('doctor/{id}/active', [DoctorController::class, 'active'])->name('doctor.active');
	});
	Route::prefix('especialidad')->group(function(){
		Route::get('index',[DoctorController::class,'indexEspecialidad'])->name('especialidad.index');
		Route::post('es', [DoctorController::class, 'storeEspecialidad'])->name('especialidad.store');
		Route::put('es/{id}', [DoctorController::class, 'updateEspecialidad'])->name('especialidad.update');
		Route::get('es/{id}', [DoctorController::class, 'activeEspecialidad'])->name('especialidad.active');
	});

	Route::prefix('us')->group(function(){
		Route::post('index', [UserController::class, 'store'])->name('registrar');
		Route::get('{id}/active', [UserController::class, 'active'])->name('user.active');
		Route::put('reset/{id}', [UserController::class, 'updatePass'])->name('user.resetPass');

	});
	Route::prefix('citas')->group(function(){
		Route::get('index', [CitaController::class, 'index'])->name('cita.index');
		Route::post('es', [CitaController::class, 'store'])->name('cita.store');
		Route::put('es/{id}', [CitaController::class, 'update'])->name('cita.update');
		Route::get('{id}/active', [CitaController::class, 'active'])->name('cita.active');
	});
});

