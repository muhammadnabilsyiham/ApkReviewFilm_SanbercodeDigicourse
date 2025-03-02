<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\CastController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\GenresController;
use App\Http\Controllers\FilmsController;
use App\Http\Controllers\ReviewsController;

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

Route::get('/', [DashboardController::class, "dashboard"]);
Route::get('/form', [AuthController::class, "register"])->name('form');
Route::post('/home', [AuthController::class, "home"]);

Route::get('/table', function() {
    return view('pages.table');
});
Route::get('/data-table', function() {
    return view('pages.data-table');
});

// CRUD Categories
// C => Create Data
Route::get('/category/create', [CategoriesController::class, "create"]);
Route::post('/category', [CategoriesController::class, "store"]);

Route::get('/category', [CategoriesController::class, "index"]);
Route::get('/category/{category_id}', [CategoriesController::class, "show"]);

Route::get('/category/{category_id}/edit', [CategoriesController::class, "edit"]);
Route::put('/category/{category_id}', [CategoriesController::class, "update"]);

Route::delete('/category/{category_id}', [CategoriesController::class, "destroy"]);

// CRUD Cast
// C => Create Data
Route::get('/cast/create', [CastController::class, "create"]);
Route::post('/cast', [CastController::class, "store"]);

// R => Read Data
Route::get('/cast', [CastController::class, "index"]);
Route::get('/cast/{cast_id}', [CastController::class, "show"]);

//U = Update Data
Route::get('/cast/{cast_id}/edit', [CastController::class, "edit"]);
Route::put('/cast/{cast_id}', [CastController::class, "update"]);

// Delete Data
Route::delete('/cast/{cast_id}', [CastController::class, "destroy"]);

// CRUD Post
Route::resource('post', PostController::class);

Route::middleware(['auth'])->group(function () {

// CRUD Genre
Route::get('/genre/create', [GenresController::class, "create"]);
Route::post('/genre', [GenresController::class, "store"]);

Route::get('/genre', [GenresController::class, "index"]);
Route::get('/genre/{genre_id}', [GenresController::class, "show"]);

Route::get('/genre/{genre_id}/edit', [GenresController::class, "edit"]);
Route::put('/genre/{genre_id}', [GenresController::class, "update"]);

Route::delete('/genre/{genre_id}', [GenresController::class, "destroy"]);

Route::post('/reviews/{film_id}', [ReviewsController::class, "store"]);
});

// CRUD Film
Route::resource('film', FilmsController::class);
Auth::routes();
