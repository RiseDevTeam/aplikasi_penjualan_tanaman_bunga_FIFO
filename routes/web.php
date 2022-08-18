<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AkunController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Input_TanamanController;
use App\Http\Controllers\JenisController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\PenjualanController;
use App\Http\Controllers\StokController;
use App\Http\Controllers\TanamanController;
use App\Http\Controllers\UkuranController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('tampilan.user');
});

Route::group(['middleware' => 'guest'], function () {
    Route::get('login', [AuthController::class, 'login'])->name('login');
    Route::POST('proses_login', [AuthController::class, 'proses_login'])->name('proses_login');
    Route::get('register', [AuthController::class, 'register'])->name('register');
});

Route::group(['middleware' => 'auth'], function () {
    // Route::group(['middleware' => ['sudah_login:admin']], function () {
    Route::get('admin', [AdminController::class, 'admin'])->name('admin');
    Route::get('karyawan', [AdminController::class, 'karyawan'])->name('karyawan');
    Route::POST('logout', [AuthController::class, 'logout'])->name('logout');
    // });

    Route::prefix('kelola_akun')->group(function () {
        Route::get('dashboard', [AkunController::class, 'dashboard'])->name('dashboard');
        Route::get('index', [AkunController::class, 'index'])->name('kelola_akun');
        Route::get('tambah', [AkunController::class, 'create'])->name('akun_tambah');
        Route::POST('tambah', [AkunController::class, 'store'])->name('akun_tambah');
        Route::get('edit/{id}', [AkunController::class, 'edit'])->name('akun_edit');
        Route::POST('edit/{id}', [AkunController::class, 'update'])->name('akun_edit');
        Route::DELETE('hapus/{id}', [AkunController::class, 'destroy'])->name('akun_delete');
    });

    Route::prefix('kelola_tanaman')->group(function () {
        Route::get('index', [TanamanController::class, 'index'])->name('kelola_tanaman');
        Route::get('tambah', [TanamanController::class, 'create'])->name('tanaman_tambah');
        Route::POST('tambah', [TanamanController::class, 'store'])->name('tanaman_tambah');
        Route::get('edit/{id_tanaman}', [TanamanController::class, 'edit'])->name('tanaman_edit');
        Route::POST('edit/{id_tanaman}', [TanamanController::class, 'update'])->name('tanaman_edit');
        Route::DELETE('hapus/{id_tanaman}', [TanamanController::class, 'destroy'])->name('tanaman_delete');
    });

    Route::prefix('jenis_tanaman')->group(function () {
        Route::get('index', [JenisController::class, 'index'])->name('kelola_jenis');
        Route::get('tambah', [JenisController::class, 'create'])->name('jenis_tambah');
        Route::POST('tambah', [JenisController::class, 'store'])->name('jenis_tambah');
        Route::get('detail_jenis/{id_jenis}', [JenisController::class, 'detail_jenis'])->name('detail_jenis');
        Route::get('edit/{id_jenis}', [JenisController::class, 'edit'])->name('jenis_edit');
        Route::POST('edit/{id_jenis}', [JenisController::class, 'update'])->name('jenis_edit');
        Route::DELETE('hapus/{id_jenis}', [JenisController::class, 'destroy'])->name('jenis_delete');
    });

    Route::prefix('ukuran')->group(function () {
        Route::get('ukuran/{kode_tanaman}', [UkuranController::class, 'ukuran'])->name('ukuran');
        Route::POST('ukuran/{kode_tanaman}', [UkuranController::class, 'ukuran1'])->name('ukuran');
        Route::DELETE('hapus_ukuran/{id}', [UkuranController::class, 'hapus'])->name('hapus_ukuran');
    });
    Route::prefix('master_stok')->group(function () {
        Route::get('index', [StokController::class, 'index'])->name('kelola_stok');
        Route::get('histori', [StokController::class, 'histori'])->name('histori');
        Route::get('tambah', [StokController::class, 'create'])->name('stok_tambah');
        Route::POST('tambah', [StokController::class, 'store'])->name('stok_tambah');
        Route::POST('ajax', [StokController::class, 'ajax_stok'])->name('ajax_stok');
        Route::get('edit/{id_stok}', [StokController::class, 'edit'])->name('stok_edit');
        Route::POST('edit/{id_stok}', [StokController::class, 'update'])->name('stok_edit');
        Route::DELETE('hapus/{id_stok}', [StokController::class, 'destroy'])->name('stok_delete');
    });

    Route::prefix('penjualan')->group(function () {
        Route::get('index', [PenjualanController::class, 'index'])->name('kelola_penjualan');
        Route::get('jual', [PenjualanController::class, 'create'])->name('jual');
        Route::POST('jual', [PenjualanController::class, 'store'])->name('jual');
        Route::get('faktur/{id_penjualan}', [PenjualanController::class, 'faktur'])->name('faktur');
        Route::POST('ajax', [PenjualanController::class, 'ajax_jual'])->name('ajax_jual');
        Route::POST('ajaxharga', [PenjualanController::class, 'ajax_harga'])->name('ajax_harga');
    });

    Route::prefix('laporan')->group(function () {
        Route::get('laporan', [LaporanController::class, 'laporan'])->name('laporan');
        Route::get('tanaman_penutup', [LaporanController::class, 'tanaman_penutup'])->name('tanaman_penutup');
        Route::get('tanaman_rendah', [LaporanController::class, 'tanaman_rendah'])->name('tanaman_rendah');
        Route::get('tanaman_sedang', [LaporanController::class, 'tanaman_sedang'])->name('tanaman_sedang');
        Route::get('tanaman_tinggi', [LaporanController::class, 'tanaman_tinggi'])->name('tanaman_tinggi');
        Route::get('tanaman_perdu', [LaporanController::class, 'tanaman_perdu'])->name('tanaman_perdu');
        Route::get('stok_terjual', [LaporanController::class, 'stok_terjual'])->name('stok_terjual');
        Route::POST('cari', [LaporanController::class, 'cari'])->name('cari');
        Route::get('print/{periode}', [LaporanController::class, 'print'])->name('print');
        Route::get('print1', [LaporanController::class, 'print1'])->name('print1');
    });
});
