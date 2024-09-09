<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Status Penyewaan</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="card card-default">
                <div class="card-header">
                    <h3 class="card-title">Status Penyewaan</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
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
                                                <span class="badge custom-bgsuccess">Telah Melakukan Pembayaran Awal</span><br>
                                                <span class="badge custom-bgwarning">Silahkan Mengambil Barang Sewa Anda di Toko Kami</span>
                                                <span class="badge custom-bgdanger text-white">Barang sewa belum diambil</span>
                                            </td>
                                            <td>
                                                <a href="<?= base_url('status-penyewaan/detail/' . $pesanan['id']) ?>" class="btn btn-sm btn-primaryku "> Detail Penyewaan</a>
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
    </section>

    <div>
        <br>
    </div>
</div>