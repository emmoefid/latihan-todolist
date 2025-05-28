<?php

use App\Http\Controllers\PenggunaController;
use App\Http\Controllers\TodoController;
use Illuminate\Support\Facades\Route;


/* Route::get('/', function () {
    return view('welcome');
});

/* Route::get('/admin', function () {
    return view('admin.dashboard');
});

Route::get('/ceo', function () {
    return view('Ceo.dashboard');
}); */ 

// Route awal membuka web
Route::get('/', function () {
    return view('welcome1');
});

//untuk proses login
Route::get('pengguna/login', [PenggunaController::class, 'prosesLogin']);

// untuk menampilkan detail todo
Route::get('/tugas/detailTugas/{id}', [TodoController::class, 'detailTugas']);

// untuk menghapus data (tugas)
Route::get('/tugas/hapusTugas/{id}', [TodoController::class, 'hapusTugas']);

// untuk menampilkan menambah tugas
Route::get('/tugas/tambahTugas', [TodoController::class, 'tambahTugas']);

// simpan ke database.
Route::post('/tugas/tambahTugasBaru', [TodoController::class, 'simpanTugas']);

// kembali ke halaman utama
Route::get('pengguna/index', [PenggunaController::class, 'prosesLogin']);

// untuk mengubah todo
Route::get('/tugas/ubahTugas/{id}', [TodoController::class, 'ubahTugas']);

// untuk menyimpan perubahan pada tugas
Route::post('/tugas/simpanUbahTugas/{id}', [TodoController::class, 'simpanUbahTugas']);


?>
