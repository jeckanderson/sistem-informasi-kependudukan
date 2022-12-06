<?php

namespace App\Http\Controllers;

use App\Models\Kelahiran;
use App\Models\Kematian;
use App\Models\Pendatang;
use App\Models\Penduduk;
use App\Models\Pindah;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    public function index()
    {
        $penduduk = Penduduk::all();
        $pindah = Pindah::all();
        $kematian = Kematian::all();
        $pendatang = Pendatang::all();
        $kelahiran = Kelahiran::all();
        $link1 = Penduduk::where('jender', 'L')->count();
        $link2 = Penduduk::where('jender', 'P')->count();

        return view('dashboard.index', [
            'title' => 'Dashboard',
            'penduduk' => $penduduk,
            'pindah' => $pindah,
            'kematian' => $kematian,
            'pendatang' => $pendatang,
            'kelahiran' => $kelahiran,
            'link1' => $link1,
            'link2' => $link2,
        ]);
    }
}
