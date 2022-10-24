@extends('layouts.app')

@section('container')
    <div class="content py-5" style="background-color: rgba(11, 7, 82, 0.5)">
        <div class="row justify-content-center">
            <div class="col-md-5">
                {{-- Alert --}}
                @if(session()->has('loginError'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ session('loginError') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <main class="form-signin">
                    {{-- <img class="mb-4" src="../assets/brand/bootstrap-logo.svg" alt="" width="72" height="57"> --}}
                    <h1 class="h3 mb-3 fw-normal text-center text-white fs-3">Silahkan Login</h1>
                    <form action="/login" method="POST">
                        @csrf
                        <div class="form-floating">
                            <input type="username" name="username" class="form-control @error('username') is-invalid @enderror" id="username" placeholder="username" autofocus required value="{{ old('username') }}">
                            <label for="username">Username</label>
                            @error('username')
                                <div class="invalid-fedback">
                                    {{ $message }}
                                </div>   
                            @enderror
                        </div>
                        <div class="form-floating">
                            <input type="password" name="password" class="form-control" id="password" placeholder="Password" required>
                            <label for="password">Password</label>
                        </div>
                        
                        <button class="w-100 btn btn-lg btn-primary fs-6" type="submit">Login</button>
                        {{-- <p class="mt-5 mb-3 text-muted">&copy; 2017–2021</p> --}}
                        <small class="text-center d-block text-white mt-3">Belum Registrasi? <a href="/register" class="text-white">Registrasi disini</a></small>
                    </form>
                </main>
            </div>
        </div>
    </div>
@endsection