<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Dokter extends Model
{
    protected $fillable = [
        'user_id', 'spesialis', 'jenis_kelamin'
    ];
}
