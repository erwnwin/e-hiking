<!-- Container fluid -->
<div class="container-fluid p-6">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-12">
            <!-- Page header -->
            <div class="border-bottom pb-4 mb-2">
                <h3 class="mb-0 fw-bold">Status Penyewaan</h3>
            </div>
        </div>
    </div>
    <!-- row -->
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-12 mt-2">
            <div class="card h-100">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="mb-0">Status Penyewaan</h4>
                </div>
                <div class="table-responsive">
                    <table class="table text-nowrap">
                        <thead class="table-light">
                            <tr>
                                <th>#</th>
                                <th>Invoice Transaksi</th>
                                <th>Status Pembayaran</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($status_pesanan)) { ?>
                                <?php $no = 1;
                                foreach ($status_pesanan as $pesanan) { ?>
                                    <tr>
                                        <td><?= $no++; ?></td>
                                        <td> #INV<?= date($pesanan['created_at']) ?></td>
                                        <td>
                                            <span class="badge bg-success text-white">Telah Melakukan Pembayaran Awal</span><br>
                                            <span class="badge bg-warning text-white">Silahkan Mengambil Barang Sewa Anda di Toko Kami</span>
                                        </td>
                                        <td>
                                            <a href="<?= base_url('status-penyewaan/detail/' . $pesanan['id']) ?>" class="btn btn-sm btn-info text-white"> Detail Penyewaan</a>
                                        </td>
                                    </tr>
                                <?php } ?>
                            <?php } else { ?>
                                <tr>
                                    <td colspan="4" class="text-center">Belum ada data disini!</td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>