<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\MasterVendorController;

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
    Route::get('/users/edit/{id}', [UsersController::class, 'edit'])->name('users.edit');
    Route::get('/users/delete/{id}', [UsersController::class, 'delete'])->name('users.delete');
    Route::post('/users/update/{id}', [UsersController::class, 'update'])->name('users.update');
    Route::post('/users/assignRoles/{user}', [UsersController::class, 'assignRoles'])->name('users.assignRoles');
    Route::get('/users/{user}/removeRoles/{role}', [UsersController::class, 'removeRoles'])->name('users.removeRoles');

    Route::get('/roles/getData', [RoleController::class, 'getData'])->name('roles.getData');
    Route::get('/roles/index', [RoleController::class, 'index'])->name('roles.index');
    Route::get('/roles/create', [RoleController::class, 'create'])->name('roles.create');
    Route::post('/roles/post', [RoleController::class, 'post'])->name('roles.post');
    Route::get('/roles/edit/{id}', [RoleController::class, 'edit'])->name('roles.edit');
    Route::get('/roles/delete/{id}', [RoleController::class, 'delete'])->name('roles.delete');
    Route::post('/roles/update/{id}', [RoleController::class, 'update'])->name('roles.update');
    Route::post('/roles/ambilDataPermissions', [RoleController::class, 'ambilDataPermissions'])->name('roles.ambilDataPermissions');
    Route::post('/roles/assignPermissions/{role}', [RoleController::class, 'assignPermissions'])->name('roles.assignPermissions');
    Route::get('/roles/{role}/permissions/{permission}', [RoleController::class, 'revokePermission'])->name('roles.revokePermission');

    Route::get('/permissions/getData', [PermissionController::class, 'getData'])->name('permissions.getData');
    Route::get('/permissions/index', [PermissionController::class, 'index'])->name('permissions.index');
    Route::get('/permissions/create', [PermissionController::class, 'create'])->name('permissions.create');
    Route::post('/permissions/post', [PermissionController::class, 'post'])->name('permissions.post');
    Route::get('/permissions/edit/{id}', [PermissionController::class, 'edit'])->name('permissions.edit');
    Route::get('/permissions/delete/{id}', [PermissionController::class, 'delete'])->name('permissions.delete');
    Route::post('/permissions/update/{id}', [PermissionController::class, 'update'])->name('permissions.update');
    Route::post('/permissions/ambilDataRoles', [PermissionController::class, 'ambilDataRoles'])->name('permissions.ambilDataRoles');
    Route::post('/permissions/{permission}/roles', [PermissionController::class, 'assignRoles'])->name('permissions.assignRoles');
    Route::get('/permissions/{permission}/roles/{role}', [PermissionController::class, 'removeRoles'])->name('permissions.removeRoles');
});

// masteVendor
Route::middleware(['auth', 'permission:masterVendor.getData'])->group(function(){
    Route::get('/masterVendor/getData', [MasterVendorController::class, 'getData'])->name('masterVendor.getData');
});
Route::middleware(['auth', 'permission:masterVendor.index'])->group(function(){
    Route::get('/masterVendor/index', [MasterVendorController::class, 'index'])->name('masterVendor.index');
});
Route::middleware(['auth', 'permission:masterVendor.create'])->group(function(){
    Route::get('/masterVendor/create', [MasterVendorController::class, 'create'])->name('masterVendor.create');
});
Route::middleware(['auth', 'permission:masterVendor.post'])->group(function(){
    Route::post('/masterVendor/post', [MasterVendorController::class, 'post'])->name('masterVendor.post');
});
Route::middleware(['auth', 'permission:masterVendor.edit'])->group(function(){
    Route::get('/masterVendor/edit/{id}', [MasterVendorController::class, 'edit'])->name('masterVendor.edit');
});
Route::middleware(['auth', 'permission:masterVendor.delete'])->group(function(){
    Route::get('/masterVendor/delete/{id}', [MasterVendorController::class, 'delete'])->name('masterVendor.delete');
});
Route::middleware(['auth', 'permission:masterVendor.update'])->group(function(){
    Route::post('/masterVendor/update/{id}', [MasterVendorController::class, 'update'])->name('masterVendor.update');
});