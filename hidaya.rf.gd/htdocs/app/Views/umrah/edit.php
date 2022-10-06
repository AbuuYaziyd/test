<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>


<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="content-body">
            <!-- users view start -->
            <div class="row">
                <section class="users-view col-md-9">
                    <?php $validation = \Config\Services::validation(); ?>
                    <?= form_open_multipart('umrah/upload/' . $umrah['tnfdhId']) ?>
                    <!-- users view card details start -->
                    <div class="card col-md-12">
                        <div class="card-header">
                            <h3><?= lang('app.signup') ?></h3>
                            <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                            <!-- <div class="heading-elements">
                                <button type="button" class="btn btn-icon btn-secondary">
                                    <i class="ft ft-check-circle white"></i> <?= lang('app.presshere') ?>
                                </button>
                            </div> -->
                        </div>
                        <div class="card-content">
                            <div class="card-body">
                                <h4 class="card-title"><?= lang('app.register') . ' ' . lang('app.to') . ' ' . lang('app.tanfidh') . '  ' . lang('app.umrah') ?><span class="text-muted font-medium-1"> @</span><span class="users-view-username text-muted font-medium-1 "><?= $_SESSION['malaf'] ?></span></h4>
                                <p><code style="font-family: Cairo;"><?= lang('app.imgErr') ?></code></p>
                                <div class="row">
                                    <div class="col-sm-6 mb-1">
                                        <fieldset class="form-group">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <label class="input-group-text"><?= lang('app.donefor') ?></label>
                                                </div>
                                                <input type="text" class="form-control" value="<?= (date('d/m/Y') <= $next ? $next : lang('app.near')) ?>" readonly>
                                            </div>
                                            <?php if ($validation->getError('select')) : ?>
                                                <span class="badge badge-danger"> <?= $errors = $validation->getError('select') ?></span>
                                            <?php endif ?>
                                        </fieldset>
                                    </div>
                                    <div class="col-sm-6 mb-1">
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" name="img" class="custom-file-input">
                                                <label class="custom-file-label"><?= lang('app.chooseFile') . ' ' . lang('app.tasrih') ?></label>
                                            </div>
                                        </div>
                                        <?php if ($validation->getError('img')) : ?>
                                            <span class="badge badge-danger"> <?= $errors = $validation->getError('img') ?></span>
                                        <?php endif ?>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-lg btn-block btn-secondary" <?= (date('d/m/Y') != date('d/m/Y') ? 'disabled' : '') ?>>
                                    <i class="ft ft-check-circle white"></i> <?= lang('app.edit') ?></button>
                            </div>
                        </div>
                    </div>
                    <!-- users view card details ends -->
                    </form>
                </section>
                <div class="col-md-3 col-sm-12">
                    <div class="card">
                        <div class="card-content">
                            <div class="card-body">
                                <h4 class="card-title"><?= lang('app.img') . ' ' . lang('app.tasrih') ?> </h4>
                            </div>
                            <img class="img-fluid" src="<?= base_url('app-assets/images/' . ($umrah['tasrih'] == 0000 ? 'demo/tasrih.jpg' : 'tasrih/' . $umrah['tasrih'])) ?>" alt="Card image cap">
                        </div>
                    </div>
                </div>
            </div>
            <!-- users view ends -->
        </div>
    </div>
</div>

<?= $this->endSection() ?>