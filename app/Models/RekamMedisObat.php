<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\{RekamMedis, Obat};

class RekamMedisObat extends Model
{
    public function rekamMedis(){
        return $this->belongToMany(RekamMedis::Class);
    }
    public function obat(){
        return $this->hasOne(Obat::Class);
    }
}
