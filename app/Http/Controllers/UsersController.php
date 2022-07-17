<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Yajra\DataTables\Facades\DataTables;

class UsersController extends Controller
{
    
    public function getData(Request $request)
    {
        return DataTables::of(User::query())->toJson();
    }
    
    public function index(){
        return view('users.index');
    }

    public function create(){
        return view('users.create');
    }

    public function post(Request $request){
        // untuk menampilkan semua request, jgnlupa routes diganti get
        // return $request()->all();

        $validatedData = $request->validate(
            [
                'name' => 'required|max:50',
                'username' => 'required',
                'password' => 'required|min:5|max:255',
                'nik' => 'required',
                'unit_kerja' => 'required',
                'project' => 'required',
                'jabatan' => 'required',
                'no_telp' => 'required',
                // 'role_id' => 'required',
            ],
            [
                'name.required' => 'Nama harus diisi',
                'username.required' => 'Username harus diisi',
                'password.required' => 'Password harus diisi',
                'nik.required' => 'Nik harus diisi',
                'unit_kerja.required' => 'Unit Kerja harus diisi',
                'project.required' => 'Project harus diisi',
                'jabatan.required' => 'Jabatan harus diisi',
                'no_telp.required' => 'No telp harus diisi',
                // 'role_id.required' => 'Roles harus diisi',
            ],
        );

        // Users::insert([
        //     'name' => $request->name,
        //     'email' => $request->email,
        //     'password' => $request->password,
        // ]);

        $validatedData['password'] = bcrypt($validatedData['password']);

        User::create($validatedData);

        return redirect()->route('admin.users.index')->with('success', 'User baru berhasil dibuat.');
    }

    public function edit($id){
        
        
        $users_edit = User::where('id',$id)->first();

        return view('users.edit', compact('users_edit'));

    }

    public function update(Request $request, $id){
        
        $validatedData = $request->validate(
            [
                'name' => 'required|max:50',
                'username' => 'required',
                'password' => 'required|min:5|max:255',
                'nik' => 'required',
                'unit_kerja' => 'required',
                'project' => 'required',
                'jabatan' => 'required',
                'no_telp' => 'required',
                // 'role_id' => 'required',
            ],
            [
                'name.required' => 'Nama harus diisi',
                'username.required' => 'Username harus diisi',
                'password.required' => 'Password harus diisi',
                'nik.required' => 'Nik harus diisi',
                'unit_kerja.required' => 'Unit Kerja harus diisi',
                'project.required' => 'Project harus diisi',
                'jabatan.required' => 'Jabatan harus diisi',
                'no_telp.required' => 'No telp harus diisi',
                // 'role_id.required' => 'Roles harus diisi',
            ],
        );

        User::where('id', $id)->update([
            'name' => $request->name,
            'username' => $request->username,
            'password' => bcrypt($request->password),
            'nik' => $request->nik,
            'unit_kerja' => $request->unit_kerja,
            'project' => $request->project,
            'jabatan' => $request->jabatan,
            'no_telp' => $request->no_telp,
        ]);

        return redirect()->route('admin.users.index')->with('success', 'User baru berhasil diupdate.');

    }

    public function delete($id){
        
        User::where('id',$id)->delete();

        return redirect()->route('admin.users.index')->with('success', 'Data user berhasil dihapus.');

    }

    public function removeRoles(User $user, Role $role) {

        if($user->hasRole($role)) {
            $user->removeRole($role);
            return back()->with('success', 'Role dihapus');
        }
        return back()->with('success', 'Role tidak ditemukan');

    }

    public function assignRoles(Request $request, User $user){

        $validatedData = $request->validate(
            [
                'roles' => 'required',
            ],
            [
                'roles.required' => 'Role tidak boleh kosong. Silahkan pilih salah satu role.',
            ],
        );

        if($user->hasRole($request->roles)){
            return back()->with('success', 'Role sudah terpasang');
        }
        $user->assignRole($request->roles);
        return back()->with('success', 'Role ditambahkan');

    }

}