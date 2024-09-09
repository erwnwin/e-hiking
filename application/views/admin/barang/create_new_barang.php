<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Create New Barang</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <form id="productForm" method="POST" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-lg-8 col-12">
                        <div class="card card-default">
                            <div class="card-header">
                                <h3 class="card-title">Daftar Barang</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <div class="mb-3">
                                    <label class="form-label">Judul Product</label>
                                    <input type="text" name="judul_produk" id="judul_produk" class="form-control" placeholder="Masukkan judul produk">
                                </div>
                                <!-- input -->
                                <div class="mb-3">
                                    <label class="form-label">Deskripsi Product</label>
                                    <textarea name="deskripsi_produk" id="deskripsi_produk" cols="10" rows="15" class="form-control" placeholder="Deskripsi produk"></textarea>
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
                    <div class="col-lg-4 col-12">
                        <div class="card card-default">
                            <div class="card-header">
                                <h3 class="card-title">Daftar Barang</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <div class="mb-3">
                                    <label class="form-label">Kode Product</label>
                                    <input type="text" name="kode_produk" class="form-control" value="<?= $kd_produk ?>" readonly>
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
                                        <a href="<?= base_url('kategori') ?>" class="btn-link fw-semi-bold">Create</a>
                                    </div>
                                    <select name="id_kategori" id="id_kategori" class="form-control" aria-label="Default select example">
                                        <option value="">Pilih Kategori</option>
                                        <?php foreach ($kategori as $k) { ?>
                                            <option value="<?= $k->id_kategori ?>"><?= $k->kategori ?></option>
                                        <?php } ?>

                                    </select>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primaryku btn-sm btn-block">Simpan</button>
                        <a href="<?= base_url('barang') ?>" class="btn btn-dangerku btn-sm btn-block">Back</a>
                    </div>
                </div>
            </form>
    </section>
    <div>
        <br>
    </div>
</div>