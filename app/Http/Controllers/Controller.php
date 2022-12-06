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
        $link1 = Kepala::where('nama_lingkungan', 'Lingkungan 1')->count();
        $link2 = Kepala::where('nama_lingkungan', 'Lingkungan 2')->count();
        $link3 = Kepala::where('nama_lingkungan', 'Lingkungan 3')->count();
        $link4 = Kepala::where('nama_lingkungan', 'Lingkungan 4')->count();

        $kepalas = Kepala::all();
        $lingkungan = [];
        // $nilai = [];
        foreach ($kepalas as $item) {
            $lingkungan[] = $item->nama_lingkungan;
        }

        return view('home', [
            'title' => 'Sistem Informasi Layanan Administrasi Kependudukan',
            'lingkungan' => $lingkungan,
            'link1' => $link1,
            'link2' => $link2,
            'link3' => $link3,
            'link4' => $link4,
        ]);
    }
}
