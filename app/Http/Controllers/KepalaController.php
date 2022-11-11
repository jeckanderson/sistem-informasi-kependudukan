<?php

namespace App\Http\Controllers;

use App\Models\Kepala;
use App\Models\Penduduk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KepalaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.kepala.index', [
            'title' => 'Data Kepala Keluarga',
            'data' => Kepala::latest()->paginate(6)->withQueryString(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // return view('dashboard.kepala.create', [
        //     'title' => 'Tambah KK'
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
        $validatedData = $request->validate(
            [
                'nomor_kk' => 'required|max:16',
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

        Kepala::create($validatedData);

        return redirect('/dashboard/kepala')->with('success', 'Data Kepala Keluarga diTambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Kepala $kepala)
    {
        $data = DB::table('kepalas')
            ->join('penduduks', 'kepalas.nomor_kk', '=', 'penduduks.nomor_kk')
            ->where('penduduks.nomor_kk', '=', $kepala->nomor_kk)
            ->get();

        // $data1 = DB::table("SELECT nama_lengkap FROM penduduks WHERE relasi= 'Suami'");
        // var_dump($data1); die;

        return view('dashboard.kepala.show', [
            'title' => 'Detail Anggota Keluarga',
            // 'data_kk' => $kepala,
            'data' => $data,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Kepala::find($id);
        return json_encode($data);
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
        $validatedData = $request->validate(
            [
                'nomor_kk' => 'required|max:16',
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

        Kepala::where('id', $id)->update($validatedData);

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
            'nik' => 'required|max:16',
            'nomor_kk' => 'required|max:16',
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


    public function ubah(Request $request, $id)
    {
        // $data = Kepala::find($id);
        // return response()->json($data);
        echo "cek";
    }
}
