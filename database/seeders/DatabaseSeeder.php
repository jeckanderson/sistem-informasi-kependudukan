<?php

namespace Database\Seeders;

use App\Models\Kepala;
use App\Models\Penduduk;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $user = [
            [
                'username' => 'admin',
                'email' => 'admin@gmail.com',
                'name' => 'admin',
                'password' => bcrypt('admin'),
                'is_admin' => '1',
            ],
            [
                'username' => 'lurah',
                'email' => 'lurah@gmail.com',
                'name' => 'lurah',
                'password' => bcrypt('lurah'),
                'is_admin' => '0',
            ]
        ];

        foreach ($user as $key => $value) {
            User::create($value);
        }

        Kepala::create([
            'nomor_kk' => 1234567891012131,
            'nama_kecamatan' => 'Teluk Mutiara',
            'nama_kelurahan' => 'Wilaya Timur',
            'nama_lingkungan' => 'linkungan 1',
            'kode_rw' => 001,
            'kode_rt' => 002,
        ]);

        Penduduk::create([
            'nik' => 1234567890123456,
            'nomor_kk' => 1234567891012131,
            'nama_lengkap' => 'Jeck Risen',
            'jender' => 'Laki-laki',
            'status_nikah' => 'Lajang',
            'relasi' => 'Suami',
            'tanggal_lahir' => Carbon::parse('02-10-2022'),
            'agama' => 'Kristen Protestan',
            'pendidikan' => 'SD',
            'pekerjaan' => 'Programer',
        ]);
    }
}
