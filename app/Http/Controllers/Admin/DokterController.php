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
    public function show($dokter_id)
    {
        $dokter = Dokter::find(["id" => $dokter_id])->first();
        $user = User::find(["id" => $dokter->user_id])->first();
        return response()->json(["dokter" => $dokter, "user" => $user]);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Dokter  $dokter
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $user = Dokter::where("id", $request["hidden_id"])->first();
        $dokter = Dokter::where("id", $request["hidden_id"])->update([
            "spesialis" => $request["spesialis"],
            "alamat" => $request["alamat"],
            "tanggal_lahir" => $request["tanggal-lahir"],
            "jenis_kelamin" => $request["gender"],
        ]);
        User::where("id", $user->user_id)->update([
            "name" => $request["nama"],
            "no_phone" => $request["no-telp"]
        ]);
        return response()->json(["success" => true]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Dokter  $dokter
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $dokter = Dokter::find(["id"=>$id])->first();
        User::where("id", $dokter->user_id)->delete();
        $dokter->delete();
        return response()->json(["success" => true]);
    }
}
