<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class jenis_tanaman extends Model
{
    use HasFactory;

    protected $table = 'jenis_tanaman';

    protected $primaryKey = 'id_jenis';

    protected $fillable = ['jenis'];
}
