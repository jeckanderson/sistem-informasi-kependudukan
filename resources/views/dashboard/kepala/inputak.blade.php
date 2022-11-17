@extends('dashboard.templates.main')

@section('container')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header text-white" style="background: #075985;">
                <h6><i class="fas fa-plus-circle"></i> Tambah Data Anggota Keluarga</h6>
            </div>
            <div class="card-body">
                <form action="/dashboard/kepala/insert" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="nik" class="form-label text-danger">NIK</label>
                                <input type="text" class="form-control  @error('nik') is-invalid @enderror" name="nik" id="no_kk" required value="{{ old('nik') }}">
                                @error('nik')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <input type="hidden" name="nomor_kk" value="{{ $no_kk }}">
                            <div class="mb-3">
                                <label for="nama_lengkap" class="form-label text-danger">Nama Lengkap</label>
                                <input type="text" class="form-control  @error('nama_lengkap') is-invalid @enderror" name="nama_lengkap" id="nama_lengkap" required value="{{ old('nama_lengkap') }}">
                                @error('nama_lengkap')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="jender" class="form-label text-danger">Jender (JK)</label>
                                <select class="form-select @error('jender') is-invalid @enderror" name="jender" id="jender" required>
                                    <option selected disabled value="">-Pilih Jender-</option>
                                    <option value="Laki-laki" {{ old('jender') == 'Laki-laki' ? 'selected=selected' : '' }}>Laki-Laki</option>
                                    <option value="Perempuan" {{ old('jender') == 'Perempuan' ? 'selected=selected' : '' }}>Perempuan</option>
                                  </select>
                                @error('jender')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="status_nikah" class="form-label text-danger">Status Nikah</label>
                                <select class="form-select @error('status_nikah') is-invalid @enderror" name="status_nikah" id="status_nikah" required>
                                    <option selected disabled value="">-Pilih Status Nikah-</option>
                                    <option value="Menikah" {{ old('status_nikah') == 'Menikah' ? 'selected=selected' : '' }}>Menikah</option>
                                    <option value="Lajang" {{ old('status_nikah') == 'Lajang' ? 'selected=selected' : '' }}>Lajang</option>
                                    <option value="Janda" {{ old('status_nikah') == 'Janda' ? 'selected=selected' : '' }}>Janda</option>
                                    <option value="Duda" {{ old('status_nikah') == 'Duda' ? 'selected=selected' : '' }}>Duda</option>
                                    <option value="Tidak Menikah" {{ old('status_nikah') == 'Tidak Menikah' ? 'selected=selected' : '' }}>Tidak Menikah</option>
                                  </select>
                                {{-- <input type="text" class="form-control  @error('status_nikah') is-invalid @enderror" name="status_nikah" id="status_nikah"> --}}
                                @error('status_nikah')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="relasi" class="form-label text-danger">Relasi</label>
                                <select class="form-select @error('relasi') is-invalid @enderror" name="relasi" id="relasi" required>
                                    <option selected disabled value="">-Pilih Relasi-</option>
                                    <option value="Suami" {{ old('relasi') == 'Suami' ? 'selected=selected' : '' }}>Suami</option>
                                    <option value="Istri" {{ old('relasi') == 'Istri' ? 'selected=selected' : '' }}>Istri</option>
                                    <option value="Anak Kandung" {{ old('relasi') == 'Anak Kandung' ? 'selected=selected' : '' }}>Anak Kandung</option>
                                    <option value="Anak Angkat" {{ old('relasi') == 'Anak Angkat' ? 'selected=selected' : '' }}>Anak Angkat</option>
                                    <option value="Keponakan" {{ old('relasi') == 'Keponakan' ? 'selected=selected' : '' }}>Keponakan</option>
                                    <option value="Lain-lain" {{ old('relasi') == 'Lain-lain' ? 'selected=selected' : '' }}>Lain-lain</option>
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
                                <label for="tanggal_lahir" class="form-label text-danger">Tanggal Lahir</label>
                                <input type="date" class="form-control  @error('tanggal_lahir') is-invalid @enderror" name="tanggal_lahir" id="no_kk" value="{{ old('tanggal_lahir') }}" required>
                                @error('tanggal_lahir')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="agama" class="form-label text-danger">Agama</label>
                                <select class="form-select @error('agama') is-invalid @enderror" name="agama" id="agama" required>
                                    <option selected disabled value="">-Pilih Agama-</option>
                                    <option value="Kristen Protestan" {{ old('agama') == 'Kristen Protestan' ? 'selected=selected' : '' }}>Kristen Protestan</option>
                                    <option value="Katholik" {{ old('agama') == 'Katholik' ? 'selected=selected' : '' }}>Katholik</option>
                                    <option value="Islam" {{ old('agama') == 'Islam' ? 'selected=selected' : '' }}>Islam</option>
                                    <option value="Hindu" {{ old('agama') == 'Hindu' ? 'selected=selected' : '' }}>Hindu</option>
                                    <option value="Budha" {{ old('agama') == 'Budha' ? 'selected=selected' : '' }}>Budha</option>
                                    <option value="Kong Hu Cu" {{ old('agama') == 'Kong Hu Cu' ? 'selected=selected' : '' }}>Kong Hu Cu</option>
                                  </select>
                                {{-- <input type="text" class="form-control  @error('agama') is-invalid @enderror" name="agama" id="agama"> --}}
                                @error('agama')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="pendidikan" class="form-label text-danger">Pendidikan</label>
                                <select class="form-select @error('pendidikan') is-invalid @enderror" name="pendidikan" id="pendidikan" required>
                                    <option selected value="">-Pilih Pendidikan-</option>
                                    <option value="S3" {{ old('pendidikan') == 'S3' ? 'selected=selected' : '' }}>S3</option>
                                    <option value="S2" {{ old('pendidikan') == 'S2' ? 'selected=selected' : '' }}>S2</option>
                                    <option value="S1" {{ old('pendidikan') == 'S1' ? 'selected=selected' : '' }}>S1</option>
                                    <option value="D4" {{ old('pendidikan') == 'D4' ? 'selected=selected' : '' }}>D4</option>
                                    <option value="D3" {{ old('pendidikan') == 'D3' ? 'selected=selected' : '' }}>D3</option>
                                    <option value="SMA" {{ old('pendidikan') == 'SMA' ? 'selected=selected' : '' }}>SMA</option>
                                    <option value="SMP" {{ old('pendidikan') == 'SMP' ? 'selected=selected' : '' }}>SMP</option>
                                    <option value="SD" {{ old('pendidikan') == 'SD' ? 'selected=selected' : '' }}>SD</option>
                                  </select>
                                {{-- <input type="text" class="form-control  @error('pendidikan') is-invalid @enderror" name="pendidikan" id="pendidikan"> --}}
                                @error('pendidikan')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="pekerjaan" class="form-label text-danger">pekerjaan</label>
                                <select class="form-select @error('pekerjaan') is-invalid @enderror" name="pekerjaan" id="pekerjaan" required>
                                    <option selected value="">-Pilih Pekerjaan-</option>
                                    <option value="Guru" {{ old('pekerjaan') == 'Guru' ? 'selected=selected' : '' }}>Guru</option>
                                    <option value="Dosen" {{ old('pekerjaan') == 'Dosen' ? 'selected=selected' : '' }}>Dosen</option>
                                    <option value="Programmer" {{ old('pekerjaan') == 'Programmer' ? 'selected=selected' : '' }}>Programmer</option>
                                    <option value="Dokter" {{ old('pekerjaan') == 'Dokter' ? 'selected=selected' : '' }}>Dokter</option>
                                    <option value="PNS" {{ old('pekerjaan') == 'PNS' ? 'selected=selected' : '' }}>PNS</option>
                                    <option value="TNI" {{ old('pekerjaan') == 'TNI' ? 'selected=selected' : '' }}>TNI</option>
                                    <option value="Polisi" {{ old('pekerjaan') == 'Polisi' ? 'selected=selected' : '' }}>Polisi</option>
                                    <option value="Perawat" {{ old('pekerjaan') == 'Perawat' ? 'selected=selected' : '' }}>Perawat</option>
                                    <option value="Pengusaha" {{ old('pekerjaan') == 'Pengusaha' ? 'selected=selected' : '' }}>Pengusaha</option>
                                    <option value="Pelajar" {{ old('pekerjaan') == 'Pelajar' ? 'selected=selected' : '' }}>Pelajar</option>
                                    <option value="Lain-lain" {{ old('pekerjaan') == 'Lain-lain' ? 'selected=selected' : '' }}>Lain-lain</option>
                                  </select>
                                {{-- <input type="text" class="form-control  @error('pekerjaan') is-invalid @enderror" name="pekerjaan" id="pekerjaan"> --}}
                                @error('pekerjaan')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>
            </div>
            <div class="card-footer">
                <div class="mb-3">
                    <button type="submit" class="btn btn-sm btn-primary float-end rounded-pill"><i class="fas fa-plus"></i> Tambah Data</button>
                </div>
            </div>
        </form>
        </div>
    </div>
</div>

@endsection