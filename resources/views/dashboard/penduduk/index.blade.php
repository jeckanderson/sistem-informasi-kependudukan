@extends('dashboard.templates.main')

@section('container')
    <div class="row mt-3 justify-content-center">
        <div class="col-md-12">
            <form action="/dashboard/penduduk">
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
                    <div class="row">
                        <div class="col-md-6">
                            <h5>Jumlah Data Penduduk ({{ $penduduk->count() }})</h5>
                        </div>
                        <div class="col-md-6 d-flex justify-content-end">
                            <a href="/penduduk/print_pdf" title="Print Data Penduduk" class="btn btn-sm btn-success rounded-pill" target="_BLANK"><i class="fas fa-print"></i> Print PDF</a>
                        </div>
                    </div>
                </div>
            </div>
                
            @if(session('success'))
                <div class="alert alert-success mt-3" role="alert">
                    {{ session('success') }}
                </div>
            @endif
        
            @if($penduduk->count())
            <table class="table bg-white table-responsive table-bordered mt-2" style="font-size: 14px">
                <thead class="text-white" style="background: #075985">
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama</th>
                        <th scope="col">NIK</th>
                        <th scope="col">No KK</th>
                        <th scope="col">Jender</th>
                        <th scope="col">Status</th>
                        <th scope="col">Relasi</th>
                        <th scope="col">TTL</th>
                        <th scope="col">Agama</th>
                        <th scope="col">Pendidikan</th>
                        <th scope="col">Pekerjaan</th>
                        <th scope="col">Keterangan</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($penduduk as $key => $item)
                        <tr>
                            <td>{{ $penduduk->firstItem() + $key }}</td>
                            <td>{{ $item->nama_lengkap }}</td>
                            <td>{{ $item->nik }}</td>
                            <td>{{ $item->nomor_kk }}</td>
                            <td>{{ $item->jender }}</td>
                            <td>{{ $item->status_nikah }}</td>
                            <td>{{ $item->relasi }}</td>
                            <td>{{ date("d F Y", strtotime($item->tanggal_lahir)) }}</td>
                            <td>{{ $item->agama }}</td>
                            <td>{{ $item->pendidikan }}</td>
                            <td>{{ $item->pekerjaan }}</td>
                            @if(!empty($item->id_kematian))
                                <td><p class="bg-danger text-white text-center">Meninggal</p></td>
                            @elseif(!empty($item->id_pindah))
                                <td><p class="bg-info text-white text-center">Pindah</p></td>
                            @else
                                <td> </td>
                            @endif
                        </tr>
                    @endforeach
                </tbody>
            </table>
            @else
                <h5 class="bg-danger text-white text-center py-4">Data Penduduk tidak ditemukan</h5>
            @endif

            <div class="card-footer border">
                <div class="d-flex">
                    <div class="col-lg-6">
                        <div>
                            Showing
                            {{ $penduduk->firstItem() }}
                            to
                            {{ $penduduk->lastItem() }}
                            of
                            {{ $penduduk->total() }}
                            entries
                        </div>
                    </div>
                    <div class="col-lg-6 d-flex justify-content-end">
                        <div>
                            {{ $penduduk->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection