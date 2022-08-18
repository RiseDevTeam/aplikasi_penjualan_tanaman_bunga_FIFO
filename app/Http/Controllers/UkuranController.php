<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class UkuranController extends Controller
{
    public function ukuran($kode_tanaman)
    {
        $ukuran = DB::table('tanaman')->where('kode_tanaman', $kode_tanaman)->first();
        return view('halaman_admin.ukuran_tanaman.ukuran', compact('ukuran'));
    }

    public function ukuran1(Request $request)
    {

        $harga_tanaman = explode("Rp. ", $request->harga_tanaman);
        $harga_tanaman = explode(".", $harga_tanaman[1]);
        $harga_tanaman = implode($harga_tanaman);
        DB::table('ukuran')->insert([
            'kode_tanaman' => $request->kode_tanaman,
            'ukuran' => $request->ukuran,
            'harga' => $harga_tanaman,
        ]);
        Alert::success('Ukuran Berhasil', 'Data Berhasil Ditambahkan');
        return redirect()->route('kelola_tanaman');
    }

    public function hapus($id)
    {
        DB::table('ukuran')->where('id_ukuran', $id)->delete();
        Alert::error('Ukuran Berhasil', 'Data Berhasil Dihapus');
        return redirect()->route('kelola_tanaman');
    }
}
