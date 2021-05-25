<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Models\{Dokter, Pasien};

class Konsultasi extends Model
{
    protected $fillable = [
        'text', 'user_id', 'dokter_id', 'pasien_id'
    ];

    public function dokter()
    {
        return $this->belongsTo(Dokter::class, "dokter_id", "id");
    }

    public function pasien(){
        return $this->belongsTo(Pasien::class, "pasien_id", "id");
    }
}
