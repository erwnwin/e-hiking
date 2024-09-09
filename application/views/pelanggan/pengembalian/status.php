<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Status Pengembalian</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">

            <div class="card card-default">
                <div class="card-header">
                    <h3 class="card-title">Status Pengembalian</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
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
                                        <?php
                                        // Tanggal akhir sewa dari database
                                        $rental_end_date = $pesanan['rental_end_date'];

                                        // Tanggal saat ini
                                        $current_date = date('Y-m-d');

                                        // Menghitung selisih hari
                                        $datetime1 = new DateTime($current_date);
                                        $datetime2 = new DateTime($rental_end_date);
                                        $interval = $datetime1->diff($datetime2);

                                        // Menentukan status
                                        if ($interval->invert == 1) {
                                            $status = "Sewa sudah berakhir";
                                            $days_left = 0;
                                        } else {
                                            $status = $interval->days . " hari lagi";
                                            $days_left = $interval->days;
                                        }
                                        ?>
                                        <tr>
                                            <td><?= $no++; ?></td>
                                            <td><?= $pesanan['kode_produk'] ?> - <?= $pesanan['judul_produk'] ?></td>
                                            <td class="text-center">
                                                <span class="badge custom-bgsuccess"><?= $pesanan['quantity'] ?> Items</span>
                                            </td>
                                            <td>
                                                <span class="badge custom-bgdanger text-white">
                                                    <?= $rental_end_date ?> (<?= $status ?>)
                                                </span>
                                            </td>
                                            <td>
                                                <button type="button" class="btn btn-sm btn-danger text-white" disabled> Belum dikembalikan / Belum Take It</button>
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
    </section>

    <div>
        <br>
    </div>
</div>