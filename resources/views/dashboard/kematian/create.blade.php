@extends('dashboard.templates.main')

@section('container')
    <div class="row pb-4">
        <div class="col-lg-6 mb-4">
            <form action="/dashboard/kematian" method="POST">
                @csrf
                <div class="card">
                    <div class="card-header bg-primary">
                        <h6 class="text-white"><i class="fas fa-plus-circle"></i> Tambah Data Kematian</h6>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="nik" class="form-label text-danger">NIK</label>
                            <input type="text" class="form-control  @error('nik') is-invalid @enderror" name="nik" id="nik" value="{{ old('nik') }}" placeholder="Cukup isikan NIK penduduk saja" required>
                            @error('nik')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        {{-- <div class="mb-3">
                            <label for="id_penduduk" class="form-label text-danger">ID Pnduduk</label>
                            <input type="text" class="form-control" name="id_penduduk" id="id_penduduk" readonly="readonly" required>
                        </div> --}}
                        <div class="mb-3">
                            <label for="tgl_meninggal" class="form-label text-danger">Tanggal Meninggal</label>
                            <input type="date" class="form-control @error('tgl_meninggal') is-invalid @enderror" name="tgl_meninggal" id="tgl_meninggal" value="{{ old('tgl_meninggal') }}" required>
                            @error('tgl_meninggal')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="tempat_meninggal" class="form-label text-danger">Tempat Meninggal</label>
                            <textarea type="text" class="form-control @error('tempat_meninggal') is-invalid @enderror" name="tempat_meninggal" id="tempat_meninggal" value="{{ old('tempat_meninggal') }}" required></textarea>
                            @error('tempat_meninggal')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="sebab" class="form-label text-danger">Penyebab Meninggal</label>
                            <textarea type="text" class="form-control @error('sebab') is-invalid @enderror" name="sebab" id="sebab" value="{{ old('sebab') }}" required></textarea>
                            @error('sebab')
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
                            <button type="submit" class="btn btn-sm btn-primary float-end rounded-pill"><i class="fas fa-plus-circle"></i> Tambah Data</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection
