<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pendatang extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_pendatang';
    protected $fillable = [
        'nik',
        'tgl_datang',
        'alamat_asal',
        'alamat_tujuan',
        'alasan_datang',
        'tgl_pendataan',
        'tahun_pendataan',
    ];
}
