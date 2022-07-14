<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
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
                'email' => 'required|email:dns',
                'password' => 'required|min:5|max:255',
                'role_id' => 'required',
            ],
            [
                'name.required' => 'Nama harus diisi',
                'email.required' => 'Email harus diisi',
                'password.required' => 'Password harus diisi',
                'role_id.required' => 'Roles harus diisi',
            ],
        );

        // Users::insert([
        //     'name' => $request->name,
        //     'email' => $request->email,
        //     'password' => $request->password,
        // ]);

        $validatedData['password'] = bcrypt($validatedData['password']);

        User::create($validatedData);

        return redirect()->route('users.index')->with('success', 'User baru berhasil dibuat.');
    }

    public function edit(){
        
    }

    public function update(){
        
    }

    public function delete(){
        
    }

}