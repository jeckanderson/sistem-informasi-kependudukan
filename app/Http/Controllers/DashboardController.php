<?php

namespace App\Http\Controllers;

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

        return view('dashboard.index', [
            'title' => 'Dashboard',
            'penduduk' => $penduduk,
            'pindah' => $pindah,
            'kematian' => $kematian,
            'pendatang' => $pendatang,
        ]);
    }
}
