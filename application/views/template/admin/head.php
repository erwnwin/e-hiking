<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Develop by Erwin,S.Kom -->

    <!-- Favicon icon-->
    <link rel="shortcut icon" type="image/x-icon" href="<?= base_url() ?>public/img/logo-head.png">

    <!-- Libs CSS -->

    <link href="<?= base_url() ?>public/backend/node_modules/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <!-- <link href="<?= base_url() ?>public/backend/node_modules/dropzone/dist/dropzone.css" rel="stylesheet"> -->
    <link href="<?= base_url() ?>public/backend/node_modules/@mdi/font/css/materialdesignicons.min.css" rel="stylesheet" />
    <link href="<?= base_url() ?>public/backend/node_modules/prismjs/themes/prism-okaidia.css" rel="stylesheet">

    <!-- Theme CSS -->
    <!-- build:css <?= base_url() ?>public/backend/assets/css/theme.min.css -->
    <link rel="stylesheet" href="<?= base_url() ?>public/backend/assets/css/theme.css">

    <!-- <link href="<?= base_url() ?>public/backend/node_modules/dropzone/dist/dropzone.css" rel="stylesheet"> -->
    <link href="<?= base_url() ?>public/backend/node_modules/@yaireo/tagify/dist/tagify.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/dropzone.min.css" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- sweetalert -->
    <link rel="stylesheet" href="<?= base_url() ?>public/js/sweetalert2.min.css">
    <!-- <link rel="stylesheet" href="<?= base_url() ?>public/js/sweet-style.css"> -->

    <link rel="stylesheet" href="<?= base_url() ?>public/js/admin/save-produk.css">

    <?php if ($this->session->userdata('hak_akses') == '4') { ?>
        <link rel="stylesheet" href="<?= base_url() ?>public/js/pelanggan/barang.css">
    <?php } ?>

    <style>
        .avatar-xl {
            width: 60px;
            height: 60px;
        }

        .avatar-initial {
            background-color: #adb5bd;
            width: 60px;
            height: 60px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 24px;
            color: #333;
            font-family: 'Poppins', sans-serif;
            border-radius: 50%;
        }

        .avatar-initialku {
            background-color: #3B71CA;
            width: 40px;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 17px;
            color: #333;
            font-family: 'Poppins', sans-serif;
            border-radius: 50%;
        }
    </style>
    <!-- endbuild -->
    <title><?= $title ?></title>
</head>

<body class="bg-light">