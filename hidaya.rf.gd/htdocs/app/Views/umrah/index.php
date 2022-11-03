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
                        <b><?= lang('app.umrah') ?></b>
                        <?php if ($_SESSION['role'] != 'user') : ?>
                        <a class="btn btn-outline-success box-shadow-2 round pull-right" href="#">
                            <?= lang('app.tasrih') ?></a>
                        <?php endif ?>
                    </h3>
                </div>
                <div class="card-content">
                    <div id="new-orders" class="media-list position-relative">
                        <div class="row m-2">
                        <div class="col-md-4">
                            <?php if ($next >= date('Y-m-d')) : ?>
                                <?php if (!$umrah) : ?>
                                    <div class="heading-elements">
                                        <form action="<?= base_url('umrah/create') ?>" method="get">
                                            <button type="submit" class="btn btn-icon btn-info round mb-2 btn-block btn-lg">
                                            <?= lang('app.register') ?>
                                            </button>
                                        </form>
                                    </div>
                            <?php elseif ($umrah) : ?>
                                <div class="heading-elements">
                                    <form action="<?= base_url('umrah/edited/'. session('id')) ?>" method="get">
                                        <button type="submit" class="btn btn-icon btn-success round mb-2 btn-block btn-lg" <?= ($umrah['tasrih'] != null ? 'disabled' : '') ?>>
                                        <?= lang('app.tasrih') ?>
                                        </button>
                                    </form>
                                </div>
                                <?php // else : ?>
                                <?php endif ?>
                            <?php  else :?>
                                <div class="heading-elements">
                                    <button type="button" class="btn btn-icon btn-secondary mb-2 btn-block round btn-lg" disabled>
                                        <?= lang('app.near') ?>
                                    </button>
                                </div>
                            <?php endif ?>
                        </div>
                        <div class="col-md-4">
                                <div class="heading-elements">
                                    <form action="<?= base_url('umrah/edited/'. session('id')) ?>" method="get">
                                        <button type="submit" class="btn btn-icon btn-warning round mb-2 btn-block btn-lg" <?= ($green == null ? 'disabled' : '') ?>>
                                        <?= lang('app.edit') ?>
                                        </button>
                                    </form>
                                </div>
                            <!-- <div class="heading-elements">
                                <form action="<?= base_url('umrah/edited/'. session('id')) ?>" method="get">
                                    <button type="submit" class="btn btn-icon btn-success round mb-2 btn-block btn-lg" <?= ($green == null ? 'disabled' : '') ?>>
                                    <?= lang('app.tasrih') ?>
                                    </button>
                                </form>
                            </div> -->
                        </div>
                        <div class="col-md-4">
                            <div class="heading-elements">
                                <form action="<?= base_url('umrah/edited/'. session('id')) ?>" method="get">
                                    <button type="submit" class="btn btn-icon btn-secondary round mb-2 btn-block btn-lg" <?= ($green == null ? 'disabled' : '') ?>>
                                        <i class="ft ft-check-circle white"></i>
                                        <?= lang('app.done') ?>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="card">
                        <div class="card-header">
                            <h3><?= lang('app.register') . ' ' . lang('app.to') . ' ' . lang('app.tanfidh') . ' ' . lang('app.next') ?></h3>
                            <div class="card-body">
                                
                                    <div class="heading-elements">
                                        <?= form_open('umrah/new') ?>
                                        <input type="hidden" name="userId" value="<?= session('id') ?>">
                                        <button type="submit" class="btn btn-icon btn-primary">
                                            <i class="ft ft-check-circle round white"></i> <?= lang('app.register') ?>
                                        </button>
                                        </form>
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php //if ($green != null) { ?>
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3><?= lang('app.done') . ' ' . lang('app.tanfidh') . ' ' . lang('app.umrah') ?></h3>
                                <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                                <div class="heading-elements">
                                    <form action="<?php // base_url('umrah/done/' . $green['tnfdhId']) ?>" method="post">
                                        <button type="submit" class="btn btn-icon btn-secondary">
                                            <i class="ft ft-check-circle white"></i>
                                            <?= lang('app.done') ?>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php //} ?>
            </div>
            <div class="row mt-1">
                <div class="col">
                    <a href="<?= base_url('umrah/link') ?>" type="button" class="btn btn-icon btn-block btn-lg btn-primary">
                        <i class="ft ft-map-pin white"></i>
                    <?= lang('app.umrahComplt') ?>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>

<?= $this->section('scripts') ?>
<script>
    <?php if ( session('role') != 'admin') :  ?>
        <?php if ($next < date('Y-m-d')) : ?>
    $(document).ready(function () {
        url = "<?= base_url('user') ?>";
        Swal.fire({
            title: '<?= lang('app.sorry') ?>',
            text: "الحين ليست وقة للتسجيل للبدل بارك الله فيك!",
            type: 'info',
            showConfirmButton: true,
            allowOutsideClick: false,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'تمام',
            confirmButtonClass: 'btn btn-info',
            buttonsStyling: false,
        }).then(function(result) {
            if (result.value) {
                window.location.href = url;
            } 
        })
    });
    <?php endif ?>
    <?php endif ?>
</script>
<?= $this->endSection() ?>