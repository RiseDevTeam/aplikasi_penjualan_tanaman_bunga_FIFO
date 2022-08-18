<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tanaman extends Model
{
    use HasFactory;

    protected $table = 'tanaman';

    protected $primaryKey = 'id_tanaman';

    public function user()
    {
        return $this->hasOne('App\Models\User', 'id', 'id_user');
    }

    public function jenis()
    {
    	return $this->hasOne('App\Models\jenis_tanaman', 'id_jenis', 'id_jenis');
    }
}
