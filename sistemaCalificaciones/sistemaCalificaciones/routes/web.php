<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\adminController;
use Illuminate\Support\Facades\Auth;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::view('/login', "login")->name('login');
Route::view('/registro', "register")->name('registro');
Route::view('/privada', "secret")->middleware('auth')->name('privada');
// Route::get('alumnos', [adminController::class, 'alumnos'])->name('alumnos');
// Route::post('nuevoAlumno',[adminController::class,'nuevovotations'])->name('alumnos.nuevo');
// Route::get('eliminarAlumno/{id}',[adminController::class,'eliminarAlumno'])->name('alumnos.eliminar');
Route::middleware('auth')->group(function () {
    // Rutas protegidas
    Route::get('alumnos', [AdminController::class, 'listaAlumnos'])->name('alumnos');
    Route::post('nuevoAlumno',[AdminController::class,'nuevoAlumno'])->name('alumnos.nuevo');
    Route::get('eliminarAlumno/{id}',[AdminController::class,'eliminarAlumno'])->name('alumnos.eliminar');
});
Route::middleware('auth')->group(function () {
    // Rutas protegidas
    Route::get('maestros', [AdminController::class, 'listaMaestros'])->name('maestros');
    Route::post('nuevoMaestro',[AdminController::class,'nuevoProfesor'])->name('maestros.nuevo');
    Route::get('eliminarMaestro/{id}',[AdminController::class,'eliminarProfesor'])->name('maestros.eliminar');
});
Route::middleware('auth')->group(function () {
    // Rutas protegidas
    Route::get('materias', [AdminController::class, 'listaMaterias'])->name('materias');
    Route::post('nuevaMateria',[AdminController::class,'nuevaMateria'])->name('materias.nuevo');
    Route::get('eliminarMateria/{id}',[AdminController::class,'eliminarMateria'])->name('materias.eliminar');
});
Route::middleware('auth')->group(function () {
    // Rutas protegidas
    Route::get('grupos', [AdminController::class, 'listaGrupos'])->name('grupos');
    Route::post('nuevoGrupo',[AdminController::class,'nuevoGrupo'])->name('grupos.nuevo');
    Route::get('eliminarGrupo/{id}',[AdminController::class,'eliminarGrupo'])->name('grupos.eliminar');
});
Route::middleware('auth')->group(function () {
    // Rutas protegidas
    Route::get('calificaciones', [AdminController::class, 'listaCalificaciones'])->name('calificaciones');
    Route::post('nuevaCalificacion',[AdminController::class,'nuevaCalificacion'])->name('calificaciones.nuevo');
    Route::get('eliminarCalificacion/{id}',[AdminController::class,'eliminarCalificacion'])->name('calificaciones.eliminar');
});
Route::middleware('auth')->group(function () {
    // Rutas protegidas
    Route::get('inscripciones', [AdminController::class, 'inscripciones'])->name('inscripciones');
    // Route::post('nuevoAlumno',[AdminController::class,'nuevoAlumno'])->name('alumnos.nuevo');
    // Route::get('eliminarAlumno/{id}',[AdminController::class,'eliminarAlumno'])->name('alumnos.eliminar');
});
Route::post('/validar-registro', [LoginController::class, 'register'])->name('validar-registro');
Route::post('/inicia-sesion', [LoginController::class, 'login'])->name('inicia-sesion');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
// Route::get('/', function () {
//     return view('welcome');
// });
