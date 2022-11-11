@extends('dashboard.templates.main')

@section('container')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4>Tambah Data Anggota Keluarga</h4>
            </div>
            <div class="card-body">
                <form action="/dashboard/kepala/insert" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="nik" class="form-label">NIK</label>
                                <input type="text" class="form-control  @error('nik') is-invalid @enderror" name="nik" id="no_kk" required value="{{ old('nik') }}">
                                @error('nik')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <input type="hidden" name="nomor_kk" value="{{ $no_kk }}">
                            {{-- <div class="mb-3">
                                <label for="nomor_kk" class="form-label">Nomor KK</label>
                                <input type="text" class="form-control  @error('nomor_kk') is-invalid @enderror" name="nomor_kk" id="nomor_kk">
                                @error('nomor_kk')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div> --}}
                            <div class="mb-3">
                                <label for="nama_lengkap" class="form-label">Nama Lengkap</label>
                                <input type="text" class="form-control  @error('nama_lengkap') is-invalid @enderror" name="nama_lengkap" id="nama_lengkap" required value="{{ old('nama_lengkap') }}">
                                @error('nama_lengkap')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="jender" class="form-label">Jender (JK)</label>
                                <select class="form-select @error('jender') is-invalid @enderror" name="jender" id="jender" required>
                                    <option selected disabled value="">-Pilih Jender-</option>
                                    <option value="Laki-laki">Laki-Laki</option>
                                    <option value="Perempuan">Perempuan</option>
                                  </select>
                                {{-- <input type="text" class="form-control  @error('jender') is-invalid @enderror" name="jender" id="jender"> --}}
                                @error('jender')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="status_nikah" class="form-label">Status Nikah</label>
                                <select class="form-select @error('status_nikah') is-invalid @enderror" name="status_nikah" id="status_nikah" required>
                                    <option selected disabled value="">-Pilih Status Nikah-</option>
                                    <option value="Menikah">Menikah</option>
                                    <option value="Lajang">Lajang</option>
                                    <option value="Janda">Janda</option>
                                    <option value="Duda">Duda</option>
                                    <option value="Tidak Menikah">Tidak Menikah</option>
                                  </select>
                                {{-- <input type="text" class="form-control  @error('status_nikah') is-invalid @enderror" name="status_nikah" id="status_nikah"> --}}
                                @error('status_nikah')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="relasi" class="form-label">Relasi</label>
                                <select class="form-select @error('relasi') is-invalid @enderror" name="relasi" id="relasi" required>
                                    <option selected disabled value="">-Pilih Relasi-</option>
                                    <option value="Suami">Suami</option>
                                    <option value="Istri">Istri</option>
                                    <option value="Anak Kandung">Anak Kandung</option>
                                    <option value="Anak Angkat">Anak Angkat</option>
                                    <option value="Keponakan">Keponakan</option>
                                    <option value="Lain-lain">Lain-lain</option>
                                  </select>
                                {{-- <input type="text" class="form-control  @error('relasi') is-invalid @enderror" name="relasi" id="relasi"> --}}
                                @error('relasi')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                                <input type="date" class="form-control  @error('tanggal_lahir') is-invalid @enderror" name="tanggal_lahir" id="no_kk" required>
                                @error('tanggal_lahir')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="agama" class="form-label">Agama</label>
                                <select class="form-select @error('agama') is-invalid @enderror" name="agama" id="agama" required>
                                    <option selected disabled value="">-Pilih Agama-</option>
                                    <option value="Kristen Protestan">Kristen Protestan</option>
                                    <option value="Katholik">Katholik</option>
                                    <option value="Islam">Islam</option>
                                    <option value="Hindu">Hindu</option>
                                    <option value="Budha">Budha</option>
                                    <option value="Kong Hu Cu">Kong Hu Cu</option>
                                  </select>
                                {{-- <input type="text" class="form-control  @error('agama') is-invalid @enderror" name="agama" id="agama"> --}}
                                @error('agama')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="pendidikan" class="form-label">Pendidikan</label>
                                <select class="form-select @error('pendidikan') is-invalid @enderror" name="pendidikan" id="pendidikan" required>
                                    <option selected disabled value="">-Pilih Pendidikan-</option>
                                    <option value="S3">S3</option>
                                    <option value="S2">S2</option>
                                    <option value="S1">S1</option>
                                    <option value="D3">D3</option>
                                    <option value="SMA">SMA</option>
                                    <option value="SMP">SMP</option>
                                    <option value="SD">SD</option>
                                  </select>
                                {{-- <input type="text" class="form-control  @error('pendidikan') is-invalid @enderror" name="pendidikan" id="pendidikan"> --}}
                                @error('pendidikan')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="pekerjaan" class="form-label">Pekerjaan</label>
                                <input type="text" class="form-control  @error('pekerjaan') is-invalid @enderror" name="pekerjaan" id="pekerjaan" required>
                                @error('pekerjaan')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            {{-- <div class="mb-3">
                                <label for="tgl_data" class="form-label">Tanggal Pendataan</label>
                                <input type="text" class="form-control  @error('tgl_data') is-invalid @enderror" name="tgl_data" id="tgl_data">
                                @error('tgl_data')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div> --}}
                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary">Simpan Data</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection