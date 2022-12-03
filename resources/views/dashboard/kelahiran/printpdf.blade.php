<div class="row">
    <div class="col-md-12">
        <div class="row">
            <img src="assets/img/logo.jpg" alt="" style="position: absolute; width: 65px; height: auto; margin-left: 15%;">
            <div class="col-md-12">
                <h3 style="padding: 0; margin: 0; text-align: center;">PEMERINTAH KABUPATEN ALOR<br> KECAMATAN TELUK MUTIARA<br> PEMERINTAH DESA WELAI TIMUR</h3>
                <h4 style="padding: 0; margin: 0; text-align: center;">Jalan Eltari Nomor 02 Teluk Mutiara</h4>
                <div style="margin-top: 9px;"></div>
                <hr style="width: 80%;">
                <hr style="width: 80%;">
            </hr>
        </div>
        
        <h3 style="text-align: center; padding-top: 6px;">LAPORAN DATA KELAHIRAN</h3>

        @if($printpdf->count())
        <table cellpadding="10" cellspacing="0" border="1" style="font-size: 16px; padding-top: 20px; width: 100%;">
            <tr style="background-color: #fbbf24">
                <th>No</th>
                <th>Nomor Akte</th>
                <th>Nama Bayi</th>
                <th>Tempat & Tanggal Lahir</th>
                <th>Jender</th>
                <th>Berat Badan</th>
                <th>Tempat Bersalin</th>
                <th>Penolong Lahir</th>
                <th>Nama Ayah</th>
                <th>Nama Ibu</th>
            </tr>
            @foreach ($printpdf as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->no_akte }}</td>
                    <td>{{ $item->nama }}</td>
                    <td>{{ $item->TTL }}</td>
                    <td>{{ $item->jender }}</td>
                    <td>{{ $item->berat }}</td>
                    <td>{{ $item->tempat_bersalin }}</td>
                    <td>{{ $item->penolong_lahir }}</td>
                    <td>{{ $item->nama_ayah }}</td>
                    <td>{{ $item->nama_ibu }}</td>
                </tr>
            @endforeach
        </table>
        @else
            <h5 class="bg-danger text-white text-center">Data Kelahiran tidak ditemukan</h5>
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