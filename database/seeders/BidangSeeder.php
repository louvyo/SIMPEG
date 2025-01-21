<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class BidangSeeder extends Seeder
{
    public function run()
    {
        $bidangs = [
            [
                'nama_bidang' => 'Kepegawaian',
                'kode_bidang' => 'KPG',
                'deskripsi' => 'Bidang yang menangani manajemen kepegawaian',
                'status' => 'Aktif',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'nama_bidang' => 'Teknik',
                'kode_bidang' => 'TKN',
                'deskripsi' => 'Bidang yang menangani aspek teknis',
                'status' => 'Aktif',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'nama_bidang' => 'Keuangan',
                'kode_bidang' => 'KEU',
                'deskripsi' => 'Bidang yang menangani aspek keuangan',
                'status' => 'Aktif',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'nama_bidang' => 'Administrasi',
                'kode_bidang' => 'ADM',
                'deskripsi' => 'Bidang yang menangani administrasi umum',
                'status' => 'Aktif',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]
        ];

        DB::table('bidangs')->insert($bidangs);
    }
}
