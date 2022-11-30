<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PegawaiController extends Controller
{
    // public function index()
    // {
    //     $penduduk = DB::table('penduduks')
    //         ->leftjoin('kematians', 'penduduks.nik', '=', 'kematians.nik')
    //         ->leftjoin('pindahs', 'penduduks.nik', '=', 'pindahs.nik')
    //         ->select('penduduks.*', 'kematians.id_kematian', 'pindahs.id_pindah')
    //         ->latest();

    //     if (request('search')) {
    //         $penduduk->where('nomor_kk', 'like', '%' . request('search') . '%')
    //             // ->orWhere('nik', 'like', '%' . request('search') . '%')
    //             ->orWhere('nama_lengkap', 'like', '%' . request('search') . '%')
    //             ->orWhere('jender', 'like', '%' . request('search') . '%')
    //             ->orWhere('status_nikah', 'like', '%' . request('search') . '%')
    //             ->orWhere('relasi', 'like', '%' . request('search') . '%')
    //             ->orWhere('agama', 'like', '%' . request('search') . '%')
    //             ->orWhere('pendidikan', 'like', '%' . request('search') . '%')
    //             ->orWhere('pekerjaan', 'like', '%' . request('search') . '%');
    //     }

    //     return view('pegawai.penduduk.index', [
    //         'title' => 'Penduduk',
    //         // 'penduduk' => Penduduk::latest()->filter()->get(),
    //         'penduduk' => $penduduk->paginate(15)->withQueryString(),
    //     ]);
    // }

    public function index()
    {
        return view('dashboard.index', [
            'title' => 'Dashboard'
        ]);
    }

    public function create()
    {
        return view('dashboard.user.create', [
            'title' => 'Insert User Data',
        ]);
    }

    public function store(Request $request)
    {
        return $request;

        $validate = $request->validated([
            'username' => 'required',
            'email' => 'required|email',
            'name' => 'required',
            'password' => 'required',
        ]);

        dd($validate);
    }

    public function edit()
    {
        return view('dashboard.user.edit', [
            'title' => 'Edit User',
        ]);
    }
}
