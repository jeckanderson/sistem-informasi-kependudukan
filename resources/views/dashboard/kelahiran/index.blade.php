@extends('dashboard.templates.main')

@section('container')
    <div class="row mt-3">
        <div class="col-md-12 mb-5">
            <div class="card">
                <div class="card-header">
                    <h5>Data Kelahiran
                        <a href="/dashboard/kelahiran/create" type="button" class="btn btn-sm btn-primary float-end rounded-pill ml-1">
                            <i class="fas fa-plus-circle"></i> Tambah Data Kelahiran
                        </a>
                        <a href="/dashboard/kelahiran/create" type="button" class="btn btn-sm btn-danger float-end rounded-pill">
                            <i class="far fa-copy"></i> Cetak
                        </a>
                    </h5>
                </div>
            </div>

            @if(session('success'))
                <div class="alert alert-success mt-3" role="alert">
                    {{ session('success') }}
                </div>
            @endif

            <table class="table bg-white table-bordered table-responsive mt-2">
                <thead class="text-white" style="font-size: 14px; background: #075985;">
                    <tr>
                        <th scope="col">No Lahir</th>
                        <th scope="col">No Akte</th>
                        <th scope="col">No KK</th>
                        <th scope="col">Nama Anak</th>
                        <th scope="col">Jender</th>
                        <th scope="col">Berat</th>
                        <th scope="col">Tempat Bersalin</th>
                        <th scope="col">Penolong Lahir</th>
                        <th scope="col">Hari Lahir</th>
                        <th scope="col">TTL</th>
                        <th scope="col">Tahun Pendataan</th>
                        <th scope="col">Nama Ayah</th>
                        <th scope="col">Nama Ibu</th>
                        <th scope="col">Lingkungan</th>
                        <th scope="col">Tgl Masuk</th>
                        <th scope="col" class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $key => $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->no_akte }}</td>
                        <td>{{ $item->nomor_kk }}</td>
                        <td>{{ $item->nama }}</td>
                        <td>{{ $item->jender }}</td>
                        <td>{{ $item->berat }}</td>
                        <td>{{ $item->tempat_bersalin }}</td>
                        <td>{{ $item->penolong_lahir }}</td>
                        <td>{{ $item->hari_lahir }}</td>
                        <td>{{ $item->TTL }}</td>
                        <td>{{ $item->tahun_pendataan }}</td>
                        <td>{{ $item->nama_ayah }}</td>
                        <td>{{ $item->nama_ibu }}</td>
                        <td>{{ $item->lingkungan }}</td>
                        <td>{{ $item->tgl_pendataan }}</td>
                        <td class="text-center">
                            {{-- @php
                                $dataa = DB::select("SELECT nomor_kk FROM penduduks WHERE nomor_kk = $item->nomor_kk");
                            @endphp --}}
                            <a href="/dashboard/kelahiran/{{ $item->id_kelahiran }}/edit" class="btn btn-sm btn-warning mb-1"><i class="far fa-edit"></i></a>
                            <form action="/dashboard/kelahiran/{{ $item->id_kelahiran }}" method="POST" class="d-inline ">
                                @csrf
                                @method('delete')
                                <button class="btn btn-sm btn-danger text-white border-0 delete hapus-confirm" onclick="return confirm('Anda akan menghapus {{ $item->nama }}, yakin?')"><i class="fas fa-times-circle"></i></button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="card-footer border d-flex">
                <div class="col-lg-6">
                    <div>
                        Showing
                        {{-- {{ $data->firstItem() }} --}}
                        to
                        {{-- {{ $data->lastItem() }} --}}
                        of
                        {{-- {{ $data->total() }} --}}
                        entries
                    </div>
                </div>
                {{-- <div class="col-lg-6 d-flex justify-content-end">
                    <div>
                        {{ $data->links() }}
                    </div>
                </div> --}}
            </div>
        </div>
    </div>

@endsection