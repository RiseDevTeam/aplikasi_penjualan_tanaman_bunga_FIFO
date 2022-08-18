<?php

namespace App\Http\Controllers;

use App\Models\histori;
use App\Models\tanaman;
use App\Models\penjualan;
use App\Models\pembayaran;
use App\Models\master_stok;
use Illuminate\Http\Request;
use App\Models\detail_penjualan;
use App\Models\jenis_tanaman;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use Prophecy\Doubler\Generator\Node\ReturnTypeNode;

class PenjualanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $index = penjualan::orderBy('tanggal_jual')->get();
        $index = DB::table('penjualan')->join('users', 'penjualan.id_user', '=', 'users.id')
            ->join('master_stok', 'penjualan.id_stok', 'master_stok.id_stok')->join('tanaman', 'penjualan.kode_tanaman', '=', 'tanaman.kode_tanaman')
            ->orderByDesc('tanggal_jual')->select(
                'penjualan.*',
                'master_stok.*',
                'users.name as user_nama',
                'tanaman.nama_tanaman as nm_tanaman',
                'tanaman.harga'
            )->get();
        return view('halaman_admin.penjualan.index', compact('index'));
    }


    public function create()
    {
        $jenis_tanaman = jenis_tanaman::all();
        return view('halaman_admin.penjualan.tambah', compact('jenis_tanaman'));
    }


    public function ajax_jual()
    {
        if ($_POST['jenis_tanaman']) {
            $ajax = DB::table('jenis_tanaman')->leftJoin('tanaman', 'jenis_tanaman.id_jenis', '=', 'tanaman.id_jenis')->where('tanaman.id_jenis', '=', $_POST['jenis_tanaman'])->select('tanaman.kode_tanaman', 'tanaman.nama_tanaman', 'jenis_tanaman.jenis')->get();

            $data = [];
            foreach ($ajax as $key) {
                $data[] = $key;
            }
            return response()->json($data);
        }
    }

    public function ajax_harga()
    {
        if ($_POST['kode_tanaman']) {

            $ajax = DB::table('tanaman')->join('master_stok', 'tanaman.kode_tanaman', '=', 'master_stok.kode_tanaman')->where('tanaman.kode_tanaman', '=', $_POST['kode_tanaman'])->select('tanaman.kode_tanaman', 'tanaman.harga', 'master_stok.stok')->first();

            $ukuran = DB::table('ukuran')->where('ukuran.kode_tanaman', '=', $ajax->kode_tanaman)->get();

            $data = [
                'kode_tanaman' => $ajax->kode_tanaman,
                'harga_tanaman' => $ajax->harga,
                'stok' => $ajax->stok,
                'ukuran' => $ukuran
            ];

            return response()->json($data);
        }
    }

    public function store(Request $request)
    {
        $his = histori::where('kode_tanaman', $request->kode_tanaman)->first();
        // foreach ($lala as $his) {

        // memecahkan uang
        $harga = $request->total_pembayaran;
        $harga =  explode("Rp.", $harga)[1];
        $harga =  explode(".", $harga);
        $harga =  implode($harga);

        $store = new penjualan;
        $store->id_user = Auth::user()->id;
        $store->id_stok = $request->id_stok;
        $store->id_histori = $his->id_histori;
        $store->pembayaran = $request->pembayaran;
        $store->kode_tanaman = $request->kode_tanaman;
        $store->stok_jual = $request->stok_jual;
        $store->ukuran = $request->ukuran;
        $store->tanggal_jual = $request->tanggal_jual;
        $store->save();
        $pembayaran = new pembayaran;
        $pembayaran->pembayaran = $request->pembayaran;
        $pembayaran->total_pembayaran = $harga;
        $pembayaran->save();

        //update data master stok ketika tanaman di jual

        $lala = histori::where('kode_tanaman', $request->kode_tanaman)->get();
        $stok = master_stok::where('kode_tanaman', $request->kode_tanaman)->get();

        foreach ($stok as $key) {
            $key->update([
                'stok' => $key->stok - $request->stok_jual
            ]);
        }

        //end update data master stok ketika tanaman di jual

        // histori stok terupdate dan detail penjualan bertambah ketika request stok jual

        if ($request->stok_jual) {

            $total_stok = $lala->sum("stok");

            foreach ($lala as $l) {
                if ($l->stok < $request->stok_jual) {
                    $request->stok_jual -= $l->stok;
                    // $this->insertDetail($id, $request, $l->stok, $request);
                    $l->update([
                        "stok" => 0
                    ]);
                } else if ($request->stok_jual < $total_stok) {
                    // $this->insertDetail($id, $request, $l->stok - $request->stok_jual);
                    if ($l->stok >= $request->stok_jual) {
                        $l->update([
                            "stok" => $l->stok - $request->stok_jual
                        ]);
                        Alert::success('Penjualan Berhasil', 'Data Berhasil Ditambahkan');
                        return redirect()->route('kelola_penjualan');
                    }
                } else {
                    // $this->insertDetail($id, $request, $l->stok - $request->stok_jual, $request);
                    $l->update([
                        "stok" => $l->stok - $request->stok_jual
                    ]);
                }
            }
        }

        // end histori stok terupdate dan detail penjualan bertambah ketika request stok jual

        Alert::success('Penjualan Berhasil', 'Data Berhasil Ditambahkan');
        return redirect()->route('faktur');
    }

    public function faktur($id_penjualan)
    {
        $faktur = DB::table('penjualan')->join('tanaman', 'penjualan.kode_tanaman', '=', 'tanaman.kode_tanaman')->where('penjualan.id_penjualan', $id_penjualan)
            ->orderByDesc('tanggal_jual')->select(
                'tanaman.nama_tanaman',
                'tanaman.harga',
                'penjualan.ukuran',
                'penjualan.stok_jual',
            )->first();
        return view('halaman_admin.penjualan.faktur', compact('faktur'));
    }
}
