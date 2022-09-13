<?= $this->extend('auth/main') ?>

<?= $this->section('content') ?>
<div class="content-body">
    <section class="row flexbox-container">
        <div class="col-12 d-flex align-items-center justify-content-center">
            <div class="col-lg-4 col-md-8 col-10 box-shadow-2 p-0 mb-2">
                <div class="card border-grey border-lighten-3 m-0">
                    <div class="card-header border-0">
                        <div class="card-title text-center">
                            <div class="p-1"><img src="<?= base_url('app-assets/images/logo/logo.png') ?>" alt="branding logo"></div>
                        </div>
                        <h6 class="card-subtitle line-on-side text-muted text-center font-small-3 pt-2"><span><?= lang('app.recoverpassword') ?></span>
                        </h6>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <?php $validation = \Config\Services::validation(); ?>
                            <?= form_open('recover') ?>
                            <label class="text-bold-600"><?= lang('app.identity') ?></label>
                            <?php if ($validation->getError('identity')) : ?>
                                <span class="badge badge-danger"> <?= $errors = $validation->getError('identity') ?></span>
                            <?php endif ?>
                            <fieldset class="form-group position-relative has-icon-left mb-1">
                                <input type="text" class="form-control" name="identity" placeholder="<?= lang('app.identity') ?>">
                                <div class="form-control-position">
                                    <i class="la la-user"></i>
                                </div>
                            </fieldset>
                            <label class="text-bold-600"><?= lang('app.email') ?></label>
                            <?php if ($validation->getError('email')) : ?>
                                <span class="badge badge-danger"> <?= $errors = $validation->getError('email') ?></span>
                            <?php endif ?>
                            <fieldset class="form-group position-relative has-icon-left mb-1">
                                <input type="email" class="form-control" name="email" placeholder="<?= lang('app.email') ?>">
                                <div class="form-control-position">
                                    <i class="la la-envelope"></i>
                                </div>
                            </fieldset>

                            <label class="text-bold-600"><?= lang('app.phone') ?></label>
                            <?php if ($validation->getError('phone')) : ?>
                                <span class="badge badge-danger"> <?= $errors = $validation->getError('phone') ?></span>
                            <?php endif ?>
                            <fieldset class="form-group position-relative has-icon-right mb-1">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">255</span>
                                    </div>
                                    <input type="text" class="form-control" name="phone" placeholder="684123456">
                                </div>
                                <div class="form-control-position">
                                    <i class="la la-mobile"></i>
                                </div>
                            </fieldset>

                            <!-- <label class="mt-1"><b><?= lang('app.phone') ?></b></label>
                            <?php if ($validation->getError('phone')) : ?>
                                <span class="badge badge-danger"> <?= $errors = $validation->getError('phone') ?></span>
                            <?php endif ?>
                            <fieldset class="form-group position-relative has-icon-left mb-1">
                                <div class="input-group">
                                    <?php if ($_SESSION['locale'] != 'ar') : ?>
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon2">255</span>
                                        </div>
                                    <?php endif ?>
                                    <input type="text" class="form-control" name="phone" placeholder="683123456" aria-describedby="basic-addon2">
                                    <div class="form-control-position">
                                        <i class="la la-mobile"></i>
                                    </div>
                                    <?php if ($_SESSION['locale'] == 'ar') : ?>
                                        <div class="input-group-append">
                                            <span class="input-group-text" id="basic-addon2">255</span>
                                        </div>
                                    <?php endif ?>
                                </div>
                            </fieldset> -->
                            <button type="submit" class="btn btn-info btn-lg btn-block"><i class="ft-unlock"></i> <?= lang('app.newpassword') ?></button>
                            </form>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="text-center"><a href="<?= base_url('login') ?>"><?= lang('app.login') ?></a></div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</div>
<?= $this->endSection() ?>