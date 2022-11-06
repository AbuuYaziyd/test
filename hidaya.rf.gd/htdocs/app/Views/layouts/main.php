<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="rtl">
<!-- BEGIN: Head-->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="Modern admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities with bitcoin dashboard.">
    <meta name="keywords" content="admin template, modern admin template, dashboard template, flat admin template, responsive admin template, web app, crypto dashboard, bitcoin dashboard">
    <meta name="author" content="PIXINVENT">
    <title><?= APP_NAME . ' | ' . $title ?></title>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@500&display=swap" rel="stylesheet">
    <link rel="apple-touch-icon" href="<?= base_url('app-assets/images/ico/apple-icon-120.png') ?> ">
    <link rel="shortcut icon" type="image/x-icon" href="<?= base_url('app-assets/images/ico/favicon.ico') ?> ">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="<?= base_url('app-assets/vendors/css/vendors-rtl.min.css') ?> ">
    <!-- END: Vendor CSS-->

    <?= $this->renderSection('styles') ?>
    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="<?= base_url('app-assets/css-rtl/bootstrap.css') ?> ">
    <link rel="stylesheet" type="text/css" href="<?= base_url('app-assets/css-rtl/bootstrap-extended.css') ?> ">
    <link rel="stylesheet" type="text/css" href="<?= base_url('app-assets/css-rtl/colors.css') ?> ">
    <link rel="stylesheet" type="text/css" href="<?= base_url('app-assets/css-rtl/components.css') ?> ">
    <link rel="stylesheet" type="text/css" href="<?= base_url('app-assets/css-rtl/custom-rtl.css') ?> ">
    <link rel="stylesheet" type="text/css" href="<?= base_url('app-assets/vendors/css/forms/selects/select2.min.css') ?>">
    <!-- END: Theme CSS-->

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="<?= base_url('app-assets/css-rtl/core/menu/menu-types/vertical-menu.css') ?> ">
    <link rel="stylesheet" type="text/css" href="<?= base_url('app-assets/css-rtl/core/colors/palette-gradient.css') ?> ">
    <link rel="stylesheet" type="text/css" href="<?= base_url('app-assets/vendors/css/cryptocoins/cryptocoins.css') ?> ">
    <link rel="stylesheet" type="text/css" href="<?= base_url('app-assets/vendors/css/charts/apexcharts.css') ?> ">
    <!-- END: Page CSS-->

    <link rel="stylesheet" type="text/css" href="<?= base_url('app-assets/vendors/css/extensions/sweetalert2.min.css') ?>">

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/style-rtl.css') ?> ">
    <!-- END: Custom CSS-->

</head>
<!-- END: Head-->

<!-- BEGIN: Body-->

<body class="vertical-layout vertical-menu 2-columns   fixed-navbar" data-open="click" data-menu="vertical-menu" data-col="2-columns">

    <!-- BEGIN: Header-->
    <?= $this->include('layouts/header') ?>
    <!-- END: Header-->


    <!-- BEGIN: Main Menu-->
    <?= $this->include('layouts/sidebar') ?>
    <!-- END: Main Menu-->
    <!-- BEGIN: Content-->
    <?= $this->renderSection('content') ?>
    <!-- END: Content-->

    <div class="sidenav-overlay"></div>
    <div class="drag-target"></div>

    <!-- BEGIN: Footer-->
    <?= $this->include('layouts/footer') ?>
    <!-- END: Footer-->


    <!-- BEGIN: Vendor JS-->
    <script src="<?= base_url('app-assets/vendors/js/vendors.min.js') ?> "></script>
    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Page Vendor JS-->
    <script src="<?= base_url('app-assets/vendors/js/charts/chart.min.js') ?> "></script>
    <script src="<?= base_url('app-assets/vendors/js/charts/apexcharts/apexcharts.min.js') ?> "></script>
    <!-- END: Page Vendor JS-->

    <script src="<?= base_url('app-assets/vendors/js/extensions/sweetalert2.all.min.js') ?>"></script>
    <?= $this->renderSection('scripts') ?>

    <!-- BEGIN: Theme JS-->
    <script src="<?= base_url('app-assets/js/core/app-menu.js') ?> "></script>
    <script src="<?= base_url('app-assets/js/core/app.js') ?> "></script>
    <script src="<?= base_url('app-assets/vendors/js/forms/select/select2.full.min.js') ?>"></script>
    <!-- END: Theme JS-->

    <!-- BEGIN: Page JS-->
    <script src="<?= base_url('app-assets/js/scripts/pages/dashboard-crypto.js') ?> "></script>
    <script src="<?= base_url('app-assets/js/scripts/forms/select/form-select2.js') ?>"></script>
    <!-- END: Page JS-->

    <script>
        $(document).ready(function() {
            <?php if (session()->getFlashdata('type')) : ?>
                Swal.fire({
                    title: "<?= session()->getFlashdata('title') ?>",
                    text: "<?= session()->getFlashdata('text') ?>",
                    type: "<?= session()->getFlashdata('type') ?>",
                    timer: 3000,
                    showConfirmButton: false,
                });
            <?php endif ?>
        });
    </script>

</body>
<!-- END: Body-->

</html>