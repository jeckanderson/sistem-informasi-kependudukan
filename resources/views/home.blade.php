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
                <a href="" class="text-decoration-none" data-bs-toggle="modal" data-bs-target="#grafikLingkungan">
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
                        <img src="{{ asset('assets/img/1.jpg') }}" class="d-block w-100" alt="...">
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
                        <div class="calendar">
                            <div class="card bg-success">
                                <div class="card-header">
                                    <div class="row py-1">
                                        <div class="col-md-2 mt-3">
                                            <i class="fas fa-angle-left prev"></i>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="date text-center">
                                                <h3 class=""></h3>
                                                <p style="font-size: 12px;"></p>
                                            </div>
                                        </div>
                                        <div class="col-md-2 mt-3">
                                            <i class="fas fa-angle-right next"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body bg-dark">
                                    <div class="weekdays mb-2" style="font-size: 11px">
                                        <div>Sun</div>
                                        <div>Mon</div>
                                        <div>Tue</div>
                                        <div>Wed</div>
                                        <div>Thu</div>
                                        <div>Fri</div>
                                        <div>Sat</div>
                                    </div>
                                    <div class="days mb-3">
                                        {{-- <div class="prev-date"></div>
                                        <div class="next-date"></div> --}}
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="day-text-formate fs-5">TIME</div>
                                        </div>
                                        <div class="col-md-7">
                                            <div class="date-time-value" style="font-size: 15px">
                                                {{-- <div class="time-formate">01:42:20</div> --}}
                                                <div class="mt-1" id="clock"></div>
                                                <div class="date-formate"></div>
                                            </div>
                                            <div class="month-list"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-6">
                        <a href="" class="text-decoration-none d-block mb-4" data-bs-toggle="modal" data-bs-target="#pembuatanKK">
                            <div class="card bg-danger text-center d-block">
                                <i class="fas fa-file-alt text-white py-2 mb-3" style="font-size: 40px"></i>
                                <div class="align-items-center">
                                    <div class="text-center rounded-bottom text-white" style="background-color: rgba(0, 0, 0, 0.5)">Pembuatan Kartu Keluarga</div>
                                </div>
                            </div>
                        </a>
                        
                        <a href="" class="text-decoration-none d-block mb-2" data-bs-toggle="modal" data-bs-target="#pembuatanAkte">
                            <div class="card bg-info text-center d-block">
                                <i class="fas fa-file-alt text-white py-2 mb-3" style="font-size: 40px"></i>
                                <div class="align-items-center">
                                    <div class="text-center rounded-bottom text-white" style="background-color: rgba(0, 0, 0, 0.5)">Pembuatan Akte Kelahiran</div>
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
                                        <span class="bg-danger p-1 px-3 rounded-bottom">welcome {{ auth()->user()->name }}</span>
                                        </a>
                                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                            @if (auth()->user()->is_admin == 1)
                                                <li><a class="dropdown-item" href="/dashboard"><i class="fas fa-tachometer-alt"></i> My Dashboard</a></li>                                                
                                            @else
                                                <li><a class="dropdown-item" href="/pegawai"><i class="fas fa-tachometer-alt"></i> My Dashboard</a></li>    
                                            @endif
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
                                        <i class="fas fa-sign-in-alt text-white py-2 mb-3" style="font-size: 35px"></i>
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
          <h6 class="modal-title" id="exampleModalLabel"><i class="fab fa-creative-commons-by"></i> Alur Pembuatan Surat Kebutuhan Penduduk</h6>
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

            <div class="pindah-kabupaten">
                <div class="text-danger">- Persyarat mengurus surat keterangan pindah antar Kabupaten:</div>
                1. Surat Pengantar RT Domisili<br>
                2. Kartu Keluarga Asli<br>
                3. Kartu Keluarga Asli (KK yang ditumpangi apabila menumpang)<br>
                4. Surat Keterangan Pindah Datang dari Kantor Disdukcapil Daerah Pindah Datang<br>
                5. Fotocopy Surat Nikah/Akta Perkawinan<br>
                6. Fotocopy Akta Kelahiran/Ijazah<br>
                7. Fotocopy KTP EL Asli<br>
                8. Mengisi Formulir F-1.21<br><br>
            </div>

            <div class="pindah-provinis">
                <div class="text-danger">- Persyarat mengurus surat keterangan pindah antar Provinsi:</div>
                1. Kartu Tanda Penduduk (KTP))<br>
                2. Kartu Keluarga(KK)<br>
                3. Formulir pendaftaran perpindahan penduduk dari Disdukcapil daerah asal(KK)<br><br>
            </div>
        </div>
        <div class="modal-footer">
            <p style="font-size: 13px">Kelurahan Teluk Mutiara, {{ date("d F Y", strtotime(gmdate('d-m-Y'))) }}</p>
        </div>
      </div>
    </div>
  </div>


  {{-- GRAFIK TIAP LINGKUNGAN --}}
  <div class="modal fade" id="grafikLingkungan" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h6 class="modal-title" id="exampleModalLabel"><i class="fab fa-creative-commons-by"></i> Grafik Penduduk</h6>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">

            <div id="chartTiapLingkungan">
            </div>

        </div>
        <div class="modal-footer">
            <p style="font-size: 13px">Kelurahan Teluk Mutiara, {{ date("d F Y", strtotime(gmdate('d-m-Y'))) }}</p>
        </div>
      </div>
    </div>
  </div>

  {{-- ALUR PEMBUATAN KTP --}}
  <div class="modal fade" id="pembuatanKTP" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h6 class="modal-title" id="exampleModalLabel"><i class="fab fa-creative-commons-by"></i> Persyaratan KTP (Kartu Tanda Penduduk)</h6>
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
            <p style="font-size: 13px">Kelurahan Teluk Mutiara, {{ date("d F Y", strtotime(gmdate('d-m-Y'))) }}</p>
        </div>
      </div>
    </div>
  </div>


  {{-- ALUR PEMBUATAN KK --}}
  <div class="modal fade" id="pembuatanKK" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h6 class="modal-title" id="exampleModalLabel"><i class="fab fa-creative-commons-by"></i> Persyaratan KK (Kartu Keluarga)</h6>
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
            <p style="font-size: 13px">Kelurahan Teluk Mutiara, {{ date("d F Y", strtotime(gmdate('d-m-Y'))) }}</p>
        </div>
      </div>
    </div>
  </div>

  {{-- ALUR PEMBUATAN AKTE KELAHIRAN --}}
  <div class="modal fade" id="pembuatanAkte" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h6 class="modal-title" id="exampleModalLabel"><i class="fab fa-creative-commons-by"></i> Persyaratan Akte Kelahiran</h6>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="akte-baru">
                <div class="text-danger">- Persyaratan Pembuatan Akte Kelahiran:</div>
                1. Formulir Permohonan<br>
                2. Surat Keterangan Lahir dari Dokter/Bidan/Penolong Kelahiran (asli)<br>
                3. Fotokopi KTP-El orang tua (Pelapor adalah ayah atau ibu kandung)<br>
                4. Fotokopi KTP-El dua orang saksi<br>
                5. Surat Kuasa dari orang tua kandung apabila pelapor dikuasakan, disertai fokopi KTP-El penerima kuasa<br><br>
            </div>

            <div class="surat-kelahiran">
                <div class="text-danger">- Persyaratan Pembuatan Surat Kelahiran:</div>
                1. Surat Pengantar RT/RW<br>
                2. Fotocopy Surat dari Bidan/Rumah Sakit<br>
                3. Fotocopy Kartu Keluarga<br>
                4. Fotocopy KTP Orangtua<br>
                5. Mengisi Blangko Kelahiran (F2.02)<br><br>
            </div>
        </div>
        <div class="modal-footer">
            <p style="font-size: 13px">Kelurahan Teluk Mutiara, {{ date("d F Y", strtotime(gmdate('d-m-Y'))) }}</p>
        </div>
      </div>
    </div>
  </div>

@endsection

@section('footer')
  <script src="assets/js/highcharts.js"></script>
  <script>
        Highcharts.chart('chartTiapLingkungan', {
        chart: {
            type: 'column'
        },
        title: {
            text: 'Grafik Penduduk Pada Tiap Lingkungan'
        },
        subtitle: {
            text: 'Kelurahan Teluk Mutiara'
        },
        xAxis: {
            categories: [
                'Lingkungan 1',
                'Lingkungan 2',
                'Lingkungan 3',
                'Lingkungan 4'
            ],
            crosshair: true
        },
        yAxis: {
            title: {
                useHTML: true,
                text: 'Million tonnes CO<sub>2</sub>-equivalents'
            }
        },
        tooltip: {
            headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
            pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                '<td style="padding:0"><b>{point.y:.1f}</b></td></tr>',
            footerFormat: '</table>',
            shared: true,
            useHTML: true
        },
        plotOptions: {
            column: {
                pointPadding: 0.2,
                borderWidth: 0
            }
        },
        series: [{
            name: 'Jumlah',
            data: [{{ $link1 }}, {{ $link2 }}, {{ $link3 }}, {{ $link4 }}]
        }]
    });
</script>
@stop
  
