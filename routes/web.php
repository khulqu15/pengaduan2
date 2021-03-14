<?php

use App\Http\Controllers\ComplaintController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\RespondController;
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

Route::get('/', [PageController::class, 'home'])->name('home');

Route::get('form/pengaduan', [PageController::class, 'pengaduanGet'])->name('form.pengaduan');
Route::get('list/user/pengaduan', [PageController::class, 'complaintIndex'])->name('index.complaint');

Route::get('detail/user/pengaduan/{id}', [PageController::class, 'complaintShow'])->name('show.user.complaint');
Route::get('edit/user/pengaduan/{id}', [PageController::class, 'complaintEdit'])->name('edit.user.complaint');
Route::get('user/profile', [UserController::class, 'profile'])->name('profile.user');
Route::patch('profile/user/update', [UserController::class, 'updateProfile'])->name('profile.update.user');
Route::delete('complaint/delete/{id}', [ComplaintController::class, 'destroy'])->name('destroy.complaint');
Route::patch('complaint/update/{id}', [ComplaintController::class, 'update'])->name('update.complaint');    

Route::middleware('user')->group(function() {
    Route::post('form/pengaduan', [ComplaintController::class, 'store'])->name('pengaduan.post');
});
Route::middleware('admin')->group(function() {
    Route::get('complaint/list', [ComplaintController::class, 'index'])->name('list.complaint');

    Route::post('update/status/complaint/{id}', [ComplaintController::class, 'setStatus'])->name('set.status.complaint');    

    Route::get('user/list', [UserController::class, 'index'])->name('list.user');
    Route::get('user/edit/{id}', [UserController::class, 'edit'])->name('edit.user');
    Route::patch('user/store', [UserController::class, 'update'])->name('store.user');
    Route::patch('user/update/{id}', [UserController::class, 'update'])->name('update.user');
    Route::delete('user/delete/{id}', [UserController::class, 'destroy'])->name('delete.user');
    
    Route::get('complaint/add', [ComplaintController::class, 'create'])->name('add.complaint');
    Route::post('complaint/store', [ComplaintController::class, 'storeAdmin'])->name('store.complaint');
    Route::get('complaint/show/{id}', [ComplaintController::class, 'show'])->name('show.complaint');
    Route::get('complaint/edit/{id}', [ComplaintController::class, 'edit'])->name('edit.complaint');
    
    Route::get('respond/list', [PageController::class, 'registerPost'])->name('list.respond');
    Route::get('respond/add', [PageController::class, 'registerPost'])->name('add.respond');
    Route::post('respond/store', [RespondController::class, 'store'])->name('store.respond');
    Route::delete('respond/delete/{id}', [RespondController::class, 'destroy'])->name('delete.respond');
    
    Route::get('dashboard', [PageController::class, 'dashboard'])->name('dashboard');
});

Route::get('login', [UserController::class, 'loginGet'])->name('loginView');
Route::post('login', [UserController::class, 'loginPost'])->name('loginLogic');
Route::post('logout', [UserController::class, 'logout'])->name('logout');
Route::get('register', [UserController::class, 'registerGet'])->name('registerView');
Route::post('register', [UserController::class, 'registerPost'])->name('registerLogic');