<?php


use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CatalogController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\PublisherController;
use App\Http\Controllers\TransactionController;
use App\Models\Book;
use App\Models\Publisher;

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

Route::middleware('auth')->group(function () {

    Route::resource('home',HomeController::class);
    Route::resource('catalog',CatalogController::class);
    Route::resource('publisher',PublisherController::class);
    Route::resource('author',AuthorController::class);
    Route::resource('member',MemberController::class);
    Route::resource('book',BookController::class);
    Route::resource('transaction',TransactionController::class);
    // Route::get('/home', [HomeController::class, 'index'])->name('home');
    // Route::get('/catalog', [CatalogController::class, 'index'])->name('catalog');
    // Route::get('/author', [AuthorController::class, 'index'])->name('author');
    // Route::get('/book', [BookController::class, 'index'])->name('book');
    // Route::get('/member', [MemberController::class, 'index'])->name('member');
    // Route::get('/publisher', [PublisherController::class, 'index'])->name('publisher');

});
