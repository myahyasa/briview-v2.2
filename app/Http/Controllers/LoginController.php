<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index(){
        
        return view('login.index',['title'=>'login']); 
    }

    public function authenticate(Request $request){

        $credentials = $request->validate(
            [
                'username' => 'required',
                'password' => 'required',
            ],
            [
                'username.required' => 'Username harus diisi',
                'password.required' => 'Password harus diisi',
            ],
        );

        // dd($credentials);

        if(Auth::attempt($credentials)){
            $request->session()->regenerate();

            return redirect()->intended('/home');
        }

        return back()->with('loginError', 'Login gagal!');

    }

    public function logout(Request $request){
        
        Auth::logout();

        // invalidate session supaya tidak bisa dipakai
        $request->session()->invalidate();

        // bikin baru supaya gk dibajak
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}