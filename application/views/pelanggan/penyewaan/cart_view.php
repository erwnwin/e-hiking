<div class="container-fluid p-6">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-12">
            <div class="border-bottom pb-4 mb-2">
                <h3 class="mb-0 fw-bold">Cart Barang yang akan disewa</h3>
            </div>
        </div>
    </div>

    <!-- <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-12 mt-2">
            <div class="card h-100">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="mb-0">Checkout Barang</h4>
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
                                    <form class="add-to-cart-form">
                                        <td>
                                            <div class="input-group input-spinner">
                                                <input type="number" name="quantity" step="1" max="<?= $p['stok'] ?>" min="1" value="1" class="quantity-field form-control form-input">
                                                <input type="hidden" name="product_id" value="<?= $p['id_produk']; ?>">
                                            </div>
                                        </td>
                                        <td><?= $p['stok'] ?></td>
                                        <td>
                                            <button type="submit" class="btn btn-sm btn-danger">Add to Cart</button>
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
    </div> -->

    <div id="cart-items"></div>
    <br>
    <button id="checkout-button" class="btn btn-danger">Checkout</button>
</div>