<!DOCTYPE html>
<html class="loading" lang="ar" data-textdirection="rtl">
<!-- BEGIN: Head-->

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
	<meta name="description" content="aby,aBy Solutions">
	<meta name="keywords" content="aby,aBy Solutions">
	<meta name="author" content="Abou Yaziyd">
	<title><?= APP_NAME . ' | ' . $title ?></title>
	<link href="https://fonts.googleapis.com/css2?family=Cairo:wght@500&display=swap" rel="stylesheet">
	<link rel="apple-touch-icon" href="<?= base_url('app-assets/images/ico/apple-icon-120.png') ?>">
	<link rel="shortcut icon" type="image/x-icon" href="<?= base_url('app-assets/images/ico/favicon.ico') ?>">

	<!-- BEGIN: Vendor CSS-->
	<link rel="stylesheet" type="text/css" href="<?= base_url('app-assets/vendors/css/vendors-rtl.min.css') ?>">
	<!-- END: Vendor CSS-->

	<!-- BEGIN: Theme CSS-->
	<link rel="stylesheet" type="text/css" href="<?= base_url('app-assets/css-rtl/bootstrap.css') ?>">
	<link rel="stylesheet" type="text/css" href="<?= base_url('app-assets/css-rtl/bootstrap-extended.css') ?>">
	<link rel="stylesheet" type="text/css" href="<?= base_url('app-assets/css-rtl/colors.css') ?>">
	<link rel="stylesheet" type="text/css" href="<?= base_url('app-assets/css-rtl/components.css') ?>">
	<link rel="stylesheet" type="text/css" href="<?= base_url('app-assets/css-rtl/custom-rtl.css') ?>">
	<!-- END: Theme CSS-->

	<!-- BEGIN: Page CSS-->
	<link rel="stylesheet" type="text/css" href="<?= base_url('app-assets/css-rtl/core/menu/menu-types/vertical-menu.css') ?>">
	<link rel="stylesheet" type="text/css" href="<?= base_url('app-assets/css-rtl/core/colors/palette-gradient.css') ?>">
	<link rel="stylesheet" type="text/css" href="<?= base_url('app-assets/css-rtl/pages/error.css') ?>">
	<!-- END: Page CSS-->

	<!-- BEGIN: Custom CSS-->
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/style-rtl.css') ?>">
	<!-- END: Custom CSS-->

</head>
<!-- END: Head-->

<!-- BEGIN: Body-->

<body class="vertical-layout vertical-menu 1-column   fixed-navbar" data-open="click" data-menu="vertical-menu" data-col="1-column">

	<!-- BEGIN: Content-->
	<div class="app-content content">
		<div class="content-overlay"></div>
		<div class="content-wrapper">
			<div class="content-header row">
			</div>
			<div class="content-body">
				<div class="row full-height-vh-with-nav">
					<div class="col-12 d-flex align-items-center justify-content-center">
						<div class="col-lg-6 col-10">
							<div class="row">
								<div class="col-12 text-center">
									<h3 class="error-code text-center mb-2"><?= lang('app.welcome') ?></h3>
								</div>
							</div>
							<div class="row py-2">
								<div class="col-12 text-center">
									<?php if (session('isLoggedIn')==true) : ?>
									<a href="<?= base_url('login') ?>" class="btn btn-outline-info mb-1 round"><i class="ft-home"></i> <?= lang('app.dashboard') ?> </a>
									<?php else : ?>
									<a href="<?= base_url('login') ?>" class="btn btn-outline-success mb-1 round box-shadow-2"><?= lang('app.login') ?> </a>
									<?php endif ?>
								</div>
							</div>
						</div>
					</div>
				</div>

			</div>
		</div>
	</div>
	<!-- END: Content-->

	<div class="sidenav-overlay"></div>
	<div class="drag-target"></div>

	<!-- BEGIN: Vendor JS-->
	<script src="<?= base_url('app-assets/vendors/js/vendors.min.js') ?>"></script>
	<!-- BEGIN Vendor JS-->
	
	<!-- BEGIN: Theme JS-->
	<script src="<?= base_url('app-assets/js/core/app-menu.js') ?>"></script>
	<sript src="<?= base_url('app-assets/js/core/app.js') ?>"></script>
	<!-- END: Theme JS-->

</body>
<!-- END: Body-->

</html>