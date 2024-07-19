<!-- Container fluid -->
<!-- <div class="bg-primary pt-10 pb-21"></div> -->
<div class="container-fluid p-6">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-12">
            <!-- Page header -->

            <div class="border-bottom pb-4 mb-2 ">

                <h3 class="mb-0 fw-bold">Daftar Barang yang disewakan</h3>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-12 mt-2">
            <div class="card h-100">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="mb-0">List Barang</h4>
                   
                </div>
                <div class="table-responsive">
                    <table class="table text-nowrap">
                        <thead class="table-light">
                            <tr>
                                <th>Gambar</th>
                                <th>Produk</th>
                                <th>Harga</th>
                                <th>Quantity (Qty)</th>
                                <th>Stok Tersedia</th>
                                <th colspan="2"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($produk as $p) { ?>
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <a href="#!"><img src="<?= base_url('uploads/image/main_image/' . $p['gambar']) ?>" alt="Image" width="100%" class="img-4by3-md rounded-3"></a>
                                        </div>
                                    </td>
                                    <td>
                                        <a href="<?= base_url('barang/detail/' . $p['id_produk']) ?>" class="text-inherit float-left"><?= $p['judul_produk']; ?></a>
                                    </td>
                                    <td><?= $p['harga_produk'] ?></td>
                                    <form id="add-to-cart-form">
                                        <td>
                                            <div class="input-group input-spinner  ">
                                                <input type="number" id="quantity" name="quantity" step="1" max="10" min="1" value="1" name="quantity" class="quantity-field form-control form-input">
                                                <!-- <input type="number" id="quantity" name="quantity" value="1" class="form-control mb-2"> -->
                                                <input type="hidden" id="product_id" name="product_id" value="<?php echo $p['id_produk']; ?>">
                                            </div>
                                        </td>
                                        <td><?= $p['stok'] ?></td>
                                        <td>
                                            <!-- <form href="#!" class="btn btn-ghost btn-icon btn-sm rounded-circle texttooltip" data-template="trashOne"> -->
                                            <button type="submit" class="btn btn-sm btn-danger">Add to Cart</button>
                                            <!-- </form> -->
                                        </td>
                                    </form>
                                    <td>
                                        <a href="<?= base_url('barang/detail/' . $p['id_produk']) ?>" class="btn btn-ghost btn-icon btn-sm rounded-circle texttooltip" data-template="trashOne">
                                            <button type="button" class="btn btn-sm btn-primary">Detail</button>
                                        </a>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- <div class="row align-items-center">
        <?php foreach ($produk as $p) { ?>
            <div class="col-xl-4 col-lg-6 col-md-12 col-12 mt-3">
                <div class="cardku">
                    <div class="card ">
                        <img src="<?= base_url('uploads/image/main_image/' . $p['gambar']) ?>" class="card-img-top" alt="" width="50%">
                        <div class="card-body" id="card-bodyku">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            <a href="<?= base_url('barang/detail/' . $p['id_produk']) ?>" class="btn btn-primary btn-sm">Lihat Detail</a>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div> -->

</div>