<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class penjualan extends Model
{
    use HasFactory;

    protected $table = 'penjualan';

    protected $primaryKey = 'id_penjualan';

    protected $fillable = ['id_histori'];

    public function user()
    {
        return $this->hasOne('App\Models\User', 'id', 'id_user');
    }

    public function master_stok()
    {
        return $this->hasOne('App\Models\master_stok', 'id_stok', 'id_stok');
    }

    public function tanaman()
    {
        return $this->hasOne('App\Models\tanaman', 'kode_tanaman', 'kode_tanaman');
    }

    public function detail()
    {
        return $this->belongsTo('App\Models\detail_penjualan', 'id_penjualan', 'id_penjualan');
    }
}
