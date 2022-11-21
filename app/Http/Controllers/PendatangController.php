<?php

namespace App\Http\Controllers;

use App\Models\Pendatang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PendatangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $data = DB::table('pendatangs')
            ->leftJoin('penduduks', 'pendatangs.nik', '=', 'penduduks.nik')
            ->orderBy('id_pendatang', 'desc')
            ->get();

        return view('dashboard.pendatang.index', [
            'title' => 'Data Pendatang',
            'datang' => $data,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tgl_pendataan = gmdate('d-m-Y');
        $tahun_pendataan = gmdate('Y');
        return view('dashboard.pendatang.create', [
            'title' => 'Tambah Data Penduduk Masuk',
            'tgl_pendataan' => $tgl_pendataan,
            'tahun_pendataan' => $tahun_pendataan,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nik' => 'required|min:16',
            'tgl_datang' => 'required',
            'alamat_asal' => 'required',
            'alamat_tujuan' => 'required',
            'alasan_datang' => 'required',
            'tgl_pendataan' => 'required',
            'tahun_pendataan' => 'required',
        ]);

        Pendatang::create($validatedData);

        return redirect('/dashboard/pendatang')->with('success', 'Data Penduduk Datang di Tambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Pendatang $pendatang)
    {
        $data = DB::table('pendatangs')
            ->leftJoin('penduduks', 'pendatangs.nik', '=', 'penduduks.nik')
            ->where('pendatangs.id_pendatang', $pendatang->id_pendatang)
            ->get();
        $tgl_pendataan = gmdate('d-m-Y');
        $tahun_pendataan = gmdate('Y');

        return view('dashboard.pendatang.edit', [
            'title' => 'Edit Data Peduduk Datang',
            'datang' => $data[0],
            'tgl_pendataan' => $tgl_pendataan,
            'tahun_pendataan' => $tahun_pendataan
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pendatang $pendatang)
    {
        $validatedData = $request->validate([
            'nik' => 'required|min:16',
            'tgl_datang' => 'required',
            'alamat_asal' => 'required',
            'alamat_tujuan' => 'required',
            'alasan_datang' => 'required',
            'tgl_pendataan' => 'required',
            'tahun_pendataan' => 'required',
        ]);

        Pendatang::where('id_pendatang', $pendatang->id_pendatang)->update($validatedData);

        return redirect('/dashboard/pendatang')->with('success', 'Data Pendatang di Ubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pendatang $pendatang)
    {
        Pendatang::destroy($pendatang->id_pendatang);
        return redirect('/dashboard/pendatang')->with('success', 'Data pendatang di hapus');
    }
}
