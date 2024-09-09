 <!-- Main Sidebar Container -->
 <aside class="main-sidebar sidebar-dark-primary elevation-4">
     <!-- Brand Logo -->
     <a href="<?= base_url('dashboard') ?>" class="brand-link">
         <!-- <img src="<?= base_url() ?>public/assets/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8"> -->
         <center>
             <span class="brand-text font-weight-light text-center" style="text-align: center;"><strong>Penyewaan Barang</strong></span>
         </center>
     </a>

     <!-- Sidebar -->
     <div class="sidebar">
         <!-- Sidebar user (optional) -->
         <div class="user-panel mt-3 pb-3  d-flex">
             <?php if ($this->session->userdata('hak_akses') == '1') { ?>
                 <div class="image">
                     <img src="<?= base_url() ?>public/img/admin.png" class="img-circle elevation-2" alt="User Image">
                 </div>
             <?php } ?>
             <?php if ($this->session->userdata('hak_akses') == '2') { ?>
                 <div class="image">
                     <img src="<?= base_url() ?>public/img/owner.png" class="img-circle elevation-2" alt="User Image">
                 </div>
             <?php } ?>
             <?php if ($this->session->userdata('hak_akses') == '3') { ?>
                 <div class="image">
                     <img src="<?= base_url() ?>public/img/petugas.png" class="img-circle elevation-2" alt="User Image">
                 </div>
             <?php } ?>
             <?php if ($this->session->userdata('hak_akses') == '4') { ?>
                 <div class="image">
                     <img src="<?= base_url() ?>public/img/pelanggan.png" class="img-circle elevation-2" alt="User Image">
                 </div>
             <?php } ?>
             <div class="info">
                 <a href="#" class="d-block"><?= $this->session->userdata('nama'); ?></a>
             </div>
         </div>


         <!-- Sidebar Menu -->
         <nav class="mt-2">
             <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                 <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                 <?php if ($this->session->userdata('hak_akses') == '1') { ?>
                     <li class="nav-header ">Administrator</li>
                 <?php } ?>

                 <?php if ($this->session->userdata('hak_akses') == '2') { ?>
                     <li class="nav-header ">Owner Toko</li>
                 <?php } ?>

                 <?php if ($this->session->userdata('hak_akses') == '3') { ?>
                     <li class="nav-header ">Petugas Toko</li>
                 <?php } ?>

                 <?php if ($this->session->userdata('hak_akses') == '4') { ?>
                     <li class="nav-header ">Pelanggan/Penyewa</li>
                 <?php } ?>

                 <li class="nav-item">
                     <a href="<?= base_url('dashboard') ?>" class="nav-link <?= $this->uri->segment(1) == 'dashboard' ? 'active' : '' ?>">
                         <!-- <i class="nav-icon fas fa-th-large"></i> -->
                         <svg width="17px" height="17px" viewBox="0 0 18 18" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                             <title>dashboard</title>
                             <desc>Created with Sketch.</desc>
                             <g id="Icons" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                 <g id="Rounded" transform="translate(-341.000000, -245.000000)">
                                     <g id="Action" transform="translate(100.000000, 100.000000)">
                                         <g id="-Round-/-Action-/-dashboard" transform="translate(238.000000, 142.000000)">
                                             <g>
                                                 <polygon id="Path" points="0 0 24 0 24 24 0 24"></polygon>
                                                 <path d="M4,13 L10,13 C10.55,13 11,12.55 11,12 L11,4 C11,3.45 10.55,3 10,3 L4,3 C3.45,3 3,3.45 3,4 L3,12 C3,12.55 3.45,13 4,13 Z M4,21 L10,21 C10.55,21 11,20.55 11,20 L11,16 C11,15.45 10.55,15 10,15 L4,15 C3.45,15 3,15.45 3,16 L3,20 C3,20.55 3.45,21 4,21 Z M14,21 L20,21 C20.55,21 21,20.55 21,20 L21,12 C21,11.45 20.55,11 20,11 L14,11 C13.45,11 13,11.45 13,12 L13,20 C13,20.55 13.45,21 14,21 Z M13,4 L13,8 C13,8.55 13.45,9 14,9 L20,9 C20.55,9 21,8.55 21,8 L21,4 C21,3.45 20.55,3 20,3 L14,3 C13.45,3 13,3.45 13,4 Z" id="🔹Icon-Color" fill="#ffffff"></path>
                                             </g>
                                         </g>
                                     </g>
                                 </g>
                             </g>
                         </svg>
                         <p>
                             Dashboard
                         </p>
                     </a>
                 </li>

                 <?php if ($this->session->userdata('hak_akses') == '3') { ?>
                     <li class="nav-item">
                         <a href="<?= base_url('barang') ?>" class="nav-link <?= $this->uri->segment(1) == 'barang' ? 'active' : '' ?>">
                             <i class="nav-icon fas fa-dolly-flatbed"></i>
                             <p>
                                 Data Barang
                             </p>
                         </a>
                     </li>
                     <li class="nav-item">
                         <a href="<?= base_url('penyewaan') ?>" class="nav-link <?= $this->uri->segment(1) == 'penyewaan' ? 'active' : '' ?>">
                             <i class="nav-icon fas fa-arrow-circle-left"></i>
                             <p>
                                 Penyewaan
                             </p>
                         </a>
                     </li>
                     <li class="nav-item">
                         <a href="<?= base_url('pengembalian') ?>" class="nav-link <?= $this->uri->segment(1) == 'pengembalian' ? 'active' : '' ?>">
                             <i class="nav-icon fas fa-arrow-circle-right"></i>
                             <p>
                                 Pengembalian
                             </p>
                         </a>
                     </li>
                     <li class="nav-item <?= $this->uri->segment(1) == 'payment-done' || $this->uri->segment(1) == 'payment-fine' || $this->uri->segment(1) == 'laporan-naive-bayes' ? 'menu-open' : '' ?>">
                         <a href="#" class="nav-link <?= $this->uri->segment(1) == 'payment-done' || $this->uri->segment(1) == 'payment-fine' || $this->uri->segment(1) == 'laporan-naive-bayes' ? 'active' : '' ?>">
                             <i class="nav-icon fas fa-file-invoice-dollar"></i>
                             <p>
                                 Pembayaran
                                 <i class="fas fa-angle-left right"></i>
                             </p>
                         </a>
                         <ul class="nav nav-treeview">
                             <li class="nav-item">
                                 <a href="<?= base_url('payment-done') ?>" class="nav-link <?= $this->uri->segment(1) == 'payment-done' ? 'active' : '' ?>">
                                     <i class="fas fa-check-double nav-icon"></i>
                                     <p>Pembayaran Selesai</p>
                                 </a>
                             </li>
                             <li class="nav-item">
                                 <a href="<?= base_url('payment-fine') ?>" class="nav-link <?= $this->uri->segment(1) == 'payment-fine' ? 'active' : '' ?>">
                                     <i class="far fa-times-circle nav-icon"></i>
                                     <p>Pembayaran Denda</p>
                                 </a>
                             </li>
                         </ul>
                     </li>
                 <?php } ?>


                 <?php if ($this->session->userdata('hak_akses') == '1') { ?>
                     <li class="nav-item">
                         <a href="<?= base_url('kategori') ?>" class="nav-link <?= $this->uri->segment(1) == 'kategori' ? 'active' : '' ?>">
                             <i class="nav-icon fas fa-list-alt"></i>
                             <p>
                                 Kategori
                             </p>
                         </a>
                     </li>

                     <li class="nav-item">
                         <a href="<?= base_url('barang') ?>" class="nav-link <?= $this->uri->segment(1) == 'barang' ? 'active' : '' ?>">
                             <i class="nav-icon fas fa-dolly-flatbed"></i>
                             <p>
                                 Data Barang
                             </p>
                         </a>
                     </li>



                     <li class="nav-item <?= $this->uri->segment(1) == 'laporan-penyewaan' || $this->uri->segment(1) == 'laporan-denda' || $this->uri->segment(1) == 'laporan-naive-bayes' ? 'menu-open' : '' ?>">
                         <a href="#" class="nav-link <?= $this->uri->segment(1) == 'laporan-penyewaan' || $this->uri->segment(1) == 'laporan-denda' || $this->uri->segment(1) == 'laporan-naive-bayes' ? 'active' : '' ?>">
                             <i class="nav-icon fas fa-file-alt"></i>
                             <p>
                                 Report
                                 <i class="fas fa-angle-left right"></i>
                             </p>
                         </a>
                         <ul class="nav nav-treeview">
                             <li class="nav-item">
                                 <a href="<?= base_url('laporan-penyewaan') ?>" class="nav-link <?= $this->uri->segment(1) == 'laporan-penyewaan' ? 'active' : '' ?>">
                                     <i class="far fa-check-circle nav-icon"></i>
                                     <p>Laporan Penyewaan</p>
                                 </a>
                             </li>
                             <li class="nav-item">
                                 <a href="<?= base_url('laporan-denda') ?>" class="nav-link <?= $this->uri->segment(1) == 'laporan-denda' ? 'active' : '' ?>">
                                     <i class="far fa-check-circle nav-icon"></i>
                                     <p>Laporan Denda</p>
                                 </a>
                             </li>
                             <li class="nav-item">
                                 <a href="<?= base_url('laporan-naive-bayes') ?>" class="nav-link <?= $this->uri->segment(1) == 'laporan-naive-bayes' ? 'active' : '' ?>">
                                     <i class="far fa-check-circle nav-icon"></i>
                                     <p>Laporan Naive Bayes</p>
                                 </a>
                             </li>
                         </ul>
                     </li>


                     <li class="nav-header ">Utility</li>
                     <li class="nav-item">
                         <a href="<?= base_url('users') ?>" class="nav-link <?= $this->uri->segment(1) == 'users' ? 'active' : '' ?>">
                             <i class="nav-icon fas fa-user-cog"></i>
                             <p>
                                 Role Users
                             </p>
                         </a>
                     </li>
                     <li class="nav-item">
                         <a href="<?= base_url('info-apps') ?>" class="nav-link <?= $this->uri->segment(1) == 'info-apps' ? 'active' : '' ?>">
                             <i class="nav-icon fas fa-info-circle"></i>
                             <p>
                                 Info Apps
                             </p>
                         </a>
                     </li>

                 <?php } ?>


                 <?php if ($this->session->userdata('hak_akses') == '2') { ?>
                     <li class="nav-item">
                         <a href="<?= base_url('laporan-penyewaan') ?>" class="nav-link <?= $this->uri->segment(1) == 'laporan-penyewaan' ? 'active' : '' ?>">
                             <i class="nav-icon fas fa-file-excel"></i>
                             <p>
                                 Report Penyewaan
                             </p>
                         </a>
                     </li>

                     <li class="nav-item">
                         <a href="<?= base_url('laporan-denda') ?>" class="nav-link <?= $this->uri->segment(1) == 'laporan-denda' ? 'active' : '' ?>">
                             <i class="nav-icon fas fa-file-alt"></i>
                             <p>
                                 Report Denda
                             </p>
                         </a>
                     </li>

                     <li class="nav-item">
                         <a href="<?= base_url('laporan-naive-bayes') ?>" class="nav-link <?= $this->uri->segment(1) == 'laporan-naive-bayes' ? 'active' : '' ?>">
                             <i class="nav-icon fas fa-file-pdf"></i>
                             <p>
                                 Report Naive Bayes
                             </p>
                         </a>
                     </li>

                 <?php } ?>

                 <?php if ($this->session->userdata('hak_akses') == '4') { ?>
                     <li class="nav-item">
                         <a href="<?= base_url('barang') ?>" class="nav-link <?= $this->uri->segment(1) == 'barang' ? 'active' : '' ?>">
                             <i class="nav-icon fas fa-hiking"></i>
                             <!-- <i class="fab fa-shopify"></i> -->
                             <p>
                                 Barang Hiking
                             </p>
                         </a>
                     </li>
                     <li class="nav-item <?= $this->uri->segment(1) == 'form-penyewaan' || $this->uri->segment(1) == 'status-penyewaan' ? 'menu-open' : '' ?>">
                         <a href="#" class="nav-link <?= $this->uri->segment(1) == 'form-penyewaan' || $this->uri->segment(1) == 'status-penyewaan' ? 'active' : '' ?>">
                             <i class="nav-icon fab fa-shopify"></i>
                             <p>
                                 Penyewaan
                                 <i class="fas fa-angle-left right"></i>
                             </p>
                         </a>
                         <ul class="nav nav-treeview">
                             <li class="nav-item">
                                 <a href="<?= base_url('form-penyewaan') ?>" class="nav-link <?= $this->uri->segment(1) == 'form-penyewaan' ? 'active' : '' ?>">
                                     <i class="far fa-check-circle nav-icon"></i>
                                     <p>Form Penyewaan</p>
                                 </a>
                             </li>
                         </ul>
                         <ul class="nav nav-treeview">
                             <li class="nav-item">
                                 <a href="<?= base_url('status-penyewaan') ?>" class="nav-link <?= $this->uri->segment(1) == 'status-penyewaan' ? 'active' : '' ?>">
                                     <i class="far fa-check-circle nav-icon"></i>
                                     <p>Status Penyewaan</p>
                                 </a>
                             </li>
                         </ul>
                     </li>
                     <li class="nav-item <?= $this->uri->segment(1) == 'status-pengembalian' || $this->uri->segment(1) == 'denda' ? 'menu-open' : '' ?>">
                         <a href="#" class="nav-link <?= $this->uri->segment(1) == 'status-pengembalian' || $this->uri->segment(1) == 'denda' ? 'active' : '' ?>">
                             <i class="nav-icon fas fa-angle-double-right"></i>
                             <p>
                                 Pengembalian
                                 <i class="fas fa-angle-left right"></i>
                             </p>
                         </a>
                         <ul class="nav nav-treeview">
                             <li class="nav-item">
                                 <a href="<?= base_url('status-pengembalian') ?>" class="nav-link <?= $this->uri->segment(1) == 'status-pengembalian' ? 'active' : '' ?>">
                                     <i class="far fa-check-circle nav-icon"></i>
                                     <p>Status Pengembalian</p>
                                 </a>
                             </li>
                         </ul>
                         <ul class="nav nav-treeview">
                             <li class="nav-item">
                                 <a href="<?= base_url('denda') ?>" class="nav-link <?= $this->uri->segment(1) == 'denda' ? 'active' : '' ?>">
                                     <i class="far fa-check-circle nav-icon"></i>
                                     <p>Denda</p>
                                 </a>
                             </li>
                         </ul>
                     </li>
                 <?php } ?>

                 <li class="nav-item">
                     <a href="<?= base_url('logout') ?>" class="nav-link">
                         <i class="nav-icon fas fa-power-off"></i>
                         <p>
                             Logout
                         </p>
                     </a>
                 </li>

             </ul>
         </nav>
         <!-- /.sidebar-menu -->
     </div>
     <!-- /.sidebar -->
 </aside>