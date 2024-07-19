<div class="container-fluid p-6">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-12">
            <!-- Page header -->

            <div class="border-bottom pb-4 mb-4 ">
                <h3 class="mb-0 fw-bold">Create Data Barang</h3>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-8 col-12">
            <div class="card mb-4">
                <div class="card-body">
                    <div>
                        <!-- input -->
                        <div class="mb-3">
                            <label class="form-label">Judul Product</label>
                            <input type="text" name="judu_produk" id="judu_produk" class="form-control" placeholder="Masukkan judul product" required>
                        </div>
                        <!-- input -->
                        <div>
                            <label class="form-label">Deskripsi Product</label>
                            <textarea name="desk_produk" id="desk_produk" cols="2" rows="5" class="form-control" placeholder="Deskripsi produk"></textarea>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card mb-4">
                <!-- card body -->
                <div class="card-body">
                    <div>
                        <div class="mb-4">
                            <!-- heading -->
                            <h4 class="mb-4">Galeri Produk</h4>
                            <h5 class="mb-1">Gambar Produk</h5>
                            <p class="text-small">Add Product main Image.</p>
                            <input type="file" class="form-control" accept="image/*">
                        </div>
                        <div>
                            <!-- heading -->
                            <h5 class="mb-1">Galeri Produk</h5>
                            <p>Add Product Gallery Images.</p>
                            <!-- input -->
                            <form action="#" class="d-block dropzone border-dashed rounded-2" id="addFotoGaleri">
                                <div class="fallback">
                                    <input name="file[]" type="file" accept="image/*" multiple />
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-12">
            <!-- card -->
            <div class="card mb-4">
                <!-- card body -->
                <div class="card-body">

                    <div>
                        <div class="mb-3">
                            <label class="form-label">Kode Product</label>
                            <input type="text" class="form-control" value="000" readonly>
                        </div>
                        <!-- input -->
                        <div class="mb-3">
                            <label class="form-label">Harga Product</label>
                            <input type="number" class="form-control" placeholder="Masukkan angka">
                        </div>

                        <!-- input -->
                        <div class="mb-3">
                            <div class="d-flex justify-content-between">
                                <label class="form-label">Kategori</label>
                                <a href="<?= base_url('kategori/create') ?>" class="btn-link fw-semi-bold">Create</a>
                            </div>
                            <!-- select menu -->
                            <select class="form-select" aria-label="Default select example">
                                <option selected>Shoe</option>
                                <option value="1">Sunglasses</option>
                                <option value="2">Handbag</option>
                                <option value="3">Slingbag</option>
                            </select>
                        </div>

                    </div>
                </div>
            </div>

            <div class="d-grid">
                <button type="submit" class="btn btn-primary">
                    Simpan
                </button>

            </div>
            <div class="d-grid mt-2">
                <button type="reset" class="btn btn-danger">
                    Simpan
                </button>
            </div>
        </div>
    </div>


</div>