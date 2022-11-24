<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pindah extends Model
{
    use HasFactory;

    protected $primaryKey = 'no_pindah';
    protected $fillable = [
        'nik',
        'tgl_pindah',
        'tgl_pendataan',
        'tahun_pendataan',
        'tujuan',
        'jenis_pindah',
        'alamat_asal',
    ];
}
