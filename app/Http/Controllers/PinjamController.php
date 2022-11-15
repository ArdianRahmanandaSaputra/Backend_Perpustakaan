<?php

namespace App\Http\Controllers;

use App\Models\Pinjam;
use Illuminate\Http\Request;

class PinjamController extends Controller
{   
    public function index()
    {
        $pinjam = Pinjam::Where('Status', 'Pinjam')->get();
        return $pinjam;
    }

    public function delete($id)
    {
        Pinjam::where('id', $id)->delete();
    }

    public function update(Request $request, Pinjam $pinjam)
    {
        $msg = $pinjam->update([
            'no_transaksi' => $request->no_transaksi,
            'judul_buku' => $request->judul_buku,
            'id_anggota' => $request->id_anggota,
        ]);

        return response()->json($msg);
    }

    public function show(Pinjam $pinjam)
    {
        return $pinjam;
    }

    public function create(Request $request)
    {
        $data = [
            'no_transaksi' => $request->no_transaksi,
            'judul_buku' => $request->judul_buku,
            'id_anggota' => $request->id_anggota,
            'tanggal_pinjam' => $request->tanggal_pinjam,
            'tanggal_kembali' => $request->tanggal_kembali,
            'status' => $request->status,
        ];

        Pinjam::create($data);

        return response('sukses', 201);
    }
}
