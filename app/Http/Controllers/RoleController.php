<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Yajra\DataTables\Facades\DataTables;

class RoleController extends Controller
{
    
    public function getData(Request $request) {

        // return DataTables::of(Role::whereNotIn('name', ['admin'])->get())->toJson();
        return DataTables::of(Role::get())->toJson();

    }
    
    public function index(){

        return view('roles.index');

    }

    public function create(){

        return view('roles.create');

    }

    public function post(Request $request){

        $validatedData = $request->validate(
            [
                'name' => 'required|min:3',
            ],
            [
                'name.required' => 'Nama role harus diisi',
                'name.min' => 'Nama role minimal 3 karakter',
            ],
        );

        Role::insert([
            'name' => $request->name,
            'guard_name' => 'web',
        ]);

        return redirect()->route('admin.roles.index')->with('success', 'Role baru berhasil dibuat.');
    }

    public function edit($id) {

        // $permissions = Permission::all();

        $roles_edit = Role::where('id',$id)->first();

        return view('roles.edit', compact('roles_edit'));

    }

    public function update(Request $request, $id){

        $validatedData = $request->validate(
            [
                'name' => 'required|min:3',
            ],
            [
                'name.required' => 'Nama role harus diisi',
                'name.min' => 'Nama role minimal 3 karakter',
            ],
        );

        Role::where('id', $id)->update([
            'name' => $request->name
        ]);

        return redirect()->route('admin.roles.index')->with('success', 'Role baru berhasil diupdate.');
    }

    public function delete($id) {

        Role::where('id',$id)->delete();

        return redirect()->route('admin.roles.index')->with('success', 'Data role berhasil dihapus.');

    }

    public function revokePermission(Role $role, Permission $permission) {

        if($role->hasPermissionTo($permission)) {
            $role->revokePermissionTo($permission);
            return back()->with('success', 'Permission ditarik kembali');
        }
        return back()->with('success', 'Permission tidak ditemukan');

    }

    public function assignPermissions(Request $request, Role $role){

        $validatedData = $request->validate(
            [
                'permissions' => 'required',
            ],
            [
                'permissions.required' => 'Permission tidak boleh kosong. Silahkan pilih salah satu permission.',
            ],
        );

        if($role->hasPermissionTo($request->permissions)){
            return back()->with('success', 'Permission sudah terpasang');
        }
        $role->givePermissionTo($request->permissions);
        return back()->with('success', 'Permission ditambahkan');

    }

    public function ambilDataPermissions(Request $request) {

        $search = $request->search;
        if($search == ''){
            $data = Permission::orderby('name','asc')
                                    ->select('id','name')
                                    ->limit(5)
                                    ->get();
        } else {
            $data = Permission::orderby('name','asc')
                                    ->select('id','name')
                                    ->where('name','like','%'.$search.'%')
                                    ->limit(5)
                                    ->get();
        }

        $response = (object)array("results"=>[]);
        foreach($data as $row){
            $response->results[] = array(
                'id' => $row->name, 
                'text' => $row->name
            );
        }

        return response()->json($response);

    }
}