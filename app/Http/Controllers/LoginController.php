<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class LoginController extends Controller
{
    public function login()
    {
        return view('auth.login', [
            'title' => 'Masuk Akun'
        ]);
    }
    public function register()
    {
        return view('auth.register', [
            'title' => 'Daftar Akun'
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|min:3|max:100',
            'email' => 'required|min:3|max:100|unique:users',
            'password' => 'required|min:3|max:100',
            'is_instructor' => 'required'
        ]);

        User::create($validatedData);

        Alert::success('Success', 'Please Login');
        return redirect()->intended('/login');
    }

    public function auth(Request $request)
    {
        $validatedData = $request->validate([
            'email' => 'required|min:3|max:100',
            'password' => 'required|min:3|max:100',
        ]);

        if (Auth::attempt($validatedData)) {
            $request->session()->regenerate();

            if (auth()->user()->is_instructor == 1) {
                Alert::success('Success','Selamat Datang Instructor');
                return redirect()->intended('/myplaces');
            }
            
            Alert::success('Success','Selamat Datang');
            return redirect()->intended('/home')->with('login', 'login');
        }

        Alert::error('Error', 'Email or Password Incorrect');
        return back();
    } 

    public function logout(Request $request)
    {
        $request->session()->regenerateToken();
        $request->session()->invalidate();  

        Alert::success('Success','Logout Success');
        return redirect()->intended('/home')->with('login', 'login');
    }
}
