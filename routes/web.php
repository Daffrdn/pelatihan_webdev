<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdiController;
use App\Http\Controllers\MahasiswaController;
use App\Models\Prodi;
use App\Models\Mahasiswa;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {

    $jumlahProdi      = Prodi::count();
    $jumlahMahasiswa  = Mahasiswa::count();

    /* ── Ambil jumlah mahasiswa per prodi + nama prodi ── */
    $jumlahMahasiswaPerProdi = Mahasiswa::select('prodis.nama_prodi as nama_prodi', DB::raw('COUNT(*) AS total'))
    ->join('prodis', 'prodis.id', '=', 'mahasiswas.prodi_id')
    ->groupBy('prodi_id', 'prodis.nama_prodi')
    ->orderByDesc('total')
    ->get();


    /* ── Siapkan data untuk ApexCharts ── */
    $categories = $jumlahMahasiswaPerProdi->pluck('nama_prodi')->toArray(); // ← nama prodi
    $data       = $jumlahMahasiswaPerProdi->pluck('total')->toArray();      // ← jumlah

    return view('dashboard', compact(
        'jumlahProdi',
        'jumlahMahasiswa',
        'categories',
        'data'
    ));
});

Route::resource('mahasiswa', MahasiswaController::class);
Route::resource('prodi', ProdiController::class);