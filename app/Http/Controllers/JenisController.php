<?php

namespace App\Http\Controllers;

use App\Models\tanaman;
use Illuminate\Http\Request;
use App\Models\jenis_tanaman;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class JenisController extends Controller
{
    public function index()
    {
        $index = jenis_tanaman::groupBy('jenis')->get();
        return view('halaman_admin.kelola_jenis.index', compact('index'));
    }


    public function detail_jenis($id_jenis)
    {

        $detail = tanaman::join('jenis_tanaman', 'tanaman.id_jenis', '=', 'jenis_tanaman.id_jenis')->where('tanaman.id_jenis', $id_jenis)
            ->groupBy('tanaman.id_tanaman')->get();
        return view('halaman_admin.kelola_jenis.detail_jenis', compact('detail'));
    }


    public function create()
    {
        $tanaman = tanaman::all();
        return view('halaman_admin.kelola_jenis.tambah', compact('tanaman'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $store = new jenis_tanaman;
        $store->jenis = $request->jenis_tanaman;
        $store->save();
        Alert::success('Kelola Jenis Berhasil', 'Data Berhasil Ditambahkan');
        return redirect()->route('kelola_jenis');
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
    public function edit($id_jenis)
    {
        $edit = jenis_tanaman::find($id_jenis);

        return view('halaman_admin.kelola_jenis.edit', compact('edit'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_jenis)
    {
        $update = jenis_tanaman::find($request->id_jenis);
        $update->jenis = $request->jenis;

        $update->save();
        Alert::success('Kelola Jenis Berhasil', 'Data Berhasil Diupdate');
        return redirect()->route('kelola_jenis');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_jenis)
    {
        $delete = jenis_tanaman::find($id_jenis);

        $delete->delete();

        Alert::error('Kelola Jenis Berhasil', 'Data Berhasil Dihapus');
        return redirect()->route('kelola_jenis');
    }
}
