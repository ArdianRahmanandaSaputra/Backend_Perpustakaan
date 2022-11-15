<?php

use App\Http\Controllers\BukuController;
use App\Http\Controllers\PinjamController;
use App\Http\Controllers\AnggotaController;
use App\Http\Controllers\KembaliController;
use App\Models\Buku;
use App\Models\Pinjam;
use App\Models\Anggota;
use App\Models\Kembali;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\LoginController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/buku', [BukuController::class, 'index']);
Route::get('/buku/{id}', [BukuController::class, 'delete']);
Route::get('/bukushow/{buku}', [BukuController::class, 'show']);
Route::post('/buku', [BukuController::class, 'create']);
Route::put('/buku/{buku}', [BukuController::class, 'update']);

Route::get('/pinjam', [PinjamController::class, 'index']);
Route::get('/pinjam/{id}', [PinjamController::class, 'delete']);
Route::get('/pinjamshow/{pinjam}', [PinjamController::class, 'show']);
Route::post('/pinjam', [PinjamController::class, 'create']);
Route::put('/pinjam/{pinjam}', [PinjamController::class, 'update']);

Route::get('/anggota', [AnggotaController::class, 'index']);
Route::get('/anggota/{id}', [AnggotaController::class, 'delete']);
Route::get('/anggotashow/{anggota}', [AnggotaController::class, 'show']);
Route::post('/anggota', [AnggotaController::class, 'create']);
Route::put('/anggota/{anggota}', [AnggotaController::class, 'update']);

Route::post('/login', [LoginController::class, 'index']);
Route::get('/logout', [LoginController::class,'logout']);

Route::post('/kembali', [KembaliController::class, 'create']);
Route::get('/kembali', [KembaliController::class, 'index']);