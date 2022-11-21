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
            ->where('pendatangs.nik', 1)
            ->get();

        return view('dashboard.pendatang.index', [
            'title' => 'Data Pendatang',
            // 'datang' => Pendatang::orderBy('id_pendatang', 'desc')->get(),
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
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
