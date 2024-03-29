<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="content-body">
            <?php if ($umrah != null) : ?>
            <?php if ($umrah['tnfdhStatus'] == 'sent') : ?>
            <div class="card">
                <div class="card-header">
                    <h3>
                        <?= lang('app.name') ?> <?= lang('app.ism') ?>: <b><?= $umrah['tnfdhName'] ?></b>
                        <span class="btn btn-success box-shadow-2 round pull-left"><?= lang('app.sabab') ?>: <?= $umrah['tnfdhSabab'] ?></span>
                    </h3>
                </div>
            </div>
            <?php  endif ?>
            <?php  endif ?>
            <div class="card">
                <div class="card-header">
                    <h3>
                        <b>
                            <?= $title ?>
                            <?php if ($umrah) : ?>
                                <?php if ($umrah['tasrih'] == null) : ?>
                                    <span class="badge badge-danger badge-pill mr-2"><?= lang('app.tasrih') ?></span>
                                <?php elseif ($umrah['tnfdhStatus'] == null) : ?>
                                    <span class="badge badge-warning badge-pill mr-2"><?= lang('app.mushrif') ?></span>
                                <?php elseif ($umrah['tnfdhStatus'] == 0) : ?>
                                    <span class="badge badge-secondary badge-pill mr-2"><?= lang('app.admin') ?></span>
                                <?php elseif ($umrah['tnfdhName'] != null && $umrah['makkahLat'] == null) : ?>
                                    <span type="button" class="btn btn-success round mr-2"><?= lang('app.active') ?></span>
                                <?php elseif ($umrah['makkahLat'] != null) : ?>
                                    <span type="button" class="btn btn-amber round mr-2"><?= lang('app.ok') ?></span>
                                <?php endif ?>
                            <?php endif ?>
                        </b>
                        <?php if (session('role') != 'user' && $umrah != null) : ?>
                        <a class="btn btn-outline-success box-shadow-2 round pull-left" href="<?= base_url('mushrif/tasrih') ?>">
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
                                        <div class="heading-elements p-1">
                                            <?= form_open('umrah/create') ?>
                                                <input type="hidden" name="id" value="<?= session('id') ?>">
                                                <select name="tanfidh" class="custom-select mb-1">
                                                    <option disabled selected><?= lang('app.choose') ?> <?= lang('app.date') ?></option>
                                                    <?php foreach ($next as $dt) : ?>
                                                        <?php if ($dt['value'] > date('Y-m-d')) : ?>
                                                        <option value="<?= $dt['value'] ?>"><?= date('d/m/Y', strtotime($dt['value'])) ?></option>
                                                        <?php endif ?>
                                                    <?php endforeach ?>
                                                </select>
                                                <button type="submit" class="btn btn-icon btn-info round my-2 btn-block btn-lg"><?= lang('app.register') ?></button>
                                            </form>
                                        </div>
                                    <?php elseif ($umrah['makkahLat'] == null) : ?>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="heading-elements">
                                                    <a href="<?= base_url('umrah/show/'. $umrah['tnfdhId']) ?>" class="btn btn-icon btn-success round mb-2 btn-block btn-lg <?= (($umrah['tnfdhStatus'] != 0)?'disabled':'') ?>"><?= lang('app.tasrih') ?></a>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="heading-elements">
                                                    <form action="<?= base_url('umrah/loc/'. $umrah['tnfdhId']) ?>" method="post">
                                                        <input type="hidden" name="locType" value="miqat">
                                                        <button type="submit" class="btn btn-icon btn-warning round mb-2 btn-block btn-lg" <?= (($umrah['tasrih'] == null || $umrah['tnfdhStatus'] == 0 || $umrah['miqatLat'] != null|| $umrah['tnfdhName'] == null)?'disabled':'') ?>>
                                                            <?= lang('app.miqat') ?>
                                                        </button>
                                                    </form>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="heading-elements">
                                                    <form action="<?= base_url('umrah/loc/'. $umrah['tnfdhId']) ?>" method="post">
                                                        <input type="hidden" name="locType" value="makkah">
                                                        <button type="submit" class="btn btn-icon btn-secondary round mb-2 btn-block btn-lg"  <?= ($umrah['miqatLat'] == null ? 'disabled' : '') ?>>
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