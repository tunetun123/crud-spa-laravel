$(document).ready(function () {
    fetchPenjualan();
});

function formatRupiah(number) {
    return new Intl.NumberFormat('id-ID', {
        style: 'currency',
        currency: 'IDR',
        minimumFractionDigits: 0
    }).format(number);
}

function fetchPenjualan() {
    $.ajax({
        url: "/api/penjualan",
        method: "GET",
        success: function (data) {
            let rows = '';
            $.each(data, function (key, penjualan) {
                rows += `<tr>
                    <td>${key + 1}</td>
                    <td>${penjualan.nama_produk}</td>
                    <td>${penjualan.jumlah}</td>
                    <td>${formatRupiah(penjualan.harga)}</td>
                    <td>
                        <button class="btn btn-sm btn-warning editPenjualan" data-id="${penjualan.id}">Edit</button>
                        <button class="btn btn-sm btn-danger deletePenjualan" data-id="${penjualan.id}">Delete</button>
                    </td>
                </tr>`;
            });
            $('#penjualanTabel tbody').html(rows);
        },
    });
}

$('#createPenjualan').click(function () {
    $('#id').val('');
    $('#penjualanForm')[0].reset();
    $('#modalTitle').text('Tambah Data');
    $('#modal').modal('show');
});

$('#penjualanForm').submit(function (e) {
    e.preventDefault();
    let id = $('#id').val();
    let url = id ? `/api/penjualan/${id}` : '/api/penjualan';
    let method = id ? 'PUT' : 'POST';
    $.ajax({
        url: url,
        method: method,
        data: $(this).serialize(),
        success: function () {
            $('#modal').modal('hide');
            fetchPenjualan();

            Swal.fire({
                icon: 'success',
                title: id ? 'Berhasil Diperbarui!' : 'Berhasil Ditambahkan!',
                text: id ? 'Data penjualan berhasil diperbarui.' : 'Data penjualan berhasil ditambahkan.',
                timer: 2000,
                showConfirmButton: false
            });
        },

        error: function() {
            Swal.fire({
                icon: 'error',
                title: 'Gagal!',
                text: 'Terjadi kesalahan. Silakan coba lagi.',
            });
        }
    });
});

$(document).on('click', '.editPenjualan', function () {
    let id = $(this).data('id');
    $.ajax({
        url: `/api/penjualan/${id}`,
        method: "GET",
        success: function (data) {
            $('#id').val(data.id);
            $('#nama_produk').val(data.nama_produk);
            $('#jumlah').val(data.jumlah);
            $('#harga').val(data.harga);
            $('#modalTitle').text('Edit Data');
            $('#modal').modal('show');
        }
    });
});

$(document).on('click', '.deletePenjualan', function () {
    let id = $(this).data('id');
    Swal.fire({
        title: 'Yakin ingin menghapus?',
        text: 'Data yang sudah dihapus tidak bisa dikembalikan.',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Ya, Hapus!'
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: `/api/penjualan/${id}`,
                method: 'DELETE',
                success: function() {
                    fetchPenjualan();

                    Swal.fire({
                        icon: 'success',
                        title: 'Berhasil Dihapus!',
                        text: 'Data penjualan berhasil dihapus.',
                        timer: 2000,
                        showConfirmButton: false
                    });
                },
                error: function() {
                    Swal.fire({
                        icon: 'error',
                        title: 'Gagal!',
                        text: 'Terjadi kesalahan saat menghapus data.',
                    });
                }
            });
        }
    });
});
