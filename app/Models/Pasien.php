<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pasien extends Model
{
    protected $fillable = [
        'user_id', 'tanggal_lahir', 'jenis_kelamin', 'alamat'
    ];
}
