<?php

namespace App\Http\Controllers\Admin;

use App\Models\Dokter;
use App\Models\Jadwal;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\DataTables;
use Validator;

class DataJadwalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //

        $dokter = Dokter::select('dokters.id', 'users.name')->join('users', 'users.id', 'dokters.user_id')->get();

       
        if ($request->ajax()) {
            $data = Jadwal::select('jadwals.id','users.name','users.no_phone','jadwals.tanggal_jadwal', 'jadwals.jam','jadwals.keterangan')
            ->join('dokters', 'dokters.id', 'jadwals.dokter_id')->join('users', 'users.id', 'dokters.user_id')->get();
            return DataTables::of($data)
                ->addColumn('action', function ($data) {
                    $button = '<button type="button" id="' . $data->id . '" class="edit btn btn-mini btn-info shadow-sm">Edit</button>';
                    $button .= '&nbsp;&nbsp;&nbsp;<button type="button" id="' . $data->id . '" class="delete btn btn-mini btn-danger shadow-sm">Delete</button>';
                    return $button;
                })
                ->rawColumns(['action'])
                ->addIndexColumn()
                ->make(true);
        }
        return view('admin.jadwal.jadwal', compact('dokter'));
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
        
                Jadwal::create([
                    'dokter_id' => $request->name,
                    'nama_jadwal' => $request->nama_jadwal,
                    'hari' => "Senin",
                    'jam' => $request->jam,
                    'keterangan' => $request->keterangan,
                    'tanggal_jadwal' => $request->tanggal_jadwal,
                ]);
               
        
                return response()
                    ->json([
                        'success' => 'Data Added.',
                    ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Jadwal  $jadwal
     * @return \Illuminate\Http\Response
     */
    public function show(Jadwal $jadwal)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Jadwal  $jadwal
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Jadwal::select('jadwals.nama_jadwal','jadwals.id','dokters.id as dok_id','users.name','users.no_phone','jadwals.tanggal_jadwal', 'jadwals.jam','jadwals.keterangan')
            ->join('dokters', 'dokters.id', 'jadwals.dokter_id')->join('users', 'users.id', 'dokters.user_id')->get();

        return response()
            ->json([
                'data' => $data,
            ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Jadwal  $jadwal
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
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
        
                Jadwal::where('id', $request->hidden_id)->update([
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
     * @param  \App\Models\Jadwal  $jadwal
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $pesan = Jadwal::find($id);
        $pesan->delete();
    }
}
