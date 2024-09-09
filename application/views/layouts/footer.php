<footer class="main-footer">
    <div class="float-right d-none d-sm-block">
        Anything you want
    </div>
    Copyright &copy; 2022 - <?= date('Y') ?>. <strong><a href="">Titik Balik Teknologi</a>.</strong>
</footer>

<aside class="control-sidebar control-sidebar-dark">
</aside>
</div>

<script src="<?= base_url() ?>public/assets/plugins/jquery/jquery.min.js"></script>
<script src="<?= base_url() ?>public/assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- <script src="<?= base_url() ?>public/assets/plugins/sweetalert2/sweetalert2.min.js"></script>
<script src="<?= base_url() ?>public/assets/plugins/toastr/toastr.min.js"></script> -->
<script src="<?= base_url() ?>public/assets/dist/js/adminlte.min.js"></script>
<!-- sweetalert -->
<script src="<?= base_url() ?>public/js/sweetalert2.all.min.js"></script>
<!-- <script src="<?= base_url() ?>public/assets/js/grafik.js"></script> -->

<!-- ajax -->
<script src="<?= base_url() ?>public/js/admin/save-produk.js"></script>
<script src="<?= base_url() ?>public/js/admin/save-kategori.js"></script>
<script src="<?= base_url() ?>public/js/admin/status-transaksi.js"></script>


<script src="<?= base_url() ?>public/js/pelanggan/penyewaan.js"></script>
<script src="<?= base_url() ?>public/js/pelanggan/add-to-cart.js"></script>
<!-- <script src="<?= base_url() ?>public/js/pelanggan/checkout.js"></script> -->

<script>
    $(document).ready(function() {
        $('.product-image-thumb').on('click', function() {
            var $image_element = $(this).find('img')
            $('.product-image').prop('src', $image_element.attr('src'))
            $('.product-image-thumb.active').removeClass('active')
            $(this).addClass('active')
        })
    })
</script>

<script>
    $(document).ready(function() {
        // Tombol "Check Akumulasi Pembayaran"
        $('#check-total-button').click(function() {
            // Tampilkan modal input durasi penyewaan
            $('#rentalDurationModal').modal('show');
        });

        // Simpan durasi penyewaan dari modal
        $('#save-rental-duration').click(function() {
            var rental_duration_modal = $('#rental_duration_modal').val();
            if (rental_duration_modal === '' || parseInt(rental_duration_modal) <= 0) {
                // alert('Masukkan durasi penyewaan yang valid.');
                Swal.fire('Error', 'Masukkan durasi penyewaan yang valid.', 'error');
                return;
            }

            // Masukkan durasi penyewaan ke dalam form checkout
            $('#rental_duration').val(rental_duration_modal);

            // Sembunyikan modal
            $('#rentalDurationModal').modal('hide');

            // Tampilkan form checkout setelah memasukkan durasi
            $('#checkout-form').fadeIn();

            $('#pay-button').show();

            var harga_per_hari = 20000; // Ganti dengan harga sewa per hari yang sesuai
            var durasi_sewa = parseInt(rental_duration_modal); // Ambil durasi sewa dari input

            var total_biaya = harga_per_hari * durasi_sewa;

            var total_price = 0;
            <?php foreach ($cart_items as $item) { ?>
                total_price += <?= $item['harga_produk'] ?> * <?= $item['quantity'] ?>;
            <?php } ?>

            $('.total-all-items').text('Rp. ' + total_price.toFixed(2));
            var dp_percentage = 0.4; // 40%
            var initial_payment = (total_price + total_biaya) * dp_percentage;
            $('.total-initial-payment').text('Rp. ' + initial_payment.toFixed(2));
            var final_payment = (total_price + total_biaya) - initial_payment;
            $('.total-final-payment').text('Rp. ' + final_payment.toFixed(2));

        });

        // Event untuk tombol "Proses Pembayaran"
        $('#pay-button').click(function() {
            // Validasi input sebelum melakukan proses pembayaran
            var initial_payment = $('#initial_payment').val();
            var rental_duration = $('#rental_duration').val();
            var proof_of_payment = $('#proof_of_payment')[0].files[0];

            if (initial_payment === '' || rental_duration === '' || !proof_of_payment) {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Harap lengkapi semua informasi pembayaran!',
                });
                return;
            }

            var formData = new FormData();
            formData.append('initial_payment', initial_payment);
            formData.append('rental_duration', rental_duration);
            formData.append('proof_of_payment', proof_of_payment);

            // Jika validasi sukses, lakukan proses pembayaran
            $.ajax({
                type: 'POST',
                url: '../cart/pay_initial_payment',
                data: formData,
                processData: false, // Jangan memproses data
                contentType: false, // Jangan menetapkan jenis konten
                success: function(response) {
                    var res = JSON.parse(response);
                    if (res.status == 'success') {
                        Swal.fire({
                            icon: 'success',
                            title: 'Success!',
                            text: res.message
                        }).then((result) => {
                            // Reload current page (checkout page)
                            location.reload();
                        });
                    } else {
                        Swal.fire('Error', res.message, 'error');
                    }
                }
            });
            // $.ajax({
            //     type: 'POST',
            //     url: '../cart/pay_initial_payment',
            //     data: {
            //         initial_payment: initial_payment,
            //         rental_duration: rental_duration,
            //         proof_of_payment: proof_of_payment
            //     },
            //     success: function(response) {
            //         var res = JSON.parse(response);
            //         if (res.status == 'success') {
            //             Swal.fire({
            //                 icon: 'success',
            //                 title: 'Success!',
            //                 text: res.message
            //             }).then((result) => {
            //                 // Reload current page (checkout page)
            //                 location.reload();
            //             });
            //         } else {
            //             Swal.fire('Error', res.message, 'error');
            //         }
            //     }
            // });
        });
    });
</script>

</body>

</html>