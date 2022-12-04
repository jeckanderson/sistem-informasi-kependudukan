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
        
        <h3 style="text-align: center; padding-top: 6px;">LAPORAN DATA PINDAH PENDUDUK</h3>

        @if($cetaklap->count())
        <table cellpadding="10" cellspacing="0" border="1" style="font-size: 16px; padding-top: 20px; width: 100%;">
            <tr style="background-color: #fbbf24">
                <th>No</th>
                <th>Nama Lengkap</th>
                <th>NIK</th>
                <th>Jender</th>
                <th>Tanggal Pindah</th>
                <th>Alamat Asal</th>
                <th>Alamat Tujuan</th>
                <th>Jenis Pindah</th>
            </tr>
            @foreach ($cetaklap as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->nama_lengkap }}</td>
                    <td>{{ $item->nik }}</td>
                    <td>{{ $item->jender }}</td>
                    <td>{{ date("d F Y", strtotime($item->tgl_pindah)) }}</td>
                    <td>{{ $item->alamat_asal }}</td>
                    <td>{{ $item->tujuan }}</td>
                    <td>{{ $item->jenis_pindah }}</td>
                </tr>
            @endforeach
        </table>
        @else
            <h5 class="bg-danger text-white text-center">Data Pindah tidak ditemukan</h5>
        @endif

        @php
        $tanggal = gmdate("d-m-Y",time());
        @endphp
        <div class="col-md-12" style="margin-left: 85%; font-size: 16px; padding-top: 30px">
            <div>Kalabahi, {{ $tanggal }}</div>
            <div style="padding-left: 30px">Kepala Desa</div><br><br><br>
            <div>Johanis Dolu, S.Psi.</div>
        </div>
    </div>
</div>