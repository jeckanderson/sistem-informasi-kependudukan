@extends('dashboard.templates.main')

@section('container')
    <div class="row mt-3">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-6">
                            <h5>Jumlah Data Penduduk ({{ $penduduk->count() }})</h5>
                        </div>
                        <div class="col-md-6">
                            <a href="/dashboard/penduduk/create" class="text-center"><i class="far fa-copy fs-4"></i></a>
                        </div>
                    </div>
                </div>
            </div>
                
            @if(session('success'))
                <div class="alert alert-success mt-3" role="alert">
                    {{ session('success') }}
                </div>
            @endif

            <table class="table bg-white table-responsive table-bordered mt-2" style="font-size: 14px">
                <thead class="text-white" style="background: #075985">
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama</th>
                        <th scope="col">NIK</th>
                        <th scope="col">No KK</th>
                        <th scope="col">Gender</th>
                        <th scope="col">Status</th>
                        <th scope="col">Relasi</th>
                        <th scope="col">TTL</th>
                        <th scope="col">Agama</th>
                        <th scope="col">Pendidikan</th>
                        <th scope="col">Pekerjaan</th>
                        <th scope="col">Ket-</th>
                    </tr>
                </thead>
                <tbody>
                    {{-- skip(1) --}}
                    @foreach ($penduduk as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
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
                            {{-- <td>{{ $item->penduduk->nama_kecamatan }}</td> --}}
                            <td>-</td>
                            {{-- <td>
                                <a href="/dashboard/user/edit" class="badge bg-primary text-white">Update</a>
                                <form action="/dashboard/user/" method="POST" class="d-inline">
                                    @csrf
                                    @method('delete')
                                    <button class="badge bg-danger text-white border-0" onclick="return confirm('yakin?')">Delete</button>
                                </form>
                            </td> --}}
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="card-footer border">
                <div class="d-flex">
                    <div class="col-lg-6">
                        <div>
                            Showing
                            {{-- {{ $penduduk->firstItem() }} --}}
                            to
                            {{-- {{ $penduduk->lastItem() }} --}}
                            of
                            {{-- {{ $penduduk->total() }} --}}
                            entries
                        </div>
                    </div>
                    <div class="col-lg-6 d-flex justify-content-end">
                        <div>
                            {{-- {{ $data->links() }} --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection