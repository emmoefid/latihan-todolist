<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function prosesLogin() {
        $todo = DB::table('tb_todo')
            ->join('tb_pegawai as pemberi', 'tb_todo.tugas_dari', '=', 'pemberi.id')
            ->join('tb_pegawai as penerima', 'tb_todo.tugas_untuk', '=', 'penerima.id')
            ->select(
                'penerima.id as id_pegawai',
                'tb_todo.id as id_todo',
                'tb_todo.tugas',
                'tb_todo.waktu_mulai',
                'tb_todo.waktu_selesai',
                'pemberi.nama as tugas_dari',
                'penerima.nama as tugas_untuk',
                'tb_todo.keterangan',
                'tb_todo.status'
            )
            ->get();
        return view('admin.index', [
            'dataTodo' => $todo
        ]);
    }

    public function tambahAkun() {
        return view('admin.tambah-akun');
    }
    public function simpanAkunBaru(Request $request) {
        $request->validate([
            'nama' => 'required',
            'email' => 'required|email|unique:users,email',
            'jabatan' => 'required',
            'kata_sandi' => 'required|min:6',
            'no_hp' => 'required|numeric|min:10'
        ]);

        DB::table('tb_pegawai')->insert([
            'nama' => $request->nama,
            'email' => $request->email,
            'jabatan' => $request->jabatan,
            'no_hp' => $request->no_hp
        ]);

        DB::table('tb_login')->insert([
            'nama' => $request->nama,
            'kata_sandi' => $request->kata_sandi
        ]);

        return redirect('/admin/halaman-admin')->with('success', 'Akun berhasil ditambahkan');
    }
}
