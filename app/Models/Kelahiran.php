<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelahiran extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_kelahiran';

    protected $fillable = [
        'id_kelahiran',
        'nomor_kk',
        'no_telpon',
        'no_akte',
        'nama',
        'jender',
        'berat',
        'tempat_bersalin',
        'penolong_lahir',
        'hari_lahir',
        'TTL',
        'tahun_pendataan',
        'nama_ayah',
        'nama_ibu',
        'lingkungan',
        'tgl_pendataan',
    ];
}
