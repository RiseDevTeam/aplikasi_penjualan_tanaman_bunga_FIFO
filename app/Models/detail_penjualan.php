<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class detail_penjualan extends Model
{
    use HasFactory;

    protected $table = 'detail_penjualan';

    protected $primaruKey = 'id_detail';

    protected $fillable = ['id_penjualan', 'id_stok', 'jumlah', 'id_histori'];

    public function penjualan()
    {
        return $this->hasOne('App\Models\penjualan', 'id_penjualan', 'id_penjualan');
    }

    public function stok()
    {
        return $this->hasOne('App\Models\master_stok', 'id_stok', 'id_stok');
    }
}
