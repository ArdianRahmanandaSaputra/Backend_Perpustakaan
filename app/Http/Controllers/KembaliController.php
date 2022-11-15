<?php

namespace App\Http\Controllers;

use App\Models\Kembali;
use Illuminate\Http\Request;

class KembaliController extends Controller
{
    public function index()
    {
        $kembali = Kembali::all();
        return $kembali;
    }

    public function create(Request $request)
    {
        $data = [
            'no_transaksi' => $request->no_transaksi,
            'judul_buku' => $request->judul_buku,
            'id_anggota' => $request->id_anggota,
            'tanggal_kembali' => $request->tanggal_kembali,
            'tanggal_kembali_sebenarnya' => $request->tanggal_kembali_sebenarnya,
            'denda' => $request->denda,
        ];

        Kembali::create($data);

        return response('sukses', 201);
    }
}
