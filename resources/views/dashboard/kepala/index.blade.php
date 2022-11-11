@extends('dashboard.templates.main')

@section('container')
    <div class="row mt-3">
        <div class="col-md-6 text-center">
            <h4>Data Kepala Keluarga</h4>
        </div>
        <div class="col-md-6">
            {{-- <a href="/dashboard/kepala/create" class="btn btn-primary">Tambah Kepala Keluarga</a> --}}
            <a href="/dashboard/kepala/create" type="button" class="btn btn-primary tambahDataKepala" data-bs-toggle="modal" data-bs-target="#formModal">
                Tambah Kepala Keluarga
            </a>
        </div>
    </div>

    @if(session('success'))
        <div class="alert alert-success mt-3" role="alert">
            {{ session('success') }}
        </div>
    @endif

    <div class="row mt-3">
        <div class="col-md-12 mt-3">
            <table class="table bg-white table-bordered table-responsive">
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
                        <td>085200738097</td>
                        <td>{{ $item->nama_kecamatan }}</td>
                        <td>{{ $item->nama_kelurahan }}</td>
                        <td>{{ $item->nama_lingkungan }}</td>
                        <td>{{ $item->kode_rw }}</td>
                        <td>{{ $item->kode_rt }}</td>
                        {{-- <td>{{ $item->penduduk()->agama }}</td> --}}
                        <td>-</td>
                        <td class="text-center">
                            <a href="/dashboard/kepala/{{ $item->nomor_kk }}" class="btn btn-sm btn-success">Lihat AK <span>(0)</span></a>
                            {{-- data-bs-toggle="modal" data-bs-target="#inputAK" --}}
                            <a href="/dashboard/kepala/inputak/{{ $item->nomor_kk }}" class="btn btn-sm btn-primary">Input AK</a>
                            <a href="/dashboard/kepala/{{ $item->nomor_kk }}" class="btn btn-sm btn-warning tampilModalUbah" data-bs-toggle="modal" data-bs-target="#formModal" data-id="{{ $item->nomor_kk }}"><i class="far fa-edit"></i></a>
                            <form action="/dashboard/kepala/{{ $item->nomor_kk }}" method="POST" class="d-inline ">
                                @csrf
                                @method('delete')
                                <button class="btn btn-sm btn-danger text-white border-0 delete hapus-confirm" onclick="confirm('yakin?')"><i class="fas fa-times-circle"></i></button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

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

    {{-- Modal INPUT DATA KK --}}
    <div class="modal fade" id="formModal" tabindex="-1" aria-labelledby="formModal" aria-hidden="true">
        <div class="modal-dialog modal-md">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="judulModal">Tambah Data Kepala Keluarga</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              
                <form action="/dashboard/kepala" method="POST">
                    @csrf
                    {{-- <input type="hidden" name="nomor_kk" id="nomor_kk"> --}}
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="nomor_kk" class="form-label">No KK</label>
                                <input type="text" class="form-control  @error('nomor_kk') is-invalid @enderror" name="nomor_kk" id="nomor_kk">
                                @error('nomor_kk')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="no_telpon" class="form-label">No Telepon</label>
                                <input type="text" class="form-control @error('no_telpon') is-invalid @enderror" name="no_telpon" id="no_telpon" required>
                                @error('no_telpon')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="nama_kecamatan" class="form-label">Nama Kecamatan</label>
                                <input type="text" class="form-control @error('nama_kecamatan') is-invalid @enderror" name="nama_kecamatan" id="nama_kecamatan">
                                @error('nama_kecamatan')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="nama_kelurahan" class="form-label">Nama Kelurahan</label>
                                <input type="text" class="form-control @error('nama_kelurahan') is-invalid @enderror" name="nama_kelurahan" id="nama_kelurahan">
                                 @error('nama_kelurahan')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="nama_lingkungan" class="form-label">Nama Lingkungan</label>
                                <input type="text" class="form-control @error('nama_lingkungan') is-invalid @enderror" name="nama_lingkungan" id="nama_lingkungan">
                                @error('nama_lingkungan')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="kode_rw" class="form-label">Kode RW</label>
                                <input type="text" class="form-control @error('kode_rw') is-invalid @enderror" name="kode_rw" id="kode_rw">
                                @error('kode_rw')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="kode_rt" class="form-label">Kode RT</label>
                                <input type="text" class="form-control @error('kode_rt') is-invalid @enderror" name="kode_rt" id="kode_rt">
                                 @error('kode_rt')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>

            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-sm btn-primary simpanData">Tambah Data</button>
            </form>
            </div>
          </div>
        </div>
    </div>


    <!-- Modal Input AK -->
    <div class="modal fade" id="inputAK" tabindex="-1" aria-labelledby="inputAKLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="inputAKLabel">Tambah  Data Anggota Keluarga</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body inputAK">
                ...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Simpan</button>
                </div>
            </div>
        </div>
  </div>

    <script type="text/javascript">
        // $(document).ready(function () {
        // $(".inputAk").click(function(e) { 
        //    var n = $(this).attr("id");
        //         $.ajax({
        //                 url: "akinput.php",
        //                 type: "GET",
        //                 data : {id: n,},
        //                 success: function (ajaxData){
        //                   $("#InputAk").html(ajaxData);
        //                   $("#InputAk").modal('show',{backdrop: 'true'});
        //               }
        //             });
        //      });
        //    });
        $('.inputAK').on('click', function () {
            console.log($(this).data('id'));
        });

     </script>

    {{-- <script>
        // SweetAlert2
        @if(session::hash('success'))
            swal.success("{{ session::get('success') }}");
        @endif
    </script> --}}

    {{-- <script>
        function opendModal() {
            $('#formModal').modal('show')
        }
        function store() {
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            var nomor_kk = $('#no_kk').val();
            var nama_kk = $('#nama_kk').val();
            var telpon = $('#telpon').val();
            var jml_kk = $('#jml_kk').val();
            var lingkungan = $('#lingkungan').val();
            var rw = $('#rw').val();
            var rt = $('#rt').val();

            $('#no_kkError').addClass('d-none');

            $.ajax({
                type: 'POST',
                url: "{{ url('/dashboard/kepala/store') }}",
                data: {_token: CSRF_TOKEN,
                    nomor_kk:nomor_kk,
                    nama_kk:nama_kk,
                    telpon:telpon,
                    jml_kk:jml_kk,
                    lingkungan:lingkungan,
                    rw:rw,
                    rt:rt,
                },
                success: function (data) {

                },
                error: function (data) {
                    var errors = data.responseJSON;
                    if($.isEmptyObject(errors) == false) {
                        $.each(errors.errors, function (key, value) {
                            var ErrorID = '#' + key + 'Error';
                            $(ErrorID).removeClass("d-none");
                            $(ErrorID).text(value);
                        });
                    }
                }
            });
        }
        
    </script> --}}
@endsection