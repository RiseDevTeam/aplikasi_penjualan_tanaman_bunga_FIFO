<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function register()
    {
        return view('auth.register');
    }

    public function proses_login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        $proses = $request->only('username', 'password');

        if (Auth::attempt($proses)) {
            $login = Auth::User();

            if ($login->status == 'admin') {
                return redirect()->intended('admin');
            } elseif ($login->status == 'karyawan') {
                return redirect()->intended('karyawan');
            } else {

                return redirect()->route('login');
            }
        } else {

            return redirect()->route('login');
        }
    }

    public function logout(Request $request)
    {
        $request->session()->flush();
        Auth::logout();
        return redirect('/');
    }
}
