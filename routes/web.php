<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UsersController;

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

// Route::middleware(['auth', 'is_admin'])->group(function(){
//     Route::get('admin', [AdminController::class, 'index'])->name('admin.index');
// });

// home
Route::get('/home', [HomeController::class, 'index'])->middleware(['auth'])->name('home.index');

Route::group([], function(){
    
    Route::get('/login', [LoginController::class, 'index'])->middleware(['guest'])->name('login.index');
    Route::post('/login', [LoginController::class, 'authenticate'])->name('login.authenticate');
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
});

Route::middleware(['auth', 'role:admin'])->name('admin.')->prefix('/admin')->group(function(){

    Route::get('/users/getData', [UsersController::class, 'getData'])->name('users.getData');
    Route::get('/users/index', [UsersController::class, 'index'])->name('users.index');
    Route::get('/users/create', [UsersController::class, 'create'])->name('users.create');
    Route::post('/users/post', [UsersController::class, 'post'])->name('users.post');
    Route::get('/users/edit', [UsersController::class, 'edit'])->name('users.edit');
    Route::get('/users/delete/{id}', [UsersController::class, 'delete'])->name('users.delete');
    Route::post('/users/update/{id}', [UsersController::class, 'update'])->name('users.update');
});