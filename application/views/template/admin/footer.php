</div>
</div>



<!-- Scripts -->
<!-- Libs JS -->
<script src="<?= base_url() ?>public/backend/node_modules/jquery/dist/jquery.min.js"></script>
<script src="<?= base_url() ?>public/backend/node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<script src="<?= base_url() ?>public/backend/node_modules/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<script src="<?= base_url() ?>public/backend/node_modules/feather-icons/dist/feather.min.js"></script>
<script src="<?= base_url() ?>public/backend/node_modules/prismjs/prism.js"></script>
<script src="<?= base_url() ?>public/backend/node_modules/apexcharts/dist/apexcharts.min.js"></script>
<script src="<?= base_url() ?>public/backend/node_modules/dropzone/dist/min/dropzone.min.js"></script>
<script src="<?= base_url() ?>public/backend/node_modules/prismjs/plugins/toolbar/prism-toolbar.min.js"></script>
<script src="<?= base_url() ?>public/backend/node_modules/prismjs/plugins/copy-to-clipboard/prism-copy-to-clipboard.min.js"></script>



<!-- Theme JS -->
<!-- build:js <?= base_url() ?>public/backend/assets/js/theme.min.js -->
<script src="<?= base_url() ?>public/backend/assets/js/main.js"></script>
<script src="<?= base_url() ?>public/backend/assets/js/feather.js"></script>
<script src="<?= base_url() ?>public/backend/assets/js/sidebarMenu.js"></script>

<!-- sweetalert -->
<script src="<?= base_url() ?>public/js/sweetalert2.all.min.js"></script>
<!-- <script src="<?= base_url() ?>public/js/sweetalert.min.js"></script> -->

<!-- ajax -->
<script src="<?= base_url() ?>public/js/admin/save-produk.js"></script>

<?php if ($this->session->userdata('hak_akses') == '4') { ?>
    <script src="<?= base_url() ?>public/js/pelanggan/penyewaan.js"></script>
    <!-- <script src="<?= base_url() ?>public/js/pelanggan/checkout.js"></script> -->
<?php } ?>

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
                alert('Masukkan durasi penyewaan yang valid.');
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
            // var proof_of_payment = $('#proof_of_payment')[0].files[0];

            if (initial_payment === '' || rental_duration === '') {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Harap lengkapi semua informasi pembayaran!',
                });
                return;
            }

            // Jika validasi sukses, lakukan proses pembayaran
            $.ajax({
                type: 'POST',
                url: '../cart/pay_initial_payment',
                data: {
                    initial_payment: initial_payment,
                    rental_duration: rental_duration
                },
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
        });
    });
</script>

<!-- endbuild -->



</body>

</html>