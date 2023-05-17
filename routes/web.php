<?php

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
})->middleware("auth");

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware("auth");
Route::get('/reparation', [App\Http\Controllers\ReparationController::class, 'index'])->name('reparation.new')->middleware("auth");
Route::get('/clients', [App\Http\Controllers\ReparationController::class, 'clients'])->name('clients')->middleware("auth");
Route::get('/ajouter', [App\Http\Controllers\ReparationController::class, 'ajouterclient'])->name('ajouterclient')->middleware("auth");
