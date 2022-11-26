@extends('dashboard.templates.main')

@section('container')
    <div class="row mt-3 justify-content-center">
        <div class="col-md-12">
            <form action="/dashboard/kelahiran">
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
                    <h5>Data Kelahiran
                        <a href="/dashboard/kelahiran/create" type="button" class="btn btn-sm btn-primary float-end rounded-pill ml-1">
                            <i class="fas fa-plus-circle"></i> Tambah Data Kelahiran
                        </a>
                        <a href="/dashboard/kelahiran/create" type="button" class="btn btn-sm btn-success float-end rounded-pill" title="Cetak Data Kelahiran">
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

        @if($kelahiran->count())
            <table class="table bg-white table-bordered table-responsive mt-2">
                <thead class="text-white" style="font-size: 14px; background: #075985;">
                    <tr>
                        <th scope="col">No</th>
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
                    @foreach ($kelahiran as $key => $item)
                    <tr>
                        <td>{{ $kelahiran->firstItem() + $key }}</td>
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
                            <a href="/dashboard/kelahiran/{{ $item->id_kelahiran }}/edit" class="btn btn-sm btn-warning mb-1 rounded-pill" title="Ubah Data Kelahiran {{ $item->nama }}"><i class="far fa-edit"></i></a>
                            <form action="/dashboard/kelahiran/{{ $item->id_kelahiran }}" method="POST" class="d-inline ">
                                @csrf
                                @method('delete')
                                <button class="btn btn-sm btn-danger text-white border-0 delete hapus-confirm mb-1 rounded-pill" onclick="return confirm('Anda akan menghapus {{ $item->nama }}, yakin?')" title="Hapus Data Kelahiran {{ $item->nama }}"><i class="fas fa-times-circle"></i></button>
                            </form>
                            <a href="/dashboard/kelahiran/{{ $item->id_kelahiran }}/edit" class="btn btn-sm btn-info rounded-pill" title="Print Data Kelahiran {{ $item->nama }}"><i class="fas fa-print"></i></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

        @else
            <h5 class="text-center text-danger py-4">Data Kelahiran Tidak Ada</h5>
        @endif

            <div class="card-footer border d-flex">
                <div class="col-lg-6">
                    <div>
                        Showing
                        {{ $kelahiran->firstItem() }}
                        to
                        {{ $kelahiran->lastItem() }}
                        of
                        {{ $kelahiran->total() }}
                        entries
                    </div>
                </div>
                <div class="col-lg-6 d-flex justify-content-end">
                    <div>
                        {{ $kelahiran->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection