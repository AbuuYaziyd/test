<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="content-wrapper">
        <div class="content-body">
            <?= $this->include('mushrif/info') ?>
            <div class="row">
                <div class="col-md-3">
                    <a href="https://abuuyaziyd.github.io/test/mushrif/index.html" target="_blank">
                        <div class="card pull-up">
                            <div class="card-content">
                                <div class="card-body">
                                    <div class="media d-flex">
                                        <div class="media-body text-left">
                                            <h3 class="info"><?= lang('app.howTo') ?></h3>
                                            <h6><?= lang('app.howTos') ?></h6>
                                        </div>
                                        <div>
                                            <i class="la la-lightbulb-o info font-large-3 float-right"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>