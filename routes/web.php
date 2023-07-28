<?php

use App\Http\Controllers\LocatarioController;
use App\Http\Controllers\FiadorController;
use App\Http\Controllers\ProprietarioController;
use Illuminate\Support\Facades\Auth;
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


Route::get('/proprietarios/create', [App\Http\Controllers\ProprietarioController::class, 'create'] )->name('proprietarios.create');
Route::post('/proprietarios/store', [App\Http\Controllers\ProprietarioController::class, 'store'] )->name('proprietarios.store');;;

Route::get('/locatarios/create',[App\Http\Controllers\LocatarioController::class, 'create'])->name('locatarios.create');
Route::post('/locatarios/store',[App\Http\Controllers\LocatarioController::class, 'store'])->name('locatarios.store');

Route::get('/fiadores/create',  [App\Http\Controllers\FiadorController::class, 'create'])->name('fiadores.create');
Route::post('/fiadores/store',  [App\Http\Controllers\FiadorController::class, 'store'])->name('fiadores.store');


Auth::routes();
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/proprietarios', [App\Http\Controllers\ProprietarioController::class, 'index'] )->name('proprietarios.index');
    Route::get('/locatario', [App\Http\Controllers\LocatarioController::class, 'index'] )->name('locatarios.index');
    Route::get('/locatario/edit', [App\Http\Controllers\LocatarioController::class, 'edit'] )->name('locatarios.edit');
    Route::delete('/locatario/destroy', [App\Http\Controllers\LocatarioController::class, 'destroy'] )->name('locatarios.destroy');
    Route::get('/fiadores', [App\Http\Controllers\FiadorController::class, 'index'] )->name('fiadores.index');


