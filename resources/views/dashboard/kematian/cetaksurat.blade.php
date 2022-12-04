<div class="row">
    <div class="col-md-12">
        <div class="row">
            <img src="assets/img/logo.jpg" alt="" style="position: absolute; width: 65px; height: auto;">
            <div class="col-md-12">
                <h3 style="padding: 0; margin: 0; text-align: center;">PEMERINTAH KABUPATEN ALOR<br> KECAMATAN TELUK MUTIARA<br> PEMERINTAH DESA WELAI TIMUR</h3>
                <h4 style="padding: 0; margin: 0; text-align: center;">Jalan Eltari Nomor 02 Teluk Mutiara</h4>
                <div style="margin-top: 9px;"></div>
                <div style="border-bottom: 1px solid black; margin-bottom: 3px;"></div>
                <div style="border-bottom: 1px solid black;"></div>
            </div>

        <table style="font-size: 16px; padding-top: 20px;">
            <tr>
                <td>Pemerintahan Kab/Kota</td>
                <td>&nbsp;&nbsp;:</td>
                <td>Kalabahi</td>
            </tr>
            <tr>
                <td>Kecamatan</td>
                <td>&nbsp;&nbsp;:</td>
                <td>Teluk Mutiara</td>
            </tr>
            <tr>
                <td>Desa/Kelurahan</td>
                <td>&nbsp;&nbsp;:</td>
                <td>Welai Timur</td>
            </tr>
        </table>
        
        <h4 style="text-align: center; padding-top: 10px; font-weight: none;">UNTUK YANG BERSANGKUTAN<br><div style="font-weight: bold;">SURAT KETERANGAN KEMATIAN</div></h4>
        <div style="text-align: center; margin-top: 6px;">Nomor : {{ $cetaksurat[0]->id_kematian }}</div>

        <h4 style="font-weight: bold;">Yang bertanda tangan dibawah ini menerangkan bahwa :</h4>
        <table style="padding: 0; margin-left: 12px;">
            <tr>
                <td>Nama Lengkap</td>
                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</td>
                <td>{{ $cetaksurat[0]->nama_lengkap }}</td>
            </tr>
            <tr>
                <td>NIK</td>
                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</td>
                <td>{{ $cetaksurat[0]->nik }}</td>
            </tr>
            <tr>
                <td>Jenis Kelamin</td>
                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</td>
                <td>{{ $cetaksurat[0]->jender }}</td>
            </tr>
            <tr>
                <td>Tempat & Tanggal Lahir</td>
                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</td>
                <td>{{ date("d F Y", strtotime($cetaksurat[0]->tanggal_lahir)) }}</td>
            </tr>
            <tr>
                <td>Agama</td>
                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</td>
                <td>{{ $cetaksurat[0]->agama }}</td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</td>
                <td>-</td>
            </tr>
        </table>
        <h4 style="font-weight: bold;">Telah meninggal dunia pada :</h4>
        <table style="padding: 0; margin-left: 12px;">
            <tr>
                <td>Tanggal</td>
                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</td>
                <td>{{ date("d F Y", strtotime($cetaksurat[0]->tgl_meninggal)) }}</td>
            </tr>
            <tr>
                <td>Bertempat di</td>
                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</td>
                <td>{{ $cetaksurat[0]->tempat_meninggal }}</td>
            </tr>
            <tr>
                <td>Penyebab Kematian</td>
                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</td>
                <td>{{ $cetaksurat[0]->sebab }}</td>
            </tr>
        </table>
        <h4>Surat keterangan ini dibuat atas dasar yang sebenarnya.</h4>

        @php
            $tanggal = gmdate("d-m-Y",time());
        @endphp
        
        <div class="col-md-12" style="margin-left: 75%; font-size: 16px; padding-top: 30px">
            <div>Kalabahi, {{ $tanggal }}</div>
            <div style="padding-left: 30px">Kepala Desa</div><br><br><br>
            <div>Johanis Dolu, S.Psi.</div>
        </div>
    </div>
</div>