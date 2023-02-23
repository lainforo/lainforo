<?php

use App\Http\Controllers\BoardController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\UserBan;
use App\Http\Middleware\CheckAdminCookie;
use App\Http\Controllers\PostController;

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

// - Meta routes -
Route::view('/', 'main.index')->name('index');

// - Administration -
Route::view('/admin/mastermind', 'admin.mastermind')->name('mastermind')->middleware(CheckAdminCookie::class);

// - Thread operations -
Route::get('/{uri}/{thread}', [PostController::class, 'getThread'])->name('thread');
Route::post('/{uri}/thread/create', [PostController::class, 'putThread'])->name('putthread')->middleware(UserBan::class);

// - Board operations -
Route::get('/{uri}/', [BoardController::class, 'getBoard'])->name('board');
Route::post('/board/create', [BoardController::class, 'putBoard'])->name('board.create')->middleware(CheckAdminCookie::class);