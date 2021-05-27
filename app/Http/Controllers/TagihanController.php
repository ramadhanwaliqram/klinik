<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tagihan;


class TagihanController extends Controller
{
    public function index()
    {
        $tagihans = Tagihan::join('users', 'users.id', 'tagihans.nama_dokter')
                            ->where('pasien_id', auth()->user()->id)
                            ->get();
        return view('tagihan', ['tagihans' => $tagihans]);
    }

    
}
