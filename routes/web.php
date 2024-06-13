<?php

use App\Http\Controllers\EstudianteController;
use App\Http\Controllers\LibroController;
use App\Http\Controllers\PrestamoController;
use App\Http\Controllers\TemaController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {return view('welcome');});
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    
    Route::resource('estudiantes', EstudianteController::class);
    Route::resource('libros', LibroController::class);
    Route::resource('prestamos', PrestamoController::class);
    Route::resource('temas', TemaController::class);
    Route::get('/home', [LibroController::class, 'home'])->name('home');
    Route::get('/libros/tema/{tema}', [LibroController::class, 'librosPorTema'])->name('libros.por_tema');
});

// Route::get('/estudiantes', function (){
//     $estuidantes = Estudiante::all();
//     return view('estudiantes/index', compact('estuidantes'));
// })->name ('estudiantes');