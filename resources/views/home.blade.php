@extends('layouts.app')

@section('container')
{{-- style="background-color: rgba(0, 0, 0, 0.1); !important" --}}
   <div class="content py-3" style="background-color: rgba(11, 7, 82, 0.5)">
        <div class="row text-white">
            <div class="col-md-3">
                <div>Informasi:</div>
                <a href="" class="text-decoration-none" data-bs-toggle="modal" data-bs-target="#pembuatanSurat">
                    <div class="card bg-primary text-center d-block">
                        <i class="fas fa-envelope-open-text mb-3 text-white py-2" style="font-size: 40px"></i>
                        <div class="align-items-center">
                            <div class="text-center rounded-bottom text-white" style="background-color: rgba(0, 0, 0, 0.5)">Alur Pembuatan Surat</div>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-md-3">
                <br>
                <a href="" class="text-decoration-none">
                    <div class="card bg-danger text-center d-block">
                        <img src="{{ asset('assets/img/grafik_pen.png') }}" alt="grafik" width="50px" class="py-2 mb-3">
                        <div class="align-items-center">
                            <div class="text-center rounded-bottom text-white" style="background-color: rgba(0, 0, 0, 0.5)">Grafik Penduduk Tiap Lingkungan</div>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-md-3">
                <br>
                <a href="" class="text-decoration-none">
                    <div class="card bg-success text-center d-block">
                        <img src="{{ asset('assets/img/grafik_pen.png') }}" alt="grafik" width="50px" class="py-2 mb-3">
                        <div class="align-items-center">
                            <div class="text-center rounded-bottom text-white" style="background-color: rgba(0, 0, 0, 0.5)">Grafik Pendataan Penduduk Hari Ini</div>
                        </div>
                    </div>
                </a>
            </div>
         
            <div class="col-md-3">
                <div>Persyaratan:</div>
                <a href="" class="text-decoration-none" data-bs-toggle="modal" data-bs-target="#pembuatanKTP">
                    <div class="card bg-warning text-center d-block">
                        <i class="far fa-address-card mb-3 text-white py-2" style="font-size: 40px"></i>
                        <div class="align-items-center">
                            <div class="text-center rounded-bottom text-white" style="background-color: rgba(0, 0, 0, 0.5)">Pembuatan KTP</div>
                        </div>
                    </div>
                </a>
            </div>
        </div>

        {{-- Row Ke 2 --}}
        <div class="row text-white mt-3">
            <div class="col-md-6">
                <div id="carouselExampleDark" class="carousel carousel-dark slide" data-bs-ride="carousel">
                    <div class="carousel-indicators">
                      <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                      <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1" aria-label="Slide 2"></button>
                      <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2" aria-label="Slide 3"></button>
                    </div>
                    <div class="carousel-inner">
                      <div class="carousel-item active" data-bs-interval="10000">
                        <img src="{{ asset('assets/img/1.jpg') }}" class="d-block w-100" alt="img-1">
                        <div class="carousel-caption d-none d-md-block">
                          <h5>First slide label</h5>
                          <p>Some representative placeholder content for the first slide.</p>
                        </div>
                      </div>
                      <div class="carousel-item" data-bs-interval="2000">
                        <img src="{{ asset('assets/img/2.jpg') }}" class="d-block w-100" alt="...">
                        <div class="carousel-caption d-none d-md-block">
                          <h5>Second slide label</h5>
                          <p>Some representative placeholder content for the second slide.</p>
                        </div>
                      </div>
                      <div class="carousel-item">
                        <img src="{{ asset('assets/img/3.jpg') }}" class="d-block w-100" alt="...">
                        <div class="carousel-caption d-none d-md-block">
                          <h5>Third slide label</h5>
                          <p>Some representative placeholder content for the third slide.</p>
                        </div>
                      </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
                      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                      <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
                      <span class="carousel-control-next-icon" aria-hidden="true"></span>
                      <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>

            <div class="col-md-6">
               <div class="row">
                    <div class="col-md-6">
                        <h6>Kalender:</h5>
                        <div class="tile double double-vertical">
                            <div class="calendar" data-role="calendar" data-start-mode="month"></div>
                        </div>
                        <h6>Times:</h6>
                        {{-- <div class="times" id="datepicker" data-role="times" data-style-background="bg-red" data-style-foreground="fg-white" data-style-divider="fg-white" style="font-size: 30px"></div> --}}
                    </div>
                    
                    <div class="col-md-6">
                        <a href="" class="text-decoration-none d-block mb-4" data-bs-toggle="modal" data-bs-target="#pembuatanKK">
                            <div class="card bg-danger text-center d-block">
                                <i class="fas fa-clone text-white py-2 mb-3" style="font-size: 40px"></i>
                                <div class="align-items-center">
                                    <div class="text-center rounded-bottom text-white" style="background-color: rgba(0, 0, 0, 0.5)">Pembuatan Kartu Keluarga</div>
                                </div>
                            </div>
                        </a>
                        
                        <a href="" class="text-decoration-none d-block mb-2">
                            <div class="card bg-info text-center d-block">
                                <i class="fas fa-id-card-alt text-white py-2 mb-3" style="font-size: 40px"></i>
                                <div class="align-items-center">
                                    <div class="text-center rounded-bottom text-white" style="background-color: rgba(0, 0, 0, 0.5)">Pembuatan Kartu Keluarga</div>
                                </div>
                            </div>
                        </a>

                        <div>User Login:</div>
                        <div class="box">
                            @auth 
                                <div class="card bg-secondary text-center d-block py-4 mb-3" style="list-style-type:none;">
                                    {{-- <i class="fas fa-sign-in-alt text-white py-2 mb-3" style="font-size: 40px"></i> --}}
                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        <span class="bg-danger p-1 px-3 rounded-bottom">Welcome {{ auth()->user()->name }}</span>
                                        </a>
                                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                            <li><a class="dropdown-item" href="/dashboard"><i class="fas fa-tachometer-alt"></i> My Dashboard</a></li>
                                            <li><hr class="dropdown-divider"></li>
                                            <li>
                                                <form action="/logout" method="POST">
                                                    @csrf
                                                    <button type="submit" class="dropdown-item"><i class="fas fa-sign-out-alt"></i> Logout</button>
                                                </form>
                                            </li>
                                        </ul>
                                    </li>
                                </div>
                            @else
                                <a href="/login" class="text-decoration-none">
                                    <div class="card bg-secondary text-center d-block">
                                        <i class="fas fa-sign-in-alt text-white py-2 mb-3" style="font-size: 40px"></i>
                                        <div class="align-items-center">
                                            <div class="text-center rounded-bottom text-white" style="background-color: rgba(0, 0, 0, 0.5)">LOGIN</div>
                                        </div>
                                    </div>
                                </a>
                            @endauth
                        </div>
                        
                    </div>
               </div>
            </div>
        </div>
   </div>



  {{-- ALUR PEMBUATAN SURAT --}}
  <div class="modal fade" id="pembuatanSurat" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel"><i class="fab fa-creative-commons-by"></i> Alur Pembuatan Surat Kebutuhan Penduduk</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="ket">
                <div class="text-danger">- Persyaratan Pembuatan Surat Keterangan:</div>
                1. Untuk mengurus surat keterangan penduduk<br>
                2. Surat pengantar RT/RW, Kepala Dukuh dan Kepala Desa/Lurah<br>
                3. Foto copy KK (Kartu Keluarga)<br>
                4. Kutipan akta nikah bagi yang sudah menikah<br>
                5. Kutipan akta kelahiran<br><br>
            </div>

            <div class="ktp-hilang/rusak">
                <div class="text-danger">- Persyaratan Pembuatan KTP Karena Hilang/Rusak:</div>
                1. Surat keterangan kehilangan dari kepolisian atau KTP yang rusak<br>
                2. Foto copy KK (Kartu Keluarga)<br>
                3. Paspor dan izin tinggal tetap bagi WNA<br><br>
            </div>

            <div class="ktp-pindah">
                <div class="text-danger">- Persyaratan Pembuatan KTP Karena Pindah/Datang:</div>
                1. SKP (Surat Keterangan Pindah)/SKPD (Surat Keterangan Pindah Datang)<br>
                2. SKDLN bagi WNI yang datang dari luar negeri karena pindah<br><br>
            </div>

            <div class="ktp-perpanjang">
                <div class="text-danger">- Persyaratan Pembuatan KTP Karena Perpanjangan:</div>
                1. Foto copy KK(Kartu Keluarga)<br>
                2. KTP lama<br>
                3. Paspor, izin tinggal tetap, dan SKCK bagi WNA
            </div>
        </div>
        <div class="modal-footer">
            <p style="font-size: 13px">Kelurahan Teluk Mutiara {{ date('j-n-Y') }}</p>
        </div>
      </div>
    </div>
  </div>

  {{-- ALUR PEMBUATAN KTP --}}
  <div class="modal fade" id="pembuatanKTP" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel"><i class="fab fa-creative-commons-by"></i> Persyaratan KTP (Kartu Tanda Penduduk)</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="ket">
                <div class="text-danger">- Persyaratan Pembuatan KTP Baru:</div>
                1. Telah berusia 17 tahun atau sudah kawin<br>
                2. Surat pengantar RT/RW, Kepala Dukuh dan Kepala Desa/Lurah<br>
                3. Foto copy KK (Kartu Keluarga)<br>
                4. Kutipan akta nikah bagi yang sudah menikah<br>
                5. Kutipan akta kelahiran<br><br>
            </div>

            <div class="ktp-hilang/rusak">
                <div class="text-danger">- Persyaratan Pembuatan KTP Karena Hilang/Rusak:</div>
                1. Surat keterangan kehilangan dari kepolisian atau KTP yang rusak<br>
                2. Foto copy KK (Kartu Keluarga)<br>
                3. Paspor dan izin tinggal tetap bagi WNA<br><br>
            </div>

            <div class="ktp-pindah">
                <div class="text-danger">- Persyaratan Pembuatan KTP Karena Pindah/Datang:</div>
                1. SKP (Surat Keterangan Pindah)/SKPD (Surat Keterangan Pindah Datang)<br>
                2. SKDLN bagi WNI yang datang dari luar negeri karena pindah<br><br>
            </div>

            <div class="ktp-perpanjang">
                <div class="text-danger">- Persyaratan Pembuatan KTP Karena Perpanjangan:</div>
                1. Foto copy KK(Kartu Keluarga)<br>
                2. KTP lama<br>
                3. Paspor, izin tinggal tetap, dan SKCK bagi WNA
            </div>
        </div>
        <div class="modal-footer">
            <p style="font-size: 13px">Kelurahan Teluk Mutiara {{ date('j-n-Y') }}</p>
        </div>
      </div>
    </div>
  </div>


  {{-- ALUR PEMBUATAN KK --}}
  <div class="modal fade" id="pembuatanKK" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-clone"></i> Persyaratan KK (Kartu Keluarga)</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="kk-baru">
                <div class="text-danger">- Persyaratan Pembuatan Kartu Keluarga Baru:</div>
                1. Surat pengantar dari RT/RW<br>
                2. Mengisi formulir permohonan kartu keluarga<br>
                3. Melampirkan surat keterangan pindah datang (bagi yang pindah)<br>
                4. Melampirkan foto copy kutipan akta nikah<br>
                5. Melampirkan foto copy kutipan akta kelahiran<br>
                6. Persyaratan lain yang diperlukan<br><br>
            </div>

            <div class="kk-perubahan">
                <div class="text-danger">- Persyaratan Pembuatan Kartu Keluarga Karena Perubahan Biodata Anggota Keluarga:</div>
                1. Kartu Keluarga lama (asli)<br>
                2. Foto copy Ijazah<br>
                2. Foto copy Akta Kelahiran<br>
                2. Foto copy Akta Nikah<br>
                3. Mengisi formulir perubahan akta nikah<br><br>
            </div>

            <div class="ktp-pindah">
                <div class="text-danger">- Persyaratan Pembuatan Kartu Keluarga Karena Kematian/Pindah Anggota Keluarga:</div>
                1. Kartu Keluarga lama (asli)<br>
                2. Surat Keterangan Kematian dari kelurahan atau akta kematian<br>
                2. Surat keterangan pindah
            </div>
        </div>
        <div class="modal-footer">
            <p style="font-size: 13px">Kelurahan Teluk Mutiara {{ date('j-n-Y') }}</p>
        </div>
      </div>
    </div>
  </div>
  
@endsection
