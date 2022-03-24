<?php

use App\Http\Controllers\PerfilController;
use App\Http\Controllers\RecetaController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

// Recetas
Route::get("/recetas", [RecetaController::class, "index"])->name("receta.index");
Route::get("/recetas/create", [RecetaController::class, "create"])->name("receta.crear");
Route::get("/recetas/show/{receta}", [RecetaController::class, "show"])->name("receta.show");
Route::get("/recetas/{receta}/edit", [RecetaController::class, "edit"])->name("receta.edit");

Route::post("/recetas/store", [RecetaController::class, "store"])->name("receta.store");

Route::put("/recetas/{receta}/update", [RecetaController::class, "update"])->name("receta.update");

Route::delete("/recetas/{receta}/delete", [RecetaController::class, "destroy"])->name("receta.delete");


// perfil
Route::get("/perfil/show/{perfil}", [PerfilController::class, "show"])->name("perfil.show");
Route::get("/perfil/{perfil}/edit", [PerfilController::class, "edit"])->name("perfil.edit");

Route::put("/perfil/{perfil}/update", [PerfilController::class, "update"])->name("perfil.update");


Auth::routes();

Route::get('/home', [RecetaController::class, 'index'])->name('home');
