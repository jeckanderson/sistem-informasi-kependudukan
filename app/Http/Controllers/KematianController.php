<?php

namespace App\Http\Controllers;

use App\Models\Kematian;
use App\Models\Pendatang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use \PDF;

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
            ->leftJoin('kepalas', 'kepalas.nomor_kk', '=', 'kematians.nik')
            // ->select('kepalas.*', 'kematians.nik', 'kepalas.nomor_kk')->get();
            // ->where('kepalas.nomor_kk', '=', 'kematians.nik')->get();
            ->orderBy('id_kematian', 'desc');

        if (request('search')) {
            $data->where('nomor_kk', 'like', '%' . request('search') . '%')
                ->orWhere('nama_lengkap', 'like', '%' . request('search') . '%')
                ->orWhere('tempat_meninggal', 'like', '%' . request('search') . '%')
                ->orWhere('sebab', 'like', '%' . request('search') . '%')
                ->orWhere('tgl_pendataan', 'like', '%' . request('search') . '%')
                ->orWhere('tahun_pendataan', 'like', '%' . request('search') . '%');
        }

        return view('dashboard.kematian.index', [
            'title' => 'Data Kematian',
            'item' => $data->paginate(10)->withQueryString(),
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
    public function store(Request $request, Kematian $kematian)
    {
        // return $request;
        $validatedData = $request->validate([
            'nik' => 'required|min:16',
            // 'id_penduduk' => 'required',
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


    public function cetaklap()
    {
        $ninggal = DB::table('kematians')
            ->leftJoin('penduduks', 'kematians.nik', '=', 'penduduks.nik')
            ->leftJoin('kepalas', 'kepalas.nomor_kk', '=', 'kematians.nik')
            ->orderBy('id_kematian', 'desc')
            ->get();

        $pdf = PDF::loadview('dashboard.kematian.cetaklap', [
            'cetaklap' => $ninggal
        ])
            ->setpaper('A3', 'portrait');
        Pdf::setOption(['dpi' => 150, 'defaultFont' => 'Arial']);

        return $pdf->download('laporan_kematian.pdf');
    }

    public function cetaksurat($id_kematian)
    {
        $cetaksurat = DB::table('kematians')
            ->leftJoin('penduduks', 'kematians.nik', '=', 'penduduks.nik')
            ->where('id_kematian', $id_kematian)->get();

        $pdf = PDF::loadview('dashboard.kematian.cetaksurat', [
            'cetaksurat' => $cetaksurat
        ])
            ->setpaper('A4', 'portrait');
        Pdf::setOption(['dpi' => 150, 'defaultFont' => 'Arial']);

        return $pdf->download('cetak_surat_kematian.pdf');
    }
}
