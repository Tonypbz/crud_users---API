<?php

use App\Http\Controllers\CarreraController;
use App\Http\Controllers\EmpleadoActividadController;
use App\Http\Controllers\EmpleadoController;
use App\Http\Controllers\EmpleadosCarreraController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PeriodoController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UsersRoleController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});
Route::middleware(['auth'])->group(function () {
    Route::resource('users', UserController::class);
    Route::resource('roles', RoleController::class);
    Route::resource('users-roles', UsersRoleController::class);
    Route::resource('empleados', EmpleadoController::class);
    Route::resource('carreras', CarreraController::class);
    Route::resource('empleados-carreras', EmpleadosCarreraController::class);
    Route::resource('periodos', PeriodoController::class);
    Route::resource('empleadoactividad', EmpleadoActividadController::class);
});
Auth::routes(['verify' => true]);
Route::get('/home', [HomeController::class, 'index'])->name('home')->middleware('verified');
Route::put('/users/{id}/cambiar-estado', [UserController::class, 'cestado'])->name('users.cestado');
Route::put('/roles/{id}/cambiar-estado', [RoleController::class, 'rcestado'])->name('roles.rcestado');
Route::put('/empleados/{id}/cambiar-estado', [EmpleadoController::class, 'cestado'])->name('empleados.cestado');
Route::put('/carreras/{id}/cambiar-estado', [CarreraController::class, 'cestado'])->name('carrera.cestado');
Route::put('/periodos/{id}/cambiar-estado', [PeriodoController::class, 'cestado'])->name('periodo.cestado');
Route::put('/empleados_carreras/{id}/cambiar-estado', [EmpleadosCarreraController::class, 'cestado'])->name('empleadosCarrera.cestado');
Route::put('/users-roles/{id}/cambiar-estado', [UsersRoleController::class, 'cestado'])->name('usersRole.cestado');