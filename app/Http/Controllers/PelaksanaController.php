<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PelaksanaController extends Controller
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
                'tb_todo.keterangan'
            )
            ->get();
        return view('pelaksana.index', [
            'dataTodo' => $todo
        ]);
    }
}
