<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="content-wrapper">
        <div class="content-header row"></div>
        <div class="content-body">
            <section id="dashboard-ecommerce">
                <div class="row">
                    <div class="media-body pt-25 mb-3">
                        <h4 class="media-heading">
                            <span class="users-view-name"><?= lang('app.data') ?> </span>
                            <span class="text-muted font-medium-1"> @</span>
                            <span class="users-view-username text-muted font-medium-1 "><?= session('malaf') ?></span>
                        </h4>
                    </div>
                </div>
                    <div class="row">
                        <div class="col-md-3 col-sm-12">
                            <div class="card">
                                <div class="card-content">
                                    <div class="card-body">
                                        <h4 class="card-title"><?= lang('app.imgIqama') ?>
                                        <a class="btn btn-outline-secondary box-shadow-2 round pull-right" href="<?= base_url('image/edit/' . session('id')).'/iqama' ?>"><?= lang('app.edit') ?></a>
                                    </h4>
                                    </div>
                                    <img class="img-fluid" src="<?= base_url('app-assets/images/' . ($img['imgIqama'] == null ? 'demo/iqama.jpg' : 'malaf/'.(session('malaf')=='----'?'new':session('malaf')).'/') . $img['imgIqama']) ?>" alt="img">
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
                                        <a class="btn btn-outline-secondary box-shadow-2 round pull-right" href="<?= base_url('image/edit/' . session('id')).'/passport' ?>"><?= lang('app.edit') ?></a>
                                    </h4>
                                    </div>
                                    <img class="img-fluid" src="<?= base_url('app-assets/images/' . ($img['imgPass'] == null ? 'demo/passp.jpg' : 'malaf/'.(session('malaf')=='----'?'new':session('malaf')).'/') . $img['imgPass']) ?>" alt="img">
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
                                        <a class="btn btn-outline-secondary box-shadow-2 round pull-right" href="<?= base_url('image/edit/' . session('id')).'/bitaqa' ?>"><?= lang('app.edit') ?></a>
                                    </h4>
                                    </div>
                                    <img class="img-fluid" src="<?= base_url('app-assets/images/' . ($img['imgStu'] == null ? 'demo/stu.jpg' : 'malaf/'.(session('malaf')=='----'?'new':session('malaf')).'/') . $img['imgStu']) ?>" alt="img">
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
                                        <a class="btn btn-outline-secondary box-shadow-2 round pull-right" href="<?= base_url('image/edit/' . session('id')).'/iban' ?>"><?= lang('app.edit') ?></a>
                                    </h4>
                                    </div>
                                    <img class="img-fluid" src="<?= base_url('app-assets/images/' . ($img['imgIban'] == null ? 'demo/iban.png' : 'malaf/'.(session('malaf')=='----'?'new':session('malaf')).'/') . $img['imgIban']) ?>" alt="img">
                                </div>
                                <div style="text-align: center;" class="my-1">
                                    <span><b><?= $user['iban'] ?></b></span>
                                </div>
                            </div>
                        </div>
                    </div>
            </section>
        </div>
    </div>
</div>

<?= $this->endSection() ?>