@extends('dashboard.templates.main')

@section('container')
<div class="row mb-3">
    <div class="col-md-6">
        <h4 class="border-bottom">Tambah Data Kepala Keluarga</h4>
    </div>
</div>

    <div class="row">
        <div class="col-lg-6 mb-4">
            <form action="/dashboard/kepala" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="no_kk" class="form-label">No KK</label>
                    <input type="text" class="form-control  @error('nomor_kk') is-invalid @enderror" name="nomor_kk" id="no_kk" required>
                    @error('nomor_kk')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="nama_kk" class="form-label">Nama KK</label>
                    <input type="text" class="form-control @error('nama_kk') is-invalid @enderror" name="nama_kk" id="nama_kk" required>
                    @error('nama_kk')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="telpon" class="form-label">Telepon</label>
                    <input type="text" class="form-control @error('no_telpon') is-invalid @enderror" name="no_telpon" id="telpon" required>
                     @error('no_telpon')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="jml_kk" class="form-label">Jumlah KK</label>
                    <input type="text" class="form-control @error('jml_kk') is-invalid @enderror" name="jml_kk" id="jml_kk" required>
                    @error('jml_kk')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="lingkungan" class="form-label">Lingkungan</label>
                    <input type="text" class="form-control @error('lingkungan') is-invalid @enderror" name="lingkungan" id="lingkungan" required>
                    @error('lingkungan')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="rw" class="form-label">RW</label>
                    <input type="text" class="form-control @error('rw') is-invalid @enderror" name="rw" id="rw" required>
                    @error('rw')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
                </div>
                <div class="mb-3">
                    <label for="rt" class="form-label">RT</label>
                    <input type="text" class="form-control @error('rt') is-invalid @enderror" name="rt" id="rt" required>
                     @error('rt')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>

@endsection