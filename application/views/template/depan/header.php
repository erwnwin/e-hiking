<!-- HEADER -->
<header>
    <!-- TOP HEADER -->
    <div id="top-header">
        <div class="container">
            <ul class="header-links pull-left">
                <li><a href="#"><i class="fa fa-phone"></i> 0821xxxxxxx</a></li>
                <li><a href="#"><i class="fa fa-envelope-o"></i> sunrise@gmail.com</a></li>
                <li><a href="#"><i class="fa fa-map-marker"></i> Makassar, South Sulawesi</a></li>
            </ul>
            <ul class="header-links pull-right">
                <li><a href="<?= base_url('register') ?>"><i class="fa fa-user-o"></i> Registrasi Akun</a></li>
                <li><a href="<?= base_url('login') ?>"><i class="fa fa-sign-in"></i> Login</a></li>
            </ul>
        </div>
    </div>
    <!-- /TOP HEADER -->

    <!-- MAIN HEADER -->
    <div id="header">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <!-- LOGO -->
                <div class="col-md-3">
                    <div class="header-logo">
                        <a href="#" class="logo">
                            <img src="<?= base_url() ?>public/img/logo-depan.png" alt="" width="75%">
                        </a>
                    </div>
                </div>
                <!-- /LOGO -->

                <!-- SEARCH BAR -->
                <div class="col-md-6">
                    <div class="header-search">
                        <form>
                            <select class="input-select">
                                <option value="0">All Kategori</option>
                                <option value="1">Category 01</option>
                                <option value="1">Category 02</option>
                            </select>
                            <input class="input" placeholder="Pencarian">
                            <button class="search-btn">Cari</button>
                        </form>
                    </div>
                </div>
                <!-- /SEARCH BAR -->

                <!-- ACCOUNT -->
                <div class="col-md-3 clearfix">
                    <div class="header-ctn">
                        <!-- Wishlist -->
                        <div>
                            <a href="#">
                                <i class="fa fa-heart-o"></i>
                                <span>Sunrise Toko</span>
                                <!-- <div class="qty">2</div> -->
                            </a>
                        </div>
                        <!-- /Wishlist -->


                        <!-- Menu Toogle -->
                        <div class="menu-toggle">
                            <a href="#">
                                <i class="fa fa-bars"></i>
                                <span>Menu</span>
                            </a>
                        </div>
                        <!-- /Menu Toogle -->
                    </div>
                </div>
                <!-- /ACCOUNT -->
            </div>
            <!-- row -->
        </div>
        <!-- container -->
    </div>
    <!-- /MAIN HEADER -->
</header>
<!-- /HEADER -->