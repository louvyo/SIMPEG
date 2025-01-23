<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Cuti;
use App\Models\Pegawai;
use Carbon\Carbon;

class CutiSeeder extends Seeder
{
    public function run()
    {
        // Get all employees
        $pegawais = Pegawai::all();

        // Check if there are any employees
        if ($pegawais->isEmpty()) {
            $this->command->info('No employees available to seed leave history.');
            return;
        }

        // Create leave data
        foreach ($pegawais as $pegawai) {
            $tanggalMulai = Carbon::now()->subDays(rand(1, 30)); // Random start date
            $tanggalSelesai = $tanggalMulai->copy()->addDays(rand(1, 5)); // Random end date

            Cuti::create([
                'pegawai_id' => $pegawai->id,
                'jenis_cuti' => $this->getRandomJenisCuti(),
                'tanggal_mulai' => $tanggalMulai,
                'tanggal_selesai' => $tanggalSelesai,
                'jumlah_hari' => $tanggalMulai->diffInDays($tanggalSelesai) + 1, // Calculate total days
                'alasan' => 'Reason for leave ' . rand(1, 100), // Random reason
                'status' => $this->getRandomStatus(), // Random status
                'dokumen_pendukung' => null, // Optional document path
            ]);
        }

        $this->command->info('Leave history data seeded successfully.');
    }

    private function getRandomJenisCuti()
    {
        $jenisCuti = [
            'Cuti Tahunan',
            'Cuti Besar',
            'Cuti Khusus',
            'Cuti Sakit',
            'Cuti Melahirkan',
        ];

        return $jenisCuti[array_rand($jenisCuti)];
    }

    private function getRandomStatus()
    {
        $statuses = [
            'Disetujui',
            'Ditolak',
            'Proses',
        ];

        return $statuses[array_rand($statuses)];
    }
}
