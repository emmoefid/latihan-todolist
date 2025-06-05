<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Login extends Model
{
    protected $table = 'tb_login';

    protected $fillable = [
        'nama', 'email', 'kata_sandi', 'jabatan',
    ];

    protected $hidden = [
        'kata_sandi',
    ];

    public $timestamps = true;
}
