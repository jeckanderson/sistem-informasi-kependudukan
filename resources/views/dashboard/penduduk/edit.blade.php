@extends('dashboard.templates.main')

@section('container')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header text-white bg-primary">
                <h4 class="fs-6"><i class="fas fa-plus-circle"></i> Ubah Data Anggota Keluarga</h4>
            </div>
            <div class="card-body">
                <form action="/dashboard/penduduk/{{ $data->nik }}" method="post">
                    @csrf
                    @method('put')
                    <div class="row">
                        <div class="col-lg-6">
                            <input type="hidden" name="nomor_kk" value="{{ $data->nomor_kk }}">
                            <div class="mb-3">
                                <label for="nik" class="form-label text-danger">NIK</label>
                                <input type="text" class="form-control  @error('nik') is-invalid @enderror" name="nik" id="no_kk" required value="{{ old('nik', $data->nik) }}">
                                @error('nik')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="nama_lengkap" class="form-label text-danger">Nama Lengkap</label>
                                <input type="text" class="form-control  @error('nama_lengkap') is-invalid @enderror" name="nama_lengkap" id="nama_lengkap" required value="{{ old('nama_lengkap', $data->nama_lengkap) }}">
                                @error('nama_lengkap')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="jender" class="form-label text-danger">Jender (JK)</label>
                                <select class="form-select @error('jender') is-invalid @enderror" name="jender" id="jender" required>
                                    <option value="L" {{ $data->jender =="L" ? 'selected' : '' }}>Laki-laki</option>
                                    <option value="P" {{ $data->jender =="P" ? 'selected' : '' }}>Perempuan</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="status_nikah" class="form-label text-danger">Status Nikah</label>
                                <select class="form-select @error('status_nikah') is-invalid @enderror" name="status_nikah" id="status_nikah" required>
                                    <option value="Menikah" {{ $data->status_nikah == 'Menikah' ? 'selected' : '' }}>Menikah</option>
                                    <option value="Lajang" {{ $data->status_nikah == 'Lajang' ? 'selected' : '' }}>Lajang</option>
                                    <option value="Janda" {{ $data->status_nikah == 'Janda' ? 'selected' : '' }}>Janda</option>
                                    <option value="Duda" {{ $data->status_nikah == 'Duda' ? 'selected' : '' }}>Duda</option>
                                    <option value="Tidak Menikah" {{ $data->status_nikah == 'Tidak Menikah' ? 'selected' : '' }}>Tidak Menikah</option>
                                  </select>
                            </div>
                            <div class="mb-3">
                                <label for="relasi" class="form-label text-danger">Relasi</label>
                                <select class="form-select @error('relasi') is-invalid @enderror" name="relasi" id="relasi" required>
                                    <option value="Suami" {{ $data->relasi == 'Suami' ? 'selected' : '' }}>Suami</option>
                                    <option value="Istri" {{ $data->relasi == 'Istri' ? 'selected' : '' }}>Istri</option>
                                    <option value="Anak Kandung" {{ $data->relasi == 'Anak Kandung' ? 'selected' : '' }}>Anak Kandung</option>
                                    <option value="Anak Angkat" {{ $data->relasi == 'Anak Angkat' ? 'selected' : '' }}>Anak Angkat</option>
                                    <option value="Keponakan" {{ $data->relasi == 'Keponakan' ? 'selected' : '' }}>Keponakan</option>
                                    <option value="Lain-lain" {{ $data->relasi == 'Lain-lain' ? 'selected' : '' }}>Lain-lain</option>
                                  </select>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="tempat_lahir" class="form-label text-danger">Tempat Lahir</label>
                                <input type="text" class="form-control  @error('tempat_lahir') is-invalid @enderror" name="tempat_lahir" id="tempat_lahir" value="{{ old('tempat_lahir') }}" required>
                            </div>
                            <div class="mb-3">
                                <label for="tanggal_lahir" class="form-label text-danger">Tanggal Lahir</label>
                                <input type="date" class="form-control  @error('tanggal_lahir') is-invalid @enderror" name="tanggal_lahir" id="tanggal_lahir" value="{{ old('tanggal_lahir', $data->tanggal_lahir) }}" required>
                            </div>
                            <div class="mb-3">
                                <label for="agama" class="form-label text-danger">Agama</label>
                                <select class="form-select @error('agama') is-invalid @enderror" name="agama" id="agama" required>
                                    <option value="Kristen Protestan" {{ $data->agama == 'Kristen Protestan' ? 'selected' : '' }}>Kristen Protestan</option>
                                    <option value="Katholik" {{ $data->agama == 'Katholik' ? 'selected' : '' }}>Katholik</option>
                                    <option value="Islam" {{ $data->agama == 'Islam' ? 'selected' : '' }}>Islam</option>
                                    <option value="Hindu" {{ $data->agama == 'Hindu' ? 'selected' : '' }}>Hindu</option>
                                    <option value="Budha" {{ $data->agama == 'Budha' ? 'selected' : '' }}>Budha</option>
                                    <option value="Kong Hu Cu" {{ $data->agama == 'Kong Hu Cu' ? 'selected' : '' }}>Kong Hu Cu</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="pendidikan" class="form-label text-danger">Pendidikan</label>
                                <select class="form-select @error('pendidikan') is-invalid @enderror" name="pendidikan" id="pendidikan" required>
                                    <option value="S3" {{ $data->pendidikan == 'S3' ? 'selected' : '' }}>S3</option>
                                    <option value="S2" {{ $data->pendidikan == 'S2' ? 'selected' : '' }}>S2</option>
                                    <option value="S1" {{ $data->pendidikan == 'S1' ? 'selected' : '' }}>S1</option>
                                    <option value="D4" {{ $data->pendidikan == 'D4' ? 'selected' : '' }}>D4</option>
                                    <option value="D3" {{ $data->pendidikan == 'D3' ? 'selected' : '' }}>D3</option>
                                    <option value="SMA" {{ $data->pendidikan == 'SMA' ? 'selected' : '' }}>SMA</option>
                                    <option value="SMP" {{ $data->pendidikan == 'SMP' ? 'selected' : '' }}>SMP</option>
                                    <option value="SD" {{ $data->pendidikan == 'SD' ? 'selected' : '' }}>SD</option>
                                  </select>
                            </div>
                            <div class="mb-3">
                                <label for="pekerjaan" class="form-label text-danger">pekerjaan</label>
                                <select class="form-select @error('pekerjaan') is-invalid @enderror" name="pekerjaan" id="pekerjaan" required>
                                    <option value="Guru" {{ $data->pekerjaan == 'Guru' ? 'selected' : '' }}>Guru</option>
                                    <option value="Dosen" {{ $data->pekerjaan == 'Dosen' ? 'selected' : '' }}>Dosen</option>
                                    <option value="Programmer" {{ $data->pekerjaan == 'Programmer' ? 'selected' : '' }}>Programmer</option>
                                    <option value="Dokter" {{ $data->pekerjaan == 'Dokter' ? 'selected' : '' }}>Dokter</option>
                                    <option value="PNS" {{ $data->pekerjaan == 'PNS' ? 'selected' : '' }}>PNS</option>
                                    <option value="TNI" {{ $data->pekerjaan == 'TNI' ? 'selected' : '' }}>TNI</option>
                                    <option value="Polisi" {{ $data->pekerjaan == 'Polisi' ? 'selected' : '' }}>Polisi</option>
                                    <option value="Perawat" {{ $data->pekerjaan == 'Perawat' ? 'selected' : '' }}>Perawat</option>
                                    <option value="Pengusaha" {{ $data->pekerjaan == 'Pengusaha' ? 'selected' : '' }}>Pengusaha</option>
                                    <option value="Pelajar" {{ $data->pekerjaan == 'Pelajar' ? 'selected' : '' }}>Pelajar</option>
                                    <option value="Lain-lain" {{ $data->pekerjaan == 'Lain-lain' ? 'selected' : '' }}>Lain-lain</option>
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
                <button type="submit" name="submit" class="btn btn-sm btn-primary rounded-pill"><i class="far fa-edit"></i> Ubah Data</button>
            </form>
            </div>
        </div>
    </div>
</div>

@endsection