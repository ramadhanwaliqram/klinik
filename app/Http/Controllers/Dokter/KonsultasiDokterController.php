<?php

namespace App\Http\Controllers\Dokter;

use App\Models\{Konsultasi,Dokter,Pasien};
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class KonsultasiDokterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $userList = DB::table('konsultasis')
                    ->select("pasien_id")
                    ->distinct()
                    ->where("dokter_id", $user->dokter->id)
                    ->get();
        return view('dokter.konsultasi-dokter.konsultasi-dokter', ["userList"=>$userList]);
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
    public function store(Request $request, $pasien_id) {
        Konsultasi::create([
            'text'      => $request['text'],
            'dokter_id' => auth()->user()->id,
            'pasien_id' => $pasien_id,
            "from" => "dokter"
        ]);

        return response()
            ->json([
                'success' => true,
                "text" => $request["text"]
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Konsultasi  $konsultasi
     * @return \Illuminate\Http\Response
     */
    public function show($pasien_id)
    {
        $konsultasi = Konsultasi::where("dokter_id", Auth::user()->dokter->id)->where("pasien_id", $pasien_id)->get();
        return response()->json($konsultasi);
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
