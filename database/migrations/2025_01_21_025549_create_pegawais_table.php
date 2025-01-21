<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePegawaisTable extends Migration
{
    public function up()
    {
        Schema::create('pegawais', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('nip')->unique();
            $table->string('email')->unique();
            $table->foreignId('bidang_id')
                ->nullable()
                ->constrained('bidangs')
                ->onDelete('set null');
            $table->string('jabatan');
            $table->date('tanggal_masuk');
            $table->enum('status', ['Aktif', 'Cuti', 'Non-Aktif'])->default('Aktif');
            $table->string('avatar')->nullable();
            $table->string('no_telepon')->nullable();
            $table->enum('jenis_kelamin', ['Laki-laki', 'Perempuan']);
            $table->string('tempat_lahir')->nullable();
            $table->date('tanggal_lahir')->nullable();
            $table->text('alamat')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('pegawais');
    }
}
