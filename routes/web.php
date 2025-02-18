<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\FavoriteController;

Route::get('/', function () {
    return view('inicio');
});


Route::get('/movies/{id}', [MovieController::class, 'show']);
Route::get('/movies', [MovieController::class, 'index']);// Esto nos sirve para poder volver al inicio , cuando hacemos click al boton
Route::get('/', [MovieController::class, 'index']); // Carga las películas en / (inicio);
Route::get('/movies/search', [MovieController::class, 'index']);
Route::get('/movies/{id}', [MovieController::class, 'show'])->name('movies.show');



Route::get('/favoritos', [FavoriteController::class, 'index'])->name('favoritos.index');
Route::post('/favoritos', [FavoriteController::class, 'store'])->name('favoritos.store');
Route::delete('/favoritos/{id}', [FavoriteController::class, 'destroy'])->name('favoritos.destroy');

