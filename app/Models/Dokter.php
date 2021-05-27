<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Dokter extends Model
{
    protected $fillable = [
        'user_id', 'spesialis', 'jenis_kelamin', 'tanggal_lahir', 'alamat'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
