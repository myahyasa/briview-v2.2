<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
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

    public function removeRoles(Permission $permission, Role $role) {

        if($permission->hasRole($role)) {
            $permission->removeRole($role);
            return back()->with('success', 'Role dihapus');
        }
        return back()->with('success', 'Role tidak ditemukan');

    }

    public function assignRoles(Request $request, Permission $permission){

        $validatedData = $request->validate(
            [
                'role' => 'required',
            ],
            [
                'role.required' => 'Role tidak boleh kosong. Silahkan pilih salah satu role.',
            ],
        );

        if($permission->hasRole($request->role)){
            return back()->with('success', 'Role sudah terpasang');
        }
        $permission->assignRole($request->role);
        return back()->with('success', 'Role ditambahkan');

    }

    public function ambilDataRoles(Request $request) {

        $search = $request->search;
        if($search == ''){
            $data = Role::orderby('name','asc')
                                    ->select('id','name')
                                    ->limit(5)
                                    ->get();
        } else {
            $data = Role::orderby('name','asc')
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