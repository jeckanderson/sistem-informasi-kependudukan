@extends('dashboard.templates.main')

@section('container')
<div class="row">
    <div class="col-lg-12 mb-5">
        <div class="card">
            <div class="card-header text-white bg-primary">
                <h6><i class="fas fa-plus-circle"></i> Tambah Data Kelahiran</h6>
            </div>
            <div class="card-body">
                <form action="/dashboard/kelahiran/insert" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="id_kelahiran" class="form-label text-danger">Kode Kelahiran</label>
                                <input type="text" class="form-control" name="id_kelahiran" id="id_kelahiran" value="{{ $noautoo }}" readonly>
                            </div>
                            <div class="mb-3">
                                <label for="no_telpon" class="form-label text-danger">Nomor Akte Kelahiran</label>
                                <input type="text" class="form-control  @error('no_telpon') is-invalid @enderror" name="no_telpon" id="no_telpon" value="{{ old('no_telpon') }}" required>
                                @error('no_telpon')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="nama_kecamatan" class="form-label text-danger">Nama Bayi</label>
                                <input type="text" class="form-control @error('nama_kecamatan') is-invalid @enderror" name="nama_kecamatan" id="nama_kecamatan" value="{{ old('nama_kecamatan') }}" required>
                                @error('nama_kecamatan')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="nomor_kk" class="form-label text-danger">Nomor KK</label>
                                <input type="text" class="form-control  @error('nomor_kk') is-invalid @enderror" name="nomor_kk" id="nomor_kk" value="{{ old('nomor_kk') }}" required>
                                @error('nomor_kk')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="jender" class="form-label text-danger">Jender</label>
                                <select class="form-select @error('jender') is-invalid @enderror" name="jender" id="jender" required>
                                    <option selected disabled value="">-Pilih Jender-</option>
                                    <option value="Laki-laki" {{ old('jender') == 'Laki-laki' ? 'selected=selected' : '' }}>Laki Laki</option>
                                    <option value="Perempuan" {{ old('jender') == 'Perempuan' ? 'selected=selected' : '' }}>Perempuan</option>
                                  </select>
                                @error('jender')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="nama_lingkungan" class="form-label text-danger">Tempat & Tanggal Lahir</label>
                                <input type="text" class="form-control @error('nama_lingkungan') is-invalid @enderror" name="nama_lingkungan" id="nama_lingkungan" value="{{ old('nama_lingkungan') }}" placeholder="Kota, 00-00-0000" required>
                                @error('nama_lingkungan')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="kode_rw" class="form-label text-danger">Berat Badan</label>
                                <input type="text" class="form-control @error('kode_rw') is-invalid @enderror" name="kode_rw" id="kode_rw" value="{{ old('kode_rw') }}" required>
                                @error('kode_rw')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="kode_rt" class="form-label text-danger">Penolong Lahir</label>
                                <input type="text" class="form-control @error('kode_rt') is-invalid @enderror" name="kode_rt" id="kode_rw" value="{{ old('kode_rt') }}" required>
                                    @error('kode_rt')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="kode_rt" class="form-label text-danger">Nama Ayah</label>
                                <input type="text" class="form-control @error('kode_rt') is-invalid @enderror" name="kode_rt" id="kode_rw" value="{{ old('kode_rt') }}" required>
                                    @error('kode_rt')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="kode_rt" class="form-label text-danger">Nama Ibu</label>
                                <input type="text" class="form-control @error('kode_rt') is-invalid @enderror" name="kode_rt" id="kode_rw" value="{{ old('kode_rt') }}" required>
                                    @error('kode_rt')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="hari_lahir" class="form-label text-danger">Hari Lahir</label>
                                <select class="form-select @error('hari_lahir') is-invalid @enderror" name="hari_lahir" id="hari_lahir" required>
                                    <option selected disabled value="">-Pilih Hari Lahir-</option>
                                    <option value="Senin" {{ old('hari_lahir') == 'Senin' ? 'selected=selected' : '' }}>Senin</option>
                                    <option value="Selasa" {{ old('hari_lahir') == 'Selasa' ? 'selected=selected' : '' }}>Selasa</option>
                                    <option value="Rabu" {{ old('hari_lahir') == 'Rabu' ? 'selected=selected' : '' }}>Rabu</option>
                                    <option value="Kamis" {{ old('hari_lahir') == 'Kamis' ? 'selected=selected' : '' }}>Kamis</option>
                                    <option value="Jumat" {{ old('hari_lahir') == 'Jumat' ? 'selected=selected' : '' }}>Jumat</option>
                                    <option value="Sabtu" {{ old('hari_lahir') == 'Sabtu' ? 'selected=selected' : '' }}>Sabtu</option>
                                    <option value="Minggu" {{ old('hari_lahir') == 'Minggu' ? 'selected=selected' : '' }}>Minggu</option>
                                  </select>
                                @error('hari_lahir')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="kode_rt" class="form-label text-danger">Tempat Bersalin</label>
                                <input type="text" class="form-control @error('kode_rt') is-invalid @enderror" name="kode_rt" id="kode_rw" value="{{ old('kode_rt') }}" required>
                                    @error('kode_rt')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="kode_rt" class="form-label text-danger">Lingkungan</label>
                                <input type="text" class="form-control @error('kode_rt') is-invalid @enderror" name="kode_rt" id="kode_rw" value="{{ old('kode_rt') }}" required>
                                    @error('kode_rt')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <input id="no_kk" name="no_kk" type="hidden" size="40" maxlength="50" required>

                            <input name="tgl_pendataan" type="hidden" value="{{ $tgl_pendataan }}" class="input" size="20" maxlength="20">
                            <input name="tahun_pendataan" type="hidden" value="{{ $tahun_pendataan }}" class="input" size="10" maxlength="10">
                        </div>
                    </div>
            </div>
            <div class="card-footer">
                <div class="">
                    <button type="submit" class="btn btn-sm btn-primary rounded-pill"><i class="fas fa-plus"></i> Tambah Data</button>
                </div>
            </div>
            </form>
        </div>
    </div>
</div>

@endsection