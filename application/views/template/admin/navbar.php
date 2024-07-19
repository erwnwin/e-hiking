<div id="db-wrapper">
    <!-- navbar vertical -->
    <!-- Sidebar -->
    <nav class="navbar-vertical navbar">
        <div class="nav-scroller">
            <!-- Brand logo -->
            <a class="navbar-brand" href="<?= base_url('dashboard') ?>">
                <img src="<?= base_url() ?>public/img/logo2.png" alt="" width="70%" height="100%" />
            </a>
            <!-- Navbar nav -->
            <ul class="navbar-nav flex-column" id="sideNavbar">
                <li class="nav-item">
                    <a class="nav-link has-arrow <?= $this->uri->segment(1) == 'dashboard' ? 'active' : ''
                                                    ?>" href="<?= base_url('dashboard') ?>">
                        <i data-feather="home" class="nav-icon icon-xs me-2"></i> Dashboard
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link has-arrow <?= $this->uri->segment(1) == 'profil' ? 'active' : ''
                                                    ?>"" href=" <?= base_url('profil') ?>">
                        <i data-feather="user" class="nav-icon icon-xs me-2"></i> Profil
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link has-arrow" href="<?= base_url('logout') ?>">
                        <i data-feather="log-out" class="nav-icon icon-xs me-2"></i> Logout
                    </a>
                </li>

                <?php if ($this->session->userdata('hak_akses') == '4') { ?>
                    <!-- Admin -->
                    <li class="nav-item">
                        <div class="navbar-heading">Pelanggan</div>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link has-arrow <?= $this->uri->segment(1) == 'barang' ? 'active' : ''
                                                        ?>" href="<?= base_url('barang') ?>">
                            <i data-feather="shopping-bag" class="nav-icon icon-xs me-2"></i> Produk
                        </a>
                    </li>

                    <!-- <li class="nav-item">
                        <a class="nav-link has-arrow <?= $this->uri->segment(1) == 'status-penyewaan' ? 'active' : ''
                                                        ?>" href="<?= base_url('status-penyewaan') ?>">
                            <i data-feather="arrow-left-circle" class="nav-icon icon-xs me-2"></i> Status Penyewaan
                        </a>
                    </li> -->

                    <li class="nav-item">
                        <a class="nav-link has-arrow collapsed" href="" data-bs-toggle="collapse" data-bs-target="#penyewaanPelanggan" aria-expanded="false" aria-controls="penyewaanPelanggan">
                            <i data-feather="arrow-left-circle" class="nav-icon icon-xs me-2">
                            </i> Penyewaan
                        </a>
                        <!-- <div id="penyewaanPelanggan" class="collapse @@if (context.page_group === 'pages') { show }" data-bs-parent="#sideNavbar"> -->
                        <div id="penyewaanPelanggan" class="collapse <?= $this->uri->segment(1) == 'form-penyewaan' || $this->uri->segment(1) == 'status-penyewaan' ? 'show' : ''
                                                                        ?>" data-bs-parent="#sideNavbar">
                            <ul class="nav flex-column">
                                <li class="nav-item">
                                    <a class="nav-link  <?= $this->uri->segment(1) == 'form-penyewaan' ? 'active' : ''
                                                        ?>" href="<?= base_url('form-penyewaan') ?>">
                                        Form Penyewaan
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link has-arrow  <?= $this->uri->segment(1) == 'status-penyewaan' ? 'active' : ''
                                                                    ?>" href="<?= base_url('status-penyewaan') ?>">
                                        Status Penyewaan
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link has-arrow collapsed" href="" data-bs-toggle="collapse" data-bs-target="#pengembalianPelanggan" aria-expanded="false" aria-controls="pengembalianPelanggan">
                            <i data-feather="arrow-right-circle" class="nav-icon icon-xs me-2">
                            </i> Pengembalian
                        </a>
                        <!-- <div id="pengembalianPelanggan" class="collapse @@if (context.page_group === 'pages') { show }" data-bs-parent="#sideNavbar"> -->
                        <div id="pengembalianPelanggan" class="collapse <?= $this->uri->segment(1) == 'status-pengembalian' || $this->uri->segment(1) == 'denda' ? 'show' : ''
                                                                        ?>" data-bs-parent="#sideNavbar">
                            <ul class="nav flex-column">
                                <li class="nav-item">
                                    <a class="nav-link <?= $this->uri->segment(1) == 'status-pengembalian' ? 'active' : ''
                                                        ?>" href="<?= base_url('status-pengembalian') ?>">
                                        Status Pengembalian
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link has-arrow <?= $this->uri->segment(1) == 'denda' ? 'active' : ''
                                                                    ?>" href="<?= base_url('denda') ?>">
                                        Denda
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>


                    <li class="nav-item">
                        <a class="nav-link has-arrow <?= $this->uri->segment(1) == 'pembayaran' ? 'active' : ''
                                                        ?>" href="<?= base_url('pembayaran') ?>">
                            <i data-feather="dollar-sign" class="nav-icon icon-xs me-2"></i> Pembayaran
                        </a>
                    </li>

                <?php } ?>


                <?php if ($this->session->userdata('hak_akses') == '1') { ?>
                    <!-- Admin -->
                    <li class="nav-item">
                        <div class="navbar-heading">Admin</div>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link has-arrow <?= $this->uri->segment(1) == 'barang' ? 'active' : ''
                                                        ?>" href="<?= base_url('barang') ?>">
                            <i data-feather="shopping-bag" class="nav-icon icon-xs me-2"></i> Data Barang
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link has-arrow <?= $this->uri->segment(1) == 'kategori' ? 'active' : ''
                                                        ?>" href="<?= base_url('kategori') ?>">
                            <i data-feather="list" class="nav-icon icon-xs me-2"></i> Kategori
                        </a>
                    </li>


                    <li class="nav-item">
                        <a class="nav-link has-arrow <?= $this->uri->segment(1) == 'users' ? 'active' : ''
                                                        ?>" href="<?= base_url('users') ?>">
                            <i data-feather="users" class="nav-icon icon-xs me-2"></i> Role Users
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link has-arrow collapsed" href="" data-bs-toggle="collapse" data-bs-target="#laporanAdmin" aria-expanded="false" aria-controls="laporanAdmin">
                            <i data-feather="clipboard" class="nav-icon icon-xs me-2">
                            </i> Report
                        </a>
                        <!-- <div id="laporanAdmin" class="collapse @@if (context.page_group === 'pages') { show }" data-bs-parent="#sideNavbar"> -->
                        <div id="laporanAdmin" class="collapse " data-bs-parent="#sideNavbar">
                            <ul class="nav flex-column">
                                <li class="nav-item">
                                    <a class="nav-link " href="<?= base_url('laporan-penyewaan') ?>">
                                        Laporan Penyewaan
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link has-arrow " href="<?= base_url('laporan-denda') ?>">
                                        Laporan Denda
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link has-arrow " href="<?= base_url('laporan-naive-bayes') ?>">
                                        Laporan Naive Bayes
                                    </a>
                                </li>
                            </ul>
                        </div>

                    </li>

                <?php } ?>



                <?php if ($this->session->userdata('hak_akses') == '3') { ?>
                    <!-- Petugas Toko -->
                    <li class="nav-item">
                        <div class="navbar-heading">Petugas Toko</div>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link has-arrow" href="<?= base_url('barang') ?>">
                            <i data-feather="shopping-bag" class="nav-icon icon-xs me-2"></i> Data Barang
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link has-arrow" href="<?= base_url('penyewaan') ?>">
                            <i data-feather="arrow-left-circle" class="nav-icon icon-xs me-2"></i> Penyewaan
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link has-arrow" href="<?= base_url('pengembalian') ?>">
                            <i data-feather="arrow-right-circle" class="nav-icon icon-xs me-2"></i> Pengembalian
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link has-arrow collapsed" href="" data-bs-toggle="collapse" data-bs-target="#pembayaran" aria-expanded="false" aria-controls="pembayaran">
                            <i data-feather="clipboard" class="nav-icon icon-xs me-2">
                            </i> Pembayaran
                        </a>
                        <!-- <div id="pembayaran" class="collapse @@if (context.page_group === 'pages') { show }" data-bs-parent="#sideNavbar"> -->
                        <div id="pembayaran" class="collapse " data-bs-parent="#sideNavbar">
                            <ul class="nav flex-column">
                                <li class="nav-item">
                                    <a class="nav-link " href="<?= base_url('laporan-penyewaan') ?>">
                                        Pembayaran Done
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link has-arrow " href="<?= base_url('laporan-denda') ?>">
                                        Pembayaran Denda
                                    </a>
                                </li>
                                <!-- <li class="nav-item">
                                <a class="nav-link has-arrow " href="<?= base_url('laporan-naive-bayes') ?>">
                                    Laporan Naive Bayes
                                </a>
                            </li> -->
                            </ul>
                        </div>
                    </li>

                <?php } ?>



                <?php if ($this->session->userdata('hak_akses') == '2') { ?>
                    <!-- Owner Toko -->
                    <li class="nav-item">
                        <div class="navbar-heading">Owner Toko</div>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link has-arrow" href="<?= base_url('laporan-penyewaan') ?>">
                            <i data-feather="file-text" class="nav-icon icon-xs me-2"></i> Report Penyewaan
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link has-arrow" href="<?= base_url('laporan-denda') ?>">
                            <i data-feather="file-text" class="nav-icon icon-xs me-2"></i> Report Denda
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link has-arrow" href="<?= base_url('laporan-naive-bayes') ?>">
                            <i data-feather="file-text" class="nav-icon icon-xs me-2"></i> Report Naive Bayes
                        </a>
                    </li>



                <?php } ?>
            </ul>

        </div>
    </nav>

    <!-- Page content -->
    <div id="page-content">


        <div class="header @@classList">
            <!-- navbar -->
            <nav class="navbar-classic navbar navbar-expand-lg">
                <a id="nav-toggle" href="#"><i data-feather="menu" class="nav-icon me-2 icon-xs"></i></a>
                <!-- <div class="ms-lg-3 d-none d-md-none d-lg-block">
                    <form class="d-flex align-items-center">
                        <input type="search" class="form-control" placeholder="Search" />
                    </form>
                </div> -->
                <!--Navbar nav -->
                <ul class="navbar-nav navbar-right-wrap ms-auto d-flex nav-top-wrap">
                    <li class="dropdown stopevent">
                        <a class="btn btn-light btn-icon rounded-circle indicator
                        indicator-primary text-muted" href="#" role="button" id="dropdownNotification" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="icon-xs" data-feather="bell"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end" aria-labelledby="dropdownNotification">
                            <div>
                                <div class="border-bottom px-3 pt-2 pb-3 d-flex
                            justify-content-between align-items-center">
                                    <p class="mb-0 text-dark fw-medium fs-4">Notifications</p>
                                    <a href="#" class="text-muted">
                                        <span>
                                            <i class="me-1 icon-xxs" data-feather="settings"></i>
                                        </span>
                                    </a>
                                </div>
                                <!-- List group -->
                                <ul class="list-group list-group-flush notification-list-scroll">
                                    <!-- List group item -->
                                    <li class="list-group-item bg-light">


                                        <a href="#" class="text-muted">
                                            <h5 class=" mb-1">Rishi Chopra</h5>
                                            <p class="mb-0">
                                                Mauris blandit erat id nunc blandit, ac eleifend dolor pretium.
                                            </p>
                                        </a>



                                    </li>
                                    <!-- List group item -->
                                    <li class="list-group-item">


                                        <a href="#" class="text-muted">
                                            <h5 class=" mb-1">Neha Kannned</h5>
                                            <p class="mb-0">
                                                Proin at elit vel est condimentum elementum id in ante. Maecenas et sapien metus.
                                            </p>
                                        </a>



                                    </li>
                                    <!-- List group item -->
                                    <li class="list-group-item">


                                        <a href="#" class="text-muted">
                                            <h5 class=" mb-1">Nirmala Chauhan</h5>
                                            <p class="mb-0">
                                                Morbi maximus urna lobortis elit sollicitudin sollicitudieget elit vel pretium.
                                            </p>
                                        </a>



                                    </li>
                                    <!-- List group item -->
                                    <li class="list-group-item">


                                        <a href="#" class="text-muted">
                                            <h5 class=" mb-1">Sina Ray</h5>
                                            <p class="mb-0">
                                                Sed aliquam augue sit amet mauris volutpat hendrerit sed nunc eu diam.
                                            </p>
                                        </a>



                                    </li>
                                </ul>
                                <div class="border-top px-3 py-2 text-center">
                                    <a href="#" class="text-inherit fw-semi-bold">
                                        View all Notifications
                                    </a>
                                </div>
                            </div>
                        </div>
                    </li>
                    <!-- List -->
                    <li class="dropdown ms-2">
                        <a class="rounded-circle" href="#" role="button" id="dropdownUser" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <div class="avatar avatar-md avatar-indicators avatar-online">
                                <?php $this->load->view('partials/user_info'); ?>

                            </div>

                        </a>
                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownUser">
                            <div class="px-4 pb-0 pt-2">
                                <div class="lh-1 ">
                                    <?php if (
                                        $this->session->userdata('hak_akses') == '1'
                                    ) { ?>
                                        <h5 class="mb-1"> <?= $this->session->userdata('nama') ?></h5>
                                    <?php } ?>

                                    <?php if (
                                        $this->session->userdata('hak_akses') == '2'
                                    ) { ?>
                                        <h5 class="mb-1"> <?= $this->session->userdata('nama') ?></h5>
                                    <?php } ?>

                                    <?php if (
                                        $this->session->userdata('hak_akses') == '3'
                                    ) { ?>
                                        <h5 class="mb-1"> <?= $this->session->userdata('nama') ?></h5>
                                    <?php } ?>

                                    <?php if (
                                        $this->session->userdata('hak_akses') == '4'
                                    ) { ?>
                                        <h5 class="mb-1"> <?= $this->session->userdata('nama') ?></h5>
                                    <?php } ?>

                                </div>
                                <div class=" dropdown-divider mt-3 mb-2"></div>
                            </div>

                            <ul class="list-unstyled">

                                <li>
                                    <a class="dropdown-item" href="<?= base_url('profil') ?>">
                                        <i class="me-2 icon-xxs dropdown-item-icon" data-feather="user"></i>
                                        Profile
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="<?= base_url('logout') ?>">
                                        <i class="me-2 icon-xxs dropdown-item-icon" data-feather="power"></i>Sign Out
                                    </a>
                                </li>
                            </ul>

                        </div>
                    </li>
                </ul>
            </nav>
        </div>