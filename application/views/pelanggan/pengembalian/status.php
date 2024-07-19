<!-- Container fluid -->
<div class="container-fluid p-6">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-12">
            <!-- Page header -->
            <div class="border-bottom pb-4 mb-2">
                <h3 class="mb-0 fw-bold">Status Pengembalian</h3>
            </div>
        </div>
    </div>
    <!-- row -->
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-12 mt-2">
            <div class="card h-100">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="mb-0">Status Pengembalian</h4>
                </div>
                <div class="table-responsive">
                    <table class="table text-nowrap">
                        <thead class="table-light">
                            <tr>
                                <th>#</th>
                                <th>Nama Produk</th>
                                <th>Jumlah yang disewa</th>
                                <th>Tanggal Kembali</th>
                                <th>Status Pengembalian</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($status_pesanan)) { ?>
                                <?php $no = 1;
                                foreach ($status_pesanan as $pesanan) { ?>
                                    <tr>
                                        <td><?= $no++; ?></td>
                                        <td>#SUNRISE - <?= $pesanan['judul_produk'] ?></td>
                                        <td class="text-center">
                                            <span class="badge bg-primary text-white"><?= $pesanan['quantity'] ?> Items</span>
                                        </td>
                                        <td>
                                            <span class="badge bg-danger text-white"><?= $pesanan['rental_end_date'] ?></span>
                                        </td>
                                        <td>
                                            <button type="button" class="btn btn-sm btn-danger text-white" disabled> Belum dikembalikan</button>
                                        </td>
                                    </tr>
                                <?php } ?>
                            <?php } else { ?>
                                <tr>
                                    <td colspan="5" class="text-center">Belum ada data disini!</td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>