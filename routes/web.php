<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\CheckAdminCookie;

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