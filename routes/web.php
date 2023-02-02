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
    , 'index']);

Route::view('/etudiants/creer/etudiant', 'etudiants.create', ['villes' => VilleController::index()]);

Route::get('/etudiant/{etudiant}', [EtudiantController::class
    , 'show']);

Route::post('/etudiants/creer/etudiant', [EtudiantController::class
    , 'create']);

Route::delete('/etudiant/{id}', [EtudiantController::class
    , 'delete']);

Route::put('/etudiants/{etudiant}/edit', [EtudiantController::class
    , 'edit']);
Route::patch('/etudiants/{etudiant}/edit', [EtudiantController::class
    , 'update']);
//Route::options($uri, $callback);
//
//Route::match(['get', 'post'], '/', function () {
//    //
//});
//
//Route::any('/', function () {
//    //
//});
//
//Route::redirect('/here', '/there');
//
////if you only want to return a view, route + data
//Route::view('/welcome', 'welcome', ['name' => 'Taylor']);
//
////routes with parameters
//// Route parameters are injected into route callbacks / controllers based on their order
//Route::get('/user/{id}', function ($id) {
//    return 'User '.$id;
//});
//
//
////If your route has dependencies that you would like the Laravel service container
//// to automatically inject into your route's callback, you should list your route parameters
//// after your dependencies
//Route::get('/user/{id}', function (Request $request, $id) {
//    return 'User '.$id;
//});
//
//
////unkwon parameter name
//Route::get('/user/{name?}', function ($name = 'John') {
//    return $name;
//});
//
////named routes
//Route::get(
//    '/user/profile',
//    [UserProfileController::class, 'show']
//)->name('profile');
