<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kepala extends Model
{
    use HasFactory;
    protected $primaryKey = 'nomor_kk';
    // protected $primaryKey = 'id_kepala';

    protected $fillable = [
        'nomor_kk',
        'no_telpon',
        'nama_kecamatan',
        'nama_kelurahan',
        'nama_lingkungan',
        'kode_rw',
        'kode_rt',
    ];

    // public function penduduk()
    // {
    //     return $this->hasMany(Penduduk::class);
    // }
}
