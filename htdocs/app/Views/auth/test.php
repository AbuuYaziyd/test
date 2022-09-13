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
    <link rel="apple-touch-icon" href="<?= base_url('app-assets/images/ico/apple-icon-120.png') ?>') ?> ">
    <link rel="shortcut icon" type="image/x-icon" href="<?= base_url('app-assets/images/ico/favicon.ico') ?> ">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="<?= base_url('app-assets/vendors/css/vendors-rtl.min.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?= base_url('app-assets/vendors/css/pickers/daterange/daterangepicker.css') ?>">
    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="<?= base_url('app-assets/css-rtl/bootstrap.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?= base_url('app-assets/css-rtl/bootstrap-extended.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?= base_url('app-assets/css-rtl/colors.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?= base_url('app-assets/css-rtl/components.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?= base_url('app-assets/css-rtl/custom-rtl.css') ?>">
    <!-- END: Theme CSS-->

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="<?= base_url('app-assets/css-rtl/core/menu/menu-types/horizontal-menu.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?= base_url('app-assets/css-rtl/core/colors/palette-gradient.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?= base_url('app-assets/css-rtl/plugins/forms/wizard.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?= base_url('app-assets/css-rtl/plugins/pickers/daterange/daterange.css') ?>">
    <!-- END: Page CSS-->

</head>
<!-- END: Head-->

<!-- BEGIN: Body-->

<body class="horizontal-layout horizontal-menu horizontal-menu-padding 2-columns  " data-open="click" data-menu="horizontal-menu" data-col="2-columns">

    <!-- BEGIN: Content-->
    <div class="app-content container center-layout mt-2">
        <div class="content-overlay"></div>
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">

                <!-- Form wizard with icon tabs section start -->
                <section id="icon-tabs">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h1><?= lang('app.regYourSelf') ?></h1>
                                    <a class="heading-elements-toggle"><i class="la la-ellipsis-h font-medium-3"></i></a>
                                    <div class="heading-elements">
                                        <ul class="list-inline mb-0">
                                            <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                            <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                                            <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="card-content collapse show">
                                    <div class="card-body">
                                        <?php $validation = \Config\Services::validation() ?>
                                        <?= form_open('registration', ['id' => 'form', 'class' => 'icons-tab-steps wizard-circle']) ?>
                                        <!-- <form class="icons-tab-steps wizard-circle" id="form"> -->

                                        <!-- Step 1 -->
                                        <h6><i class="step-icon la la-trophy"></i> 1</h6>
                                        <fieldset>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <!-- <label for="firstName2"><?= lang('app.fstnames') ?> (<?= lang('app.inSW') ?>) :</label>
                                                        <?php if ($validation->getError('name')) : ?>
                                                            <span class="badge badge-danger"> <?= $errors = $validation->getError('name') ?></span>
                                                        <?php endif ?>
                                                        <input type="text" class="form-control" name="name">
                                                    </div>
                                                </div> -->

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="lastName2"><?= lang('app.lname') ?> (<?= lang('app.inSW') ?>) :</label>
                                                        <?php if ($validation->getError('lname')) : ?>
                                                            <span class="badge badge-danger"> <?= $errors = $validation->getError('lname') ?></span>
                                                        <?php endif ?>
                                                        <input type="text" class="form-control" name="lname">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="lastName2"><?= lang('app.fullName') ?> (<?= lang('app.inAR') ?>) :</label>
                                                        <?php if ($validation->getError('nameArabic')) : ?>
                                                            <span class="badge badge-danger"> <?= $errors = $validation->getError('nameArabic') ?></span>
                                                        <?php endif ?>
                                                        <input type="text" class="form-control" name="nameArabic">
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="emailAddress3"><?= lang('app.email') ?> :</label>
                                                        <?php if ($validation->getError('email')) : ?>
                                                            <span class="badge badge-danger"> <?= $errors = $validation->getError('email') ?></span>
                                                        <?php endif ?>
                                                        <input type="email" class="form-control" name="email">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="input-group">
                                                        <label for="phoneNumber2"><?= lang('app.phone') ?> :</label>
                                                        <?php if ($validation->getError('phone')) : ?>
                                                            <span class="badge badge-danger"> <?= $errors = $validation->getError('phone') ?></span>
                                                        <?php endif ?>
                                                        <div class="input-group">
                                                            <!-- <input type="text" class="form-control" placeholder="Addon To Right" aria-describedby="basic-addon2"> -->
                                                            <input type="tel" class="form-control" name="phone">
                                                            <div class="input-group-append">
                                                                <span class="input-group-text" id="basic-addon2">255+</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="date2"><?= lang('app.dob') ?> :</label>
                                                        <?php if ($validation->getError('dob')) : ?>
                                                            <span class="badge badge-danger"> <?= $errors = $validation->getError('dob') ?></span>
                                                        <?php endif ?>
                                                        <input type="date" class="form-control" name="dob">
                                                    </div>
                                                </div>
                                            </div>
                                        </fieldset>

                                        <!-- Step 2 -->
                                        <h6><i class="step-icon la la-rotate-left spinner"></i> 2</h6>
                                        <fieldset>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="proposalTitle2"><?= lang('app.malaf') ?> :</label>
                                                        <?php if ($validation->getError('malaf')) : ?>
                                                            <span class="badge badge-danger"> <?= $errors = $validation->getError('malaf') ?></span>
                                                        <?php endif ?>
                                                        <input type="text" class="form-control" name="malaf">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="videoUrl2"><?= lang('app.level') ?> :</label>
                                                        <?php if ($validation->getError('level')) : ?>
                                                            <span class="badge badge-danger"> <?= $errors = $validation->getError('level') ?></span>
                                                        <?php endif ?>
                                                        <select class="custom-select form-control" name="level">
                                                            <option selected disabled><?= lang('app.choose') ?></option>
                                                            <?php foreach ($class as $key => $data) : ?>
                                                                <option value="<?= $data['id'] ?>"><?= strtoupper($data['name']) ?></option>
                                                            <?php endforeach ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="jobTitle3"><?= lang('app.sex') ?> :</label>
                                                        <?php if ($validation->getError('sex')) : ?>
                                                            <span class="badge badge-danger"> <?= $errors = $validation->getError('sex') ?></span>
                                                        <?php endif ?>
                                                        <div class="row m-2">
                                                            <div class="col-6">
                                                                <input type="radio" name="sex" value="M" checked> <?= lang('app.male') ?>
                                                            </div>
                                                            <div class="col-6">
                                                                <input type="radio" name="sex" value="F"> <?= lang('app.female') ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="eventType2"><?= lang('app.city') ?> :</label>
                                                        <?php if ($validation->getError('city')) : ?>
                                                            <span class="badge badge-danger"> <?= $errors = $validation->getError('city') ?></span>
                                                        <?php endif ?>
                                                        <select class="custom-select form-control" name="city">
                                                            <option selected disabled><?= lang('app.choose') ?></option>
                                                            <?php foreach ($city as $key => $data) : ?>
                                                                <option value="<?= $data['id'] ?>"><?= strtoupper($data['name']) ?></option>
                                                            <?php endforeach ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </fieldset>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- Form wizard with icon tabs section end -->

            </div>
        </div>
    </div>
    <!-- END: Content-->

    <div class="sidenav-overlay"></div>
    <div class="drag-target"></div>



    <!-- BEGIN: Vendor JS-->
    <script src="<?= base_url('app-assets/vendors/js/vendors.min.js') ?>"></script>
    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Page Vendor JS-->
    <script src="<?= base_url('app-assets/vendors/js/ui/jquery.sticky.js') ?>"></script>
    <script src="<?= base_url('app-assets/vendors/js/extensions/jquery.steps.min.js') ?>"></script>
    <!-- <script src="<?= base_url('app-assets/vendors/js/pickers/dateTime/moment-with-locales.min.js') ?>"></script>
    <script src="<?= base_url('app-assets/vendors/js/pickers/daterange/daterangepicker.js') ?>"></script>
    <script src="<?= base_url('app-assets/vendors/js/forms/validation/jquery.validate.min.js') ?>"></script> -->
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="<?= base_url('app-assets/js/core/app-menu.js') ?>"></script>
    <script src="<?= base_url('app-assets/js/core/app.js') ?>"></script>
    <!-- END: Theme JS-->

    <script>
        // Wizard tabs with icons setup
        $(".icons-tab-steps").steps({
            headerTag: "h6",
            bodyTag: "fieldset",
            transitionEffect: "fade",
            titleTemplate: '<span class="step">#index#</span> #title#',
            labels: {
                finish: "<?= lang('app.send') ?>",
                next: "<?= lang('app.after') ?>",
                previous: "<?= lang('app.back') ?>",
            },
            onFinished: function(event, currentIndex) {
                $("#form").submit();
            }
        });
    </script>
</body>

</html>