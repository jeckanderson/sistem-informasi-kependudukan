<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kematian extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_kematian';
    protected $fillable = [
        'nik',
        'tgl_meninggal',
        'tempat_meninggal',
        'sebab',
        'tgl_pendataan',
        'tahun_pendataan',
    ];
}
