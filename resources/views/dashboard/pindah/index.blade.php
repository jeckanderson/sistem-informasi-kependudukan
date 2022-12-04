@extends('dashboard.templates.main')

@section('container')
    <div class="row mt-3 justify-content-center">
        <div class="col-md-12">
            <form action="/dashboard/pindah">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" name="search" id="search" placeholder="Masukan keyword pencarian..">
                    {{-- value="{{ request('search') }}" --}}
                    <button class="btn btn-sm btn-primary" type="submit"><i class="fas fa-search fa-sm"></i> Search</button>
                </div>
            </form>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12 mb-5">
            <div class="card">
                <div class="card-header">
                    <h5>Data Pindah Penduduk
                        @can('admin')
                        <a href="/dashboard/pindah/create" type="button" class="btn btn-sm btn-primary float-end rounded-pill ml-1">
                            <i class="fas fa-plus-circle"></i> Tambah Data Pindah
                        </a>
                        @endcan
                        <a href="/pindah/cetaklaporan" type="button" class="btn btn-sm btn-info float-end rounded-pill">
                            <i class="fas fa-print"></i> Print PDF
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
                        <th scope="col">Jender</th>
                        <th scope="col">Tanggal Pindah</th>
                        <th scope="col">Alamat Asal</th>
                        <th scope="col">Alamat Tujuan</th>
                        <th scope="col">Jenis Pindah</th>
                        <th scope="col">Tanggal Masuk</th>
                        @can('admin')
                        <th scope="col" class="text-center">Aksi</th>
                        @endcan
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pindah as $key => $data)
                    <tr>
                        <td>{{ $pindah->firstItem() + $key }}</td>
                        <td>{{ $data->nik }}</td>
                        <td>{{ $data->nama_lengkap }}</td>
                        <td>{{ $data->jender }}</td>
                        <td>{{ date("d F Y", strtotime($data->tgl_pindah)) }}</td>
                        <td>{{ $data->alamat_asal }}</td>
                        <td>{{ $data->tujuan }}</td>
                        <td>{{ $data->jenis_pindah }}</td>
                        <td>{{ date("d F Y", strtotime($data->tgl_pendataan)) }}</td>
                        @can('admin')
                        <td class="text-center">
                            <a href="/dashboard/pindah/{{ $data->id_pindah }}/edit" class="btn btn-sm btn-warning mb-1 rounded-pill"><i class="far fa-edit"></i></a>
                            <form action="/dashboard/pindah/{{ $data->id_pindah }}" method="POST" class="d-inline ">
                                @csrf
                                @method('delete')
                                <button class="btn btn-sm btn-danger text-white border-0 delete hapus-confirm rounded-pill" onclick="return confirm('Anda akan menghapus {{ $data->nama_lengkap }}, yakin?')"><i class="fas fa-times-circle"></i></button>
                            </form>
                        </td>
                        @endcan
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="card-footer border d-flex">
                <div class="col-lg-6">
                    <div>
                        Showing
                        {{ $pindah->firstItem() }}
                        to
                        {{ $pindah->lastItem() }}
                        of
                        {{ $pindah->total() }}
                        entries
                    </div>
                </div>
                <div class="col-lg-6 d-flex justify-content-end">
                    <div>
                        {{ $pindah->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection