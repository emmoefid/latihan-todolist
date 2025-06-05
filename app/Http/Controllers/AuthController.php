<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Login;
use Illuminate\Support\Facades\Session;


class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $login = DB::table('tb_login')
    ->join('tb_pegawai', 'tb_login.nama', '=', 'tb_pegawai.nama')
    ->where(function ($query) use ($request) {
        $query->where('tb_login.nama', $request->username)
              ->orWhere('tb_pegawai.email', $request->username);
    })
    ->select('tb_login.*', 'tb_pegawai.email', 'tb_pegawai.jabatan')
    ->first();

        if ($login && $request->password === $login->kata_sandi) {
            Session::put('loginId', $login->id);
            Session::put('jabatan', $login->jabatan);

            switch ($login->jabatan) {
                case 'admin':
                    return redirect('/admin/index');
                case 'ceo':
                    return redirect('/ceo/index');
                case 'pelaksana':
                    return redirect('/pelaksana/halaman-pelaksana');
            }
        }

        return back()->with('error', 'Username atau Password salah');
    }

    public function logout()
    {
        Session::flush();
        return redirect('/login');
    }
}
