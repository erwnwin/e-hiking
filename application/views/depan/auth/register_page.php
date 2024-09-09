<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="author" content="Codescandy" />

    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-M8S4MT3EYG"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'G-M8S4MT3EYG');
    </script>

    <!-- Favicon icon-->
    <link rel="shortcut icon" type="image/x-icon" href="<?= base_url() ?>public/img/logo-head.png">
    <!-- <link rel="shortcut icon" type="image/x-icon" href="../assets/images/favicon/favicon.ico" /> -->

    <!-- Color modes -->
    <script src="<?= base_url() ?>public/backend/assets/js/vendors/color-modes.js"></script>

    <!-- Libs CSS -->
    <link href="<?= base_url() ?>public/backend/node_modules/bootstrap-icons/font/bootstrap-icons.min.css" rel="stylesheet" />
    <link href="<?= base_url() ?>public/backend/node_modules/@mdi/font/css/materialdesignicons.min.css" rel="stylesheet" />
    <link href="<?= base_url() ?>public/backend/node_modules/simplebar/dist/simplebar.min.css" rel="stylesheet" />

    <!-- Theme CSS -->
    <link rel="stylesheet" href="<?= base_url() ?>public/backend/assets/css/theme.css">
    <link rel="stylesheet" href="<?= base_url() ?>public/assets/css/gayaku.css">

    <!-- sweetalert -->
    <link rel="stylesheet" href="<?= base_url() ?>public/js/sweetalert2.min.css">

    <title><?= $title; ?></title>

    <style>
        .loading-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(255, 255, 255, 0.8);
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 10;
        }

        .loading-overlay .spinner-border {
            width: 3rem;
            height: 3rem;
        }
    </style>

</head>

<body>
    <!-- container -->
    <main class="container d-flex flex-column">
        <br>
        <br>
        <div class="row align-items-center justify-content-center g-0 min-vh-100">
            <div class="col-12 col-md-8 col-lg-6 col-xxl-4 py-8 py-xl-0">

                <!-- Card -->
                <div class="card smooth-shadow-md">
                    <!-- Card body -->
                    <div class="card-body p-6">
                        <div class="mb-4">
                            <a href="../index.html"><img src="<?= base_url() ?>public/img/logo2.png" alt="" width="40%" height="50%" class="mb-2 text-inverse" alt="Image" /></a>
                            <p class="mb-6">Please enter your user information.</p>
                        </div>
                        <!-- Form -->
                        <form id="formRegister">
                            <!-- Username -->
                            <div class="mb-3">
                                <label for="nama_pelanggan" class="form-label">Nama Lengkap</label>
                                <input type="text" id="nama_pelanggan" class="form-control" name="nama_pelanggan" placeholder="Nama Lengkap" autocomplete="off" />
                            </div>
                            <div class="mb-3">
                                <label for="nik" class="form-label">NIK</label>
                                <input type="text" id="nik" class="form-control" name="nik" maxlength="17" placeholder="Nomor Induk Kependudukan" autocomplete="off" />
                                <div id="nikError"></div>
                            </div>
                            <!-- Email -->
                            <div class="mb-3">
                                <label for="email" class="form-label">Alamat Email</label>
                                <input type="email" id="email" class="form-control" name="email" placeholder="Alamat email valid untuk aktivasi" autocomplete="off" />
                                <div id="emailInfo"></div>
                            </div>
                            <!-- Password -->
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" id="password" class="form-control" name="password" placeholder="**************" autocomplete="off" />
                            </div>
                            <!-- Password -->
                            <div class="mb-3">
                                <label for="confirm_password" class="form-label">Confirm Password</label>
                                <input type="password" id="confirm_password" class="form-control" name="confirm_password" placeholder="**************" autocomplete="off" />
                                <div id="confirmPasswordInfo"></div>

                            </div>

                            <div class="mb-3">
                                <label for="pekerjaan" class="form-label">Pekerjaan/Profesi</label>
                                <input type="text" id="pekerjaan" class="form-control" name="pekerjaan" placeholder="Pekerjaan/profesi" autocomplete="off" />
                            </div>

                            <div class="mb-3">
                                <label for="alamat" class="form-label">Alamat</label>
                                <input type="text" id="alamat" class="form-control" name="alamat" placeholder="Alamat" />
                            </div>

                            <div class="mb-3">
                                <label for="no_hp_wa" class="form-label">No HP/WA</label>
                                <input type="text" id="no_hp_wa" class="form-control" maxlength="13" name="no_hp_wa" placeholder="0821xxxxxx" />
                                <div id="noHPError"></div>
                            </div>
                            <div>
                                <!-- Button -->
                                <div class="d-grid">
                                    <button type="submit" class="btn btn-primaryku" id="btnBuatAkun">Buat Akun</button>
                                </div>

                                <div class="d-md-flex justify-content-between mt-4">
                                    <div class="mb-2 mb-md-0">
                                        Sudah punya akun? <a href="<?= base_url('login') ?>" class="fs-5">Login</a>
                                    </div>
                                    <div>
                                        <a href="<?= base_url('lupa-password') ?>" class="text-inherit fs-5">Lupa password?</a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>

                    <div id="loadingOverlay" class="loading-overlay d-none">
                        <div class="spinner-border text-primaryku" role="status">
                            <!-- <span class="sr-only">Wait</span> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <br>
    </main>

    <!-- Scripts -->
    <!-- Libs JS -->

    <script src="<?= base_url() ?>public/backend/node_modules/jquery/dist/jquery.min.js"></script>

    <script src="<?= base_url() ?>public/backend/node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url() ?>public/backend/node_modules/feather-icons/dist/feather.min.js"></script>
    <script src="<?= base_url() ?>public/backend/node_modules/simplebar/dist/simplebar.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/additional-methods.min.js"></script>

    <!-- Theme JS -->
    <script src="<?= base_url() ?>public/backend/assets/js/theme.min.js"></script>

    <!-- alert -->
    <script src="<?= base_url() ?>public/js/sweetalert2.all.min.js"></script>

    <!-- ajax register -->
    <script src="<?= base_url() ?>public/js/auth/register.js"></script>

</body>

</html>