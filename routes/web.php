<?php

use App\Http\Controllers\DigitalSignageController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MachineInfoController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\MasterVendorController;
use App\Http\Controllers\MasterKanwilController;
use App\Http\Controllers\MasterKcSupervisiController;
use App\Http\Controllers\MasterUkerController;
use App\Http\Controllers\CctvController;
use App\Http\Controllers\UpsController;
use App\Http\Controllers\NvrController;
use App\Http\Controllers\CroAllocationController;
use App\Http\Controllers\MasterLokasiCrmController;

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

// masterVendor
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

// masterKanwil
Route::middleware(['auth', 'permission:masterKanwil.getData'])->group(function(){
    Route::get('/masterKanwil/getData', [MasterKanwilController::class, 'getData'])->name('masterKanwil.getData');
});
Route::middleware(['auth', 'permission:masterKanwil.index'])->group(function(){
    Route::get('/masterKanwil/index', [MasterKanwilController::class, 'index'])->name('masterKanwil.index');
});
Route::middleware(['auth', 'permission:masterKanwil.create'])->group(function(){
    Route::get('/masterKanwil/create', [MasterKanwilController::class, 'create'])->name('masterKanwil.create');
});
Route::middleware(['auth', 'permission:masterKanwil.post'])->group(function(){
    Route::post('/masterKanwil/post', [MasterKanwilController::class, 'post'])->name('masterKanwil.post');
});
Route::middleware(['auth', 'permission:masterKanwil.edit'])->group(function(){
    Route::get('/masterKanwil/edit/{id}', [MasterKanwilController::class, 'edit'])->name('masterKanwil.edit');
});
Route::middleware(['auth', 'permission:masterKanwil.delete'])->group(function(){
    Route::get('/masterKanwil/delete/{id}', [MasterKanwilController::class, 'delete'])->name('masterKanwil.delete');
});
Route::middleware(['auth', 'permission:masterKanwil.update'])->group(function(){
    Route::post('/masterKanwil/update/{id}', [MasterKanwilController::class, 'update'])->name('masterKanwil.update');
});

// masterKcSupervisi
Route::middleware(['auth', 'permission:masterKcSupervisi.getData'])->group(function(){
    Route::get('/masterKcSupervisi/getData', [MasterKcSupervisiController::class, 'getData'])->name('masterKcSupervisi.getData');
});
Route::middleware(['auth', 'permission:masterKcSupervisi.index'])->group(function(){
    Route::get('/masterKcSupervisi/index', [MasterKcSupervisiController::class, 'index'])->name('masterKcSupervisi.index');
});
Route::middleware(['auth', 'permission:masterKcSupervisi.create'])->group(function(){
    Route::get('/masterKcSupervisi/create', [MasterKcSupervisiController::class, 'create'])->name('masterKcSupervisi.create');
});
Route::middleware(['auth', 'permission:masterKcSupervisi.post'])->group(function(){
    Route::post('/masterKcSupervisi/post', [MasterKcSupervisiController::class, 'post'])->name('masterKcSupervisi.post');
});
Route::middleware(['auth', 'permission:masterKcSupervisi.edit'])->group(function(){
    Route::get('/masterKcSupervisi/edit/{id}', [MasterKcSupervisiController::class, 'edit'])->name('masterKcSupervisi.edit');
});
Route::middleware(['auth', 'permission:masterKcSupervisi.delete'])->group(function(){
    Route::get('/masterKcSupervisi/delete/{id}', [MasterKcSupervisiController::class, 'delete'])->name('masterKcSupervisi.delete');
});
Route::middleware(['auth', 'permission:masterKcSupervisi.update'])->group(function(){
    Route::post('/masterKcSupervisi/update/{id}', [MasterKcSupervisiController::class, 'update'])->name('masterKcSupervisi.update');
});

// masterUker
Route::middleware(['auth', 'permission:masterUker.getData'])->group(function(){
    Route::get('/masterUker/getData', [MasterUkerController::class, 'getData'])->name('masterUker.getData');
});
Route::middleware(['auth', 'permission:masterUker.index'])->group(function(){
    Route::get('/masterUker/index', [MasterUkerController::class, 'index'])->name('masterUker.index');
});
Route::middleware(['auth', 'permission:masterUker.create'])->group(function(){
    Route::get('/masterUker/create', [MasterUkerController::class, 'create'])->name('masterUker.create');
});
Route::middleware(['auth', 'permission:masterUker.post'])->group(function(){
    Route::post('/masterUker/post', [MasterUkerController::class, 'post'])->name('masterUker.post');
});
Route::middleware(['auth', 'permission:masterUker.edit'])->group(function(){
    Route::get('/masterUker/edit/{id}', [MasterUkerController::class, 'edit'])->name('masterUker.edit');
});
Route::middleware(['auth', 'permission:masterUker.delete'])->group(function(){
    Route::get('/masterUker/delete/{id}', [MasterUkerController::class, 'delete'])->name('masterUker.delete');
});
Route::middleware(['auth', 'permission:masterUker.update'])->group(function(){
    Route::post('/masterUker/update/{id}', [MasterUkerController::class, 'update'])->name('masterUker.update');
});

// machineInfo
Route::middleware(['auth', 'permission:machineInfo.getData'])->group(function(){
    Route::get('/machineInfo/getData', [MachineInfoController::class, 'getData'])->name('machineInfo.getData');
});
Route::middleware(['auth', 'permission:machineInfo.index'])->group(function(){
    Route::get('/machineInfo/index', [MachineInfoController::class, 'index'])->name('machineInfo.index');
});
Route::middleware(['auth', 'permission:machineInfo.create'])->group(function(){
    Route::get('/machineInfo/create', [MachineInfoController::class, 'create'])->name('machineInfo.create');
});
Route::middleware(['auth', 'permission:machineInfo.post'])->group(function(){
    Route::post('/machineInfo/post', [MachineInfoController::class, 'post'])->name('machineInfo.post');
});
Route::middleware(['auth', 'permission:machineInfo.edit'])->group(function(){
    Route::get('/machineInfo/edit/{id}', [MachineInfoController::class, 'edit'])->name('machineInfo.edit');
});
Route::middleware(['auth', 'permission:machineInfo.delete'])->group(function(){
    Route::get('/machineInfo/delete/{id}', [MachineInfoController::class, 'delete'])->name('machineInfo.delete');
});
Route::middleware(['auth', 'permission:machineInfo.update'])->group(function(){
    Route::post('/machineInfo/update/{id}', [MachineInfoController::class, 'update'])->name('machineInfo.update');
});
Route::middleware(['auth', 'permission:machineInfo.ambilDataVendor'])->group(function(){
    Route::post('/machineInfo/ambilDataVendor', [MachineInfoController::class, 'ambilDataVendor'])->name('machineInfo.ambilDataVendor');
});

// tidAllocation
Route::middleware(['auth', 'permission:tidAllocation.getData'])->group(function(){
    Route::get('/tidAllocation/getData', [TidAllocationController::class, 'getData'])->name('tidAllocation.getData');
});
Route::middleware(['auth', 'permission:tidAllocation.index'])->group(function(){
    Route::get('/tidAllocation/index', [TidAllocationController::class, 'index'])->name('tidAllocation.index');
});
Route::middleware(['auth', 'permission:tidAllocation.create'])->group(function(){
    Route::get('/tidAllocation/create', [TidAllocationController::class, 'create'])->name('tidAllocation.create');
});
Route::middleware(['auth', 'permission:tidAllocation.post'])->group(function(){
    Route::post('/tidAllocation/post', [TidAllocationController::class, 'post'])->name('tidAllocation.post');
});
Route::middleware(['auth', 'permission:tidAllocation.edit'])->group(function(){
    Route::get('/tidAllocation/edit/{id}', [TidAllocationController::class, 'edit'])->name('tidAllocation.edit');
});
Route::middleware(['auth', 'permission:tidAllocation.delete'])->group(function(){
    Route::get('/tidAllocation/delete/{id}', [TidAllocationController::class, 'delete'])->name('tidAllocation.delete');
});
Route::middleware(['auth', 'permission:tidAllocation.update'])->group(function(){
    Route::post('/tidAllocation/update/{id}', [TidAllocationController::class, 'update'])->name('tidAllocation.update');
});
Route::middleware(['auth', 'permission:tidAllocation.ambilDataVendor'])->group(function(){
    Route::post('/tidAllocation/ambilDataVendor', [TidAllocationController::class, 'ambilDataVendor'])->name('tidAllocation.ambilDataVendor');
});

// digitalSignage
Route::middleware(['auth', 'permission:digitalSignage.getData'])->group(function(){
    Route::get('/digitalSignage/getData', [DigitalSignageController::class, 'getData'])->name('digitalSignage.getData');
});
Route::middleware(['auth', 'permission:digitalSignage.index'])->group(function(){
    Route::get('/digitalSignage/index', [DigitalSignageController::class, 'index'])->name('digitalSignage.index');
});
Route::middleware(['auth', 'permission:digitalSignage.create'])->group(function(){
    Route::get('/digitalSignage/create', [DigitalSignageController::class, 'create'])->name('digitalSignage.create');
});
Route::middleware(['auth', 'permission:digitalSignage.post'])->group(function(){
    Route::post('/digitalSignage/post', [DigitalSignageController::class, 'post'])->name('digitalSignage.post');
});
Route::middleware(['auth', 'permission:digitalSignage.edit'])->group(function(){
    Route::get('/digitalSignage/edit/{id}', [DigitalSignageController::class, 'edit'])->name('digitalSignage.edit');
});
Route::middleware(['auth', 'permission:digitalSignage.delete'])->group(function(){
    Route::get('/digitalSignage/delete/{id}', [DigitalSignageController::class, 'delete'])->name('digitalSignage.delete');
});
Route::middleware(['auth', 'permission:digitalSignage.update'])->group(function(){
    Route::post('/digitalSignage/update/{id}', [DigitalSignageController::class, 'update'])->name('digitalSignage.update');
});
Route::middleware(['auth', 'permission:digitalSignage.ambilDataVendor'])->group(function(){
    Route::post('/digitalSignage/ambilDataVendor', [DigitalSignageController::class, 'ambilDataVendor'])->name('digitalSignage.ambilDataVendor');
});

// cctv
Route::middleware(['auth', 'permission:cctv.getData'])->group(function(){
    Route::get('/cctv/getData', [CctvController::class, 'getData'])->name('cctv.getData');
});
Route::middleware(['auth', 'permission:cctv.index'])->group(function(){
    Route::get('/cctv/index', [CctvController::class, 'index'])->name('cctv.index');
});
Route::middleware(['auth', 'permission:cctv.create'])->group(function(){
    Route::get('/cctv/create', [CctvController::class, 'create'])->name('cctv.create');
});
Route::middleware(['auth', 'permission:cctv.post'])->group(function(){
    Route::post('/cctv/post', [CctvController::class, 'post'])->name('cctv.post');
});
Route::middleware(['auth', 'permission:cctv.edit'])->group(function(){
    Route::get('/cctv/edit/{id}', [CctvController::class, 'edit'])->name('cctv.edit');
});
Route::middleware(['auth', 'permission:cctv.delete'])->group(function(){
    Route::get('/cctv/delete/{id}', [CctvController::class, 'delete'])->name('cctv.delete');
});
Route::middleware(['auth', 'permission:cctv.update'])->group(function(){
    Route::post('/cctv/update/{id}', [CctvController::class, 'update'])->name('cctv.update');
});
Route::middleware(['auth', 'permission:cctv.ambilDataVendor'])->group(function(){
    Route::post('/cctv/ambilDataVendor', [CctvController::class, 'ambilDataVendor'])->name('cctv.ambilDataVendor');
});

// ups
Route::middleware(['auth', 'permission:ups.getData'])->group(function(){
    Route::get('/ups/getData', [UpsController::class, 'getData'])->name('ups.getData');
});
Route::middleware(['auth', 'permission:ups.index'])->group(function(){
    Route::get('/ups/index', [UpsController::class, 'index'])->name('ups.index');
});
Route::middleware(['auth', 'permission:ups.create'])->group(function(){
    Route::get('/ups/create', [UpsController::class, 'create'])->name('ups.create');
});
Route::middleware(['auth', 'permission:ups.post'])->group(function(){
    Route::post('/ups/post', [UpsController::class, 'post'])->name('ups.post');
});
Route::middleware(['auth', 'permission:ups.edit'])->group(function(){
    Route::get('/ups/edit/{id}', [UpsController::class, 'edit'])->name('ups.edit');
});
Route::middleware(['auth', 'permission:ups.delete'])->group(function(){
    Route::get('/ups/delete/{id}', [UpsController::class, 'delete'])->name('ups.delete');
});
Route::middleware(['auth', 'permission:ups.update'])->group(function(){
    Route::post('/ups/update/{id}', [UpsController::class, 'update'])->name('ups.update');
});
Route::middleware(['auth', 'permission:ups.ambilDataVendor'])->group(function(){
    Route::post('/ups/ambilDataVendor', [UpsController::class, 'ambilDataVendor'])->name('ups.ambilDataVendor');
});

// nvr
Route::middleware(['auth', 'permission:nvr.getData'])->group(function(){
    Route::get('/nvr/getData', [NvrController::class, 'getData'])->name('nvr.getData');
});
Route::middleware(['auth', 'permission:nvr.index'])->group(function(){
    Route::get('/nvr/index', [NvrController::class, 'index'])->name('nvr.index');
});
Route::middleware(['auth', 'permission:nvr.create'])->group(function(){
    Route::get('/nvr/create', [NvrController::class, 'create'])->name('nvr.create');
});
Route::middleware(['auth', 'permission:nvr.post'])->group(function(){
    Route::post('/nvr/post', [NvrController::class, 'post'])->name('nvr.post');
});
Route::middleware(['auth', 'permission:nvr.edit'])->group(function(){
    Route::get('/nvr/edit/{id}', [NvrController::class, 'edit'])->name('nvr.edit');
});
Route::middleware(['auth', 'permission:nvr.delete'])->group(function(){
    Route::get('/nvr/delete/{id}', [NvrController::class, 'delete'])->name('nvr.delete');
});
Route::middleware(['auth', 'permission:nvr.update'])->group(function(){
    Route::post('/nvr/update/{id}', [NvrController::class, 'update'])->name('nvr.update');
});
Route::middleware(['auth', 'permission:nvr.ambilDataVendor'])->group(function(){
    Route::post('/nvr/ambilDataVendor', [NvrController::class, 'ambilDataVendor'])->name('nvr.ambilDataVendor');
});

// cro allocation
Route::middleware(['auth', 'permission:croAllocation.getData'])->group(function(){
    Route::get('/croAllocation/getData', [CroAllocationController::class, 'getData'])->name('croAllocation.getData');
});
Route::middleware(['auth', 'permission:croAllocation.index'])->group(function(){
    Route::get('/croAllocation/index', [CroAllocationController::class, 'index'])->name('croAllocation.index');
});
Route::middleware(['auth', 'permission:croAllocation.create'])->group(function(){
    Route::get('/croAllocation/create', [CroAllocationController::class, 'create'])->name('croAllocation.create');
});
Route::middleware(['auth', 'permission:croAllocation.post'])->group(function(){
    Route::post('/croAllocation/post', [CroAllocationController::class, 'post'])->name('croAllocation.post');
});
Route::middleware(['auth', 'permission:croAllocation.edit'])->group(function(){
    Route::get('/croAllocation/edit/{id}', [CroAllocationController::class, 'edit'])->name('croAllocation.edit');
});
Route::middleware(['auth', 'permission:croAllocation.delete'])->group(function(){
    Route::get('/croAllocation/delete/{id}', [CroAllocationController::class, 'delete'])->name('croAllocation.delete');
});
Route::middleware(['auth', 'permission:croAllocation.update'])->group(function(){
    Route::post('/croAllocation/update/{id}', [CroAllocationController::class, 'update'])->name('croAllocation.update');
});
Route::middleware(['auth', 'permission:croAllocation.ambilDataVendor'])->group(function(){
    Route::post('/croAllocation/ambilDataVendor', [CroAllocationController::class, 'ambilDataVendor'])->name('croAllocation.ambilDataVendor');
});

// master lokasi crm
Route::middleware(['auth', 'permission:masterLokasiCrm.getData'])->group(function(){
    Route::get('/masterLokasiCrm/getData', [MasterLokasiCrmController::class, 'getData'])->name('masterLokasiCrm.getData');
});
Route::middleware(['auth', 'permission:masterLokasiCrm.index'])->group(function(){
    Route::get('/masterLokasiCrm/index', [MasterLokasiCrmController::class, 'index'])->name('masterLokasiCrm.index');
});
Route::middleware(['auth', 'permission:masterLokasiCrm.create'])->group(function(){
    Route::get('/masterLokasiCrm/create', [MasterLokasiCrmController::class, 'create'])->name('masterLokasiCrm.create');
});
Route::middleware(['auth', 'permission:masterLokasiCrm.post'])->group(function(){
    Route::post('/masterLokasiCrm/post', [MasterLokasiCrmController::class, 'post'])->name('masterLokasiCrm.post');
});
Route::middleware(['auth', 'permission:masterLokasiCrm.edit'])->group(function(){
    Route::get('/masterLokasiCrm/edit/{id}', [MasterLokasiCrmController::class, 'edit'])->name('masterLokasiCrm.edit');
});
Route::middleware(['auth', 'permission:masterLokasiCrm.delete'])->group(function(){
    Route::get('/masterLokasiCrm/delete/{id}', [MasterLokasiCrmController::class, 'delete'])->name('masterLokasiCrm.delete');
});
Route::middleware(['auth', 'permission:masterLokasiCrm.update'])->group(function(){
    Route::post('/masterLokasiCrm/update/{id}', [MasterLokasiCrmController::class, 'update'])->name('masterLokasiCrm.update');
});
Route::middleware(['auth', 'permission:masterLokasiCrm.ambilDataKanwil'])->group(function(){
    Route::post('/masterLokasiCrm/ambilDataKanwil', [MasterLokasiCrmController::class, 'ambilDataKanwil'])->name('masterLokasiCrm.ambilDataKanwil');
});
Route::middleware(['auth', 'permission:masterLokasiCrm.ambilDataKcSupervisi'])->group(function(){
    Route::post('/masterLokasiCrm/ambilDataKcSupervisi', [MasterLokasiCrmController::class, 'ambilDataKcSupervisi'])->name('masterLokasiCrm.ambilDataKcSupervisi');
});
Route::middleware(['auth', 'permission:masterLokasiCrm.ambilDataUker'])->group(function(){
    Route::post('/masterLokasiCrm/ambilDataUker', [MasterLokasiCrmController::class, 'ambilDataUker'])->name('masterLokasiCrm.ambilDataUker');
});
Route::middleware(['auth', 'permission:masterLokasiCrm.ambilDataKodePos'])->group(function(){
    Route::post('/masterLokasiCrm/ambilDataKodePos', [MasterLokasiCrmController::class, 'ambilDataKodePos'])->name('masterLokasiCrm.ambilDataKodePos');
});