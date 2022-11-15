<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use Illuminate\Http\Request;

class AnggotaController extends Controller
{
    public function index()
    {
        $anggota = Anggota::all();
        return $anggota;
    }

    public function delete($id)
    {
        Anggota::where('id', $id)->delete();
    }

    public function update(Request $request, Anggota $anggota)
    {
        $msg = $anggota->update([
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'telp' => $request->telp,
            'status' => $request->status,
        ]);

        return response()->json($msg);
    }

    public function show(Anggota $anggota)
    {
        return $anggota;
    }

    public function create(Request $request)
    {
        $data = [
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'telp' => $request->telp,
            'status' => $request->status,
        ];

        Anggota::create($data);

        return response('sukses', 201);
    }
}
