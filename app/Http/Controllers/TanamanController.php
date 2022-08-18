<?php

namespace App\Http\Controllers;

use App\Models\tanaman;
use Illuminate\Http\Request;
use App\Models\jenis_tanaman;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;


class TanamanController extends Controller
{
    public function index()
    {
        $index = tanaman::all();
        return view('halaman_admin.tanaman.index', compact('index'));
    }


    public function create()
    {
        $tambah = jenis_tanaman::all();
        return view('halaman_admin.tanaman.tambah', compact('tambah'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // memecahkan uang
        $harga = $request->harga;
        $harga =  explode("Rp.", $harga)[1];
        $harga =  explode(".", $harga);
        $harga =  implode($harga);

        $request->validate([
            'kode_tanaman' => 'required',
            'nama_tanaman' => 'required'
        ]);

        $store = new tanaman;

        $store->id_user = Auth::user()->id;
        $store->kode_tanaman = $request->kode_tanaman;
        $store->nama_tanaman = $request->nama_tanaman;
        $store->id_jenis = $request->id_jenis;
        $store->harga = $harga;
        $store->save();

        Alert::success('Kelola Tanaman Berhasil', 'Data Berhasil Ditambahkan');
        return redirect()->route('kelola_tanaman');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id_tanaman)
    {
        $tambah = jenis_tanaman::all();
        $edit = tanaman::leftjoin('jenis_tanaman', 'tanaman.id_jenis', '=', 'jenis_tanaman.id_jenis')->where('id_tanaman', $id_tanaman)->select('tanaman.*', 'jenis_tanaman.*')->first();
        return view('halaman_admin.tanaman.edit', compact('edit', 'tambah'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_tanaman)
    {
        $update = tanaman::find($request->id_tanaman);

        $update->kode_tanaman = $request->kode_tanaman;
        $update->nama_tanaman = $request->nama_tanaman;
        $update->harga = $request->harga;
        $update->id_jenis = $request->id_jenis;
        $update->save();

        Alert::success('Kelola Tanaman Berhasil', 'Data Berhasil Diupdate');
        return redirect()->route('kelola_tanaman');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_tanaman)
    {
        $delete = tanaman::find($id_tanaman);

        $delete->delete();

        Alert::error('Kelola Tanaman Berhasil', 'Data Berhasil Dihapus');
        return redirect()->route('kelola_tanaman');
    }
}
