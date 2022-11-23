<?php

namespace Database\Seeders;

use App\Models\Kelahiran;
use App\Models\Kepala;
use App\Models\Pendatang;
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
            'no_telpon' => '085200738097',
            'nama_kecamatan' => 'Teluk Mutiara',
            'nama_kelurahan' => 'Wilaya Timur',
            'nama_lingkungan' => 'linkungan 1',
            'kode_rw' => 001,
            'kode_rt' => 002,
        ]);

        $penduduk = [
            [
                'nik' => 1234567890123456,
                'nomor_kk' => 1234567891012131,
                'nama_lengkap' => 'Jeck Risen',
                'jender' => 'L',
                'status_nikah' => 'Lajang',
                'relasi' => 'Suami',
                'tanggal_lahir' => Carbon::parse('02-10-2022'),
                'agama' => 'Kristen Protestan',
                'pendidikan' => 'SD',
                'pekerjaan' => 'Programer',
            ],
            [
                'nik' => 3534567890123454,
                'nomor_kk' => 1234567891012131,
                'nama_lengkap' => 'Dwi',
                'jender' => 'P',
                'status_nikah' => 'Lajang',
                'relasi' => 'Suami',
                'tanggal_lahir' => Carbon::parse('02-10-2022'),
                'agama' => 'Kristen Protestan',
                'pendidikan' => 'SD',
                'pekerjaan' => 'Programer',
            ]
        ];
        foreach ($penduduk as $key => $value) {
            Penduduk::create($value);
        }

        Kelahiran::create([
            'id_kelahiran' => '0001',
            'nomor_kk' => '2852007380974321',
            'no_akte' => '431245',
            'nama' => 'Jeck',
            'jender' => 'L',
            'berat' => '10 kg',
            'tempat_bersalin' => 'Rumah Sakit',
            'penolong_lahir' => 'Dokter',
            'hari_lahir' => 'Selasa',
            'TTL' => 'Surabaya, 01-10-2001',
            'tahun_pendataan' => '2001',
            'nama_ayah' => 'cek1',
            'nama_ibu' => 'cek2',
            'nama_ibu' => 'cek2',
            'lingkungan' => 'lingkungan 1',
            'tgl_pendataan' => '01-10-2001',
        ]);

        // Pendatang::create([
        //     'id_pendatang' => '1',
        //     'nama_pendatang' => 'Bless',
        //     'tgl_datang' => '01-10-2001',
        //     'alamat_asal' => 'Alor',
        //     'alamat_tujuan' => 'Kupang',
        //     'alasan_datang' => 'Kerja',
        //     'tgl_pendatang' => '11-10-2022',
        //     'tahun_pendataan' => '2022',
        // ]);
    }
}
