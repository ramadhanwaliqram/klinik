<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Konsultasi extends Model
{
    protected $fillable = [
        'text', 'user_id', 'dokter_id', 'pasien_id'
    ];
}
