<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Pasien extends Model
{
    protected $fillable = [
        'user_id', 'tanggal_lahir', 'jenis_kelamin', 'alamat'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, "user_id", "id");
    }
}
