<?php

namespace App\Http\Controllers\Dokter;

use App\Models\RekamMedis;
use App\Models\Obat;
use App\Models\Pasien;
use App\Models\Tagihan;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Http\Controllers\Controller;

class RekamMedikDokterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $obats = Obat::all();
        $rekamMedis = RekamMedis::get();
        // foreach ($rekamMedis as $rm) {
        //     dd($rm->obat->pluck('nama_obat'));
        // }
        $data = RekamMedis::get();
        if($request->ajax()){
            return DataTables::of($data)
            ->addColumn('action', function ($data) {
                $button = '<button type="button" id="'.$data->id.'" class="edit btn btn-mini btn-info shadow-sm">Edit</button>';
                $button .= '&nbsp;&nbsp;&nbsp;<button type="button" id="'.$data->id.'" class="delete btn btn-mini btn-danger shadow-sm">Delete</button>';
                return $button;
            })
            ->editColumn('pasien_id', function ($data) {
                return $data->name;
            })
            ->editColumn('dokter_id', function ($data) {
                return auth()->user()->name;
            })
            ->addColumn('obat', function ($data) {
                // foreach ($data as $dt) {
                // for ($i=0; $i <= count($data->obat->pluck('nama_obat')); $i++) { 
                //     return count($data->obat->pluck('nama_obat'));
                // }

                $ul = '<ul>';

                foreach ($data->obat->pluck('nama_obat') as $value) {
                    $ul .= '<li>'.$value.'</li>';
                }

                $ul .= '</ul>';

                return $ul;
                   
                // }
            })
            ->addIndexColumn()
            ->rawColumns(['obat', 'action'])
            ->make(true);
        }
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
        // dd($request);

        // RekamMedis::create([
        //     'pasien_id' => $request['nama_pasien'],
        // ]);

        $rekamMedis = RekamMedis::create([
            'pasien_id' => $data['nama_pasien'],
            'dokter_id' => auth()->user()->id,
            'keluhan' => $data['keluhan'],
            'diagnosa' => $data['diagnosa'],
            'tindakan' => $data['tindakan'],
            'catatan' => $data['catatan'],
        ]);

        $total = 0;

        foreach ($request->obat as $obat) {
            $obat = Obat::findOrFail($obat);
            $total += (float)$obat->harga;
            $rekamMedis->obat()->attach($obat);
        }
        
        $tagihan = Tagihan::create([
            'pasien_id' => $data['nama_pasien'],
            'nama_dokter' => auth()->user()->id,
            'judul_tagihan' => $data['keluhan'],
            'total_tagihan' => $total,
            'catatan' => $data['catatan'],
        ]);
        
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
                'id'                    => $data->id,
                'pasien_id'             => $data->pasien_id,
                'dokter_id'             => auth()->user()->name,
                'keluhan'               => $data->keluhan,
                'diagnosa'              => $data->diagnosa,
                'tindakan'              => $data->tindakan,
                'obat'                  => $data->obat,
                'catatan'               => $data->catatan,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\RekamMedis  $rekamMedis
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $data = $request->all();

        RekamMedis::whereId($request->input('hidden_id'))->update([
            'pasien_id' => $data['nama_pasien'],
            'dokter_id' => auth()->user()->id,
            'keluhan' => $data['keluhan'],
            'diagnosa' => $data['diagnosa'],
            'tindakan' => $data['tindakan'],
            'catatan' => $data['catatan'],
        ]);

        $rekamMedis = RekamMedis::find($request->input('hidden_id'));
        // dd($pemilihan);

        $rekamMedis->obat()->detach();

        foreach ($request->obat as $obat) {
            $rekamMedis->obat()->attach($obat);
        }

        return response()
           ->json([
               'success' => 'Data berhasil diubah.',
        ]);
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
        $rm->obat()->detach();
        $rm->delete();
    }
}
