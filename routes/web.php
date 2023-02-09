<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\EtudiantController;
use \App\Http\Controllers\VilleController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Pour créer une nouvelle route we start with the method: get, post, put,
| delete, update: e.g.:Route::get
| We then add our callback, in this case a function:
| // Single Listing
Route::get('/listings/{id}', function($id) {
return view('listing', [
'listing' => Listing: :find($id)
]);
});
| In this case, Listng is the name of the model and find is the eloquent method we are executing
|
*/


Route::get('/', [EtudiantController::class
    , 'index'])->name('accueil');

Route::group(['namespace' => 'App\Http\Controllers'], function()
{
    Route::get('/ajouter-etudiant', 'EtudiantController@create')->name('ajouter-etudiant.index');
    Route::post('/ajouter-etudiant', 'EtudiantController@store')->name('ajouter-etudiant.post');
});

Route::view('/etudiants/creer/etudiant', 'etudiants.create', ['villes' => VilleController::index()]);

Route::get('/etudiant/{etudiant}', [EtudiantController::class
    , 'show']);

Route::post('/etudiants/creer/etudiant', [EtudiantController::class
    , 'create']);

Route::delete('/etudiant/{etudiant}',  [EtudiantController::class
    , 'destroy'])->name('effacer-etudiant.delete');

Route::group(['namespace' => 'App\Http\Controllers'], function()
{
    Route::get('/modifier-etudiant/{etudiant}', 'EtudiantController@edit')->name('modifier-etudiant.index');
    Route::put('/modifier-etudiant/{etudiant}', 'EtudiantController@update')->name('modifier-etudiant.put');
});
