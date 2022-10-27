<?= $this->extend('layouts/main') ?>

<?= $this->section('styles') ?>

<link rel="stylesheet" type="text/css" href="<?= base_url('app-assets/vendors/css/ui/prism.min.css') ?>">
<link rel="stylesheet" type="text/css" href="<?= base_url('app-assets/vendors/css/file-uploaders/dropzone.min.css') ?>">

<?= $this->endSection() ?>

<?= $this->section('content') ?>

<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="content-body">
            <!-- Dashboard Ecommerce Starts -->
            <section id="dashboard-ecommerce">
                <div class="row">
                    <div class="media-body pt-25 mb-3">
                        <h4 class="media-heading"><span class="users-view-name"><?= lang('app.data') ?> </span><span class="text-muted font-medium-1"> @</span><span class="users-view-username text-muted font-medium-1 "><?= $_SESSION['malaf'] ?></span></h4>
                    </div>
                    <!-- <div class="col-12 col-sm-5 px-0 d-flex justify-content-end align-items-center px-1 mb-2">
                        <a href="<?= base_url('image/edit/' . $_SESSION['id']) ?>" class="btn btn-lg btn-secondary"><?= lang('app.edit') ?></a>
                    </div> -->
                    <!-- Greetings Content Starts -->
                    <div class="row">
                        <div class="col-md-3 col-sm-12">
                            <div class="card">
                                <div class="card-content">
                                    <div class="card-body">
                                        <h4 class="card-title"><?= lang('app.imgIqama') ?>
                                        <a class="btn btn-outline-secondary box-shadow-2 round pull-right" href="<?= base_url('image/edit/' . $_SESSION['id']).'/iqama' ?>"><?= lang('app.edit') ?></a>
                                    </h4>
                                    </div>
                                    <img class="img-fluid" src="<?= base_url('app-assets/images/' . ($img['imgIqama'] == null ? 'demo/iqama.jpg' : 'malaf/'.$_SESSION['malaf'].'/') . $img['imgIqama']) ?>" alt="img">
                                </div>
                                <div style="text-align: center;" class="my-1">
                                    <span><b><?= $user['iqama'] ?></b></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-12">
                            <div class="card">
                                <div class="card-content">
                                    <div class="card-body">
                                        <h4 class="card-title"><?= lang('app.imgPass') ?>
                                        <a class="btn btn-outline-secondary box-shadow-2 round pull-right" href="<?= base_url('image/edit/' . $_SESSION['id']).'/passport' ?>"><?= lang('app.edit') ?></a>
                                    </h4>
                                    </div>
                                    <img class="img-fluid" src="<?= base_url('app-assets/images/' . ($img['imgPass'] == null ? 'demo/passp.jpg' : 'malaf/'.$_SESSION['malaf'].'/') . $img['imgPass']) ?>" alt="img">
                                </div>
                                <div style="text-align: center;" class="my-1">
                                    <span><b><?= $user['passport'] ?></b></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-12">
                            <div class="card">
                                <div class="card-content">
                                    <div class="card-body">
                                        <h4 class="card-title"><?= lang('app.imgStu') ?>
                                        <a class="btn btn-outline-secondary box-shadow-2 round pull-right" href="<?= base_url('image/edit/' . $_SESSION['id']).'/bitaqa' ?>"><?= lang('app.edit') ?></a>
                                    </h4>
                                    </div>
                                    <img class="img-fluid" src="<?= base_url('app-assets/images/' . ($img['imgStu'] == null ? 'demo/stu.jpg' : 'malaf/'.$_SESSION['malaf'].'/') . $img['imgStu']) ?>" alt="img">
                                </div>
                                <div style="text-align: center;" class="my-1">
                                    <span><b><?= $user['bitaqa'] ?></b></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-12">
                            <div class="card">
                                <div class="card-content">
                                    <div class="card-body">
                                        <h4 class="card-title"><?= lang('app.imgIban') ?>
                                        <a class="btn btn-outline-secondary box-shadow-2 round pull-right" href="<?= base_url('image/edit/' . $_SESSION['id']).'/iban' ?>"><?= lang('app.edit') ?></a>
                                    </h4>
                                    </div>
                                    <img class="img-fluid" src="<?= base_url('app-assets/images/' . ($img['imgIban'] == null ? 'demo/iban.png' : 'malaf/'.$_SESSION['malaf'].'/') . $img['imgIban']) ?>" alt="img">
                                </div>
                                <div style="text-align: center;" class="my-1">
                                    <span><b><?= $user['iban'] ?></b></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Multi Radial Chart Starts -->
                </div>
            </section>
            <!-- Dashboard Ecommerce ends -->
        </div>
    </div>
</div>

<?= $this->endSection() ?>

<?= $this->section('scripts') ?>

<link rel="stylesheet" type="text/css" href="<?= base_url('app-assets/vendors/js/ui/prism.min.js') ?>">
<link rel="stylesheet" type="text/css" href="<?= base_url('app-assets/vendors/js/extensions/dropzone.min.js') ?>">
<script src="<?= base_url('app-assets/js/scripts/extensions/dropzone.js') ?>"></script>

<?= $this->endSection() ?>