<?php

namespace App\Http\Controllers\Admin;

use App\Models\Dokter;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DokterController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = User::create([
            "username" => $request["username"],
            "password" => bcrypt($request["password"]),
             "name" => $request["nama"],
             "email" => $request["email"],
             "no_phone" => $request["no-telp"],
             "role" => "dokter",
             "status" => "aktif"
        ]);

        $dokter = Dokter::create([
            "user_id" => $user->id,
            "tanggal_lahir" => $request["tanggal-lahir"],
            "jenis_kelamin" => $request["gender"],
            "spesialis" => $request["spesialis"],
            "alamat" => $request["alamat"],
        ]);

        return response()->json("sukses");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Dokter  $dokter
     * @return \Illuminate\Http\Response
     */
    public function show(Dokter $dokter)
    {
        //
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Dokter  $dokter
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Dokter $dokter)
    {
        return response()->json(["update" => "ok"]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Dokter  $dokter
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        return response()->json(["destroy" => "ok"]);
    }
}
