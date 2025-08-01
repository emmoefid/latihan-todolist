<?php

use App\Http\Controllers\CeoController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PelaksanaController;
use App\Http\Controllers\TodoCeoController;
use App\Http\Controllers\TodoAdminController;
use App\Http\Controllers\TodoPelaksanaController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

// route awal
/* Route::get('/', function () {
    return view('welcome');
}); */

// PELAKSANA
//proses login
Route::get('/pelaksana/halaman-pelaksana', [PelaksanaController::class, 'prosesLogin']);
// menampilkan detail todo
Route::get('/pelaksana/detail-tugas/{id}', [TodoPelaksanaController::class, 'detailTugas']);
// ubah status tugas
Route::post('/pelaksana/ubah-status/{id}', [TodoPelaksanaController::class, 'ubahStatus']);


// ADMIN
// proses login admin
Route::get('/admin/halaman-admin', [AdminController::class, 'prosesLogin']);
// tambah tugas
Route::get('/admin/tambah-tugas', [TodoAdminController::class, 'tambahTugas']);
// simpan tugas baru
Route::post('/admin/tambah-tugas-baru', [TodoAdminController::class, 'simpanTugas']);
// detail tugas
Route::get('/admin/detail-tugas/{id}', [TodoAdminController::class, 'detailTugas']);
// hapus tugas
Route::get('/admin/hapus-tugas/{id}', [TodoAdminController::class, 'hapusTugas']);
// ubah tugas
Route::get('/admin/ubah-tugas/{id}', [TodoAdminController::class, 'ubahTugas']);
// simpan perubahan tugas
Route::post('/admin/simpan-ubah-tugas/{id}', [TodoAdminController::class, 'simpanUbahTugas']);
// tambah akun baru
Route::get('/admin/tambah-akun', [AdminController::class, 'tambahAkun']);
// simpan akun baru
Route::post('/admin/simpan-akun-baru', [AdminController::class, 'simpanAkunBaru'])->name('simpan-akun-baru');

// CEO
// proses login ceo
Route::get('/ceo/halaman-ceo', [CeoController::class, 'prosesLogin']);
// tambah tugas
Route::get('/ceo/tambah-tugas', [TodoCeoController::class, 'tambahTugas']);
// simpan tugas baru
Route::post('/ceo/tambah-tugas-baru', [TodoCeoController::class, 'simpanTugas']);
// kembali ke halaman ceo
Route::get('/ceo/index', [CeoController::class, 'prosesLogin']);
// detail tugas
Route::get('/ceo/detail-tugas/{id}', [TodoCeoController::class, 'detailTugas']);
// hapus tugas
Route::get('/ceo/hapus-tugas/{id}', [TodoCeoController::class, 'hapusTugas']);
// ubah tugas
Route::get('/ceo/ubah-tugas/{id}', [TodoCeoController::class, 'ubahTugas']);
// simpan perubahan tugas
Route::post('/ceo/simpan-ubah-tugas/{id}', [TodoCeoController::class, 'simpanUbahTugas']);

// AUTHENTICATION
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// DASHBOARD
Route::get('/admin/dashboard', function () {
    return view('admin.dashboard');
});


?>
