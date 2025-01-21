<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Pegawai;
use App\Models\Bidang;
use Faker\Factory as Faker;

class PegawaiSeeder extends Seeder
{
    public function run()
    {
        // Pastikan ada bidang
        $bidangsCount = Bidang::count();
        if ($bidangsCount == 0) {
            $this->call(BidangSeeder::class);
        }

        $faker = Faker::create('id_ID');
        $bidangs = Bidang::all();

        foreach (range(1, 20) as $index) {
            Pegawai::create([
                'nama' => $faker->name,
                'nip' => $faker->unique()->numerify('PEG-####-####'),
                'email' => $faker->unique()->safeEmail,
                'bidang_id' => $bidangs->random()->id,
                'jabatan' => $faker->jobTitle,
                'tanggal_masuk' => $faker->dateTimeBetween('-5 years', 'now'),
                'status' => $faker->randomElement(['Aktif', 'Cuti', 'Non-Aktif']),
                'no_telepon' => $faker->phoneNumber,
                'jenis_kelamin' => $faker->randomElement(['Laki-laki', 'Perempuan']),
                'tempat_lahir' => $faker->city,
                'tanggal_lahir' => $faker->dateTimeBetween('-50 years', '-20 years'),
                'alamat' => $faker->address
            ]);
        }
    }
}
