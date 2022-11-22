@extends('dashboard.templates.main')

@section('container')
<div class="row mt-3">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h5>Data Kepala Keluarga
                    {{--tambahDataKepala data-bs-toggle="modal" data-bs-target="#formModal" --}}
                    <a href="/dashboard/kepala/create" type="button" class="btn btn-sm btn-primary float-end rounded-pill">
                        <i class="fas fa-plus-circle"></i> Tambah Data KK
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
                    <th scope="col">No</th>
                    <th scope="col">Nomor KK</th>
                    <th scope="col">No Telepon</th>
                    <th scope="col">Nama Kecamatan</th>
                    <th scope="col">Nama Kelurahan</th>
                    <th scope="col">Nama Lingkungan</th>
                    <th scope="col">Kode RW</th>
                    <th scope="col">Kode RT</th>
                    <th scope="col">Ket-</th>
                    <th scope="col" class="text-center">Aksi</th>
                </tr>
            </thead>
            {{-- skip(1) --}}
            <tbody>
                @foreach ($data as $key => $item)
                <tr>
                    <td>{{ $data->firstItem() + $key }}</td>
                    <td>{{ $item->nomor_kk }}</td>
                    <td>{{ $item->no_telpon }}</td>
                    <td>{{ $item->nama_kecamatan }}</td>
                    <td>{{ $item->nama_kelurahan }}</td>
                    <td>{{ $item->nama_lingkungan }}</td>
                    <td>{{ $item->kode_rw }}</td>
                    <td>{{ $item->kode_rt }}</td>
                    {{-- <td>{{ $item->penduduk()->agama }}</td> --}}
                    <td>-</td>
                    <td class="text-center">
                        @php
                            $dataa = DB::select("SELECT nomor_kk FROM penduduks WHERE nomor_kk = $item->nomor_kk");
                        @endphp
                        @if(!empty($dataa))
                            <a href="/dashboard/kepala/{{ $item->nomor_kk }}" class="btn btn-sm btn-success rounded-pill">Lihat AK <span>({{ count($dataa) }})</span></a>
                        @else
                            <a href="/dashboard/kepala/{{ $item->nomor_kk }}" class="btn btn-sm btn-success d-none rounded-pill">Lihat AK <span>(0)</span></a>
                        @endif
                        <a href="/dashboard/kepala/inputak/{{ $item->nomor_kk }}" class="btn btn-sm btn-primary rounded-pill">Input AK</a>
                        <a href="/dashboard/kepala/{{ $item->nomor_kk }}/edit" class="btn btn-sm btn-warning tampilModalUbah rounded-pill mt-1"><i class="far fa-edit"></i></a>
                        <form action="/dashboard/kepala/{{ $item->nomor_kk }}" method="POST" class="d-inline ">
                            @csrf
                            @method('delete')
                            <button class="btn btn-sm btn-danger text-white border-0 delete rounded-pill mt-1" onclick="return confirm('Anda akan menghapus seluruh anggota keluarga dengan nomor KK ({{ $item->nomor_kk }}) yakin?')"><i class="fas fa-times-circle"></i></button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="card-footer border">
            <div class="d-flex">
                <div class="col-lg-6">
                    <div>
                        Showing
                        {{ $data->firstItem() }}
                        to
                        {{ $data->lastItem() }}
                        of
                        {{ $data->total() }}
                        entries
                    </div>
                </div>
                <div class="col-lg-6 d-flex justify-content-end">
                    <div>
                        {{ $data->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection