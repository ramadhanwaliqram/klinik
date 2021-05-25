<?php

namespace App\Http\Controllers\Dokter;

use App\Models\{RekamMedis, Pasien, Obat};
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
        $obats = Obat::all();
        $pasiens = Pasien::join('users', 'users.id', 'pasiens.user_id')->get();
        // dd($pasiens);
        return view('dokter.rekam_medik.rekammedik', ['pasiens' => $pasiens, 'obats' => $obats]);
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
        $data = $request->all();
        // dd($data);

        foreach ($request->obat as $obat) {
            $obat = collect($data['obat']);
            RekamMedis::create([
                "pasien_id" => $data["nama_pasien"],
                "dokter_id" => auth()->user()->id,
                "tanggal_rm" => $data["tanggal_rm"],
                "keluhan" => $data["keluhan"],
                "diagnosa" => $data["diagnosa"],
                "tindakan" => $data["tindakan"],
                "catatan" => $data["catatan"],
                "obat" => $obat,
            ]);
        }


        return response()
           ->json([
               'success' => 'Data berhasil ditambah.',
        ]);
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
    public function edit($id)
    {
        $data = RekamMedis::find($id);

        return response()
            ->json([
                'pasien_id'             => $data->pasien_id,
                'petugas'             => $data->nama_obat,
                'stok'                  => $data->stok,
                'jenis'                 => $data->jenis,
                'harga'                 => $data->harga,
                'tanggal_kadaluarsa'    => $data->tanggal_kadaluarsa,
        ]);
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
    public function destroy($id)
    {
        $rm = RekamMedis::find($id);
        $rm->delete();
    }
}
