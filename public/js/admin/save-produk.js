$(document).ready(function() {
    $('#productForm').submit(function(e) {
        e.preventDefault(); // Mencegah pengiriman form secara default

        var judul_produk = $('#judul_produk').val().trim();
        var deskripsi_produk = $('#deskripsi_produk').val().trim();
        var harga_produk = $('#harga_produk').val().trim();
        var kategori_produk = $('#kategori_produk').val().trim();
        var main_image = $('#main_image').val().trim();
        var gallery_images = $('#gallery_images').val().trim();

        // Check if fields are empty
        if (judul_produk === '' ) {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Judul produk wajib diisi!',
                confirmButtonColor: "#3085d6",
                confirmButtonText: 'Oke'
            });
            return;
        } else if (deskripsi_produk === '') {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Deskripsi produk wajib diisi!',
                confirmButtonColor: "#3085d6",
                confirmButtonText: 'Oke'

            });
            return;
        } else if (harga_produk === '') {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Harga produk wajib diisi!',
                confirmButtonColor: "#3085d6",
                confirmButtonText: 'Oke'

            });
            return;
        } else if (kategori_produk === '') {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Kategori produk wajib diisi!',
                confirmButtonColor: "#3085d6",
                confirmButtonText: 'Oke'

            });
            return;
        } else if (main_image === '') {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Gambar judul produk wajib diisi!',
                confirmButtonColor: "#3085d6",
                confirmButtonText: 'Oke'

            });
            return;
        } else if (gallery_images === '') {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Galeri foto produk wajib diisi!',
                confirmButtonColor: "#3085d6",
                confirmButtonText: 'Oke'

            });
            return;
        }

        var formData = new FormData(this);
        $('#btnSimpanProduk').prop('disabled', true).html('Simpan proses....');
        
        $.ajax({
            url: 'store', // URL ke metode controller untuk menyimpan data
            type: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            success: function(response) {
                var res = JSON.parse(response);
                if (res.status === 'success') {
                    $('#btnSimpanProduk').prop('disabled', false).html('Simpan');
                    Swal.fire({
                        icon: 'success',
                        title: 'Sukses',
                        text: res.message,
                        confirmButtonText: 'Oke'
                    }).then(() => {
                        if (res.redirect) {
                            window.location.href = res.redirect;
                            $('#productForm')[0].reset(); // Reset form setelah sukses
                        }
                    });
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Gagal',
                        text: res.message,
                        confirmButtonText: 'Oke'
                    });
                }
            },
            error: function(xhr, status, error) {
                console.error(error);
                Swal.fire({
                    icon: 'error',
                    title: 'Terjadi Kesalahan',
                    text: 'Silakan coba lagi.',
                    confirmButtonText: 'Oke'
                });
            }
        });
    });
});