<?php

use App\Http\Controllers\AgendamientoDeCitasController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\EspecialidadController;
use App\Http\Controllers\EpsController;
use App\Http\Controllers\HistoriasClinicasController;
use App\Http\Controllers\PacientesController;
use App\Http\Controllers\ProcedimientosController;
use App\Models\procedimientos;

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

Route::get('/', function () {
    return view('auth.login');
});

/*Route::get('/doctors', function () {
    return view('doctors.index');
});

Route::get('/doctors/create', [DoctorController::class,'create']);
*/
Route::resource('doctors', DoctorController::class)->middleware('auth');
Route::resource('especialidads', EspecialidadController::class)->middleware('auth');
Route::resource('eps', EpsController::class)->middleware('auth');
Route::resource('historias_clinicas', HistoriasClinicasController::class)->middleware('auth');
Route::resource('pacientes', PacientesController::class)->middleware('auth');
Route::resource('agendamiento_de_citas', AgendamientoDeCitasController::class)->middleware('auth');
Route::resource('procedimientos', ProcedimientosController::class)->middleware('auth');
Auth::routes();

Route::get('/home', [DoctorController::class, 'index'])->name('home');

Route::get('/home', [EspecialidadController::class, 'index'])->name('home');

Route::get('/home', [EpsController::class, 'index'])->name('home');

Route::get('/home', [HistoriasClinicasController::class, 'index'])->name('home');

Route::get('/home', [PacientesController::class, 'index'])->name('home');

Route::get('/home', [AgendamientoDeCitasController::class, 'index'])->name('home');

Route::get('/home', [ProcedimientosController::class, 'index'])->name('home');






Route::group(['middleware' => 'auth'], function () {

    Route::get('/', [DoctorController::class, 'index'])->name('home');
    Route::get('/', [EspecialidadController::class, 'index'])->name('home');
    Route::get('/', [EpsController::class, 'index'])->name('home');
    Route::get('/', [HistoriasClinicasController::class, 'index'])->name('home');
    Route::get('/', [PacientesController::class, 'index'])->name('home');
    Route::get('/', [AgendamientoDeCitasController::class, 'index'])->name('home');
    
});