<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="content-body">
            <?php if ($_SESSION['role'] != 'user') : ?>
                <div class="row mb-2">
                    <a href="#" type="button" class="btn btn-icon btn-block btn-lg btn-info">
                        <i class="ft ft-layers white"></i>
                        <?= lang('app.tasrih') ?>
                    </a>
                </div>
            <?php endif ?>
            <div class="row">
                <div class="col">
                    <div class="card">
                        <div class="card-header">
                            <h3><?= lang('app.register') . ' ' . lang('app.to') . ' ' . lang('app.tanfidh') . ' ' . lang('app.next') ?></h3>
                            <?php if ($next >= date('d/m/Y')) { ?>
                                <?php if ($umrah <= 0) { ?>
                                    <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                                    <div class="heading-elements">
                                        <?= form_open('umrah/new') ?>
                                        <input type="hidden" name="userId" value="<?= session('id') ?>">
                                        <button type="submit" class="btn btn-icon btn-primary">
                                            <i class="ft ft-check-circle white"></i> <?= lang('app.register') ?>
                                        </button>
                                        </form>
                                    </div>
                                <?php } else { ?>
                                    <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                                    <div class="heading-elements">
                                        <form action="<?= base_url('umrah/edited/'. session('id')) ?>" method="get">
                                            <button type="submit" class="btn btn-icon btn-warning" <?= ($green == null ? '' : 'disabled') ?>>
                                                <i class="ft ft-edit white"></i> <?= lang('app.edit') ?>
                                            </button>
                                        </form>
                                    </div>
                                <?php } ?>
                            <?php } else { ?>
                                <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                                <div class="heading-elements">
                                    <button type="button" class="btn btn-icon btn-secondary" disabled>
                                        <i class="ft ft-check-circle white"></i>
                                        <?= lang('app.near') ?>
                                    </button>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
                <?php if ($green != null) { ?>
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header">
                                <h3><?= lang('app.done') . ' ' . lang('app.tanfidh') . ' ' . lang('app.umrah') ?></h3>
                                <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                                <div class="heading-elements">
                                    <form action="<?= base_url('umrah/done/' . $green['tnfdhId']) ?>" method="post">
                                        <button type="submit" class="btn btn-icon btn-secondary">
                                            <i class="ft ft-check-circle white"></i>
                                            <?= lang('app.done') ?>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
            <div class="row mt-1">
                <a href="<?= base_url('umrah/link') ?>" type="button" class="btn btn-icon btn-block btn-lg btn-primary">
                    <i class="ft ft-map-pin white"></i>
                    <?= lang('app.umrahComplt') ?>
                </a>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>