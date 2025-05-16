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
    $jumlahProdi = Prodi::count();
    $jumlahMahasiswa = Mahasiswa::count();
    $prodis = Prodi::all();
    $jumlahMahasiswaPerProdi = Mahasiswa::select('nama_prodi', DB::raw('count(*) as total'))
        ->groupBy('nama_prodi')
        ->orderByDesc('total')
        ->get();

    $categories = $jumlahMahasiswaPerProdi->pluck('nama_prodi')->toArray();

    $data = $jumlahMahasiswaPerProdi->pluck('total')->toArray();
    
    return view('dashboard', compact('jumlahProdi', 'jumlahMahasiswa', 'prodis', 'categories', 'data'));
});

Route::resource('mahasiswa', MahasiswaController::class);
Route::resource('prodi', ProdiController::class);