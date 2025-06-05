<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TodoPelaksanaController extends Controller
{
    public function detailTugas($id) {
        $tugas = DB::table('tb_todo')
                    ->join('tb_pegawai as pengirim', 'tb_todo.tugas_dari', '=', 'pengirim.id')
                    ->join('tb_pegawai as penerima', 'tb_todo.tugas_untuk', '=', 'penerima.id')
                    ->select(
                        'tb_todo.id',
                        'tb_todo.tugas',
                        'tb_todo.waktu_mulai',
                        'tb_todo.waktu_selesai',
                        'pengirim.nama as tugas_dari',
                        'penerima.nama as tugas_untuk',
                        'tb_todo.keterangan'
                    )
                    ->first();

        return view( 'admin.detail-tugas', [
            'detailTodo' => $tugas
        ]);
    }
}
