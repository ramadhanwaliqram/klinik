<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Model\RekamMedis;

class Obat extends Model
{
    protected $table = 'obats';

    public function rekamMedis(){
        return $this->belongsToMany(RekamMedis::Class);
    }
}
