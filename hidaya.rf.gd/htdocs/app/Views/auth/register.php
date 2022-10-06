<?= $this->extend('layouts/auth') ?>

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
                        <h6 class="card-subtitle line-on-side text-muted text-center font-small-3 pt-2"><span><?= lang('app.login') ?></span>
                        </h6>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <?php $validation = \Config\Services::validation(); ?>
                            <?= form_open('register') ?>
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
                            <label class="text-bold-600"><?= lang('app.iqama') ?></label>
                            <?php if ($validation->getError('iqama')) : ?>
                                <span class="badge badge-danger"> <?= $errors = $validation->getError('iqama') ?></span>
                            <?php endif ?>
                            <fieldset class="form-group position-relative has-icon-left mb-1">
                                <input type="text" class="form-control" name="iqama" placeholder="<?= lang('app.iqama') ?>">
                                <div class="form-control-position">
                                    <i class="la la-credit-card"></i>
                                </div>
                            </fieldset>
                            <label class="text-bold-600"><?= lang('app.namereg') . ' - ' . lang('app.arabic') ?></label>
                            <?php if ($validation->getError('name')) : ?>
                                <span class="badge badge-danger"> <?= $errors = $validation->getError('name') ?></span>
                            <?php endif ?>
                            <fieldset class="form-group position-relative has-icon-left mb-1">
                                <input type="text" class="form-control" name="name" placeholder="<?= lang('app.name') . ' - ' . lang('app.arabic') ?>">
                                <div class="form-control-position">
                                    <i class="la la-user"></i>
                                </div>
                            </fieldset>
                            <label class="text-bold-600"><?= lang('app.phone') ?></label>
                            <?php if ($validation->getError('phone')) : ?>
                                <span class="badge badge-danger"> <?= $errors = $validation->getError('phone') ?></span>
                            <?php endif ?>
                            <fieldset class="form-group position-relative has-icon-left mb-1">
                                <input type="text" class="form-control" name="phone" placeholder="<?= lang('app.phone') ?>">
                                <div class="form-control-position">
                                    <i class="la la-mobile"></i>
                                </div>
                            </fieldset>
                            <label class="text-bold-600"><?= lang('app.nationality') ?></label>
                            <?php if ($validation->getError('nationality')) : ?>
                                <span class="badge badge-danger"> <?= $errors = $validation->getError('nationality') ?></span>
                            <?php endif ?>
                            <fieldset class="form-group position-relative has-icon-left mb-1">
                                <select class="form-control" name="nationality">
                                    <option selected disabled><?= lang('app.choose') . ' ' . lang('app.nationality') ?></option>
                                    <?php foreach ($nat as $key => $data) : ?>
                                        <option value="<?= $data['country_arName'] ?>"><?= $data['country_arName'] ?></option>
                                    <?php endforeach ?>
                                </select>
                                <div class="form-control-position">
                                    <i class="la la-flag"></i>
                                </div>
                            </fieldset>
                            <label class="text-bold-600"><?= lang('app.jamia') ?></label>
                            <?php if ($validation->getError('jamia')) : ?>
                                <span class="badge badge-danger"> <?= $errors = $validation->getError('jamia') ?></span>
                            <?php endif ?>
                            <fieldset class="form-group position-relative has-icon-left mb-1">
                                <input type="text" class="form-control" name="jamia" placeholder="<?= lang('app.jamia') ?>">
                                <div class="form-control-position">
                                    <i class="la la-university"></i>
                                </div>
                            </fieldset>
                            <label class="text-bold-600"><?= lang('app.bank') ?></label>
                            <?php if ($validation->getError('bank')) : ?>
                                <span class="badge badge-danger"> <?= $errors = $validation->getError('bank') ?></span>
                            <?php endif ?>
                            <fieldset class="form-group position-relative has-icon-left mb-1">
                                <input type="text" class="form-control" name="bank" placeholder="<?= lang('app.bank') ?>">
                                <div class="form-control-position">
                                    <i class="la la-money"></i>
                                </div>
                            </fieldset>
                            <label class="text-bold-600"><?= lang('app.iban') ?></label>
                            <?php if ($validation->getError('iban')) : ?>
                                <span class="badge badge-danger"> <?= $errors = $validation->getError('iban') ?></span>
                            <?php endif ?>
                            <fieldset class="form-group position-relative has-icon-left mb-1">
                                <input type="text" class="form-control" name="iban" placeholder="<?= lang('app.iban') ?>">
                                <div class="form-control-position">
                                    <i class="la la-cc-mastercard"></i>
                                </div>
                            </fieldset>
                            <label class="text-bold-600"><?= lang('app.level') ?></label>
                            <?php if ($validation->getError('level')) : ?>
                                <span class="badge badge-danger"> <?= $errors = $validation->getError('level') ?></span>
                            <?php endif ?>
                            <fieldset class="form-group position-relative has-icon-left mb-1">
                                <select class="form-control" name="level">
                                    <option selected disabled><?= lang('app.choose') . ' ' . lang('app.lvl') ?></option>
                                    <option value="<?= lang('app.lvl1') ?>"><?= lang('app.lvl1') ?></option>
                                    <option value="<?= lang('app.lvl2') ?>"><?= lang('app.lvl2') ?></option>
                                    <option value="<?= lang('app.lvl3') ?>"><?= lang('app.lvl3') ?></option>
                                    <option value="<?= lang('app.lvl4') ?>"><?= lang('app.lvl4') ?></option>
                                </select>
                                <div class="form-control-position">
                                    <i class="la la-area-chart"></i>
                                </div>
                            </fieldset>
                            <fieldset class="form-group position-relative mb-2">
                                <input type="checkbox" name="check" class="chk-remember">
                                <label><?= lang('app.accept') . lang('app.terms & services') ?></label>
                                <?php if ($validation->getError('check')) : ?>
                                    <span class="badge badge-danger"> <?= $errors = $validation->getError('check') ?></span>
                                <?php endif ?>
                            </fieldset>
                            <button type="submit" class="btn btn-info btn-lg btn-block"><i class="ft-unlock"></i><?= lang('app.send') ?></button>
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
<?= $this->endSection() ?>