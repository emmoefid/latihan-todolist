<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Todo;

class TodoPelaksanaController extends Controller
{
    public function detailTugas($id) {
        $tugas = DB::table('tb_todo')
                    ->join('tb_pegawai as pemberi', 'tb_todo.tugas_dari', '=', 'pemberi.id')
                    ->join('tb_pegawai as penerima', 'tb_todo.tugas_untuk', '=', 'penerima.id')
                    ->select(
                        'tb_todo.id',
                        'tb_todo.tugas',
                        'tb_todo.waktu_mulai',
                        'tb_todo.waktu_selesai',
                        'pemberi.nama as tugas_dari',
                        'penerima.nama as tugas_untuk',
                        'tb_todo.keterangan',
                        'tb_todo.status'
                    )
                    ->where('tb_todo.id', $id)
                    ->first();

        return view( 'pelaksana.detail-tugas', [
            'detailTodo' => $tugas
        ]);
    }

    public function ubahStatus(Request $request, $id)
    {
        DB::table('tb_todo')->where('id', $id)->update([
            'status' => $request->status
        ]);
        return redirect()->back()->with('success', 'Status berhasil diubah!');
    }
}
