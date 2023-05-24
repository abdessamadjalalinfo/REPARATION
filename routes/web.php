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
Route::get('/deletereparation/{id}', [App\Http\Controllers\ReparationController::class, 'deletereparation'])->name('deletereparation')->middleware("auth");

Route::post('/marque', [App\Http\Controllers\ReparationController::class, 'marque'])->name('marque')->middleware("auth");
Route::post('/modele', [App\Http\Controllers\ReparationController::class, 'modele'])->name('modele')->middleware("auth");

Route::get('/listereparation', [App\Http\Controllers\ReparationController::class, 'listereparation'])->name('listereparation')->middleware("auth");
Route::get('/listereparation/{id}', [App\Http\Controllers\ReparationController::class, 'checkreparation'])->name('checkreparation')->middleware("auth");
Route::post('/update-colonne/{id}', [App\Http\Controllers\ReparationController::class, 'update'])->name('colonne.update');

Route::get('/addcategorie', [App\Http\Controllers\ReparationController::class, 'addcategorie'])->name('addcategorie');
Route::get('/addingcategorie', [App\Http\Controllers\ReparationController::class, 'addingcategorie'])->name('addingcategorie');

Route::get('/addmarque', [App\Http\Controllers\ReparationController::class, 'addmarque'])->name('addmarque');
Route::get('/addingmarque', [App\Http\Controllers\ReparationController::class, 'addingmarque'])->name('addingmarque');

Route::get('/addmodele', [App\Http\Controllers\ReparationController::class, 'addmodele'])->name('addmodele');
Route::get('/addingmodele', [App\Http\Controllers\ReparationController::class, 'addingmodele'])->name('addingmodele');


Route::get('/modifierreparation', [App\Http\Controllers\ReparationController::class, 'modifierreparation'])->name('modifierreparation')->middleware("auth");


Route::get('/etiquette/{id}', [App\Http\Controllers\ReparationController::class, 'etiquette'])->name('etiquette')->middleware("auth");
Route::get('/ticket/{id}', [App\Http\Controllers\ReparationController::class, 'ticket'])->name('ticket')->middleware("auth");
Route::get('/facture/{id}', [App\Http\Controllers\ReparationController::class, 'facture'])->name('facture')->middleware("auth");

Route::get('/whatssap', [App\Http\Controllers\ReparationController::class, 'whatssap'])->name('whatssap')->middleware("auth");


Route::get('/ajoutervente', [App\Http\Controllers\VenteController::class, 'ajoutervente'])->name('ajoutervente')->middleware("auth");
Route::post('/adding', [App\Http\Controllers\VenteController::class, 'adding'])->name('adding')->middleware("auth");

Route::get('/listeventes', [App\Http\Controllers\VenteController::class, 'listeventes'])->name('listeventes')->middleware("auth");

Route::get('/deletevente/{id}', [App\Http\Controllers\VenteController::class, 'deletevente'])->name('deletevente')->middleware("auth");


Route::get('/editvente', [App\Http\Controllers\VenteController::class, 'editvente'])->name('editvente')->middleware("auth");
Route::get('/ticketvente/{id}', [App\Http\Controllers\VenteController::class, 'ticketvente'])->name('ticketvente')->middleware("auth");

Route::get('/updatestore', [App\Http\Controllers\ReparationController::class, 'updatestore'])->name('updatestore');
Route::post('/update_store', [App\Http\Controllers\ReparationController::class, 'update_store'])->name('update.store');
