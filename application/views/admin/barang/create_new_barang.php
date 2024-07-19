<div class="container-fluid p-6">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-12">
            <!-- Page header -->
            <div>

                <div class="border-bottom pb-4 mb-4">
                    <h3 class="mb-0 fw-bold">Dashboard</h3>
                </div>

            </div>
        </div>
    </div>

    <form id="productForm" method="POST" enctype="multipart/form-data">
        <div class="row">
            <div class="col-lg-8 col-12">
                <div class="card mb-4">
                    <div class="card-body">
                        <div>
                            <!-- input -->
                            <div class="mb-3">
                                <label class="form-label">Judul Product</label>
                                <input type="text" name="judul_produk" id="judul_produk" class="form-control" placeholder="Masukkan judul produk">
                            </div>
                            <!-- input -->
                            <div class="mb-3">
                                <label class="form-label">Deskripsi Product</label>
                                <textarea name="deskripsi_produk" id="deskripsi_produk" cols="2" rows="5" class="form-control" placeholder="Deskripsi produk"></textarea>
                            </div>
                            <div class="mb-4">
                                <h4 class="mb-4">Galeri Produk</h4>
                                <h5 class="mb-1">Gambar Produk</h5>
                                <p class="text-small">Add Product main Image.</p>
                                <input type="file" name="main_image" id="main_image" class="form-control" accept="image/*">
                            </div>
                            <div class="mb-4">
                                <h5 class="mb-1">Galeri Produk</h5>
                                <p>Add Product Gallery Images.</p>
                                <input type="file" name="gallery_images[]" id="gallery_images" class="form-control" accept="image/*" multiple>

                                <div class="preview-images-zone"></div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-12">
                <div class="card mb-4">
                    <div class="card-body">
                        <div>
                            <div class="mb-3">
                                <label class="form-label">Kode Product</label>
                                <input type="text" class="form-control" value="000" readonly>
                            </div>
                            <!-- input -->
                            <div class="mb-3">
                                <label class="form-label">Harga Product</label>
                                <input type="number" name="harga_produk" id="harga_produk" class="form-control" placeholder="Masukkan harga produk">
                            </div>
                            <!-- input -->
                            <div class="mb-3">
                                <div class="d-flex justify-content-between">
                                    <label class="form-label">Kategori</label>
                                    <a href="<?= base_url('kategori/create') ?>" class="btn-link fw-semi-bold">Create</a>
                                </div>
                                <select name="kategori_produk" id="kategori_produk" class="form-select" aria-label="Default select example">
                                    <option value="">Pilih Kategori</option>
                                    <option value="Shoe">Shoe</option>
                                    <option value="Sunglasses">Sunglasses</option>
                                    <option value="Handbag">Handbag</option>
                                    <option value="Slingbag">Slingbag</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="d-grid">
                    <button type="submit" class="btn btn-primary btn-sm" id="btnSimpanProduk">Simpan</button>
                </div>
                <div class="d-grid mt-2">
                    <button type="reset" class="btn btn-danger btn-sm">Reset</button>
                </div>

                <div class="d-grid mt-2">
                    <a href="<?= base_url('barang') ?>" class="btn btn-warning btn-sm text-white">Back</a>
                </div>
            </div>
        </div>
    </form>




</div>