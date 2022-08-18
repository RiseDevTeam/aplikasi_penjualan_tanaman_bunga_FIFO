<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class alamat extends Model
{
    use HasFactory;

    protected $table = 'alamat';

    protected $primaryKey = 'id_alamat';

    public function user()
    {
        return $this->belongsTo('App\Models\user', 'username', 'username');
    }
}
