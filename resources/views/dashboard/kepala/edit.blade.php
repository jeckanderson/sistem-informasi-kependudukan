@extends('dashboard.templates.main')

@section('container')
    <div class="row mb-3">
        <div class="col-md-6">
            <h4 class="border-bottom">Edit Data Kepala Keluarga</h4>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-6 mb-4">
            <form action="/dashboard/kepala/{{ $item->nomor_kk }}" method="POST">
                @csrf
                @method('put')
                <div class="mb-3">
                    <label for="nomor_kk" class="form-label">Nomor KK</label>
                    <input type="text" class="form-control  @error('nomor_kk') is-invalid @enderror" name="nomor_kk" id="nomor_kk" value="{{ old('nomor_kk', $item->nomor_kk) }}" required>
                    @error('nomor_kk')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="no_telpon" class="form-label">Nomor Telepon</label>
                    <input type="text" class="form-control  @error('no_telpon') is-invalid @enderror" name="no_telpon" id="no_telpon" value="{{ old('no_telpon', $item->no_telpon) }}" required>
                    @error('no_telpon')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="nama_kecamatan" class="form-label">Nama Kecamatan</label>
                    <input type="text" class="form-control @error('nama_kecamatan') is-invalid @enderror" name="nama_kecamatan" id="nama_kecamatan" value="{{ old('nama_kecamatan', $item->nama_kecamatan) }}" required>
                    @error('nama_kecamatan')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="nama_kelurahan" class="form-label">Nama Kelurahan</label>
                    <input type="text" class="form-control @error('nama_kelurahan') is-invalid @enderror" name="nama_kelurahan" id="nama_kelurahan" value="{{ old('nama_kelurahan', $item->nama_kelurahan) }}" required>
                    @error('nama_kelurahan')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="nama_lingkungan" class="form-label">Lingkungan</label>
                    <input type="text" class="form-control @error('nama_lingkungan') is-invalid @enderror" name="nama_lingkungan" id="nama_lingkungan" value="{{ old('nama_lingkungan', $item->nama_lingkungan) }}" required>
                    @error('nama_lingkungan')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="kode_rw" class="form-label">Kode RW</label>
                    <input type="text" class="form-control @error('kode_rw') is-invalid @enderror" name="kode_rw" id="kode_rw" value="{{ old('kode_rw', $item->kode_rw) }}" required>
                    @error('kode_rw')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
                </div>
                <div class="mb-3">
                    <label for="kode_rt" class="form-label">Kode RT</label>
                    <input type="text" class="form-control @error('kode_rt') is-invalid @enderror" name="kode_rt" id="kode_rw" value="{{ old('kode_rt', $item->kode_rt) }}" required>
                     @error('kode_rt')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <button type="submit" class="btn btn-sm btn-primary rounded-pill"><i class="fas fa-plus"></i> Ubah Data</button>
                </div>
            </form>
        </div>
    </div>

@endsection