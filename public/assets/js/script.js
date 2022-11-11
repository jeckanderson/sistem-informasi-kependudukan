// JAM
// setInterval(() => {
//     let date = new Date()
//     let clock = document.getElementById('clock')
//     clock.innerHTML =
//         date.getHours()+":"+
//         date.getMinutes()+":"+
//         date.getSeconds();
// }, 1000);


// Ubah Kepala Keluarga
// $(function() ketika document-nya sudah siap, jalankan fungsi di dalam-nya
$(function() {
    // tambah data kepala
    $('.tambahDataKepala').on('click', function() {
        $('#judulModal').html('Tambah Data Kepala Keluarga');
        $('.modal-footer button[type=submit]').html('Tambah Data');
    });

    // ubah data kepala
    $('.tampilModalUbah').on('click', function() {
        $('#judulModal').html('Ubah Data Kepala Keluarga');
        $('.modal-footer button[type=submit]').html('Ubah Data');
        $('.modal-body form').attr('action','/dashboard/kepala');
        // $(this) adalah tombol update yang sedang kita click, lalu ambil id-nya
        const id = $(this).data('id');
        // jalankan ajax-nya
        $.ajax({
            url: '/dashboard/kepala/' + id + '/edit',
            type: 'GET',
            dataType: 'json',
            success: function(data) {
                $('#nomor_kk').val(data.nomor_kk);
                $('#no_telpon').val(data.no_telpon);
                $('#nama_kecamatan').val(data.nama_kecamatan);
                $('#nama_kelurahan').val(data.nama_kelurahan);
                $('#nama_lingkungan').val(data.nama_lingkungan);
                $('#kode_rw').val(data.kode_rw);
                $('#kode_rt').val(data.kode_rt);
                $('.simpanData').click(function() {
                    update(id);
                });
            }
        });
    });
})

function update(id = '') {
    var var_url = '/dashboard/kepala/' + id;
    var var_type = 'PUT';
    $.ajax({
        url: var_url,
        type: var_type,
    });
}

// function show(id) {
//     $.get("{{ url('/dashboard/kepala/cekdata) }}/" + id, {}, function(data, status) {
//         $('#judulModal').html('Ubah Data Kepala Keluarga');
//         $('.modal-footer button[type=submit]').html('Ubah Data');
//     });
// }

// SwitAlert Hapus KK
// $('.hapus-confirm').on('click', function(e) {
//     e.preventDefault();
//     const action = $(this).attr('action');
    

//     Swal.fire({
//         title: 'Apakah anda yakin?',
//         text: "data kepala keluarga akan di hapus!",
//         icon: 'warning',
//         showCancelButton: true,
//         confirmButtonColor: '#3085d6',
//         cancelButtonColor: '#d33',
//         confirmButtonText: 'Hapus Data!'
//       }).then((result) => {
//                 if (result.value == true) {
//                 document.location.href = action;
//             };
//       });
// });