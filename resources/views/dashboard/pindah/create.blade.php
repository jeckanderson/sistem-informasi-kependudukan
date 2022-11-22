@extends('dashboard.templates.main')

@section('container')
    <div class="row pb-4">
        <div class="col-lg-6 mb-4">
            <form action="/dashboard/pindah" method="POST">
                @csrf
                <div class="card">
                    <div class="card-header bg-primary">
                        <h6 class="text-white"><i class="fas fa-plus-circle"></i> Tambah Data Penduduk Pindah</h6>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="nik" class="form-label text-danger">NIK</label>
                            <input type="text" class="form-control  @error('nik') is-invalid @enderror" name="nik" id="nik" value="{{ old('nik') }}" placeholder="Cukup isikan NIK penduduk saja.." required>
                            @error('nik')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="tgl_pindah" class="form-label text-danger">Tanggal Pindah</label>
                            <input type="date" class="form-control @error('tgl_pindah') is-invalid @enderror" name="tgl_pindah" id="tgl_pindah" value="{{ old('tgl_pindah') }}" required>
                            @error('tgl_pindah')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="alamat_asal" class="form-label text-danger">Alamat Asal</label>
                            <textarea type="text" class="form-control @error('alamat_asal') is-invalid @enderror" name="alamat_asal" id="alamat_asal" value="{{ old('alamat_asal') }}" required></textarea>
                            @error('alamat_asal')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="tujuan" class="form-label text-danger">Alamat Tujuan</label>
                            <textarea type="text" class="form-control @error('tujuan') is-invalid @enderror" name="tujuan" id="tujuan" value="{{ old('tujuan') }}" required></textarea>
                            @error('tujuan')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="jenis_pindah" class="form-label text-danger">Jenis Pindah</label>
                            <select class="form-select @error('jenis_pindah') is-invalid @enderror" name="jenis_pindah" id="jenis_pindah" required>
                                <option selected disabled value="">-Pilih Jenis Pindah-</option>
                                <option value="Antar Desa" {{ old('jenis_pindah') == 'Antar Desa' ? 'selected=selected' : '' }}>Antar Desa</option>
                                <option value="Antar Kecamatan" {{ old('jenis_pindah') == 'Antar Kecamatan' ? 'selected=selected' : '' }}>Antar Kecamatan</option>
                                <option value="Antar Kabupaten" {{ old('jenis_pindah') == 'Antar Kabupaten' ? 'selected=selected' : '' }}>Antar Kabupaten</option>
                                <option value="Antar Provinsi" {{ old('jenis_pindah') == 'Antar Provinsi' ? 'selected=selected' : '' }}>Antar Provinsi</option>
                              </select>
                            @error('jenis_pindah')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <input name="tgl_pendataan" type="hidden" value="{{ $tgl_pendataan }}" class="input" size="20" maxlength="20">
                        <input name="tahun_pendataan" type="hidden" value="{{ $tahun_pendataan }}" class="input" size="10" maxlength="10">
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
