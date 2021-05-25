<?php

namespace App\Http\Controllers\Dokter;

use App\Models\RekamMedis;
use App\Models\Pasien;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RekamMedikDokterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pasiens = Pasien::join('users', 'users.id', 'pasiens.user_id')->get();
        // dd($pasiens);
        return view('dokter.rekam_medik.rekammedik', ['pasiens' => $pasiens]);
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rekamMedis = RekamMedis::create([
            "pasien_id" => $request["nama_pasien"],
            "dokter_id" => $request["nama_dokter"],
            "jadwal_id" => '2020-20-12',
            "tanggal_rm" => $request["tanggal_rm"],
            "keluhan" => $request["keluhan"],
            "diagnosa" => $request["diagnosa"],
            "tindakan" => $request["tindakan"],
            "catatan" => $request["catatan"],
            "obat" => $request["obat"],
        ]);

        return response()->json("sukses");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\RekamMedis  $rekamMedis
     * @return \Illuminate\Http\Response
     */
    public function show(RekamMedis $rekamMedis)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\RekamMedis  $rekamMedis
     * @return \Illuminate\Http\Response
     */
    public function edit(RekamMedis $rekamMedis)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\RekamMedis  $rekamMedis
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RekamMedis $rekamMedis)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\RekamMedis  $rekamMedis
     * @return \Illuminate\Http\Response
     */
    public function destroy(RekamMedis $rekamMedis)
    {
        //
    }
}
