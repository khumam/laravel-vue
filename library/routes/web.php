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
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index']);
Route::get('/books', [App\Http\Controllers\BookController::class, 'index']);

Route::get('/catalogs', [App\Http\Controllers\CatalogController::class, 'index']);
Route::get('/catalogs/create', [App\Http\Controllers\CatalogController::class, 'create'])->name('catalog.create');
Route::post('/catalogs', [App\Http\Controllers\CatalogController::class, 'store'])->name('catalog.store');
Route::get('/catalogs/edit/{id}', [App\Http\Controllers\CatalogController::class, 'edit'])->name('catalog.edit');
Route::post('/catalogs/update/{id}', [App\Http\Controllers\CatalogController::class, 'update'])->name('catalog.update');
Route::get('/catalogs/edit/{id}', [App\Http\Controllers\CatalogController::class, 'edit'])->name('catalog.edit');
Route::post('/catalogs/delete/{id}', [App\Http\Controllers\CatalogController::class, 'destroy'])->name('catalog.destroy');

Route::resource('/authors',App\Http\Controllers\AuthorController::class);
Route::resource('/publishers',App\Http\Controllers\PublisherController::class);
Route::resource('/members', App\Http\Controllers\MemberController::class);

Route::get('/api/authors', [App\Http\Controllers\AuthorController::class, 'api']);
Route::get('/api/publishers', [App\Http\Controllers\PublisherController::class, 'api']);
Route::get('/api/members', [App\Http\Controllers\MemberController::class,'api']);