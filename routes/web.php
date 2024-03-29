<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BoardController;
use App\Http\Controllers\PostController;
use App\Http\Middleware\CheckAdminCookie;
use App\Http\Middleware\UserBan;
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

// - Meta routes -
Route::view('/', 'main.index')->name('index');

// - Administration -
Route::view('/admin/mastermind', 'admin.mastermind')->name('mastermind')->middleware(CheckAdminCookie::class);
Route::view('/admin/edit/{uri}/', 'admin.editboard')->name('admin.editboard')->middleware(CheckAdminCookie::class);
Route::view('/admin/login', 'admin.login')->name('admin.login');
Route::post('/admin/auth', [AdminController::class, 'adminAuth'])->name('admin.auth');
Route::get('/admin/ban/{ip}', [AdminController::class, 'userBan'])->name('user.ban')->middleware(CheckAdminCookie::class);
Route::get('/admin/ban/{ip}/lift', [AdminController::class, 'userBanLift'])->name('user.ban.lift')->middleware(CheckAdminCookie::class);

// - Thread operations -
Route::get('/{uri}/{thread}', [PostController::class, 'getThread'])->name('thread');
Route::post('/{uri}/thread/create', [PostController::class, 'putThread'])->name('putthread')->middleware(UserBan::class);
Route::post('/{thread}/reply/create', [PostController::class, 'putReply'])->name('putreply')->middleware(UserBan::class);

// - Board operations -
Route::view('/search/', 'main.search')->name('search');
Route::post('/search/results/', [BoardController::class, 'search'])->name('search.results');
Route::get('/{uri}/', [BoardController::class, 'getBoard'])->name('board');
Route::post('/board/create', [BoardController::class, 'putBoard'])->name('board.create')->middleware(CheckAdminCookie::class);
Route::post('/board/edit/{uri}', [BoardController::class, 'editBoard'])->name('board.edit')->middleware(CheckAdminCookie::class);
Route::get('/board/delete/{uri}', [BoardController::class, 'delBoard'])->name('board.delete')->middleware(CheckAdminCookie::class);
