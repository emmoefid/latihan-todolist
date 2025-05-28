<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tb_pegawai', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('email')->unique();
            $table->string('no_hp');
            $table->string('jabatan');
            $table->timestamps();
        });

         Schema::create('tb_todo', function (Blueprint $table) {
            $table->id();
            $table->string('tugas');
            $table->time('waktu_mulai');
            $table->time('waktu_selesai');
            $table->foreignId('tugas_dari')->constrained('tb_pegawai')->onDelete('cascade');
            $table->foreignId('tugas_untuk')->constrained('tb_pegawai')->onDelete('cascade');
            $table->string('keterangan');
            $table->timestamps();
        });

        Schema::create('tb_login', function (Blueprint $table) {
            $table->foreignId('id')->constrained('tb_pegawai')->onDelete('cascade');
            $table->string('nama');
            $table->string('kata_sandi');
            $table->timestamps();
        });

        Schema::create('tb_hasil_tugas', function (Blueprint $table) {
            $table->foreignId('id')->constrained('tb_todo')->onDelete('cascade');
            $table->time('tanggal_pembaruan');
            $table->string('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('table');
    }
};
