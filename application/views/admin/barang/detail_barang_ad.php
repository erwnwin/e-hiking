           <!-- Content Wrapper. Contains page content -->
           <div class="content-wrapper">
               <!-- Content Header (Page header) -->
               <section class="content-header">
                   <div class="container-fluid">
                       <div class="row mb-2">
                           <div class="col-sm-6">
                               <h1>Detail Produk / Barang</h1>
                           </div>
                       </div>
                   </div><!-- /.container-fluid -->
               </section>

               <!-- Main content -->
               <section class="content">
                   <div class="container-fluid">


                       <div class="card card-solid">
                           <div class="card-body">
                               <div class="row">
                                   <div class="col-12 col-sm-6">
                                       <h3 class="d-inline-block d-sm-none"><?php echo $produk['judul_produk']; ?></h3>
                                       <div class="col-12">
                                           <img src="<?php echo base_url('uploads/image/main_image/' . $produk['gambar']); ?>" class="product-image" alt="Product Image">
                                       </div>
                                       <div class="col-12 product-image-thumbs">
                                           <div class="product-image-thumb active"><img src="<?php echo base_url('uploads/image/main_image/' . $produk['gambar']); ?>" alt="Product Image"></div>
                                           <?php foreach ($produk['galeri'] as $index => $photo) : ?>
                                               <div class="product-image-thumb"><img src="<?php echo base_url('uploads/image/produk/' . $photo['galeri_foto']); ?>" alt="Product Image"></div>
                                           <?php endforeach; ?>
                                       </div>
                                   </div>
                                   <?php if ($this->session->userdata('hak_akses') == '1' || $this->session->userdata('hak_akses') == '3') { ?>
                                       <div class="col-12 col-sm-6">

                                           <h3 class="my-3"><?php echo $produk['judul_produk']; ?></h3>
                                           <hr>
                                           <nav class="w-100">
                                               <div class="nav nav-tabs" id="product-tab" role="tablist">
                                                   <a class="nav-item nav-link active" id="product-desc-tab" data-toggle="tab" href="#product-desc" role="tab" aria-controls="product-desc" aria-selected="true">Description</a>

                                               </div>
                                           </nav>
                                           <div class="tab-content p-3" id="nav-tabContent">
                                               <div class="tab-pane fade show active" id="product-desc" role="tabpanel" aria-labelledby="product-desc-tab"> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi vitae condimentum erat. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Sed posuere, purus at efficitur hendrerit, augue elit lacinia arcu, a eleifend sem elit et nunc. Sed rutrum vestibulum est, sit amet cursus dolor fermentum vel. Suspendisse mi nibh, congue et ante et, commodo mattis lacus. Duis varius finibus purus sed venenatis. Vivamus varius metus quam, id dapibus velit mattis eu. Praesent et semper risus. Vestibulum erat erat, condimentum at elit at, bibendum placerat orci. Nullam gravida velit mauris, in pellentesque urna pellentesque viverra. Nullam non pellentesque justo, et ultricies neque. Praesent vel metus rutrum, tempus erat a, rutrum ante. Quisque interdum efficitur nunc vitae consectetur. Suspendisse venenatis, tortor non convallis interdum, urna mi molestie eros, vel tempor justo lacus ac justo. Fusce id enim a erat fringilla sollicitudin ultrices vel metus. </div>
                                           </div>
                                           <div class="bg-gray py-2 px-3 mt-4">
                                               <h2 class="mb-0">
                                                   Harga :
                                               </h2>
                                           </div>
                                           <div class="bg-danger py-2 px-3 mt-4">
                                               <h2 class="mb-0">
                                                   Stok Tersedia :
                                               </h2>
                                           </div>
                                       </div>

                               </div>
                               <hr>
                               <div class="row mt-4">
                                   <a type="button" data-toggle="modal" data-target="#modalEditProduk" class="btn btn-primaryku btn-sm btn-block">Edit</a>
                                   <a href="<?= base_url('barang') ?>" class="btn btn-dangerku btn-sm btn-block">Back</a>
                               </div>
                           <?php } ?>

                           <?php if ($this->session->userdata('hak_akses') == '4') { ?>
                               <div class="col-12 col-sm-6">

                                   <h3 class="my-3"><?php echo $produk['judul_produk']; ?></h3>
                                   <hr>
                                   <nav class="w-100">
                                       <div class="nav nav-tabs" id="product-tab" role="tablist">
                                           <a class="nav-item nav-link active" id="product-desc-tab" data-toggle="tab" href="#product-desc" role="tab" aria-controls="product-desc" aria-selected="true">Description</a>

                                       </div>
                                   </nav>
                                   <div class="tab-content p-3" id="nav-tabContent">
                                       <div class="tab-pane fade show active" id="product-desc" role="tabpanel" aria-labelledby="product-desc-tab"> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi vitae condimentum erat. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Sed posuere, purus at efficitur hendrerit, augue elit lacinia arcu, a eleifend sem elit et nunc. Sed rutrum vestibulum est, sit amet cursus dolor fermentum vel. Suspendisse mi nibh, congue et ante et, commodo mattis lacus. Duis varius finibus purus sed venenatis. Vivamus varius metus quam, id dapibus velit mattis eu. Praesent et semper risus. Vestibulum erat erat, condimentum at elit at, bibendum placerat orci. Nullam gravida velit mauris, in pellentesque urna pellentesque viverra. Nullam non pellentesque justo, et ultricies neque. Praesent vel metus rutrum, tempus erat a, rutrum ante. Quisque interdum efficitur nunc vitae consectetur. Suspendisse venenatis, tortor non convallis interdum, urna mi molestie eros, vel tempor justo lacus ac justo. Fusce id enim a erat fringilla sollicitudin ultrices vel metus. </div>
                                   </div>
                                   <div class="bg-gray py-2 px-3 mt-4">
                                       <h2 class="mb-0">
                                           Harga :
                                       </h2>
                                   </div>
                                   <div class="bg-danger py-2 px-3 mt-4">
                                       <h2 class="mb-0">
                                           Stok Tersedia :
                                       </h2>
                                   </div>
                                   <form class="add-to-cart-form-two">
                                       <div class="mt-2 mb-3">
                                           <label for="">Masukkan Qty Sewa</label>
                                           <input type="hidden" name="product_id" value="<?= $produk['id_produk']; ?>">

                                           <input type="number" id="quantity" name="quantity" step="1" max="10" min="1" value="1" name="quantity" class="quantity-field form-control form-input">
                                       </div>

                               </div>
                               <hr>
                               <button type="submit" class="btn btn-dangerku btn-block "><i class="fas fa-shopping-bag "></i> Add to Cart</button>

                               <a href="<?= base_url('barang') ?>" class="btn btn-primaryku btn-block"> Kembali</a>
                               </form>
                           <?php } ?>



                           </div>

                       </div>
                   </div>
               </section>

               <div>
                   <br>
               </div>
           </div>