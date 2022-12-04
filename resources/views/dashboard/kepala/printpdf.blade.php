<div class="row">
    <div class="col-md-12">
        <div class="row">
            <img src="assets/img/logo.jpg" alt="" style="position: absolute; width: 65px; height: auto; margin-left: 5%;">
            <div class="col-md-12">
                <h3 style="padding: 0; margin: 0; text-align: center;">PEMERINTAH KABUPATEN ALOR<br> KECAMATAN TELUK MUTIARA<br> PEMERINTAH DESA WELAI TIMUR</h3>
                <h4 style="padding: 0; margin: 0; text-align: center;">Jalan Eltari Nomor 02 Teluk Mutiara</h4>
                <div style="margin-top: 9px;"></div>
                <div style="border-bottom: 1px solid black; margin-bottom: 3px;"></div>
                <div style="border-bottom: 1px solid black;"></div>
            </hr>
        </div>
        
        <h3 style="text-align: center; padding-top: 6px;">DATA ANGGOTA KELUARGA</h3>
        <h4 style="text-align: center; padding: 0; margin: 0;">NOMOR: {{ $printpdf[0]->nomor_kk }}</h4>

        <table>
            <tr>
                <td>Pemerintahan Kab/Kota</td>
                <td>: &nbsp;&nbsp;</td>
                <td>Kalabahi</td>
            </tr>
            <tr>
                <td>Kecamatan</td>
                <td>: &nbsp;&nbsp;</td>
                <td>Teluk Mutiara</td>
            </tr>
            <tr>
                <td>Desa/Kelurahan</td>
                <td>: &nbsp;&nbsp;</td>
                <td>Welai Timur</td>
            </tr>
            <tr>
                <td>Kode Pos</td>
                <td>: &nbsp;&nbsp;</td>
                <td>85817</td>
            </tr>
        </table>

        @if($printpdf->count())
        <table cellpadding="10" cellspacing="0" border="1" style="font-size: 16px; padding-top: 20px; width: 100%;">
            <tr style="background-color: #fbbf24">
                <th>No</th>
                <th>Nama Lengkap</th>
                <th>NIK</th>
                <th>Jender</th>
                <th>SHDRT</th>
                <th>TTL</th>
                <th>Agama</th>
                <th>Pendidikan</th>
                <th>Pekerjaan</th>
                <th>Keterangan</th>
            </tr>
            @foreach ($printpdf as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->nama_lengkap }}</td>
                    <td>{{ $item->nik }}</td>
                    <td>{{ $item->jender }}</td>
                    <td>{{ $item->relasi }}</td>
                    <td>{{ date("d F Y", strtotime($item->tanggal_lahir)) }}</td>
                    <td>{{ $item->agama }}</td>
                    <td>{{ $item->pendidikan }}</td>
                    <td>{{ $item->pekerjaan }}</td>
                    @if(!empty($item->id_kematian))
                        <td><p class="bg-danger text-white text-center">Meninggal</p></td>
                    @elseif(!empty($item->id_pindah))
                        <td><p class="bg-info text-white text-center">Pindah</p></td>
                    @else
                        <td>-</td>
                    @endif
                </tr>
            @endforeach
        </table>
        @else
            <h5 class="bg-danger text-white text-center">Data Penduduk tidak ditemukan</h5>
        @endif
        @php
            $tanggal = gmdate("d-m-Y",time());
        @endphp
       <div class="col-md-6">
            <table style="font-size: 16px; padding-top: 20px; float: left;">
                <tr>
                    <td>Dikeluarkan Tanggal</td>
                    <td>: &nbsp;&nbsp;</td>
                    <td>{{ $tanggal }}</td>
                </tr>
                <tr>
                    <td>LEMBAR</td>
                    <td>: &nbsp;&nbsp;</td>
                    <td>I. Kepala Keluarga</td>
                </tr>
                <tr>
                    <td></td>
                    <td>: &nbsp;&nbsp;</td>
                    <td>II. RT</td>
                </tr>
                <tr>
                    <td></td>
                    <td>: &nbsp;&nbsp;</td>
                    <td>III. Desa/Kelurahan</td>
                </tr>
                <tr>
                    <td></td>
                    <td>: &nbsp;&nbsp;</td>
                    <td>IV. Kecamatan</td>
                </tr>
            </table>
       </div>
        
        <div class="col-md-6" style="position: absolute; font-size: 16px; padding-top: 20px; float: right;">
            <div>Kalabahi, {{ $tanggal }}</div>
            <div style="padding-left: 30px">Kepala Desa</div><br><br><br>
            <div>Johanis Dolu, S.Psi.</div>
        </div>
    </div>
</div>