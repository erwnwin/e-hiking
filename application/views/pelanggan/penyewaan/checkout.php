<!-- Container fluid -->
<div class="container-fluid p-6">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-12">
            <!-- Page header -->
            <div class="border-bottom pb-4 mb-2">
                <h3 class="mb-0 fw-bold">Form Checkout Penyewaan</h3>
            </div>
        </div>
    </div>
    <!-- row -->

    <?php if (!empty($cart_items)) { ?>
        <div class="card mt-2">
            <div class="card-body">
                <!-- Stepper content -->
                <h4>Informasi Proses Pembayaran Awal / DP</h4>
                <hr>
                <form id="checkout-form" style="display: none;" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="initial_payment" class="form-label">Masukkan Jumlah DP / Awal</label>
                        <input type="number" class="form-control" id="initial_payment" name="initial_payment" required>
                    </div>
                    <div class="mb-3">
                        <label for="rental_duration" class="form-label">Lama Sewa / Durasi (hari)</label>
                        <input type="number" class="form-control" id="rental_duration" name="rental_duration" required>
                    </div>
                    <div class="mb-3">
                        <label for="proof_of_payment" class="form-label">Upload Bukti Pembayaran / Transfer</label>
                        <input type="file" class="form-control" id="proof_of_payment" name="proof_of_payment" required>
                    </div>
                    <button type="button" id="pay-button" class="btn btn-primary" style="display: none;">Proses Pembayaran</button>
                </form>
            </div>
        </div>

        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-12">
                <div class="card mt-5 mt-xxl-0">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h4 class="mb-0">Daftar Barang yang akan disewa</h4>
                        <a href="<?= base_url('form-penyewaan') ?>" class="btn btn-warning btn-sm text-white">Edit Form Cart Penyewaan</a>
                    </div>
                    <div class="card-body">
                        <div class="d-md-flex">
                            <div class="ms-md-4 mt-2">
                                <?php foreach ($cart_items as $item) { ?>
                                    <h4 class="mb-1 ">
                                        <a href="#!" class="text-inherit">
                                            <?= $item['judul_produk'] ?>
                                        </a>
                                    </h4>
                                    <h5>Harga Sewa Satu Items: <?= number_format($item['harga_produk'], 2) ?></h5>
                                    <hr>
                                <?php } ?>
                            </div>
                        </div>
                        <hr class="my-3">
                    </div>

                    <div class="card-body border-top pt-2">
                        <ul class="list-group list-group-flush mb-0 ">
                            <li class="d-flex justify-content-between list-group-item px-0">
                                <span>Pembayaran DP / Awal</span>
                                <span class="text-dark total-initial-payment">Rp. 0.00</span>
                            </li>
                            <li class="d-flex justify-content-between list-group-item px-0">
                                <span>Total Pembayaran / Semua Items</span>
                                <span class="text-dark total-all-items">Rp. 0.00</span>
                            </li>
                        </ul>
                    </div>
                    <div class="card-footer">
                        <li class="d-flex justify-content-between list-group-item px-0 checkout-summary" style="display: none;">
                            <span class="fs-4 text-dark">Total Yang Harus Dibayarkan / Pelunasan</span>
                            <span class="text-dark total-final-payment">Rp. 0.00</span>
                        </li>
                    </div>
                </div>
            </div>
        </div>

        <!-- Tombol "Check Akumulasi Pembayaran" -->
        <div class="text-center mt-4">
            <button type="button" id="check-total-button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#rentalDurationModal">
                Check Akumulasi Pembayaran
            </button>

        </div>

    <?php } else { ?>
        <div class="alert alert-danger d-flex align-items-center mt-3" role="alert">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-exclamation-triangle-fill me-2" viewBox="0 0 16 16">
                <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
            </svg>
            <div>
                Cart Penyewaan Anda Kosong. Silahkan memilih produk yang akan anda sewa pada menu produk -> checkout pada form penyewaan -> pembayaran.
            </div>
        </div>
    <?php } ?>
</div>

<!-- Modal Input Durasi Penyewaan -->
<div class="modal fade" id="rentalDurationModal" tabindex="-1" aria-labelledby="rentalDurationModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="rentalDurationModalLabel">Masukkan Durasi Penyewaan (hari)</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="rental-duration-form">
                    <div class="mb-3">
                        <label for="rental_duration_modal" class="form-label">Durasi (hari)</label>
                        <input type="number" class="form-control" id="rental_duration_modal" name="rental_duration_modal" required>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" id="save-rental-duration" class="btn btn-primary">Simpan</button>
            </div>
        </div>
    </div>
</div>