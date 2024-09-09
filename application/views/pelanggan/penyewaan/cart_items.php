<div class="card card-default">
    <div class="card-header">
        <h3 class="card-title">List Cart Barang</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
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
                                    <button class="btn btn-dangerku remove-cart-item btn-sm" data-id="<?= $item['id'] ?>">Remove</button>
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