<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PenggunaController extends Controller
{
    function prosesLogin() {
        $todo = DB::table('tb_todo')->get();
        return view('pengguna.index', 
        [
            'dataTodo' => $todo
        ]);
    }
}
