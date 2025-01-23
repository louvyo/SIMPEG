<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCutiTable extends Migration
{
    public function up()
    {
        Schema::create('cuti', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pegawai_id')->constrained('pegawais');
            $table->enum('jenis_cuti', [
                'Cuti Tahunan',
                'Cuti Besar',
                'Cuti Khusus',
                'Cuti Sakit',
                'Cuti Melahirkan'
            ]);
            $table->date('tanggal_mulai');
            $table->date('tanggal_selesai');
            $table->integer('jumlah_hari');
            $table->text('alasan')->nullable();
            $table->enum('status', [
                'Proses',
                'Disetujui',
                'Ditolak'
            ])->default('Proses');
            $table->string('dokumen_pendukung')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('cuti');
    }
}
