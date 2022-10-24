@extends('layouts.app')

@section('container')
    <div class="content py-5" style="background-color: rgba(11, 7, 82, 0.5)">
        <div class="row justify-content-center">
            <div class="col-lg-5">
                <main class="form-registration">
                    {{-- <img class="mb-4" src="../assets/brand/bootstrap-logo.svg" alt="" width="72" height="57"> --}}
                    <h1 class="h3 mb-3 fw-normal text-center text-white">Form Registrasi</h1>
                    <form>
                        <div class="form-floating">
                            <input type="text" name="username" class="form-control rounded-top" id="username" placeholder="username">
                            <label for="username">Username</label>
                        </div>
                        <div class="form-floating">
                            <input type="text" name="level_akses" class="form-control" id="level_akses" placeholder="level akses">
                            <label for="level_akses">Level Akses</label>
                        </div>
                        <div class="form-floating">
                            <input type="text" name="name" class="form-control" id="name" placeholder="level akses">
                            <label for="name">Nama</label>
                        </div>
                        <div class="form-floating">
                            <input type="password" name="password" class="form-control rounded-bottom" id="password" placeholder="Password">
                            <label for="password">Password</label>
                        </div>
                        
                        <button class="w-100 btn btn-lg btn-primary mt-3" type="submit">Registrasi</button>
                        {{-- <p class="mt-5 mb-3 text-muted">&copy; 2017–2021</p> --}}
                        <small class="text-center d-block text-white mt-3">Sudah Registrasi? <a href="/login" class="text-white">Silahkan Login</a></small>
                    </form>
                </main>
            </div>
        </div>
    </div>
@endsection