<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use Illuminate\Http\Request;

class BukuController extends Controller
{
    public function index()
    {
        $buku = Buku::all();
        return $buku;
    }
    
    public function delete($id)
    {
        Buku::where('id', $id)->delete();
    }

    public function update(Request $request, Buku $buku)
    {
        $msg = $buku->update([
            'judul_buku' => $request->judul_buku,
            'jenis_buku' => $request->jenis_buku,
            'pengarang' => $request->pengarang,
            'penerbit' => $request->penerbit,
            'thn_terbit' => $request->thn_terbit,
            'status' => $request->status,
        ]);

        return response()->json($msg);
    }

    public function show(Buku $buku)
    {
        return $buku;
    }


    public function create(Request $request)
    {
        $data = [
            'judul_buku' => $request->judul_buku,
            'jenis_buku' => $request->jenis_buku,
            'pengarang' => $request->pengarang,
            'penerbit' => $request->penerbit,
            'thn_terbit' => $request->thn_terbit,
            'status' => $request->status,
        ];

        Buku::create($data);

        return response('sukses', 201);
    }
}
