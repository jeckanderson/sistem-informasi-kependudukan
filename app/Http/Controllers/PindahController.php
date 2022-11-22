<?php

namespace App\Http\Controllers;

use App\Models\Pindah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PindahController extends Controller
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
        $data = DB::table('pindahs')
            ->leftJoin('penduduks', 'pindahs.nik', '=', 'penduduks.nik')
            ->orderBy('id_pindah', 'desc')
            ->get();

        return view('dashboard.pindah.index', [
            'title' => 'Data Penduduk Pindah',
            'pindah' => $data,
            // 'pindah' => Pindah::all(),
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

        return view('dashboard.pindah.create', [
            'title' => 'Data Penduduk Pindah',
            'tgl_pendataan' => $tgl_pendataan,
            'tahun_pendataan' => $tahun_pendataan
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
            'tgl_pindah' => 'required',
            'alamat_asal' => 'required',
            'tujuan' => 'required',
            'jenis_pindah' => 'required',
            'tgl_pendataan' => 'required',
            'tahun_pendataan' => 'required',
        ]);

        Pindah::create($validatedData);

        return redirect('/dashboard/pindah')->with('success', 'Data Penduduk Pindah di Tambahkan!');
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
    public function edit(Pindah $pindah)
    {
        $data = DB::table('pindahs')
            ->leftJoin('penduduks', 'pindahs.nik', '=', 'penduduks.nik')
            ->where('pindahs.id_pindah', $pindah->id_pindah)
            ->get();

        $tgl_pendataan = gmdate('d-m-Y');
        $tahun_pendataan = gmdate('Y');

        return view('dashboard.pindah.edit', [
            'title' => 'Edit Data Peduduk Pindah',
            'pindah' => $data[0],
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
    public function update(Request $request, Pindah $pindah)
    {
        $validatedData = $request->validate([
            'nik' => 'required|min:16',
            'tgl_pindah' => 'required',
            'alamat_asal' => 'required',
            'tujuan' => 'required',
            'jenis_pindah' => 'required',
            'tgl_pendataan' => 'required',
            'tahun_pendataan' => 'required',
        ]);

        Pindah::where('id_pindah', $pindah->id_pindah)->update($validatedData);

        return redirect('/dashboard/pindah')->with('success', 'Data Penduduk Pindah di Ubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pindah $pindah)
    {
        Pindah::destroy($pindah->id_pindah);
        return redirect('/dashboard/pindah')->with('success', 'Data pindah penduduk di hapus');
    }
}
