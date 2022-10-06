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
    <title><?= APP_NAME . ' | ' . $title ?></title>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@500&display=swap" rel="stylesheet">
    <link rel="apple-touch-icon" href="<?= base_url('app-assets/images/ico/apple-icon-120.png') ?>">
    <link rel="shortcut icon" type="image/x-icon" href="<?= base_url('app-assets/images/ico/favicon.ico') ?>">

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="<?= base_url('app-assets/vendors/css/vendors-rtl.min.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?= base_url('app-assets/vendors/css/charts/leaflet.css') ?>">
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
    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/style-rtl.css') ?>">
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
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="content-wrapper">
            <div class="content-body">
                <!-- maps-leaflet start -->
                <section class="maps-leaflet">
                    <!-- User Location map start -->
                    <div class="card">
                        <div class="card-header">
                            <h3><b id="ip"></b></h3>
                            <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                            <div class="heading-elements">
                                <form action="<?= base_url('umrah/done') ?>" method="post">
                                    <input type="hidden" name="lat" id="lat">
                                    <input type="hidden" name="lng" id="lng">
                                    <button type="submit" class="btn btn-icon btn-secondary">
                                        <i class="ft ft-check-circle white"></i>
                                        <?= lang('app.send') ?>
                                    </button>
                                </form>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="card-title"><?= lang('app.sureSendLocation') ?></div>
                            <div id="maps-leaflet-user-location" class="maps-leaflet-container"></div>
                        </div>
                    </div>
                    <!-- User Location map end -->
                </section>
                <!-- maps-leaflet ends -->
            </div>
        </div>
    </div>
    <!-- END: Content-->

    <div class="sidenav-overlay"></div>
    <div class="drag-target"></div>

    <!-- BEGIN: Footer-->
    <?= $this->include('layouts/footer') ?>
    <!-- END: Footer-->


    <!-- BEGIN: Vendor JS-->
    <script src="<?= base_url('app-assets/vendors/js/vendors.min.js') ?>"></script>
    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Page Vendor JS-->
    <script src="<?= base_url('app-assets/data/leaflet/us-states.js') ?>on"></script>
    <script src="<?= base_url('app-assets/vendors/js/charts/leaflet/leaflet.js') ?>"></script>
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="<?= base_url('app-assets/js/core/app-menu.js') ?>"></script>
    <script src="<?= base_url('app-assets/js/core/app.js') ?>"></script>
    <!-- END: Theme JS-->

    <!-- BEGIN: Page JS-->
    <script>
        $(document).ready(function() {
            $(".maps-leaflet-container").css("height", "450px");

            // initialize the user location map
            var mapsLeafletUserLocation = L.map('maps-leaflet-user-location').setView([21.4225, 39.8262], 10);
            mapsLeafletUserLocation.locate({
                setView: true,
                maxZoom: 16
            });

            function onLocationFound(e) {
                var radius = e.accuracy;
                var ip = e.latlng;
                L.marker(e.latlng).addTo(mapsLeafletUserLocation)
                    .bindPopup("أنت موجود " + radius + " مترات من هنا").openPopup();
                L.circle(e.latlng, radius).addTo(mapsLeafletUserLocation);
                document.getElementById("ip").innerHTML = ip.lat + ',' + ip.lng;
                document.getElementById("lat").value = ip.lat;
                document.getElementById("lng").value = ip.lng;
            }
            mapsLeafletUserLocation.on('locationfound', onLocationFound);
            L.tileLayer('https://{s}.tile.osm.org/{z}/{x}/{y}.png', {
                attribution: 'Map data &copy; <?= date('Y') ?>',
                maxZoom: 18,
            }).addTo(mapsLeafletUserLocation);
        });
    </script>
    <!-- END: Page JS-->

</body>
<!-- END: Body-->

</html>