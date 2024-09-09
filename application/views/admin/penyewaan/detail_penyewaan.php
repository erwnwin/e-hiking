         <!-- Content Wrapper. Contains page content -->
         <div class="content-wrapper">
             <!-- Content Header (Page header) -->
             <section class="content-header">
                 <div class="container-fluid">
                     <div class="row mb-2">
                         <div class="col-sm-6">
                             <h1>Detail Penyewaan </h1>
                         </div>
                     </div>
                 </div><!-- /.container-fluid -->
             </section>

             <!-- Main content -->
             <section class="content">
                 <div class="container-fluid">

                     <div class="row">
                         <div class="col-lg-2">

                         </div>
                         <!-- ./col -->

                         <div class="col-lg-8 col-12">
                             <!-- Default box -->
                             <div class="card">
                                 <div class="card-header">
                                     <h3 class="card-title">Info Penyewaan Barang Hiking</h3>


                                 </div>
                                 <div class="card-body p-0">
                                     <div class="card-body">
                                         <table class="table">
                                             <tbody>
                                                 <tr>
                                                     <th class="text-right" style="width: 45%;">Nama Pelanggan</th>
                                                     <td>
                                                         <?= $pesanan[0]['nama_pelanggan']; ?>
                                                     </td>
                                                 </tr>
                                                 <tr>
                                                     <th class="text-right" style="width: 45%;">Lama Sewa</th>
                                                     <td>
                                                         <span class="badge custom-bgdanger text-white"><?= $pesanan[0]['rental_duration']; ?> hari</span>
                                                     </td>
                                                 </tr>
                                                 <tr>
                                                     <th class="text-right" style="width: 25%;">Items yang disewa</th>
                                                     <td>
                                                         <ol>
                                                             <?php foreach ($pesanan as $item): ?>
                                                                 <li><?= $item['judul_produk']; ?> - Jumlah: <?= $item['quantity']; ?></li>
                                                             <?php endforeach; ?>
                                                         </ol>
                                                     </td>
                                                 </tr>
                                                 <tr>
                                                     <th class="text-right" style="width: 45%;">Total Harga</th>
                                                     <td>
                                                         Rp <?= number_format($total_price, 0, ',', '.'); ?>
                                                     </td>
                                                 </tr>
                                                 <tr>
                                                     <th class="text-right" style="width: 45%;">Jumlah Pembayaran Awal/DP</th>
                                                     <td>
                                                         Rp <?= number_format($pesanan[0]['initial_payment'], 0, ',', '.'); ?> | <button type="button" class="btn btn-sm btn-xs btn-primaryku" data-toggle="modal" data-target="#modalPreview<?= $pesanan[0]['transaction_id']; ?>">Preview Bukti TF</button>

                                                     </td>
                                                 </tr>
                                                 <tr>
                                                     <th class="text-right" style="width: 45%;">Sisa Pembayaran/Pelunasan</th>
                                                     <td>
                                                         Rp <?= number_format($sisa_pembayaran, 0, ',', '.'); ?>
                                                     </td>
                                                 </tr>
                                             </tbody>
                                         </table>
                                     </div>
                                     <div class="card-footer">
                                         <button type="button" class="btn btn-primaryku btn-sm" data-target="#modalUbahStatus" data-toggle="modal" data-transaction-id="<?= $pesanan[0]['transaction_id'] ?>"> Update Status
                                         </button>
                                         <a href="<?= base_url('penyewaan') ?>" class="btn btn-sm btn-dangerku float-right">Back</a>
                                     </div>
                                 </div>
                             </div>
                         </div>
                     </div>
                 </div>
             </section>

             <div>
                 <br>
             </div>
         </div>

         <!-- Modal HTML -->
         <div class="modal fade" id="modalUbahStatus" tabindex="-1" role="dialog" aria-labelledby="modalUbahStatusLabel" aria-hidden="true">
             <div class="modal-dialog" role="document">
                 <div class="modal-content">
                     <div class="modal-header">
                         <h5 class="modal-title" id="modalUbahStatusLabel">Update Status Transaksi</h5>
                         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                             <span aria-hidden="true">&times;</span>
                         </button>
                     </div>
                     <form id="updateStatusForm">
                         <div class="modal-body">
                             <input type="text" id="transaction_id" name="transaction_id">
                             <div class="form-group">
                                 <label for="status">Status</label>
                                 <select class="form-control" id="status" name="status" required>
                                     <option value="">Pilih Status</option>
                                     <option value="pending">Pending</option>
                                     <option value="take-it">Take It</option>
                                     <option value="completed">Completed</option>
                                 </select>
                             </div>
                         </div>
                         <div class="modal-footer">
                             <button type="button" class="btn btn-dangerku btn-sm" data-dismiss="modal">Close</button>
                             <button type="submit" class="btn btn-primaryku btn-sm">Update</button>
                         </div>
                     </form>
                 </div>
             </div>
         </div>