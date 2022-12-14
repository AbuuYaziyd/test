<?= $this->extend('auth/main') ?>

<?= $this->section('content') ?>
<div class="content-body">
    <section class="row flexbox-container">
        <div class="col-12 d-flex align-items-center justify-content-center">
            <div class="col-lg-4 col-md-8 col-10 box-shadow-2 p-0">
                <div class="card border-grey border-lighten-3 m-0">
                    <div class="card-header border-0">
                        <div class="card-title text-center">
                            <div class="p-1"><img src="<?= base_url('app-assets/images/logo/logo.png') ?>" alt="branding logo" width="120" height="120"></div>
                        </div>
                        <h6 class="card-subtitle line-on-side text-muted text-center font-small-3 pt-2"><span><?= lang('app.login') ?></span>
                        </h6>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <?= form_open('login') ?>
                            <label class="text-bold-600"><?= lang('app.identity') ?></label>
                            <?php if ((session()->getFlashdata('identity'))) : ?>
                                <span class="badge badge-danger"><?= (session()->getFlashdata('identity')) ?></span>
                            <?php endif ?>
                            <fieldset class="form-group position-relative has-icon-left mb-1">
                                <input type="text" class="form-control" name="identity" placeholder="<?= lang('app.identity') ?>">
                                <div class="form-control-position">
                                    <i class="la la-user"></i>
                                </div>
                            </fieldset>
                            <label class="text-bold-600"><?= lang('app.password') ?></label>
                            <?php if ((session()->getFlashdata('password'))) : ?>
                                <span class="badge badge-danger"><?= (session()->getFlashdata('password')) ?></span>
                            <?php endif ?>
                            <fieldset class="form-group position-relative has-icon-left">
                                <input type="password" class="form-control" name="password" placeholder="<?= lang('app.password') ?>">
                                <div class="form-control-position">
                                    <i class="la la-key"></i>
                                </div>
                            </fieldset>
                            <button type="submit" class="btn btn-info btn-lg btn-block"><i class="ft-unlock"></i> <?= lang('app.login') ?></button>
                            </form>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="text-center">
                            <div class="text-center"><a href="<?= base_url('recover') ?>"><?= lang('app.recoverpassword') ?></a></div>
                            <!-- <p class="float-xl-left text-center m-0"><a href="<?= base_url('recover') ?>" class="card-link"><?= lang('app.recoverpassword') ?></a></p> -->
                            <!-- <p class="float-xl-right text-center m-0"><?= lang('app.newUser') ?> <a href="<?= base_url('register') ?>" class="card-link"><?= lang('app.signup') ?></a></p> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</div>
<?= $this->endSection() ?>