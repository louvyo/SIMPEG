<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Bidang extends Model
{
    use HasFactory;

    // Nama tabel custom jika diperlukan
    protected $table = 'bidangs';

    // Field yang bisa diisi
    protected $fillable = [
        'nama_bidang',
        'kode_bidang',
        'deskripsi',
        'status'
    ];

    // Relasi dengan Pegawai
    public function pegawai()
    {
        return $this->hasMany(Pegawai::class, 'bidang_id');
    }

    // Scope untuk filter aktif
    public function scopeAktif($query)
    {
        return $query->where('status', 'Aktif');
    }

    // Accessor untuk nama bidang terformat
    public function getNamaBidangFormattedAttribute()
    {
        return "Bidang " . $this->nama_bidang;
    }

    // Static method untuk dropdown
    public static function dropdownList()
    {
        return self::aktif()->pluck('nama_bidang', 'id');
    }
}