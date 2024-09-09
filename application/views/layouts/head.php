<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $title; ?></title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
    <link rel="stylesheet" href="<?= base_url() ?>public/assets/plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>public/assets/dist/css/adminlte.min.css">
    <!-- <link rel="stylesheet" href="<?= base_url() ?>public/assets/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>public/assets/plugins/toastr/toastr.min.css"> -->
    <!-- sweetalert -->
    <link rel="stylesheet" href="<?= base_url() ?>public/js/sweetalert2.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>public/assets/css/custom.css">
    <link rel="stylesheet" href="<?= base_url() ?>public/js/admin/save-produk.css">
    <style>
        html {
            font-size: .9rem !important;
        }

        @keyframes blink {
            0% {
                opacity: 1;
            }

            50% {
                opacity: 0.5;
            }

            100% {
                opacity: 1;
            }
        }

        .blink {
            animation: blink 1s ease-in-out;
        }

        .overlay.hidden {
            display: none;
            /* Kelas untuk menyembunyikan overlay */
        }
    </style>
    <style>
        /* Gaya kustom untuk tombol konfirmasi SweetAlert2 */
        .swal2-confirm {
            background-color: #795548 !important;
            /* Warna coklat untuk tombol konfirmasi */
            border-color: #795548 !important;
        }

        /* Gaya kustom untuk tombol batal SweetAlert2 */
        .swal2-cancel {
            background-color: #6c757d !important;
            /* Warna tombol batal */
            border-color: #6c757d !important;
        }

        /* Gaya kustom untuk elemen form-control */
        .form-control {
            background-color: #fff;
            /* Warna latar belakang coklat muda */
            color: #795548;
            /* Warna border coklat */
        }

        /* Gaya saat elemen form-control difokuskan */
        .form-control:focus {
            background-color: #fff;
            /* Warna latar belakang saat difokuskan */
            border-color: #795548;
            /* Gaya shadow saat difokuskan */
        }
    </style>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <!-- Site wrapper -->
    <div class="wrapper">