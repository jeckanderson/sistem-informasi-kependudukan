@extends('dashboard.templates.main')

@section('container')
    <div class="row">
        <div class="col-lg-6">
            <h4 class="border-bottom mb-3">Form Tambah User</h4>
            <form action="/dashboard/user" method="post">
                @csrf
                <div class="mb-3">
                  <label for="username" class="form-label">Username</label>
                  <input type="tex" name="username" class="form-control @error('username') is-invalid @enderror" id="username" value="{{ old('username') }}" required>
                    @error('username')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                  <label for="email" class="form-label">Email</label>
                  <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="emali" value="{{ old('email') }}" required>
                  @error('email')
                      <div class="invalid-feedback">
                            {{ $message }}
                      </div>
                  @enderror
                </div>
                <div class="mb-3">
                  <label for="name" class="form-label">Nama</label>
                  <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name" value="{{ old('name') }}" required>
                  @error('name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>   
                  @enderror
                </div>
                <div class="mb-3">
                  <label for="password" class="form-label">Password</label>
                  <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="password" required>
                  @error('password')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                  @enderror
                </div>
                <button type="submit" class="btn btn-primary w-100">Simpan</button>
              </form>
        </div>
    </div>


@endsection