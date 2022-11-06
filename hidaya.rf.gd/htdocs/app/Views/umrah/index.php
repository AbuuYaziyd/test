<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="content-body">
            <div class="card">
                <div class="card-header">
                    <h3>
                        <b><?= $title ?></b>
                        <?php if (session('role') != 'user') : ?>
                        <a class="btn btn-outline-success box-shadow-2 round pull-right" href="<?= base_url('mushrif/tasrih/'. $umrah['tnfdhDate']) ?>">
                            <?= lang('app.tasrih') ?></a>
                        <?php endif ?>
                    </h3>
                </div>
                <div class="card-content">
                    <div id="new-orders" class="media-list position-relative">
                        <div class="row m-2">
                            <div class="col-12">
                                <?php if ($next >= date('Y-m-d')) : ?>
                                    <?php if (!$umrah) : ?>
                                        <div class="heading-elements">
                                            <?= form_open('umrah/create') ?>
                                                <input type="hidden" name="id" value="<?= session('id') ?>">
                                                <input type="hidden" name="tanfidh" value="<?= $next ?>">
                                                <button type="submit" class="btn btn-icon btn-info round mb-2 btn-block btn-lg"><?= lang('app.register') ?></button>
                                            </form>
                                        </div>
                                    <?php elseif ($umrah['makkah'] == null) : ?>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="heading-elements">
                                                    <a href="<?= base_url('umrah/show/'. $umrah['tnfdhId']) ?>" class="btn btn-icon btn-success round mb-2 btn-block btn-lg"><?= lang('app.tasrih') ?></a>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="heading-elements">
                                                    <form action="<?= base_url('umrah/loc/'. $umrah['tnfdhId']) ?>" method="post">
                                                        <input type="hidden" name="locType" value="miqat">
                                                        <button type="submit" class="btn btn-icon btn-warning round mb-2 btn-block btn-lg" <?= (($umrah['tasrih'] == null || $umrah['tnfdhStatus'] == 0)?'disabled':'') ?>>
                                                            <?= lang('app.miqat') ?>
                                                        </button>
                                                    </form>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="heading-elements">
                                                    <form action="<?= base_url('umrah/loc/'. $umrah['tnfdhId']) ?>" method="post">
                                                        <input type="hidden" name="locType" value="makkah">
                                                        <button type="submit" class="btn btn-icon btn-secondary round mb-2 btn-block btn-lg"  <?= ($umrah['miqat'] == null ? 'disabled' : '') ?>>
                                                            <i class="ft ft-check-circle white"></i> 
                                                            <?= lang('app.makkah') ?>
                                                        </button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    <?php else : ?>
                                        <div class="heading-elements">
                                            <button class="btn btn-icon btn-info round mb-2 btn-block btn-lg" disabled><?= lang('app.done') ?> <?= lang('app.tanfidh') ?> <?= lang('app.umrah') ?></button>
                                        </div>
                                    <?php endif ?>
                                <?php  else :?>
                                    <div class="heading-elements">
                                        <button type="button" class="btn btn-icon btn-secondary mb-2 btn-block round btn-lg" disabled>
                                            <?= lang('app.near') ?>
                                        </button>
                                    </div>
                                <?php endif ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>

<?= $this->section('scripts') ?>
<script>
    <?php if ( session('role') != 'admin') :  ?>
        $(document).ready(function () {
            Swal.fire({
                title: '<strong><u>معلومات التنفيذ</u></strong>',
                icon: 'info',
                html:
                    'ّّ<i class="la la-arrow-circle-left"></i>تسجيل للتنفيذ<br> ' +
                    'ّّ<i class="la la-arrow-circle-left"></i>رفع التصريح<br> ' +
                    'ّّ<i class="la la-arrow-circle-left"></i>عمليات المشرف والمدير<br> ' +
                    'ّّ<i class="la la-arrow-circle-left"></i>ارسال الموقع عند وصال الميقات/الحل<br> ' +
                    'ّّ<i class="la la-arrow-circle-left"></i>ارسال الموقع عند اتمام العمرة<br> ',
                focusConfirm: true,
                showCloseButton: false,
                confirmButtonText: '<?= lang('app.ok') ?>',
                confirmButtonAriaLabel: 'Thumbs up, great!',
            })
        });
    <?php endif ?>
</script>
<?= $this->endSection() ?>