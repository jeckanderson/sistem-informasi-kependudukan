<?php

namespace App\Http\Controllers;

use App\Models\Kematian;
use App\Models\Pendatang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KematianController extends Controller
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
        $data = DB::table('kematians')
            ->leftJoin('penduduks', 'kematians.nik', '=', 'penduduks.nik')
            ->orderBy('id_kematian', 'desc')
            ->get();
        var_dump($data);

        return view('dashboard.kematian.index', [
            'title' => 'Data Kematian',
            'ninggal' => $data,
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

        return view('dashboard.kematian.create', [
            'title' => 'Tambah Data Kematian',
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
            'tgl_meninggal' => 'required',
            'tempat_meninggal' => 'required',
            'sebab' => 'required',
            'tgl_pendataan' => 'required',
            'tahun_pendataan' => 'required',
        ]);

        Kematian::create($validatedData);

        return redirect('/dashboard/kematian')->with('success', 'Data Kematian di Tambahkan!');
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
    public function edit(Kematian $kematian)
    {
        $data = DB::table('kematians')
            ->leftJoin('penduduks', 'kematians.nik', '=', 'penduduks.nik')
            ->where('kematians.id_kematian', $kematian->id_kematian)
            ->get();

        $tgl_pendataan = gmdate('d-m-Y');
        $tahun_pendataan = gmdate('Y');

        return view('dashboard.kematian.edit', [
            'title' => 'Edit Data Kematian',
            'ninggal' => $data[0],
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
    public function update(Request $request, Kematian $kematian)
    {
        $validatedData = $request->validate([
            'nik' => 'required|min:16',
            'tgl_meninggal' => 'required',
            'tempat_meninggal' => 'required',
            'sebab' => 'required',
            'tgl_pendataan' => 'required',
            'tahun_pendataan' => 'required',
        ]);

        Kematian::where('id_kematian', $kematian->id_kematian)->update($validatedData);

        return redirect('/dashboard/kematian')->with('success', 'Data Kematian di Ubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kematian $kematian)
    {
        Kematian::destroy($kematian->id_kematian);
        return redirect('/dashboard/kematian')->with('success', 'Data Kematian di hapus');
    }
}
