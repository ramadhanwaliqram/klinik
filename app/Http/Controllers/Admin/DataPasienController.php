<?php

namespace App\Http\Controllers\Admin;

use App\Models\Pasien;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\DataTables;
use Validator;
use App\User;

class DataPasienController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //  
          
        if ($request->ajax()) {
            $data = Pasien::join('users', 'users.id','pasiens.user_id')->where('role', 'pasien')->get();
            return DataTables::of($data)
                ->addColumn('action', function ($data) {
                    $button = '&nbsp;&nbsp;&nbsp;<button type="button" id="' . $data->id . '" class="delete btn btn-mini btn-danger shadow-sm">Delete</button>';
                    return $button;
                })
                ->rawColumns(['action'])
                ->addIndexColumn()
                ->make(true);
        }
        return view('admin.pasien');
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pasien  $pasien
     * @return \Illuminate\Http\Response
     */
    public function show(Pasien $pasien)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pasien  $pasien
     * @return \Illuminate\Http\Response
     */
    public function edit(Pasien $pasien)
    {
        //
        $data = Pasien::join('users', 'users.id','pasiens.user_id')->where('role', 'pasien')->get();

        return response()
        ->json([
            'data' => $data,    
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pasien  $pasien
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pasien $pasien)
    {
        //
           // validasi
           $rules = [
            'name'  => 'required',
            'nama_jadwal' => 'required',
            'jam' => 'required',
            'tanggal_jadwal' => 'required',
            'keterangan' => 'required',

        ];


        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return response()
                ->json([
                    'errors' => $validator->errors()->all()
                ]);
        }

        Pasien::where('id', $request->hidden_id)->update([
            'dokter_id' => $request->name,
            'nama_jadwal' => $request->nama_jadwal,
            'hari' => "Senin",
            'jam' => $request->jam,
            'keterangan' => $request->keterangan,
            'tanggal_jadwal' => $request->tanggal_jadwal,
        ]);
       

        return response()
            ->json([
                'success' => 'Data updated.',
            ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pasien  $pasien
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
          //
          
          $pasien = User::find($id);
          $pasien->delete();
    }
}
