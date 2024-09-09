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
                             <h3 class="card-title">Daftar Kategori</h3>

                             <div class="card-tools">
                                 <a type="button" data-toggle="modal" data-target="#modalCreateKategori" class="btn btn-sm btn-primaryku"><i class="fa fa-plus-circle"></i> Create</a>
                             </div>
                         </div>
                         <!-- /.card-header -->
                         <div class="card-body">
                             <div class="table-responsive">
                                 <table class="table">
                                     <thead>
                                         <tr>
                                             <th style="width: 10px">#</th>
                                             <th>Nama Kategori</th>

                                             <th style="width: 130px">Action</th>
                                         </tr>
                                     </thead>
                                     <tbody>
                                         <?php if (!empty($kategori)) { ?>
                                             <?php $no = 1;
                                                foreach ($kategori as $r) { ?>
                                                 <tr>
                                                     <td><?= $no++; ?></td>
                                                     <td><?php echo $r->kategori; ?></td>

                                                     <td>
                                                         <a type="button" class="btn btn-sm btn-outline-warning"> Edit </a>

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


         <div class="modal fade" id="modalCreateKategori" tabindex="-1" role="dialog" aria-labelledby="modalCreateKategori-label" aria-hidden="true">
             <div class="modal-dialog" role="document">
                 <div class="modal-content">
                     <div class="modal-header">
                         <div id="overlayKategori" class="overlay hidden">
                             <i class="fas fa-2x fa-sync fa-spin"></i>
                         </div>
                         <h5 class="modal-title" id="modalCreateKategori-label">Create New Kategori</h5>
                         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                             <span aria-hidden="true">&times;</span>
                         </button>
                     </div>
                     <div class="modal-body">

                         <form id="formKategori" class="form-horizontal" action="<?= base_url('kategori/store') ?>" method="post">

                             <div class="form-group row mb-3">
                                 <label class="col-3 col-form-label">Nama Kategori</label>
                                 <div class="col-9">
                                     <input type="text" class="form-control" name="kategori" placeholder="Nama kategori" required>
                                 </div>
                             </div>


                     </div>
                     <div class="modal-footer justify-content-between">
                         <button type="submit" class="btn btn-sm btn-primaryku float-left">Simpan</button>
                         <button type="button" class="btn btn-sm btn-dangerku float-right" data-dismiss="modal"> Batal</button>
                     </div>
                     </form>
                     <!-- /.modal-content -->
                 </div>
             </div>
             <!-- /.modal-dialog -->
         </div>