         <!-- Content Wrapper. Contains page content -->
         <div class="content-wrapper">
             <!-- Content Header (Page header) -->
             <section class="content-header">
                 <div class="container-fluid">
                     <div class="row mb-2">
                         <div class="col-sm-6">
                             <h1>Dashboard</h1>
                         </div>
                     </div>
                 </div><!-- /.container-fluid -->
             </section>

             <!-- Main content -->
             <section class="content">
                 <div class="container-fluid">

                     <div class="card card-default">
                         <div class="card-header">
                             <h3 class="card-title">Daftar Barang</h3>

                             <div class="card-tools">
                                 <a href="<?= base_url('barang/create') ?>" class="btn btn-sm btn-primaryku"><i class="fa fa-plus-circle"></i> Create</a>
                             </div>
                         </div>
                         <!-- /.card-header -->
                         <div class="card-body">
                             <div class="table-responsive">
                                 <table class="table">
                                     <thead>
                                         <tr>
                                             <th style="width: 10px">#</th>
                                             <th>Nama Produk</th>
                                             <th>Kategori</th>
                                             <th>Harga</th>
                                             <th>Stok</th>
                                             <th style="width: 130px">Action</th>
                                         </tr>
                                     </thead>
                                     <tbody>
                                         <?php if (!empty($produk)) { ?>
                                             <?php $no = 1;
                                                foreach ($produk as $r) { ?>
                                                 <tr>
                                                     <td><?= $no++; ?></td>
                                                     <td><?php echo $r['judul_produk']; ?></td>
                                                     <td><?php echo $r['kategori']; ?></td>
                                                     <td><?php echo $r['harga_produk']; ?></td>
                                                     <td><?php echo $r['stok']; ?></td>

                                                     <td>
                                                         <a href="<?= base_url('barang/detail/' . $r['id_produk']) ?>" class="btn btn-sm btn-primaryku"> Detail</a>
                                                     </td>
                                                 </tr>
                                             <?php } ?>
                                         <?php } else { ?>
                                             <tr>
                                                 <td colspan="4" class="text-center">Tidak ada data</td>
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