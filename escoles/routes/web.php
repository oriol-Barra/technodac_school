<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SchoolController;
use App\Http\Controllers\StudentController;

require __DIR__.'/auth.php';  // Incloem les rutes de auth.php

// Ruta protegida a la home (si no estàs autenticat, et porta a login)
Route::middleware('auth')->get('/', function () {
    return view('index');  // La vista que desitgis com a pàgina d'inici
})->name('index');

// Rutes per a School
Route::resource('schools', SchoolController::class);

// Rutes per a Student
Route::resource('students', StudentController::class);

// Ruta per a estudiants segons l'escola
Route::get('students/school/{school}', [StudentController::class, 'studentsBySchool'])->name('students.bySchool');

// Ruta al menú de gestió
Route::middleware('auth')->get('index', function () {
    return view('index'); // La vista que desitgis per a l'inici del programa
})->name('index');
