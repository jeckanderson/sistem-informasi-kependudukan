@extends('dashboard.templates.main')

@section('container')
<div class="row">
    <div class="col-lg-12 mb-5">
        <div class="card">
            <div class="card-header text-white bg-primary">
                <h6><i class="fas fa-plus-circle"></i> Tambah Data Kelahiran</h6>
            </div>
            <div class="card-body">
                <form action="/dashboard/kelahiran" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            {{-- <div class="mb-3">
                                <label for="id_kelahiran" class="form-label text-danger">Kode Kelahiran</label>
                                <input type="text" class="form-control" name="id_kelahiran" id="id_kelahiran" value="L{{ $noautoo }}" readonly>
                            </div> --}}
                            <div class="mb-3">
                                <label for="no_akte" class="form-label text-danger">Nomor Akte Kelahiran</label>
                                <input type="text" class="form-control  @error('no_akte') is-invalid @enderror" name="no_akte" id="no_akte" value="{{ old('no_akte') }}" required>
                                @error('no_akte')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="nama" class="form-label text-danger">Nama Bayi</label>
                                <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" id="nama" value="{{ old('nama') }}" required>
                                @error('nama')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="nomor_kk" class="form-label text-danger">Nomor KK</label>
                                <input type="text" class="form-control @error('nomor_kk') is-invalid @enderror" name="nomor_kk" id="nomor_kk" value="{{ old('nomor_kk') }}" required>
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
                                <label for="TTL" class="form-label text-danger">Tempat & Tanggal Lahir</label>
                                <input type="text" class="form-control @error('TTL') is-invalid @enderror" name="TTL" id="TTL" value="{{ old('TTL') }}" placeholder="Kota, 00-00-0000" required>
                                @error('TTL')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="berat" class="form-label text-danger">Berat Badan</label>
                                <input type="text" class="form-control @error('berat') is-invalid @enderror" name="berat" id="berat" value="{{ old('berat') }}" required>
                                @error('berat')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="penolong_lahir" class="form-label text-danger">Penolong Lahir</label>
                                <input type="text" class="form-control @error('penolong_lahir') is-invalid @enderror" name="penolong_lahir" id="penolong_lahir" value="{{ old('penolong_lahir') }}" required>
                                    @error('penolong_lahir')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="nama_ayah" class="form-label text-danger">Nama Ayah</label>
                                <input type="text" class="form-control @error('nama_ayah') is-invalid @enderror" name="nama_ayah" id="nama_ayah" value="{{ old('nama_ayah') }}" required>
                                    @error('nama_ayah')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="nama_ibu" class="form-label text-danger">Nama Ibu</label>
                                <input type="text" class="form-control @error('nama_ibu') is-invalid @enderror" name="nama_ibu" id="nama_ibu" value="{{ old('nama_ibu') }}" required>
                                    @error('nama_ibu')
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
                                <label for="tempat_bersalin" class="form-label text-danger">Tempat Bersalin</label>
                                <input type="text" class="form-control @error('tempat_bersalin') is-invalid @enderror" name="tempat_bersalin" id="tempat_bersalin" value="{{ old('tempat_bersalin') }}" required>
                                    @error('tempat_bersalin')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="lingkungan" class="form-label text-danger">Lingkungan</label>
                                <input type="text" class="form-control @error('lingkungan') is-invalid @enderror" name="lingkungan" id="lingkungan" value="{{ old('lingkungan') }}" required>
                                    @error('lingkungan')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            {{-- <input id="nomor_kk" name="nomor_kk" type="hidden" size="40" maxlength="50" required> --}}

                            <input name="tgl_pendataan" type="hidden" value="{{ $tgl_pendataan }}" class="input" size="20" maxlength="20">
                            <input name="tahun_pendataan" type="hidden" value="{{ $tahun_pendataan }}" class="input" size="10" maxlength="10">
                        </div>
                    </div>
            </div>
            <div class="card-footer">
                <div class="">
                    <button type="submit" name="submit" class="btn btn-sm btn-primary rounded-pill"><i class="fas fa-plus-circle"></i> Tambah Data</button>
                </div>
            </div>
            </form>
        </div>
    </div>
</div>

@endsection