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
    Route::get('alumnos', [AdminController::class, 'alumnos'])->name('alumnos');
    Route::post('nuevoAlumno',[AdminController::class,'nuevoAlumno'])->name('alumnos.nuevo');
    Route::get('eliminarAlumno/{id}',[AdminController::class,'eliminarAlumno'])->name('alumnos.eliminar');
});
Route::middleware('auth')->group(function () {
    // Rutas protegidas
    Route::get('maestros', [AdminController::class, 'maestros'])->name('maestros');
    // Route::post('nuevoAlumno',[AdminController::class,'nuevoAlumno'])->name('alumnos.nuevo');
    // Route::get('eliminarAlumno/{id}',[AdminController::class,'eliminarAlumno'])->name('alumnos.eliminar');
});
Route::middleware('auth')->group(function () {
    // Rutas protegidas
    Route::get('materias', [AdminController::class, 'materias'])->name('materias');
    // Route::post('nuevoAlumno',[AdminController::class,'nuevoAlumno'])->name('alumnos.nuevo');
    // Route::get('eliminarAlumno/{id}',[AdminController::class,'eliminarAlumno'])->name('alumnos.eliminar');
});
Route::middleware('auth')->group(function () {
    // Rutas protegidas
    Route::get('grupos', [AdminController::class, 'grupos'])->name('grupos');
    // Route::post('nuevoAlumno',[AdminController::class,'nuevoAlumno'])->name('alumnos.nuevo');
    // Route::get('eliminarAlumno/{id}',[AdminController::class,'eliminarAlumno'])->name('alumnos.eliminar');
});
Route::middleware('auth')->group(function () {
    // Rutas protegidas
    Route::get('calificaciones', [AdminController::class, 'calificaciones'])->name('calificaciones');
    // Route::post('nuevoAlumno',[AdminController::class,'nuevoAlumno'])->name('alumnos.nuevo');
    // Route::get('eliminarAlumno/{id}',[AdminController::class,'eliminarAlumno'])->name('alumnos.eliminar');
});
Route::post('/validar-registro', [LoginController::class, 'register'])->name('validar-registro');
Route::post('/inicia-sesion', [LoginController::class, 'login'])->name('inicia-sesion');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
// Route::get('/', function () {
//     return view('welcome');
// });
