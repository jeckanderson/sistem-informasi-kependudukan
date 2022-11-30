@extends('dashboard.templates.main')

@section('container')
    <div class="row pb-4">
        <div class="col-lg-6 mb-4">
            <form action="/dashboard/kepala" method="POST">
                @csrf
                <div class="card">
                    <div class="card-header">
                        <h5 class="text-danger"><i class="fas fa-plus-circle"></i> Tambah Data Kepala Keluarga</h5>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="nomor_kk" class="form-label">Nomor KK</label>
                            <input type="text" class="form-control  @error('nomor_kk') is-invalid @enderror" name="nomor_kk" id="nomor_kk" value="{{ old('nomor_kk') }}" required>
                            @error('nomor_kk')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="no_telpon" class="form-label">Nomor Telepon</label>
                            <input type="text" class="form-control  @error('no_telpon') is-invalid @enderror" name="no_telpon" id="no_telpon" value="{{ old('no_telpon') }}" required>
                            @error('no_telpon')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="nama_kecamatan" class="form-label">Nama Kecamatan</label>
                            <input type="text" class="form-control @error('nama_kecamatan') is-invalid @enderror" name="nama_kecamatan" id="nama_kecamatan" value="{{ old('nama_kecamatan') }}" required>
                            @error('nama_kecamatan')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="nama_kelurahan" class="form-label">Nama Kelurahan</label>
                            <input type="text" class="form-control @error('nama_kelurahan') is-invalid @enderror" name="nama_kelurahan" id="nama_kelurahan" value="{{ old('nama_kelurahan') }}" required>
                            @error('nama_kelurahan')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="nama_lingkungan" class="form-label">Lingkungan</label>
                            <select class="form-select @error('nama_lingkungan') is-invalid @enderror" name="nama_lingkungan" id="nama_lingkungan" required>
                                <option selected disabled value="">-Pilih Lingkungan-</option>
                                <option value="Linkungan 1" {{ old('nama_lingkungan') == 'Linkungan 1' ? 'selected=selected' : '' }}>Lingkungan 1</option>
                                <option value="Linkungan 2" {{ old('nama_lingkungan') == 'Linkungan 2' ? 'selected=selected' : '' }}>Lingkungan 2</option>
                                <option value="Linkungan 3" {{ old('nama_lingkungan') == 'Linkungan 3' ? 'selected=selected' : '' }}>Lingkungan 3</option>
                                <option value="Linkungan 4" {{ old('nama_lingkungan') == 'Linkungan 4' ? 'selected=selected' : '' }}>Lingkungan 4</option>
                              </select>
                            @error('nama_lingkungan')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="kode_rw" class="form-label">Kode RW</label>
                            <input type="text" class="form-control @error('kode_rw') is-invalid @enderror" name="kode_rw" id="kode_rw" value="{{ old('kode_rw') }}" placeholder="001" required>
                            @error('kode_rw')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                        </div>
                        <div class="mb-3">
                            <label for="kode_rt" class="form-label">Kode RT</label>
                            <input type="text" class="form-control @error('kode_rt') is-invalid @enderror" name="kode_rt" id="kode_rw" value="{{ old('kode_rt') }}" placeholder="002" required>
                             @error('kode_rt')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="mb-3">
                            <button type="submit" class="btn btn-sm btn-primary float-end rounded-pill"><i class="fas fa-plus"></i> Tambah Data</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection