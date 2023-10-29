<?php

use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\TransactionController;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('author')->group( function(){
    Route::get('/list', [AuthorController::class, 'api'])->name('api.author.list');
});

Route::prefix('member')->group( function(){
    Route::get('/list', [MemberController::class, 'api'])->name('api.member.list');
});

Route::prefix('book')->group( function(){
    Route::get('/list', [BookController::class, 'api'])->name('api.book.list');
});

Route::prefix('transaction')->group( function(){
    Route::get('/list', [TransactionController::class, 'api'])->name('api.transaction.list');
    Route::get('/notif', function () {
        $data = cekKeterlambatan();
        return compact('data');
    })->name('api.transaction.notif');
});

Route::get('/permissions', function () {
    $data = cekRolePermission();
    return compact('data');
})->name('api.role');
