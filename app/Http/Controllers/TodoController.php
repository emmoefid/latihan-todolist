<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TodoController extends Controller
{
    // public function tampilTugas() {
    //     $dataTodo = DB::table('tb_todo')->join('tb_pegawai', 'tb_todo.tugas_dari', '=', 'tb_pegawai.id')
    //     ->select(
    //         'tb_pegawai.id',
    //         'tb_todo.id',
    //         'tb_todo.tugas',
    //         'tb_todo.waktu_mulai',
    //         'tb_todo.waktu_selesai',
    //         'tb_pegawai.nama as tugas_dari',
    //         'tb_todo.tugas_untuk',
    //         'tb_todo.keterangan'
    //     )
    //     ->get();

    //     return view('pengguna.index', [
    //         'dataTodo' => $dataTodo
    //     ]);
    // }

    public function detailTugas($id) {
        // $tugas = DB::table( 'tb_todo' )
        // ->where( 'id', $id )
        // // ->first()
        // ->get();

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

        return view( 'pengguna.detailTugas', [
            'detailTodo' => $tugas
        ]);
    }

    // method untuk menghapus tugas
    public function hapusTugas($id) {
        DB::table('tb_todo') // Menghapus data berdasarkan id terpilih
        ->where('id', $id)
        ->delete();

        $dataTodo = DB::table('tb_todo') // Mengambil data untuk dikirim ke view index
        ->get();

        return view('pengguna.index', [
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
        return view('pengguna.tambahTugas', [
            'pemberiTugass' => $pemberiTugass,
            'pelaksanaTugass' => $pelaksanaTugass
        ]);
    }

    // method untuk simpan tugas
    public function simpanTugas(Request $request) {
        DB::table('tb_todo') //simpan dalam database
        ->insert([
            'tugas' => $request->tugas,
            'waktu_mulai' => $request->waktu_mulai,
            'waktu_selesai' => $request->waktu_selesai,
            'tugas_dari'=> $request->tugas_dari,
            'tugas_untuk'=> $request->tugas_untuk,
            'keterangan' => $request->keterangan 
        ]);

        return view( 'pengguna.index', [
            'dataTodo' => DB::table('tb_todo')->join('tb_pegawai', 'tb_todo.tugas_dari', '=', 'tb_pegawai.id')
            ->select(
                'tb_pegawai.id',
                'tb_todo.id',
                'tb_todo.tugas',
                'tb_todo.waktu_mulai',
                'tb_todo.waktu_selesai',
                'tb_pegawai.nama as tugas_dari',
                'tb_todo.tugas_untuk',
                'tb_todo.keterangan'
            )
            ->get()
        ]);
    }

    public function ubahTugas(Request $request, $id) {
        $dataTodo = DB::table('tb_todo')
                    ->where('id','=', $id)
                    ->first();
        // DB::table('tb_todo')
        // ->where('id','=', $id)
        // ->update([
        //     'tugas' => $request->tugas,
        //     'waktu_mulai' => $request->waktu_mulai,
        //     'waktu_selesai' => $request->waktu_selesai,
        //     'tugas_dari'=> $request->tugas_dari,
        //     'tugas_untuk'=> $request->tugas_untuk,
        //     'keterangan' => $request->keterangan 
        // ]);
        $pemberiTugass = DB::table('tb_pegawai')
                        ->where('jabatan','=', 'ceo')
                        ->orWhere('jabatan','=', 'admin')
                        ->get();
        $pelaksanaTugass = DB::table('tb_pegawai')
                        ->where('jabatan','=', 'pelaksana')
                        ->get();
        
        return view('pengguna.ubahTugas', [
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
            'keterangan' => $request->keterangan 
        ]);

        return redirect('/pengguna/index');
    }
}