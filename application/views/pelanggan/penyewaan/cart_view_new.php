<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Daftar Barang yang disewakan</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">

            <div class="card card-default">
                <div class="card-header">
                    <h3 class="card-title">List Barang</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Gambar</th>
                                    <th>Produk</th>
                                    <th>Harga</th>
                                    <th>Quantity (Qty)</th>
                                    <th>Stok Tersedia</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($produk as $p) { ?>
                                    <tr>
                                        <td>
                                            <img src="<?= base_url('uploads/image/main_image/' . $p['gambar']) ?>" alt="Image" width="66px"></img>
                                        </td>
                                        <td>
                                            <a href="<?= base_url('barang/detail/' . $p['id_produk']) ?>" class="text-inherit float-left"><?= $p['judul_produk']; ?></a>
                                        </td>
                                        <td><?= $p['harga_produk'] ?></td>
                                        <form class="add-to-cart-form">
                                            <td>
                                                <div class="input-group input-spinner">
                                                    <input type="number" name="quantity" step="1" max="<?= $p['stok'] ?>" min="1" value="1" class="quantity-field form-control form-input">
                                                    <input type="hidden" name="product_id" value="<?= $p['id_produk']; ?>">
                                                </div>
                                            </td>
                                            <td><?= $p['stok'] ?></td>
                                            <td>
                                                <div class="btn-group">
                                                    <button type="submit" class="btn btn-sm btn-dangerku btn-rounded">Add to Cart</button>
                                                    <a href="<?= base_url('barang/detail/' . $p['id_produk']) ?>" class="btn btn-sm btn-primaryku btn-rounded">
                                                        Detail
                                                    </a>
                                                </div>
                                            </td>

                                        </form>
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