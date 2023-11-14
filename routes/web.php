<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PuestoController;
use App\Http\Controllers\InstructorController;
use App\Http\Controllers\CursoController;
use App\Http\Controllers\DepartamentoController;
use App\Http\Controllers\TrabajadorController;
use App\Http\Controllers\ListaController;
use App\Http\Controllers\AsistenciaController;
use App\Http\Controllers\ParticipanteController;

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

//RUTAS DE PUESTOS
Route::get('/puestos.index', [PuestoController::class, 'index'])->name("puestos.index");
Route::get('/puestos.create', [PuestoController::class, 'create'])->name("puestos.create");
Route::post('/puestos.store', [PuestoController::class, 'store'])->name("puestos.store");
Route::get('/puestos.show/{puesto}', [PuestoController::class, 'show'])->name("puestos.show");
Route::get('/puestos.destroy/{puesto}', [PuestoController::class, 'destroy'])->name("puestos.destroy");

Route::get('/puestos.edit/{puesto}', [PuestoController::class, 'edit'])->name("puestos.edit");
Route::post('/puestos.update/{puesto}', [PuestoController::class, 'update'])->name("puestos.update");


//RUTAS DE INSTRUCTORES
Route::get('/instructores.index', [InstructorController::class, 'index'])->name("instructores.index");
Route::get('/instructores.create', [InstructorController::class, 'create'])->name("instructores.create");
Route::post('/instructores.store', [InstructorController::class, 'store'])->name("instructores.store");
Route::get('/instructores.show/{instructor}', [InstructorController::class, 'show'])->name("instructores.show");
Route::get('/instructores.destroy/{instructor}', [InstructorController::class, 'destroy'])->name("instructores.destroy");

Route::get('/instructores.edit/{instructor}', [InstructorController::class, 'edit'])->name("instructores.edit");
Route::post('/instructores.update/{instructor}', [InstructorController::class, 'update'])->name("instructores.update");

//RUTAS DE CURSOS
Route::get('/cursos.index', [CursoController::class, 'index'])->name("cursos.index");
Route::get('/cursos.create', [CursoController::class, 'create'])->name("cursos.create");
Route::post('/cursos.store', [CursoController::class, 'store'])->name("cursos.store");
Route::get('/cursos.show/{curso}', [CursoController::class, 'show'])->name("cursos.show");
Route::get('/cursos.destroy/{curso}', [CursoController::class, 'destroy'])->name("cursos.destroy");

Route::get('/cursos.edit/{curso}', [CursoController::class, 'edit'])->name("cursos.edit");
Route::post('/cursos.update/{curso}', [CursoController::class, 'update'])->name("cursos.update");


//RUTAS DE DEPTOS
Route::get('/departamentos.index', [DepartamentoController::class, 'index'])->name("departamentos.index");
Route::get('/departamentos.create', [DepartamentoController::class, 'create'])->name("departamentos.create");
Route::post('/departamentos.store', [DepartamentoController::class, 'store'])->name("departamentos.store");
Route::get('/departamentos.show/{departamento}', [DepartamentoController::class, 'show'])->name("departamentos.show");
Route::get('/departamentos.destroy/{departamento}', [DepartamentoController::class, 'destroy'])->name("departamentos.destroy");
Route::get('/departamentos.edit/{departamento}', [DepartamentoController::class, 'edit'])->name("departamentos.edit");
Route::post('/departamentos.update/{departamento}', [DepartamentoController::class, 'update'])->name("departamentos.update");

//RUTAS DE PERSONAL
Route::get('/trabajadores.index', [TrabajadorController::class, 'index'])->name("trabajadores.index");
Route::get('/trabajadores.create', [TrabajadorController::class, 'create'])->name("trabajadores.create");
Route::post('/trabajadores.store', [TrabajadorController::class, 'store'])->name("trabajadores.store");
Route::get('/trabajadores.show/{trabajador}', [TrabajadorController::class, 'show'])->name("trabajadores.show");
Route::get('/trabajadores.destroy/{trabajador}', [TrabajadorController::class, 'destroy'])->name("trabajadores.destroy");
Route::get('/trabajadores.edit/{trabajador}', [TrabajadorController::class, 'edit'])->name("trabajadores.edit");
Route::post('/trabajadores.update/{trabajador}', [TrabajadorController::class, 'update'])->name("trabajadores.update");

//RUTAS DE LISTAS DE CURSOS
Route::get('/listas.index', [ListaController::class, 'index'])->name("listas.index");
Route::get('/listas.create', [ListaController::class, 'create'])->name("listas.create");
Route::post('/listas.store', [ListaController::class, 'store'])->name("listas.store");
Route::get('/listas.show/{lista}', [ListaController::class, 'show'])->name("listas.show");
Route::get('/listas.destroy/{lista}', [ListaController::class, 'destroy'])->name("listas.destroy");
Route::get('/listas.edit/{lista}', [ListaController::class, 'edit'])->name("listas.edit");
Route::post('/listas.update/{lista}', [ListaController::class, 'update'])->name("listas.update");

//RUTAS DE ASISTENCIAS
Route::get('/asistencias.index', [AsistenciaController::class, 'index'])->name("asistencias.index");
Route::get('/asistencias.create', [AsistenciaController::class, 'create'])->name("asistencias.create");
Route::post('/asistencias.store', [AsistenciaController::class, 'store'])->name("asistencias.store");
Route::get('/asistencias.show', [AsistenciaController::class, 'show'])->name("asistencias.show");
Route::get('/asistencias.destroy/{asistencia}', [AsistenciaController::class, 'destroy'])->name("asistencias.destroy");
Route::get('/asistencias.edit/{asistencia}', [AsistenciaController::class, 'edit'])->name("asistencias.edit");
Route::post('/asistencias.update/{asistencia}', [AsistenciaController::class, 'update'])->name("asistencias.update");
//Route::get('/asistencia/create', 'AsistenciaController@create')->name('asistencia.create');

//RUTAS DE PARTICIPANTES
Route::get('/participantes.index', [ParticipanteController::class, 'index'])->name("participantes.index");
Route::get('/participantes.create', [ParticipanteController::class, 'create'])->name("participantes.create");
Route::post('/participantes.store', [ParticipanteController::class, 'store'])->name("participantes.store");
Route::get('/participantes.show/{participante}', [ParticipanteController::class, 'show'])->name("participantes.show");
Route::get('/participantes.destroy/{participante}', [ParticipanteController::class, 'destroy'])->name("participantes.destroy");
Route::get('/participantes.edit/{participante}', [ParticipanteController::class, 'edit'])->name("participantes.edit");
Route::post('/participantes.update/{participante}', [ParticipanteController::class, 'update'])->name("participantes.update");





Route::get('/index', function () {
    return view('index');
})->name('index');

Route::get('/', function () {
    return view('inicio');
})->name("inicio");

//VISTA ADMINISTRADOR
Route::get('/VistaAdmin', function () {
    return view('index');
})->middleware("auth")->name('vista.admin');

//VISTA USUARIO 
Route::get('/VistaUsuario', function () {
    return view('index2');
})->middleware("auth")->name('vista.usuario');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
