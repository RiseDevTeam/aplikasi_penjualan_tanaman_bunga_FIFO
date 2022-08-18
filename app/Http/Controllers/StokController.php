<?php

namespace App\Http\Controllers;

use App\Models\histori;
use App\Models\tanaman;
use App\Models\master_stok;
use Illuminate\Http\Request;
use App\Models\input_tanaman;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;


class StokController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $index = master_stok::all();
        return view('halaman_admin.master_stok.index', compact('index'));
    }

    public function histori()
    {
        $histori = DB::table('histori')
            ->join('users', 'histori.id_user', '=', 'users.id')
            ->join('master_stok', 'histori.kode_tanaman', '=', 'master_stok.kode_tanaman')
            ->join('tanaman', 'histori.kode_tanaman', '=', 'tanaman.kode_tanaman')
            ->select('histori.*', 'tanaman.harga as harga', 'tanaman.nama_tanaman as nama_tanaman', 'users.*')
            ->get();
        return view('halaman_admin.histori_stok.index', compact('histori'));
    }


    public function create()
    {
        return view('halaman_admin.master_stok.tambah');
    }

    public function ajax_stok()
    {
        if (isset($_POST['stok'])) {

            $res = array();
            $input = tanaman::where('nama_tanaman', $_POST['stok'])->first();
            $res = array('kode_tanaman' => $input->kode_tanaman);
            return response()->json($res);
        }
    }


    public function store(Request $request)
    {

        $key = DB::table('master_stok')
            ->where('kode_tanaman', '=', $request->kode_tanaman)
            ->first();
        if ($key == null) {

            $store =  new master_stok;

            $store->id_user = Auth::user()->id;
            $store->kode_tanaman = $request->kode_tanaman;
            $store->stok = $request->stok;
            $store->tanggal = $request->tanggal;
            $store->save();

            $histori = new histori;
            $histori->id_user = Auth::user()->id;
            $histori->kode_tanaman = $request->kode_tanaman;
            $histori->stok = $request->stok;

            $histori->tanggal = $request->tanggal;
            $histori->keterangan = 'tambah_data';

            $histori->save();

            Alert::success('Stok Berhasil', 'Data Berhasil Ditambahkan');
            return redirect()->route('kelola_stok');
        } elseif ($key->kode_tanaman == $request->kode_tanaman) {
            $store = master_stok::where('kode_tanaman', $key->kode_tanaman)
                ->update([
                    'stok' => $request->stok + $key->stok,
                ]);

            $histori = new histori;
            $histori->id_user = Auth::user()->id;
            $histori->kode_tanaman = $request->kode_tanaman;
            $histori->stok = $request->stok;

            $histori->tanggal = $request->tanggal;
            $histori->keterangan = 'tambah_data';

            $histori->save();
            Alert::success('Stok Berhasil', 'Data Berhasil Ditambahkan');
            return redirect()->route('kelola_stok');
        } else {
            $store =  new master_stok;

            $store->id_user = Auth::user()->id;
            $store->kode_tanaman = $request->kode_tanaman;
            $store->stok = $request->stok;
            $store->save();

            $histori = new histori;
            $histori->id_user = Auth::user()->id;
            $histori->kode_tanaman = $request->kode_tanaman;
            $histori->stok = $request->stok;

            $histori->tanggal = $request->tanggal;
            $histori->keterangan = 'Tambah data';

            $histori->save();
            Alert::success('Stok Berhasil', 'Data Berhasil Ditambahkan');
            return redirect()->route('kelola_stok');
        }
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
    public function edit($id_stok)
    {
        $lala = DB::table('tanaman')->get();
        $edit = master_stok::find($id_stok);
        return view('halaman_admin.master_stok.edit', compact('edit', 'lala'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_stok)
    {
        $update = master_stok::find($request->id_stok);

        $update->id_user = Auth::user()->id;
        $update->kode_tanaman = $request->kode_tanaman;
        $update->stok = $request->stok;
        $update->tanggal = $request->tanggal;
        $update->save();

        $histori = new histori;
        $histori->id_user = Auth::user()->id;
        $histori->kode_tanaman = $request->kode_tanaman;
        $histori->stok = $request->stok;
        $histori->tanggal = $request->tanggal;
        $histori->keterangan = 'Mengurangi Data';

        $histori->save();




        Alert::success('Stok Berhasil', 'Data Berhasil Diedit');
        return redirect()->route('kelola_stok');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
