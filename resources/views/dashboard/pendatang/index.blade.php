@extends('dashboard.templates.main')

@section('container')
    <div class="row mt-3">
        <div class="col-md-12 mb-5">
            <div class="card">
                <div class="card-header">
                    <h5>Data Penduduk Datang
                        <a href="/dashboard/pendatang/create" type="button" class="btn btn-sm btn-primary float-end rounded-pill ml-1">
                            <i class="fas fa-plus-circle"></i> Tambah Data Pendatang
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

            <table class="table bg-white table-bordered mt-2">
                <thead class="text-white" style="font-size: 14px; background: #075985;">
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">NIK</th>
                        <th scope="col">Nama Lengkap</th>
                        <th scope="col">Tanggal Datang</th>
                        <th scope="col">Alamat Asal</th>
                        <th scope="col">Alamat Tujuan</th>
                        <th scope="col">Alasan Datang</th>
                        <th scope="col">Tanggal Masuk</th>
                        <th scope="col" class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($datang as $key => $data)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $data->nik }}</td>
                        <td>{{ $data->nama_lengkap }}</td>
                        <td>{{ date("d F Y", strtotime($data->tgl_datang)) }}</td>
                        <td>{{ $data->alamat_asal }}</td>
                        <td>{{ $data->alamat_tujuan }}</td>
                        <td>{{ $data->alasan_datang }}</td>
                        <td>{{ date("d F Y", strtotime($data->tgl_pendataan)) }}</td>
                        <td class="text-center">
                            <a href="/dashboard/pendatang/{{ $data->id_pendatang }}/edit" class="btn btn-sm btn-warning mb-1"><i class="far fa-edit"></i></a>
                            <form action="/dashboard/pendatang/{{ $data->id_pendatang }}" method="POST" class="d-inline ">
                                @csrf
                                @method('delete')
                                <button class="btn btn-sm btn-danger text-white border-0 delete hapus-confirm" onclick="return confirm('Anda akan menghapus {{ $data->nama_lengkap }}, yakin?')"><i class="fas fa-times-circle"></i></button>
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