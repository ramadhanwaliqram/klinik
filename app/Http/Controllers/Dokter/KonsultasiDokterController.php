<?php

namespace App\Http\Controllers\Dokter;

use App\Models\Konsultasi;
use App\Models\Dokter;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class KonsultasiDokterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        return view('dokter.konsultasi-dokter.konsultasi-dokter');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $requestuestuest
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        Konsultasi::create([
            'text'      => $request['text'],
            'dokter_id' => $request['dokter'],
            'pasien_id' => auth()->user()->id
        ]);

        return response()
            ->json([
                'success' => 'Konsultasi Berhasil.',
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Konsultasi  $konsultasi
     * @return \Illuminate\Http\Response
     */
    public function show(Konsultasi $konsultasi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Konsultasi  $konsultasi
     * @return \Illuminate\Http\Response
     */
    public function edit(Konsultasi $konsultasi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $requestuestuest
     * @param  \App\Models\Konsultasi  $konsultasi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $requestuestuest, Konsultasi $konsultasi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Konsultasi  $konsultasi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Konsultasi $konsultasi)
    {
        //
    }
}
