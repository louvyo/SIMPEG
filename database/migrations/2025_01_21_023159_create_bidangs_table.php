<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBidangsTable extends Migration
{
    public function up()
    {
        Schema::create('bidangs', function (Blueprint $table) {
            $table->id();
            $table->string('nama_bidang');
            $table->string('kode_bidang')->unique();
            $table->text('deskripsi')->nullable();
            $table->enum('status', ['Aktif', 'Non-Aktif'])->default('Aktif');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('bidangs');
    }
}
