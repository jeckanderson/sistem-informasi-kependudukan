@extends('dashboard.templates.main')

@section('container')
    <div class="row mt-3 justify-content-center">
        <div class="col-md-12">
            <form action="/dashboard/kematian">
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
                    <h5>Data Kematian
                        @can('admin')
                        <a href="/dashboard/kematian/create" type="button" class="btn btn-sm btn-primary float-end rounded-pill ml-1">
                            <i class="fas fa-plus-circle"></i> Tambah Data Kematian
                        </a>
                        @endcan
                        <a href="/dashboard/kematian/create" type="button" class="btn btn-sm btn-info float-end rounded-pill">
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
                        <th scope="col">Nama Lengkap</th>
                        <th scope="col">Jender</th>
                        <th scope="col">Alamat Lengkap</th>
                        {{-- <th scope="col">KK</th> --}}
                        <th scope="col">Tanggal Meninggal</th>
                        <th scope="col">Tempat</th>
                        <th scope="col">Penyebab</th>
                        <th scope="col">Tanggal Masuk</th>
                        <th scope="col" class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($item as $key => $data)
                    <tr>
                        <td>{{ $item->firstItem() + $key }}</td>
                        <td>{{ $data->nama_lengkap }}</td>
                        <td>{{ $data->jender }}</td>
                        <td>-</td>
                        {{-- @if($data->nomor_kk == $data->nik)
                            <td>{{ $data->nama_lingkungan }}</td>
                        @endif --}}
                        <td>{{ date("d F Y", strtotime($data->tgl_meninggal)) }}</td>
                        <td>{{ $data->tempat_meninggal }}</td>
                        <td>{{ $data->sebab }}</td>
                        <td>{{ date("d F Y", strtotime($data->tgl_pendataan)) }}</td>
                        
                        <td class="text-center">
                            @can('admin')
                            <a href="/dashboard/kematian/{{ $data->id_kematian }}/edit" class="btn btn-sm btn-warning ml-1 rounded-pill"><i class="far fa-edit"></i></a>
                            <form action="/dashboard/kematian/{{ $data->id_kematian }}" method="POST" class="d-inline ">
                                @csrf
                                @method('delete')
                                <button class="btn btn-sm btn-danger text-white border-0 delete hapus-confirm rounded-pill" onclick="return confirm('Anda akan menghapus {{ $data->nama_lengkap }}, yakin?')"><i class="fas fa-times-circle"></i></button>
                            </form>
                            @endcan
                            <a href="/dashboard/kematian/{{ $data->id_kematian }}" title="Cetak Surat" class="btn btn-sm btn-info rounded-pill" title="Print Data"><i class="fas fa-print"></i></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="card-footer border d-flex">
                <div class="col-lg-6">
                    <div>
                        Showing
                        {{ $item->firstItem() }}
                        to
                        {{ $item->lastItem() }}
                        of
                        {{ $item->total() }}
                        entries
                    </div>
                </div>
                <div class="col-lg-6 d-flex justify-content-end">
                    <div>
                        {{ $item->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection