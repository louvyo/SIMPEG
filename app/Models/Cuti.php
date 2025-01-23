<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;

class Cuti extends Model
{
    use SoftDeletes;

    protected $table = 'cuti';

    protected $fillable = [
        'pegawai_id',
        'jenis_cuti',
        'tanggal_mulai',
        'tanggal_selesai',
        'jumlah_hari',
        'alasan',
        'status',
        'dokumen_pendukung'
    ];

    protected $dates = [
        'tanggal_mulai',
        'tanggal_selesai'
    ];

    // Mutator untuk tanggal
    public function setTanggalMulaiAttribute($value)
    {
        $this->attributes['tanggal_mulai'] = is_string($value)
            ? Carbon::parse($value)->format('Y-m-d')
            : $value;
    }

    public function setTanggalSelesaiAttribute($value)
    {
        $this->attributes['tanggal_selesai'] = is_string($value)
            ? Carbon::parse($value)->format('Y-m-d')
            : $value;
    }

    // Relasi dengan Pegawai
    public function pegawai()
    {
        return $this->belongsTo(Pegawai::class);
    }

    // Accessor untuk tanggal
    public function getTanggalMulaiAttribute($value)
    {
        return $value ? Carbon::parse($value) : null;
    }

    public function getTanggalSelesaiAttribute($value)
    {
        return $value ? Carbon::parse($value) : null;
    }

    // Scope for leave status
    public function scopeDisetujui($query)
    {
        return $query->where('status', 'Disetujui');
    }

    public function scopeDitolak($query)
    {
        return $query->where('status', 'Ditolak');
    }

    public function scopeProses($query)
    {
        return $query->where('status', 'Proses');
    }
}
