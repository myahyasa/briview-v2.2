<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Spatie\Permission\Models\Permission;
use Yajra\DataTables\Facades\DataTables;

class PermissionController extends Controller
{
    
    public function getData(Request $request) {

        return DataTables::of(Permission::query())->toJson();

    }
    
    public function index(){

        return view('permissions.index');

    }

    public function create(){

        return view('permissions.create');

    }

    public function post(Request $request){

        $validatedData = $request->validate(
            [
                'name' => 'required|min:3',
            ],
            [
                'name.required' => 'Nama permissions harus diisi',
                'name.min' => 'Nama permissions minimal 3 karakter',
            ],
        );

        Permission::insert([
            'name' => $request->name,
            'guard_name' => 'web',
        ]);

        // Artisan::call('cache:clear');

        return redirect()->route('admin.permissions.index')->with('success', 'Permission baru berhasil dibuat.');
    }

    public function edit($id) {

        $permissions_edit = Permission::where('id',$id)->first();

        return view('permissions.edit', compact('permissions_edit'));

    }

    public function update(Request $request, $id){

        $validatedData = $request->validate(
            [
                'name' => 'required|min:3',
            ],
            [
                'name.required' => 'Nama permissions harus diisi',
                'name.min' => 'Nama permissions minimal 3 karakter',
            ],
        );

        Permission::where('id', $id)->update([
            'name' => $request->name
        ]);

        return redirect()->route('admin.permissions.index')->with('success', 'Permission baru berhasil diupdate.');
    }

    public function delete($id) {

        Permission::where('id',$id)->delete();

        return redirect()->route('admin.permissions.index')->with('success', 'Data permission berhasil dihapus.');

    }





}