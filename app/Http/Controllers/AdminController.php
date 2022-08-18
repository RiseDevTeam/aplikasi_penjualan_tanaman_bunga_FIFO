<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function admin()
    {
        if (Auth::user()->status == 'admin') {

            return view('halaman_admin.kelola_akun.dashboard');
        } else {
            return redirect()->to('/');
        }
    }

    public function karyawan()
    {
        if (Auth::user()->status == 'karyawan') {

            return view('halaman_admin.kelola_akun.dashboard');
        } else {
            return redirect()->to('/');
        }
    }
}
