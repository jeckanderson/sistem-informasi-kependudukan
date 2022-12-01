<?php

namespace App\Http\Controllers;

use App\Models\Kepala;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function index()
    {
        $kepalas = Kepala::where('nama_lingkungan', 'Lingkungan 1', 'Lingkungan 2')->count();
        // Usermeta::groupBy('browser')->get();
        // var_dump($kepalas);
        // die;

        $kepalas = Kepala::all();
        $lingkungan = [];
        // $nilai = [];
        foreach ($kepalas as $item) {
            $lingkungan[] = $item->nama_lingkungan;
        }

        // dd(($lingkungan));

        return view('home', [
            'title' => 'Sistem Informasi Layanan Administrasi Kependudukan',
            'lingkungan' => $lingkungan
        ]);
    }
}
