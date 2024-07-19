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

    <!-- sweetalert -->
    <link rel="stylesheet" href="<?= base_url() ?>public/js/sweetalert2.min.css">

    <title><?= $title ?></title>
</head>

<body>
    <!-- container -->
    <main class="container d-flex flex-column">
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
                        <form id="loginForm">
                            <!-- Username -->
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" id="password" class="form-control" name="password" placeholder="********" required="" autocomplete="off" />
                            </div>
                            <!-- Password -->
                            <div class="mb-3">
                                <label for="confirm_password" class="form-label">Konfirmasi Password</label>
                                <input type="confirm_password" id="confirm_password" class="form-control" name="confirm_password" placeholder="********" required="" autocomplete="off" />
                            </div>

                            <div>
                                <!-- Button -->
                                <div class="d-grid">
                                    <button type="submit" class="btn btn-primary" id="btnUpdatePass">Update Password</button>
                                </div>

                                <!-- <div class="d-md-flex justify-content-between mt-4">
                                    <div class="mb-2 mb-md-0">
                                        Belum punya akun? <a href="<?= base_url('register') ?>" class="fs-5">Buat Akun</a>
                                    </div>
                                    <div>
                                        <a href="<?= base_url('lupa-password') ?>" class="text-inherit fs-5">Lupa password?</a>
                                    </div>
                                </div> -->
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <!-- Scripts -->
    <!-- Libs JS -->

    <script src="<?= base_url() ?>public/backend/node_modules/jquery/dist/jquery.min.js"></script>

    <script src="<?= base_url() ?>public/backend/node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url() ?>public/backend/node_modules/feather-icons/dist/feather.min.js"></script>
    <script src="<?= base_url() ?>public/backend/node_modules/simplebar/dist/simplebar.min.js"></script>

    <!-- Theme JS -->
    <script src="<?= base_url() ?>public/backend/assets/js/main.js"></script>

    <!-- alert -->
    <script src="<?= base_url() ?>public/js/sweetalert2.all.min.js"></script>

    <!-- ajax login -->
    <script src="<?= base_url() ?>public/js/auth/reset.js"></script>

</body>

</html>