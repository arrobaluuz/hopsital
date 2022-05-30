<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\CitaController;

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
    return view('welcome');
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
	});
	Route::prefix('especialidad')->group(function(){
		Route::get('index',[DoctorController::class,'indexEspecialidad'])->name('especialidad.index');
		Route::post('store', [DoctorController::class, 'storeEspecialidad'])->name('especialidad.store');
		Route::put('update', [DoctorController::class, 'updateEspecialidad'])->name('especialidad.update');
	});

	Route::prefix('us')->group(function(){
		Route::post('index', [UserController::class, 'store'])->name('registrar');
	});

	Route::prefix('citas')->group(function(){
		Route::get('index', [CitaController::class, 'index'])->name('cita.index');
		Route::post('store', [CitaController::class, 'store'])->name('cita.store');
		Route::put('update', [CitaController::class, 'update'])->name('cita.update');
	});

});

