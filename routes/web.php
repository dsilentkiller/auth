<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\auth\LoginController;
use App\Http\Controllers\auth\RegisterController;
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


Route::post('login', [LoginController::class, 'index'])->name('login');


Route::post('register', [RegisterController::class, 'index'])->name('create');
Route::post('register', [RegisterController::class, 'store'])->name('register');

Route::post('dashboard', [AuthController::class, 'dashboard']);
Route::post('logout', [LoginController::class, 'logout'])->name('logout');


