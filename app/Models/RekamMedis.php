<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Models\Obat;

class RekamMedis extends Model
{
    protected $guarded = [];

    public function obat(){
        return $this->belongsToMany(Obat::Class);
    }
}
