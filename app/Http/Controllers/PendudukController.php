<?php

namespace App\Http\Controllers;

use App\Models\Penduduk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use \PDF;

class PendudukController extends Controller
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
        // latest urutkan berdasarkan paling baru
        $penduduk = DB::table('penduduks')
            ->leftjoin('kematians', 'penduduks.nik', '=', 'kematians.nik')
            ->leftjoin('pindahs', 'penduduks.nik', '=', 'pindahs.nik')
            ->select('penduduks.*', 'kematians.id_kematian', 'pindahs.id_pindah')
            ->latest();

        if (request('search')) {
            $penduduk->where('nomor_kk', 'like', '%' . request('search') . '%')
                // ->orWhere('nik', 'like', '%' . request('search') . '%')
                ->orWhere('nama_lengkap', 'like', '%' . request('search') . '%')
                ->orWhere('jender', 'like', '%' . request('search') . '%')
                ->orWhere('status_nikah', 'like', '%' . request('search') . '%')
                ->orWhere('relasi', 'like', '%' . request('search') . '%')
                ->orWhere('agama', 'like', '%' . request('search') . '%')
                ->orWhere('pendidikan', 'like', '%' . request('search') . '%')
                ->orWhere('pekerjaan', 'like', '%' . request('search') . '%');
        }

        return view('dashboard.penduduk.index', [
            'title' => 'Penduduk',
            // 'penduduk' => Penduduk::latest()->filter()->get(),
            'penduduk' => $penduduk->paginate(15)->withQueryString(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($no_kk)
    {
        // return $no_kk;
        // return view('dashboard.penduduk.create', [
        //     'title' => 'Tambah Anggota Keluarga',
        //     'no_kk' => $no_kk
        // ]);
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
            'nik' => 'required|min:16|unique:penduduks',
            'nomor_kk' => 'required|min:16',
            'nama_lengkap' => 'required',
            'jender' => 'required',
            'status_nikah' => 'required',
            'relasi' => 'required',
            'tanggal_lahir' => 'required',
            'agama' => 'required',
            'pendidikan' => 'required',
            'pekerjaan' => 'required',
        ]);

        Penduduk::create($validatedData);

        return redirect('/dashboard/kepala')->with('success', 'Data Anggota Keluarga diTambahkan!');
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
    public function edit(Penduduk $penduduk)
    {
        return view('dashboard.penduduk.edit', [
            'title' => 'Edit Data Anggota Keluarga',
            'data_ak' => Penduduk::all(),
            'data' => $penduduk,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Penduduk $penduduk)
    {
        // return $request;
        $validatedData = $request->validate([
            'nik' => 'required|min:16',
            'nomor_kk' => 'required|min:16',
            'nama_lengkap' => 'required',
            'jender' => 'required',
            'status_nikah' => 'required',
            'relasi' => 'required',
            'tanggal_lahir' => 'required',
            'agama' => 'required',
            'pendidikan' => 'required',
            'pekerjaan' => 'required',
        ]);
        // if ($request->nik !== $penduduk->nik) {
        //     $rules['nik'] = 'required|min:16|unique:penduduks';
        // } else {
        //     $rules['nik'] = 'required|min:16';
        // }
        // $validatedData = $request->validate($rules);
        Penduduk::where('nik', $penduduk->nik)->update($validatedData);

        return redirect('/dashboard/penduduk')->with('success', 'Data Anggota Keluarga di Ubah!');
        // return redirect()->route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Penduduk $penduduk)
    {
        Penduduk::destroy($penduduk->nik);
        return redirect('/dashboard/kepala/show')->with('success', 'data anggota keluarga berhasil di hapus');
    }

    public function printpdf()
    {
        $penduduk = DB::table('penduduks')
            ->leftjoin('kematians', 'penduduks.nik', '=', 'kematians.nik')
            ->leftjoin('pindahs', 'penduduks.nik', '=', 'pindahs.nik')
            ->select('penduduks.*', 'kematians.id_kematian', 'pindahs.id_pindah')
            ->latest()->get();

        $pdf = PDF::loadview('dashboard.penduduk.printpdf', [
            'printpdf' => $penduduk
        ])
            ->setpaper('A3', 'landscape');
        Pdf::setOption(['dpi' => 150, 'defaultFont' => 'Arial']);

        return $pdf->download('laporan_penduduk.pdf');
    }
}
