<?php

namespace App\Http\Controllers\Admin;

use App\Models\Obat;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\DataTables;


class DataObatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = Obat::all();
        if($request->ajax()){
            return DataTables::of($data)
            ->addColumn('action', function ($data) {
                $button = '<button type="button" id="'.$data->id.'" class="edit btn btn-mini btn-info shadow-sm">Edit</button>';
                $button .= '&nbsp;&nbsp;&nbsp;<button type="button" id="'.$data->id.'" class="delete btn btn-mini btn-danger shadow-sm">Delete</button>';
                return $button;
            })
            ->addIndexColumn()
            ->make(true);
        }
        return view('admin.obat.obat');
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
        $obat = Obat::create([
            "nama_obat" => $request["nama_obat"],
            "stok" => $request["stok"],
            "jenis" => $request["jenis"],
            "harga" => $request["harga"],
            "tanggal_kadaluarsa" => $request["tanggal_kadaluarsa"],
        ]);

        return response()
           ->json([
               'success' => 'Data berhasil ditambah.',
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Obat  $obat
     * @return \Illuminate\Http\Response
     */
    public function show(Obat $obat)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Obat  $obat
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Obat::find($id);

        return response()
            ->json([
                'id'                    => $data->id,
                'nama_obat'             => $data->nama_obat,
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
     * @param  \App\Models\Obat  $obat
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        Obat::whereId($request->input('hidden_id'))->update([
            "nama_obat" => $request["nama_obat"],
            "stok" => $request["stok"],
            "jenis" => $request["jenis"],
            "harga" => $request["harga"],
            "tanggal_kadaluarsa" => $request["tanggal_kadaluarsa"],
        ]);

        return response()
           ->json([
               'success' => 'Data berhasil diupdate.',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Obat  $obat
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $obat = Obat::find($id);
        $obat->delete();
    }
}
