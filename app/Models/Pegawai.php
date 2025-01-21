<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Str;

class Pegawai extends Model
{
    use HasFactory;

    // Nama tabel custom
    protected $table = 'pegawais';

    // Field yang bisa diisi
    protected $fillable = [
        'nama',
        'nip',
        'email',
        'bidang_id',
        'jabatan',
        'tanggal_masuk',
        'status',
        'avatar',
        'no_telepon',
        'jenis_kelamin',
        'tempat_lahir',
        'tanggal_lahir',
        'alamat'
    ];

    // Casting untuk tanggal
    protected $dates = [
        'tanggal_masuk',
        'tanggal_lahir'
    ];

    // Relasi dengan Bidang
    public function bidang()
    {
        return $this->belongsTo(Bidang::class, 'bidang_id');
    }

    // Accessor untuk nama lengkap
    public function getNamaLengkapAttribute()
    {
        return $this->nama;
    }

    // Accessor untuk avatar
    public function getAvatarUrlAttribute()
    {
        return $this->avatar
            ? asset('storage/' . $this->avatar)
            : asset('images/profile/default-avatar.jpg');
    }

    // Mutator untuk generate NIP otomatis
    public function setNipAttribute($value)
    {
        // Jika NIP kosong, generate otomatis
        $this->attributes['nip'] = $value ?: $this->generateNIP();
    }

    // Generate NIP otomatis
    protected function generateNIP()
    {
        // Format: BIDANG-TAHUN-URUTAN
        $bidangKode = $this->bidang ? $this->bidang->kode_bidang : '00';
        $tahun = date('Y');
        $urutan = str_pad(
            self::where('bidang_id', $this->bidang_id)
                ->whereYear('created_at', $tahun)
                ->count() + 1,
            4,
            '0',
            STR_PAD_LEFT
        );

        return "{$bidangKode}-{$tahun}-{$urutan}";
    }

    // Scope untuk filter status
    public function scopeAktif($query)
    {
        return $query->where('status', 'Aktif');
    }

    // Method untuk mengecek status
    public function isAktif()
    {
        return $this->status === 'Aktif';
    }

    // Static method untuk dropdown
    public static function dropdownList()
    {
        return self::aktif()->pluck('nama', 'id');
    }

    // Scope untuk pencarian
    public function scopeFilter($query, $filters)
    {
        $query->when($filters['search'] ?? null, function ($query, $search) {
            $query->where(function ($query) use ($search) {
                $query->where('nama', 'like', '%' . $search . '%')
                    ->orWhere('nip', 'like', '%' . $search . '%')
                    ->orWhere('email', 'like', '%' . $search . '%');
            });
        })->when($filters['bidang'] ?? null, function ($query, $bidang) {
            $query->where('bidang_id', $bidang);
        })->when($filters['status'] ?? null, function ($query, $status) {
            $query->where('status', $status);
        });
    }
}
