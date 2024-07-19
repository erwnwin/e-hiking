<div class="row">
    <div class="col-xl-12 col-lg-12 col-md-12 col-12 mt-2">
        <div class="card h-100">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h4 class="mb-0">Cart Penyewaan Barang</h4>
            </div>
            <div class="table-responsive">
                <table class="table text-nowrap">
                    <thead class="table-light">
                        <tr>
                            <th>Product</th>
                            <th>Quantity</th>
                            <th>Price</th>
                            <th>Total</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($cart_items)) { ?>
                            <?php foreach ($cart_items as $item) { ?>
                                <tr>
                                    <td><?= $item['judul_produk'] ?></td>
                                    <td><?= $item['quantity'] ?></td>
                                    <td><?= $item['harga_produk'] ?></td>
                                    <td><?= $item['harga_produk'] * $item['quantity'] ?></td>
                                    <td>
                                        <button class="btn btn-danger remove-cart-item btn-sm" data-id="<?= $item['id'] ?>">Remove</button>
                                    </td>
                                </tr>
                            <?php } ?>
                        <?php } else { ?>
                            <tr>
                                <td colspan="5" class="text-center">Belum ada cart penyewaan disini!</td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>