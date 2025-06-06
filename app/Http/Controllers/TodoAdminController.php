<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TodoAdminController extends Controller
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

        return view( 'admin.detail-tugas', [
            'detailTodo' => $tugas
        ]);
    }

    // method untuk menghapus tugas
    public function hapusTugas($id) {
        DB::table('tb_todo') // Menghapus data berdasarkan id terpilih
        ->where('id', $id)
        ->delete();

        $dataTodo = DB::table('tb_todo') // Mengambil data untuk dikirim ke view index
            ->join('tb_pegawai as pemberi', 'tb_todo.tugas_dari', '=', 'pemberi.id')
            ->join('tb_pegawai as penerima', 'tb_todo.tugas_untuk', '=', 'penerima.id')
            ->select(
                'pemberi.id as id_pegawai',
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
            'dataTodo' => $dataTodo
        ]);
    }
    // method untuk menambah tugas
    public function tambahTugas() {
        $pemberiTugass = DB::table('tb_pegawai')
                        ->where('jabatan','=', 'ceo')
                        ->orWhere('jabatan','=', 'admin')
                        ->get();
        $pelaksanaTugass = DB::table('tb_pegawai')
                        ->where('jabatan','=', 'pelaksana')
                        ->get();
        return view('admin.tambah-tugas', [
            'pemberiTugass' => $pemberiTugass,
            'pelaksanaTugass' => $pelaksanaTugass
        ]);
    }

    // method untuk simpan tugas
    public function simpanTugas(Request $request) {
        DB::table('tb_todo')
            ->insert([
                'tugas' => $request->tugas,
                'waktu_mulai' => $request->waktu_mulai,
                'waktu_selesai' => $request->waktu_selesai,
                'tugas_dari'=> $request->tugas_dari,
                'tugas_untuk'=> $request->tugas_untuk,
                'keterangan' => $request->keterangan 
            ]);

        // Redirect ke halaman index admin setelah simpan
        return redirect('/admin/halaman-admin');
    }

    public function ubahTugas(Request $request, $id) {
        $dataTodo = DB::table('tb_todo')
                    ->where('id','=', $id)
                    ->first();
        
        $pemberiTugass = DB::table('tb_pegawai')
                        ->where('jabatan','=', 'ceo')
                        ->orWhere('jabatan','=', 'admin')
                        ->get();
        $pelaksanaTugass = DB::table('tb_pegawai')
                        ->where('jabatan','=', 'pelaksana')
                        ->get();
        
        return view('admin.ubah-tugas', [
            'pemberiTugass' => $pemberiTugass,
            'pelaksanaTugass' => $pelaksanaTugass,
            'dataTodo' => $dataTodo
        ]);
    }

    public function simpanUbahTugas(Request $request, $id) {
        DB::table('tb_todo')
        ->where('id','=', $id)
        ->update([
            'tugas' => $request->tugas,
            'waktu_mulai' => $request->waktu_mulai,
            'waktu_selesai' => $request->waktu_selesai,
            'tugas_dari'=> $request->tugas_dari,
            'tugas_untuk'=> $request->tugas_untuk,
            'keterangan' => $request->keterangan,
            'status' => $request->status
        ]);

        return redirect('/admin/halaman-admin');
    }
}
