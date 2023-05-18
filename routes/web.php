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
Route::get('/modifier', [App\Http\Controllers\ReparationController::class, 'modifierclient'])->name('modifierclient')->middleware("auth");

Route::post('/ajouterreparation', [App\Http\Controllers\ReparationController::class, 'ajouterreparation'])->name('ajouterreparation')->middleware("auth");

Route::post('/marque', [App\Http\Controllers\ReparationController::class, 'marque'])->name('marque')->middleware("auth");
Route::post('/modele', [App\Http\Controllers\ReparationController::class, 'modele'])->name('modele')->middleware("auth");

Route::get('/listereparation', [App\Http\Controllers\ReparationController::class, 'listereparation'])->name('listereparation')->middleware("auth");
Route::get('/listereparation/{id}', [App\Http\Controllers\ReparationController::class, 'checkreparation'])->name('checkreparation')->middleware("auth");
Route::post('/update-colonne/{id}', [App\Http\Controllers\ReparationController::class, 'update'])->name('colonne.update');
