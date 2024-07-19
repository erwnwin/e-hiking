<!-- Container fluid -->
<!-- <div class="bg-primary pt-10 pb-21"></div> -->
<div class="container-fluid p-6">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-12">
            <!-- Page header -->

            <div class="border-bottom pb-4 mb-2 ">

                <h3 class="mb-0 fw-bold">Detail Barang</h3>
            </div>
        </div>
    </div>
    <!-- row -->
    <div class="row">
        <div class="col-xl-12 col-lg-6 col-md-12 col-12 mt-3">
            <div class="card">
                <div class="card-body p-5">
                    <div class="row">
                        <div class="col-xl-6">
                            <div class="product" id="product">
                                <div id="carouselExampleFade" class="carousel slide carousel-fade" data-bs-ride="carousel">
                                    <div class="carousel-inner">
                                        <?php foreach ($produk['galeri'] as $index => $photo) : ?>
                                            <div class="carousel-item <?= $index === 0 ? 'active' : '' ?>">
                                                <img src="<?php echo base_url('uploads/image/produk/' . $photo['galeri_foto']); ?>" alt="..." class="d-block w-100">
                                            </div>
                                        <?php endforeach; ?>
                                    </div>
                                    <a class="carousel-control-prev" href="#carouselExampleFade" role="button" data-bs-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="visually-hidden">Previous</span>
                                    </a>
                                    <a class="carousel-control-next" href="#carouselExampleFade" role="button" data-bs-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        <span class="visually-hidden">Next</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6 col-12">
                            <div class="my-5 mx-xl-10">
                                <div>
                                    <h1><?php echo $produk['judul_produk']; ?></h1>
                                    <h4 class="mb-1">$49.00 <span class="text-muted text-decoration-line-through">$ 69.00</span>
                                        <span class="text-warning">(45% OFF)</span>
                                    </h4>
                                    <span>inclusive of all taxes</span>
                                </div>
                                <hr class="my-3">
                                <div class="mb-5">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="d-grid mb-2 mb-md-0">
                                                <form id="add-to-cart-form-detail">
                                                    <label for="quantity">Jumlah Stok Tersedias:</label>
                                                    <input type="number" id="quantity" name="quantity" value="1" class="form-control mb-2" disabled>
                                                    <input type="hidden" id="product_id" name="product_id" value="<?php echo $produk['id_produk']; ?>">
                                                    <!-- <button type="submit" class="btn btn-danger"><i class="fe fe-shopping-cart me-2"></i>Tambahkan Cart</button> -->
                                                </form>
                                            </div>
                                        </div>
                                        <div class="col-md-12 mt-1">
                                            <div class="d-grid">
                                                <a href="<?= base_url('barang') ?>" class="btn btn-success btn-block"><i class="fe fe-shopping-cart me-2"></i>Lihat Barang Sewa</a>
                                                <!-- <a href="<?= base_url('form-penyewaan') ?>" class="btn btn-danger btn-block mt-2"><i class="fe fe-shopping-cart me-2"></i>Kem</a> -->
                                            </div>
                                        </div>
                                    </div>
                                    <hr class="mt-4 mb-2">
                                    <div class="mb-4" id="ecommerceAccordion">
                                        <ul class="list-group list-group-flush">
                                            <li class="list-group-item px-0">
                                                <a class="d-flex align-items-center text-inherit text-decoration-none h4 mb-0" data-bs-toggle="collapse" href="#productDetails" role="button" aria-expanded="false" aria-controls="productDetails">
                                                    <div class="me-auto">Product Details</div>
                                                    <span class="chevron-arrow ms-4">
                                                        <i data-feather="chevron-down" class="icon-xs"></i>
                                                    </span>
                                                </a>
                                                <div class="collapse show" id="productDetails" data-bs-parent="#ecommerceAccordion">
                                                    <div class="py-3">
                                                        <p><?php echo $produk['deskripsi_produk']; ?></p>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>