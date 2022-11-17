<?php

namespace App\Http\Controllers;

use App\Models\Kelahiran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KelahiranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.kelahiran.index', [
            'title' => 'Data Kelahiran',
            'data' => Kelahiran::all(),
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

        $noauto = DB::select("SELECT max(id_kelahiran) as max_code FROM kelahirans");
        $data = count($noauto);
        $code = $data['max_code'];
        $urutan = (int)substr($code, 1, 3);
        $urutan++;
        $huruf = "L";
        $kd_kat = $huruf . sprintf("%03s", $urutan);

        return view('dashboard.kelahiran.create', [
            'title' => 'Tambah Data Kelahiran',
            'tgl_pendataan' => $tgl_pendataan,
            'tahun_pendataan' => $tahun_pendataan,
            'noautoo' => $kd_kat,
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
        //
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
    public function edit(Kelahiran $kelahiran)
    {
        return view('dashboard.kelahiran.edit', [
            'title' => 'Edit Data Kelahiran',
            'kelahiran' => $kelahiran,
        ]);
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
    public function destroy(Kelahiran $kelahiran)
    {
        Kelahiran::destroy($kelahiran->id_kelahiran);
        // kembalikan ke halaman product
        return redirect('/dashboard/kelahiran')->with('success', 'Data Kelahiran Berhasil di Hapus!');
    }
}
