<?= $this->extend('auth/main') ?>

<?= $this->section('content') ?>
<div class="content-body">
    <section class="row flexbox-container">
        <div class="col-12 d-flex align-items-center justify-content-center">
            <div class="col-lg-4 col-md-8 col-10 box-shadow-2 p-0 mb-2">
                <div class="card border-grey border-lighten-3 m-0">
                    <div class="card-header border-1">
                        <div class="card-title text-center">
                            <div class="p-1"><img src="<?= base_url('app-assets/images/logo/logo.png') ?>" alt="branding logo"></div>
                        </div>
                        <h6 class="card-subtitle line-on-side text-muted text-center font-small-3 pt-2"><span><?= lang('app.register') ?></span>
                        </h6>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <?php $validation = \Config\Services::validation() ?>
                            <?= form_open('register') ?>

                            <label><?= lang('app.username') ?></label>
                            <?php if ($validation->getError('username')) : ?>
                                <span class="badge badge-danger"> <?= $errors = $validation->getError('username') ?></span>
                            <?php endif ?>
                            <fieldset class="form-group position-relative has-icon-left mb-1">
                                <input type="text" class="form-control" name="username" placeholder="<?= lang('app.username') ?>">
                                <div class="form-control-position">
                                    <i class="la la-user"></i>
                                </div>
                            </fieldset>

                            <label><?= lang('app.email') ?></label>
                            <?php if ($validation->getError('email')) : ?>
                                <span class="badge badge-danger"> <?= $errors = $validation->getError('email') ?></span>
                            <?php endif ?>
                            <fieldset class="form-group position-relative has-icon-left mb-1">
                                <input type="email" class="form-control" name="email" placeholder="<?= lang('app.email') ?>">
                                <div class="form-control-position">
                                    <i class="la la-envelope"></i>
                                </div>
                            </fieldset>

                            <label><?= lang('app.phone') ?></label>
                            <?php if ($validation->getError('phone')) : ?>
                                <span class="badge badge-danger"> <?= $errors = $validation->getError('phone') ?></span>
                            <?php endif ?>
                            <fieldset class="form-group position-relative has-icon-<?= ($_SESSION['locale'] == 'ar' ? 'left' : 'right') ?> mb-1">
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
                            </fieldset>

                            <label><?= lang('app.dob') ?></label>
                            <?php if ($validation->getError('dob')) : ?>
                                <span class="badge badge-danger"> <?= $errors = $validation->getError('dob') ?></span>
                            <?php endif ?>
                            <fieldset class="form-group position-relative has-icon-left mb-1">
                                <input type="date" class="form-control" name="dob" placeholder="<?= lang('app.dob') ?>">
                                <div class="form-control-position">
                                    <i class="la la-calendar"></i>
                                </div>
                            </fieldset>

                            <!-- <label><?= lang('app.malaf') ?></label>
                            <?php if ($validation->getError('malaf')) : ?>
                                <span class="badge badge-danger"> <?= $errors = $validation->getError('malaf') ?></span>
                            <?php endif ?>
                            <fieldset class="form-group position-relative has-icon-left mb-1">
                                <input type="text" class="form-control" name="malaf" placeholder="R2020/0001">
                                <div class="form-control-position">
                                    <i class="la la-university"></i>
                                </div>
                            </fieldset> -->

                            <label><?= lang('app.sex') ?></label>
                            <?php if ($validation->getError('sex')) : ?>
                                <span class="badge badge-danger"> <?= $errors = $validation->getError('sex') ?></span>
                            <?php endif ?>
                            <fieldset class="form-group position-relative has-icon-left mb-1">
                                <div class="row">
                                    <div class="col-6">
                                        <input type="radio" name="sex" value="M" checked> <?= lang('app.male') ?>
                                    </div>
                                    <div class="col-6">
                                        <input type="radio" name="sex" value="F"> <?= lang('app.female') ?>
                                    </div>
                                </div>
                            </fieldset>
                            <label><?= lang('app.password') ?></label>
                            <?php if ($validation->getError('password')) : ?>
                                <span class="badge badge-danger"> <?= $errors = $validation->getError('password') ?></span>
                            <?php endif ?>
                            <fieldset class="form-group position-relative has-icon-left mb-1">
                                <input type="password" id="password" onkeyup="check();" class="form-control" name="password" placeholder="<?= lang('app.password') ?>">
                                <div class="form-control-position">
                                    <i class="la la-key"></i>
                                </div>
                            </fieldset>
                            <label><?= lang('app.repeatpassword') ?></label>
                            <fieldset class="form-group position-relative has-icon-left mb-1">
                                <input type="password" id="rptpass" onkeyup="check();" class="form-control" placeholder="<?= lang('app.repeatpassword') ?>">
                                <div class="form-control-position">
                                    <i class="la la-key"></i>
                                </div>
                            </fieldset>

                            <button type="submit" id="submit" class="btn btn-info btn-lg btn-block" disabled><?= lang('app.register') ?></button>
                            </form>
                        </div>
                    </div>
                    <div class="card-footer">
                        <p class="text-center"><?= lang('app.doyouhaveaccount') ?> <a href="<?= base_url('login') ?>" class="card-link"><?= lang('app.login') ?></a></p>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<script>
    var check = function() {
        if (document.getElementById('password').value ==
            document.getElementById('rptpass').value) {
            document.getElementById('submit').disabled = false;
        } else {
            document.getElementById('submit').disabled = true;
        }
    }
</script>
<?= $this->endSection() ?>