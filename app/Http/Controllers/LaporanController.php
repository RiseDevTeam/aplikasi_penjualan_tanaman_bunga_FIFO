<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LaporanController extends Controller
{
    public function laporan()
    {
        $laporan = DB::table('penjualan')->leftjoin('users', 'penjualan.id_user', '=', 'users.id')
            ->leftjoin('master_stok', 'penjualan.id_stok', 'master_stok.id_stok')->leftjoin('tanaman', 'penjualan.kode_tanaman', '=', 'tanaman.kode_tanaman')->leftjoin('ukuran', 'penjualan.kode_tanaman', '=', 'ukuran.kode_tanaman')
            ->orderByDesc('tanggal_jual')->select(
                'penjualan.*',
                'master_stok.*',
                'users.name as user_nama',
                'tanaman.nama_tanaman as nm_tanaman',
                'tanaman.harga',
                'ukuran.ukuran'
            )->get();
        return view('halaman_admin.laporan_akhir.laporan', compact('laporan'));
    }

    public function cari(Request $request)
    {
        $periode = $request->periode;
        // $index = penjualan::orderBy('tanggal_jual')->get();
        $cari = DB::table('penjualan')->leftjoin('users', 'penjualan.id_user', '=', 'users.id')
            ->leftjoin('master_stok', 'penjualan.id_stok', 'master_stok.id_stok')->leftjoin('tanaman', 'penjualan.kode_tanaman', '=', 'tanaman.kode_tanaman')->leftjoin('ukuran', 'penjualan.kode_tanaman', '=', 'ukuran.kode_tanaman')
            ->orderByDesc('tanggal_jual')->select(
                'penjualan.*',
                'master_stok.*',
                'users.name as user_nama',
                'tanaman.nama_tanaman as nm_tanaman',
                'tanaman.harga',
                'ukuran.ukuran'
            );
        if ($request->periode) {
            $data = $cari->whereMonth('penjualan.tanggal_jual', [$request->periode]);
        } else {
            $data = $cari;
        }
        $laporan = $data->get();
        return view('halaman_admin.laporan_akhir.laporan', compact('laporan', 'periode'));
    }

    public function print($periode)
    {
        $print = DB::table('penjualan')->leftjoin('users', 'penjualan.id_user', '=', 'users.id')
            ->leftjoin('master_stok', 'penjualan.id_stok', 'master_stok.id_stok')->leftjoin('tanaman', 'penjualan.kode_tanaman', '=', 'tanaman.kode_tanaman')->leftjoin('ukuran', 'penjualan.kode_tanaman', '=', 'ukuran.kode_tanaman')
            ->orderByDesc('tanggal_jual')->select(
                'penjualan.*',
                'master_stok.*',
                'users.name as user_nama',
                'tanaman.nama_tanaman as nm_tanaman',
                'tanaman.harga',
                'ukuran.ukuran'
            )->whereMonth('penjualan.tanggal_jual', '=', $periode)->get();
        return view('halaman_admin.laporan_akhir.print', compact('print'));
    }

    public function print1()
    {
        $print = DB::table('penjualan')->leftjoin('users', 'penjualan.id_user', '=', 'users.id')
            ->leftjoin('master_stok', 'penjualan.id_stok', 'master_stok.id_stok')->leftjoin('tanaman', 'penjualan.kode_tanaman', '=', 'tanaman.kode_tanaman')->leftjoin('ukuran', 'penjualan.kode_tanaman', '=', 'ukuran.kode_tanaman')
            ->orderByDesc('tanggal_jual')->select(
                'penjualan.*',
                'master_stok.*',
                'users.name as user_nama',
                'tanaman.nama_tanaman as nm_tanaman',
                'tanaman.harga',
                'ukuran.ukuran'
            )->get();
        return view('halaman_admin.laporan_akhir.print', compact('print'));
    }

    public function tanaman_penutup()
    {
        $tanaman_penutup = DB::table('penjualan')->leftjoin('users', 'penjualan.id_user', '=', 'users.id')
            ->leftjoin('master_stok', 'penjualan.id_stok', 'master_stok.id_stok')->leftjoin('tanaman', 'penjualan.kode_tanaman', '=', 'tanaman.kode_tanaman')->leftjoin('ukuran', 'penjualan.kode_tanaman', '=', 'ukuran.kode_tanaman')
            ->leftjoin('jenis_tanaman', 'tanaman.id_jenis', '=', 'jenis_tanaman.id_jenis')
            ->where('jenis_tanaman.id_jenis', '=', '1')
            ->orderByDesc('tanggal_jual')->select(
                'penjualan.*',
                'master_stok.*',
                'users.name as user_nama',
                'tanaman.nama_tanaman as nm_tanaman',
                'tanaman.harga',
                'jenis_tanaman.jenis as jenis_tanaman',
                'ukuran.ukuran'
            )->get();
        return view('halaman_admin.laporan_akhir.tanaman_penutup', compact('tanaman_penutup'));
    }

    public function tanaman_rendah()
    {
        $tanaman_rendah = DB::table('penjualan')->leftjoin('users', 'penjualan.id_user', '=', 'users.id')
            ->leftjoin('master_stok', 'penjualan.id_stok', 'master_stok.id_stok')->leftjoin('tanaman', 'penjualan.kode_tanaman', '=', 'tanaman.kode_tanaman')->leftjoin('ukuran', 'penjualan.kode_tanaman', '=', 'ukuran.kode_tanaman')
            ->leftjoin('jenis_tanaman', 'tanaman.id_jenis', '=', 'jenis_tanaman.id_jenis')
            ->where('jenis_tanaman.id_jenis', '=', '2')
            ->orderByDesc('tanggal_jual')->select(
                'penjualan.*',
                'master_stok.*',
                'users.name as user_nama',
                'tanaman.nama_tanaman as nm_tanaman',
                'tanaman.harga',
                'jenis_tanaman.jenis as jenis_tanaman',
                'ukuran.ukuran'
            )->get();
        return view('halaman_admin.laporan_akhir.tanaman_rendah', compact('tanaman_rendah'));
    }

    public function tanaman_sedang()
    {
        $tanaman_sedang = DB::table('penjualan')->leftjoin('users', 'penjualan.id_user', '=', 'users.id')
            ->leftjoin('master_stok', 'penjualan.id_stok', 'master_stok.id_stok')->leftjoin('tanaman', 'penjualan.kode_tanaman', '=', 'tanaman.kode_tanaman')->leftjoin('ukuran', 'penjualan.kode_tanaman', '=', 'ukuran.kode_tanaman')
            ->leftjoin('jenis_tanaman', 'tanaman.id_jenis', '=', 'jenis_tanaman.id_jenis')
            ->where('jenis_tanaman.id_jenis', '=', '3')
            ->orderByDesc('tanggal_jual')->select(
                'penjualan.*',
                'master_stok.*',
                'users.name as user_nama',
                'tanaman.nama_tanaman as nm_tanaman',
                'tanaman.harga',
                'jenis_tanaman.jenis as jenis_tanaman',
                'ukuran.ukuran'
            )->get();
        return view('halaman_admin.laporan_akhir.tanaman_sedang', compact('tanaman_sedang'));
    }

    public function tanaman_tinggi()
    {
        $tanaman_tinggi = DB::table('penjualan')->leftjoin('users', 'penjualan.id_user', '=', 'users.id')
            ->leftjoin('master_stok', 'penjualan.id_stok', 'master_stok.id_stok')->leftjoin('tanaman', 'penjualan.kode_tanaman', '=', 'tanaman.kode_tanaman')->leftjoin('ukuran', 'penjualan.kode_tanaman', '=', 'ukuran.kode_tanaman')
            ->leftjoin('jenis_tanaman', 'tanaman.id_jenis', '=', 'jenis_tanaman.id_jenis')
            ->where('jenis_tanaman.id_jenis', '=', '4')
            ->orderByDesc('tanggal_jual')->select(
                'penjualan.*',
                'master_stok.*',
                'users.name as user_nama',
                'tanaman.nama_tanaman as nm_tanaman',
                'tanaman.harga',
                'jenis_tanaman.jenis as jenis_tanaman',
                'ukuran.ukuran'
            )->get();
        return view('halaman_admin.laporan_akhir.tanaman_tinggi', compact('tanaman_tinggi'));
    }

    public function tanaman_perdu()
    {
        $tanaman_perdu = DB::table('penjualan')->leftjoin('users', 'penjualan.id_user', '=', 'users.id')
            ->leftjoin('master_stok', 'penjualan.id_stok', 'master_stok.id_stok')->leftjoin('tanaman', 'penjualan.kode_tanaman', '=', 'tanaman.kode_tanaman')->leftjoin('ukuran', 'penjualan.kode_tanaman', '=', 'ukuran.kode_tanaman')
            ->leftjoin('jenis_tanaman', 'tanaman.id_jenis', '=', 'jenis_tanaman.id_jenis')
            ->where('jenis_tanaman.id_jenis', '=', '5')
            ->orderByDesc('tanggal_jual')->select(
                'penjualan.*',
                'master_stok.*',
                'users.name as user_nama',
                'tanaman.nama_tanaman as nm_tanaman',
                'tanaman.harga',
                'jenis_tanaman.jenis as jenis_tanaman',
                'ukuran.ukuran'
            )->get();
        return view('halaman_admin.laporan_akhir.tanaman_perdu', compact('tanaman_perdu'));
    }

    public function stok_terjual()
    {
        $stok = DB::table('penjualan')->leftjoin('users', 'penjualan.id_user', '=', 'users.id')
            ->leftjoin('master_stok', 'penjualan.kode_tanaman', 'master_stok.kode_tanaman')->leftjoin('tanaman', 'penjualan.kode_tanaman', '=', 'tanaman.kode_tanaman')->leftjoin('ukuran', 'penjualan.kode_tanaman', '=', 'ukuran.kode_tanaman')
            ->leftjoin('jenis_tanaman', 'tanaman.id_jenis', '=', 'jenis_tanaman.id_jenis')
            ->orderByDesc('tanggal_jual')->groupby('penjualan.id_penjualan')->select(
                'penjualan.stok_jual',
                'master_stok.stok',
                'users.name as user_nama',
                'tanaman.nama_tanaman as nm_tanaman',
                'tanaman.kode_tanaman as kode_tanaman',
                'tanaman.harga',
                'jenis_tanaman.jenis as jenis_tanaman',
                'penjualan.ukuran',
            )->get();
        return view('halaman_admin.laporan_akhir.laporan_stok', compact('stok'));
    }
}
