<?php

use App\Http\Controllers\UserController;
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
})->name('home');

Route::get('login', [UserController::class, 'loginGet'])->name('loginView');
Route::post('login', [UserController::class, 'loginPost'])->name('loginLogic');
Route::get('register', [UserController::class, 'registerGet'])->name('registerView');
Route::post('register', [UserController::class, 'registerPost'])->name('registerLogic');
