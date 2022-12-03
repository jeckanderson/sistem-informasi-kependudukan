<?php

namespace App\Http\Controllers;

use App\Models\Kepala;
use App\Models\Penduduk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use \PDF;

use function GuzzleHttp\Promise\queue;

class KepalaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Kepala::latest();

        if (request('search')) {
            $data->where('nomor_kk', 'like', '%' . request('search') . '%')
                ->orWhere('no_telpon', 'like', '%' . request('search') . '%')
                ->orWhere('nama_kecamatan', 'like', '%' . request('search') . '%')
                ->orWhere('nama_kelurahan', 'like', '%' . request('search') . '%')
                ->orWhere('nama_lingkungan', 'like', '%' . request('search') . '%');
        }

        return view('dashboard.kepala.index', [
            'title' => 'Data Kepala Keluarga',
            'data' => $data->paginate(10)->withQueryString(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.kepala.create', [
            'title' => 'Tambah KK'
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
        $validatedData = $request->validate(
            [
                'nomor_kk' => 'required|max:16|unique:kepalas',
                'no_telpon' => 'required|unique:kepalas',
                'nama_kecamatan' => 'required',
                'nama_kelurahan' => 'required',
                'nama_lingkungan' => 'required',
                'kode_rw' => 'required|max:3',
                'kode_rt' => 'required|max:3',
            ],
            [
                'nomor_kk.required' => 'nomor kk tidak boleh kosong',
                'no_telpon.required' => 'nomor telepon tidak boleh kosong',
                'nama_kecamatan.required' => 'nama kecamatan tidak boleh kosong',
                'nama_kelurahan.required' => 'nama kelurahan tidak boleh kosong',
                'nama_lingkungan.required' => 'nama lingkungan tidak boleh kosong',
                'kode_rw.required' => 'kode rw tidak boleh kosong',
                'kode_rt.required' => 'kode rt tidak boleh kosong',
            ]
        );

        Kepala::create($validatedData);

        return redirect('/dashboard/kepala')->with('success', 'Data Kepala Keluarga di Tambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Kepala $kepala)
    {
        $data = DB::table('penduduks')
            ->leftjoin('kematians', 'penduduks.nik', '=', 'kematians.nik')
            ->leftjoin('pindahs', 'penduduks.nik', '=', 'pindahs.nik')
            ->leftjoin('kepalas', 'kepalas.nomor_kk', '=', 'penduduks.nomor_kk')
            ->where('penduduks.nomor_kk', '=', $kepala->nomor_kk)
            ->select('penduduks.*', 'kepalas.*', 'kematians.*', 'pindahs.*', 'kematians.nik', 'pindahs.nik', 'penduduks.nik')
            ->get();

        return view('dashboard.kepala.show', [
            'title' => 'Detail Anggota Keluarga',
            'data' => $data,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Kepala $kepala)
    {
        // $data = Kepala::find($id);
        // return json_encode($data);
        return view('dashboard.kepala.edit', [
            'title' => 'Edit Data KK',
            'item' => $kepala
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kepala $kepala)
    {
        $validatedData = $request->validate(
            [
                'nomor_kk' => 'required|min:16',
                'no_telpon' => 'required',
                'nama_kecamatan' => 'required',
                'nama_kelurahan' => 'required',
                'nama_lingkungan' => 'required',
                'kode_rw' => 'required|max:3',
                'kode_rt' => 'required|max:3',
            ],
            [
                'nomor_kk.required' => 'nomor kk tidak boleh kosong',
                'no_telpon.required' => 'nomor telepon tidak boleh kosong',
                'nama_kecamatan.required' => 'nama kecamatan tidak boleh kosong',
                'nama_kelurahan.required' => 'nama kelurahan tidak boleh kosong',
                'nama_lingkungan.required' => 'nama lingkungan tidak boleh kosong',
                'kode_rw.required' => 'kode rw tidak boleh kosong',
                'kode_rt.required' => 'kode rt tidak boleh kosong',
            ]
        );

        // if ($request->nomor_kk != $kepala->nomor_kk && $request->no_telpon != $kepala->no_telpon) {
        //     $rules['nomor_kk'] = 'required|max:16|unique:kepalas';
        //     $rules['no_telpon'] = 'required|unique:kepalas';
        // }
        // $request->no_telpon != $kepala->no_telpon
        // $validatedData = $request->validate($rules);
        // $validatedData['nomor_kk'] = $request->nomor_kk;

        Kepala::where('nomor_kk', $kepala->nomor_kk)->update($validatedData);

        return redirect('/dashboard/kepala')->with('success', 'Data Kepala Keluarga diUpdated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kepala $kepala)
    {
        Kepala::destroy($kepala->nomor_kk);
        // kembalikan ke halaman product
        return redirect('/dashboard/kepala')->with('success', 'Data KK Berhasil di Hapus!');
    }

    public function inputak($no_kk)
    {
        return view('dashboard.kepala.inputak', [
            'title' => 'Tambah Anggota Keluarga',
            'no_kk' => $no_kk
        ]);
    }

    public function insert(Request $request)
    {
        // return $request;
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


    public function ubah(Request $request, $nik, Penduduk $penduduk)
    {
        // return $nik;

        return view('dashboard.kepala.ubah', [
            'title' => 'Edit Data Anggota Keluarga',
            'data_ak' => Penduduk::all(),
            'data' => $nik,
        ]);
    }


    public function updateak(Request $request, Penduduk $penduduk)
    {
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

        Penduduk::where('nomor_kk', $penduduk->nomor_kk)->update($validatedData);

        return redirect('/dashboard/kepala')->with('success', 'Data Anggota Keluarga diTambahkan!');
    }

    public function printpdf(Request $request)
    {
        $anggota = DB::table('penduduks')
            ->leftjoin('kematians', 'penduduks.nik', '=', 'kematians.nik')
            ->leftjoin('pindahs', 'penduduks.nik', '=', 'pindahs.nik')
            ->leftjoin('kepalas', 'kepalas.nomor_kk', '=', 'penduduks.nomor_kk')
            ->where('penduduks.nomor_kk', '=', $request->nomor_kk)
            ->select('penduduks.*', 'kepalas.*', 'kematians.*', 'pindahs.*', 'kematians.nik', 'pindahs.nik', 'penduduks.nik')
            ->get();

        $pdf = PDF::loadview('dashboard.kepala.printpdf', [
            'printpdf' => $anggota
        ])
            ->setpaper('A3', 'landscape');
        Pdf::setOption(['dpi' => 150, 'defaultFont' => 'Arial']);

        return $pdf->download('laporan_keluarga.pdf');
    }
}
