<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Form Checkout Penyewaan</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <?php if (!empty($cart_items)) { ?>

                <div class="card card-default">
                    <div class="card-header">
                        <h3 class="card-title">Informasi Proses Pembayaran Awal / DP</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <form id="checkout-form" style="display: none;" enctype="multipart/form-data">
                            <div class="mb-3">
                                <label for="initial_payment" class="form-label">Masukkan Jumlah DP / Awal</label>
                                <input type="number" class="form-control" id="initial_payment" placeholder="Masukkan DP / Pembayaran Awal" name="initial_payment" required>
                                <small class="text-danger">Masukkan sesuai invoice di bawah.</small>
                            </div>
                            <div class="mb-3">
                                <label for="rental_duration" class="form-label">Lama Sewa / Durasi (hari)</label>
                                <input type="number" class="form-control" id="rental_duration" name="rental_duration">
                            </div>
                            <div class="mb-3">
                                <label for="proof_of_payment" class="form-label">Upload Bukti Pembayaran / Transfer</label>
                                <input type="file" class="form-control" id="proof_of_payment" name="proof_of_payment" accept="image/*">
                            </div>
                            <button type="button" id="pay-button" class="btn btn-primaryku" style="display: none;">Proses Pembayaran</button>
                        </form>
                    </div>
                </div>

                <div class="card card-default">
                    <div class="card-header">
                        <h3 class="card-title">Daftar Barang yang akan disewa</h3>
                        <div class="card-tools">
                            <a href="<?= base_url('form-penyewaan') ?>" class="btn btn-sm btn-primaryku"><i class="fas fa-edit"></i> Edit Cart Sewa</a>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">

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
                                    <span><strong>Pembayaran DP / Awal</strong></span>
                                    <span class="text-dark total-initial-payment">Rp. 0.00</span>
                                </li>
                                <li class="d-flex justify-content-between list-group-item px-0">
                                    <span><strong>Total Pembayaran / Semua Items</strong></span>
                                    <span class="text-dark total-all-items">Rp. 0.00</span>
                                </li>
                            </ul>
                        </div>
                        <div class="card-footer">
                            <li class="d-flex justify-content-between list-group-item px-0 checkout-summary" style="display: none;">
                                <span class="fs-4 text-dark"><strong>Total Yang Harus Dibayarkan / Pelunasan</strong></span>
                                <span class="text-dark total-final-payment">Rp. 0.00</span>
                            </li>
                        </div>
                    </div>
                </div>


                <!-- Tombol "Check Akumulasi Pembayaran" -->
                <div class="text-center">
                    <button type="button" id="check-total-button" class="btn btn-primaryku" data-bs-toggle="modal" data-bs-target="#rentalDurationModal">
                        Check Akumulasi Pembayaran
                    </button>

                </div>

            <?php } else { ?>
                <div class="alert custom-alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h5><i class="icon far fa-question-circle"></i>Mohon Diperhatikan!</h5>
                    Cart Penyewaan Anda Kosong. Silahkan memilih produk yang akan anda sewa pada <b><a href="<?= base_url('barang') ?>" class="text-danger">BARANG HIKING</a></b>
                    <hr>
                    <p style="text-transform:uppercase"> => checkout pada form penyewaan <br>
                        => pembayaran</p>
                </div>

            <?php } ?>
        </div>
    </section>
    <div>
        <br>
    </div>
</div>

<!-- Modal Input Durasi Penyewaan -->
<div class="modal fade" id="rentalDurationModal" tabindex="-1" role="dialog" aria-labelledby="modal-tambah-label" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <div id="overlayAkumulasiBayar" class="overlay hidden">
                    <i class="fas fa-2x fa-sync fa-spin"></i>
                </div>
                <h5 class="modal-title" id="rentalDurationModal-label">Ploting Jadwal Mata Pelajaran</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
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
                <button type="button" class="btn btn-dangerku btn-sm" data-bs-dismiss="modal">Close</button>
                <button type="button" id="save-rental-duration" class="btn btn-sm btn-primaryku">Simpan</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal Input Durasi Penyewaan -->
<!-- <div class="modal fade" id="rentalDurationModal" tabindex="-1" aria-labelledby="rentalDurationModalLabel" aria-hidden="true">
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
</div> -->