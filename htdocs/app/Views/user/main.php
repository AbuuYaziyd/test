<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="rtl">
<!-- BEGIN: Head-->

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
	<meta name="description" content="aby,aBy Solutions">
	<meta name="keywords" content="aby,aBy Solutions">
	<meta name="author" content="Abou Yaziyd">
	<title><?= APP_NAME ?> | <?= $title ?></title>
	<link rel="apple-touch-icon" href="<?= base_url('app-assets/images/ico/apple-icon-120.png') ?>">
	<link rel="shortcut icon" type="image/x-icon" href="<?= base_url('app-assets/images/ico/favicon.ico') ?>">
	<link href="https://fonts.googleapis.com/css2?family=Amiri&display=swap" rel="stylesheet">

	<!-- BEGIN: Vendor CSS-->
	<link rel="stylesheet" type="text/css" href="<?= base_url('app-assets/vendors/css/vendors-rtl.min.css') ?>">
	<link rel="stylesheet" type="text/css" href="<?= base_url('app-assets/vendors/css/extensions/sweetalert2.min.css') ?>">
	<!-- END: Vendor CSS-->

	<!-- BEGIN: Theme CSS-->
	<link rel="stylesheet" type="text/css" href="<?= base_url('app-assets/css-rtl/bootstrap.css') ?>">
	<link rel="stylesheet" type="text/css" href="<?= base_url('app-assets/css-rtl/bootstrap-extended.css') ?>">
	<link rel="stylesheet" type="text/css" href="<?= base_url('app-assets/css-rtl/colors.css') ?>">
	<link rel="stylesheet" type="text/css" href="<?= base_url('app-assets/css-rtl/components.css') ?>">
	<link rel="stylesheet" type="text/css" href="<?= base_url('app-assets/css-rtl/custom-rtl.css') ?>">
	<!-- END: Theme CSS-->

	<?= $this->renderSection('styles') ?>

	<!-- BEGIN: Page CSS-->
	<link rel="stylesheet" type="text/css" href="<?= base_url('app-assets/css-rtl/core/menu/menu-types/vertical-menu-modern.css') ?>">
	<link rel="stylesheet" type="text/css" href="<?= base_url('app-assets/css-rtl/core/colors/palette-gradient.css') ?>">
	<link rel="stylesheet" type="text/css" href="<?= base_url('app-assets/vendors/css/charts/jquery-jvectormap-2.0.3.css') ?>">
	<link rel="stylesheet" type="text/css" href="<?= base_url('app-assets/vendors/css/charts/morris.css') ?>">
	<link rel="stylesheet" type="text/css" href="<?= base_url('app-assets/fonts/simple-line-icons/style.css') ?>">
	<link rel="stylesheet" type="text/css" href="<?= base_url('app-assets/css-rtl/core/colors/palette-gradient.css') ?>">
	<!-- END: Page CSS-->

	<!-- BEGIN: Custom CSS-->
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/style-rtl.css') ?>">
	<!-- END: Custom CSS-->

</head>
<!-- END: Head-->

<!-- BEGIN: Body-->

<body class="vertical-layout vertical-menu-modern 2-columns   fixed-navbar" data-open="click" data-menu="vertical-menu-modern" data-col="2-columns">

	<!-- BEGIN: Header-->
	<?= $this->include('user/header') ?>
	<!-- END: Header-->


	<!-- BEGIN: Main Menu-->
	<?= $this->include('user/sidebar') ?>

	<!-- END: Main Menu-->
	<!-- BEGIN: Content-->
	<?= $this->renderSection('content') ?>
	<!-- END: Content-->

	<div class="sidenav-overlay"></div>
	<div class="drag-target"></div>

	<!-- BEGIN: Footer-->
	<?= $this->include('user/footer') ?>
	<!-- END: Footer-->

	<!-- BEGIN: Vendor JS-->
	<script src="<?= base_url('app-assets/vendors/js/vendors.min.js') ?>"></script>
	<!-- BEGIN Vendor JS-->

	<!-- BEGIN: Page Vendor JS-->
	<script src="<?= base_url('app-assets/vendors/js/charts/chart.min.js') ?>"></script>
	<script src="<?= base_url('app-assets/vendors/js/charts/raphael-min.js') ?>"></script>
	<script src="<?= base_url('app-assets/vendors/js/charts/morris.min.js') ?>"></script>
	<script src="<?= base_url('app-assets/vendors/js/charts/jvector/jquery-jvectormap-2.0.3.min.js') ?>"></script>
	<script src="<?= base_url('app-assets/vendors/js/charts/jvector/jquery-jvectormap-world-mill.js') ?>"></script>
	<script src="<?= base_url('app-assets/data/jvector/visitor-data.js') ?>"></script>
	<!-- END: Page Vendor JS-->

	<script src="<?= base_url('app-assets/vendors/js/extensions/sweetalert2.all.min.js') ?>"></script>
	<script>
		$(document).ready(function() {
			<?php if (session()->getFlashdata('type')) : ?>
				Swal.fire({
					title: "<?= session()->getFlashdata('title') ?>",
					text: "<?= session()->getFlashdata('text') ?>",
					type: "<?= session()->getFlashdata('type') ?>",
					timer: 2000,
					showConfirmButton: true,
					confirmButtonText: "<?= lang('app.ok') ?>",
				});
			<?php endif ?>
		});
	</script>

	<?= $this->renderSection('scripts') ?>
	<!-- BEGIN: Theme JS-->
	<script src="<?= base_url('app-assets/js/core/app-menu.js') ?>"></script>
	<script src="<?= base_url('app-assets/js/core/app.js') ?>"></script>
	<!-- END: Theme JS-->

	<!-- BEGIN: Page JS-->
	<script src="<?= base_url('app-assets/js/scripts/pages/dashboard-sales.js') ?>"></script>
	<!-- END: Page JS-->

</body>
<!-- END: Body-->

</html>