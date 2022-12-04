<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penduduk extends Model
{
    use HasFactory;

    protected $primaryKey = 'nik';
    // protected $foreignKey = 'nomor_kk';
    protected $fillable = [
        'nik',
        'nomor_kk',
        'nama_lengkap',
        'jender',
        'status_nikah',
        'relasi',
        'tempat_lahir',
        'tanggal_lahir',
        'agama',
        'pendidikan',
        'pekerjaan',
    ];

    // public function kepala()
    // {
    //     return $this->belongsTo(Kepala::class);
    // }

    // public function scopefilter($query)
    // {
    //     if (request('search')) {
    //         return $query->where('nama_lengkap', 'like', '%' . request('search') . '%');
    //         ->orWhere('body', 'like', '%' . request('search') . '%');
    //     }
    // }
}
