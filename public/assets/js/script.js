// JAM
setInterval(() => {
    let date = new Date()
    let clock = document.getElementById('clock')
    clock.innerHTML =
        date.getHours()+":"+
        date.getMinutes()+":"+
        date.getSeconds();
}, 1000);

// KALENDER
const date = new Date();

const renderCalendar = () => {
    date.setDate(1);

    const monthDays = document.querySelector('.days');
    const lastDay = new Date(date.getFullYear(),date.getMonth() + 1, 0).getDate();

    const prevLastDay = new Date(date.getFullYear(),date.getMonth(), 0).getDate();
    const firstDayIndex = date.getDay();

    const lastDayIndex = new Date(
        date.getFullYear(),
        date.getMonth() + 1,
        0
        ).getDay();
        
    const nextDays = 7 - lastDayIndex - 1;

    const months = [
        "January",
        "February",
        "March",
        "April",
        "May",
        "June",
        "July",
        "August",
        "September",
        "October",
        "November",
        "December"
    ];
    document.querySelector(".date h3").innerHTML
    = months[date.getMonth()];

    document.querySelector(".date p").innerHTML
    = new Date().toDateString();

    let days = "";

    for(let x = firstDayIndex; x > 0; x--) {
        days += `<div class="prev-date">${prevLastDay - x + 1}</div>`;
    }

    for(let i = 1; i <= lastDay; i++) {
        if(i === new Date().getDate() &&
        date.getMonth() === new Date().getMonth()) {
            days += `<div class="today">${i}</div>`;
        } else {
            days += `<div>${i}</div>`;
        }
    }

    for(let j = 1; j <= nextDays; j++) {
        days += `<div class="next-date">${j}</div>`;
        monthDays.innerHTML = days;
    }
};

document.querySelector(".prev").
addEventListener("click", () => {
    date.setMonth(date.getMonth() - 1);
    renderCalendar();
});
document.querySelector(".next").
addEventListener("click", () => {
    date.setMonth(date.getMonth() + 1);
    renderCalendar();
});

renderCalendar();
// AKHIR KALENDER

// Ubah Kepala Keluarga
// $(function() ketika document-nya sudah siap, jalankan fungsi di dalam-nya
$(function() {
    // tambah data kepala
    $('.tambahDataKepala').on('click', function() {
        $('#judulModal').html('Tambah Data Kepala Keluarga');
        $('.modal-footer button[type=submit]').html('Tambah Data');
        $('#nomor_kk').val('');
        $('#no_telpon').val('');
        $('#nama_kecamatan').val('');
        $('#nama_kelurahan').val('');
        $('#nama_lingkungan').val('');
        $('#kode_rw').val('');
        $('#kode_rt').val('');
    });

    // ubah data kepala
    $('.tampilModalUbah').on('click', function() {
        $('#judulModal').html('Ubah Data Kepala Keluarga');
        $('.modal-footer button[type=submit]').html('Ubah Data');
        // $('.modal-body form').attr('action','/dashboard/kepala/' + id + 'PUT');
        // $(this) adalah tombol update yang sedang kita click, lalu ambil id-nya
        const id = $(this).data('id');
        // jalankan ajax-nya
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        
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
            }
        });
    });
})

function update(id = '') {
    var var_url = '/dashboard/kepala/' + id;
    var var_type = 'put';
    $.ajax({
        url: var_url,
        type: var_type,
    });
}

