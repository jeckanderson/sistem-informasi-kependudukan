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
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        // first untuk urutan pertama
        // last untuk urutan
        $kelahiran = Kelahiran::latest();

        if (request('search')) {
            $kelahiran->where('nomor_kk', 'like', '%' . request('search') . '%')
                ->orWhere('no_akte', 'like', '%' . request('search') . '%')
                ->orWhere('nama', 'like', '%' . request('search') . '%')
                ->orWhere('tempat_bersalin', 'like', '%' . request('search') . '%')
                ->orWhere('penolong_lahir', 'like', '%' . request('search') . '%')
                ->orWhere('hari_lahir', 'like', '%' . request('search') . '%')
                ->orWhere('jender', 'like', '%' . request('search') . '%');
        }

        return view('dashboard.kelahiran.index', [
            'title' => 'Data Kelahiran',
            'kelahiran' => $kelahiran->paginate(10)->withQueryString(),
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

        // $noauto = DB::table('kelahirans')->select(DB::raw('MAX(RIGHT(id_kelahiran,3)) as kode'));
        // $code = "";
        // if ($noauto->count() > 0) {
        //     foreach ($noauto->get() as $no) {
        //         $tmp = ((int)$no->kode) + 1;
        //         $code = sprintf("%04s", $tmp);
        //     }
        // } else {
        //     $code = "0001";
        // }

        return view('dashboard.kelahiran.create', [
            'title' => 'Tambah Data Kelahiran',
            'tgl_pendataan' => $tgl_pendataan,
            'tahun_pendataan' => $tahun_pendataan,
            // 'noautoo' => $code,
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
                // 'id_kelahiran' => 'required',
                'nomor_kk' => 'required|max:16',
                'no_akte' => 'required|unique:kelahirans',
                'nama' => 'required',
                'jender' => 'required',
                'berat' => 'required',
                'tempat_bersalin' => 'required',
                'penolong_lahir' => 'required',
                'hari_lahir' => 'required',
                'TTL' => 'required',
                'tahun_pendataan' => 'required',
                'nama_ayah' => 'required',
                'nama_ibu' => 'required',
                'lingkungan' => 'required',
                'tgl_pendataan' => 'required',
            ],
            [
                'nomor_kk.required' => 'nomor kk tidak boleh kosong',
                'no_akte.required' => 'nomor akte tidak boleh kosong',
                'nama.required' => 'nama tidak boleh kosong',
                'jender.required' => 'jender tidak boleh kosong',
                'berat.required' => 'berat tidak boleh kosong',
                'tempat_bersalin.required' => 'tempat bersaling tidak boleh kosong',
                'penolong_lahir.required' => 'penolong lahir tidak boleh kosong',
                'hari_lahir.required' => 'hari lahir tidak boleh kosong',
                'TTL.required' => 'tempat tanggal lahir tidak boleh kosong',
                'tahun_pendataan.required' => 'tahun pendataan tidak boleh kosong',
                'nama_ayah.required' => 'nama ayah tidak boleh kosong',
                'nama_ibu.required' => 'nama ibu tidak boleh kosong',
                'lingkungan.required' => 'lingkugan tidak boleh kosong',
                'tgl_pendataan.required' => 'tanggal pendataan tidak boleh kosong',
            ]
        );

        Kelahiran::create($validatedData);

        return redirect('/dashboard/kelahiran')->with('success', 'Data Kelahiran di Tambahkan!');
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
    public function update(Request $request, Kelahiran $kelahiran)
    {
        // return $request;
        $validatedData = $request->validate(
            [
                'nomor_kk' => 'required|min:16',
                'no_akte' => 'required',
                'nama' => 'required',
                'jender' => 'required',
                'berat' => 'required',
                'tempat_bersalin' => 'required',
                'penolong_lahir' => 'required',
                'hari_lahir' => 'required',
                'TTL' => 'required',
                'tahun_pendataan' => 'required',
                'nama_ayah' => 'required',
                'nama_ibu' => 'required',
                'lingkungan' => 'required',
                'tgl_pendataan' => 'required',
            ]
        );

        Kelahiran::where('id_kelahiran', $kelahiran->id_kelahiran)->update($validatedData);

        return redirect('/dashboard/kelahiran')->with('success', 'Data Kelahiran di Updated!');
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
