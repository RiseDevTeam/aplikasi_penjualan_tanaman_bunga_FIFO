<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePenjualanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penjualan', function (Blueprint $table) {
            $table->bigIncrements('id_penjualan');
            $table->bigInteger('id_user');
            $table->bigInteger('id_stok');
            $table->bigInteger('id_histori');
            $table->string('pembayaran', '20');
            $table->string('kode_tanaman', '20');
            $table->bigInteger('stok_jual');
            $table->bigInteger('ukuran');
            $table->date('tanggal_jual');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('penjualan');
    }
}
