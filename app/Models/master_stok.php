<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class master_stok extends Model
{
    use HasFactory;

    protected $table = 'master_stok';

    protected $primaryKey = 'id_stok';

    protected $fillable = ['stok'];

    public function user()
    {
        return $this->hasOne('App\Models\User', 'id', 'id_user');
    }

    public function tanaman()
    {
        return $this->hasOne('App\Models\tanaman', 'kode_tanaman', 'kode_tanaman');
    }

    public function penjualan()
    {
        return $this->belongsTo('App\Models\penjualan', 'id_stok', 'id_stok');
    }

    public function detail()
    {
        return $this->belongsTo('App\Models\detail_penjualan', 'id_stok', 'id_stok');
    }
}
