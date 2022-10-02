<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="content-body">
            <div class="content-body">
                <!-- Total earning & Recent Sales  -->
                <div class="row">
                    <div id="recent-sales" class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h3><b><?= lang('app.authors') ?></b>
                                    <a class="btn btn-outline-danger box-shadow-2 round pull-right" href="<?= base_url('author') ?>"><?= lang('app.back') ?></a>
                                </h3>
                            </div>
                            <div class="card-content mt-1">
                                <div class="card-body">
                                    <?php $validation = \Config\Services::validation() ?>
                                    <?= form_open('author/create') ?>
                                    <label class="text-bold-600"><b><?= lang('app.name') ?> <?= lang('app.author') ?></b></label>
                                    <?php if ($validation->getError('author_name')) : ?>
                                        <span class="badge badge-danger"> <?= $errors = $validation->getError('author_name') ?></span>
                                    <?php endif ?>
                                    <fieldset class="form-group position-relative mb-1">
                                        <input type="text" class="form-control" name="author_name" placeholder="<?= lang('app.name') ?> <?= lang('app.author') ?>">
                                    </fieldset>
                                    <label class="text-bold-600"><b><?= lang('app.dob') ?></b></label>
                                    <fieldset class="form-group position-relative mb-1">
                                        <input type="text" class="form-control" name="author_dob" placeholder="<?= lang('app.dob') ?>">
                                    </fieldset>
                                    <label class="text-bold-600"><b><?= lang('app.dod') ?></b></label>
                                    <fieldset class="form-group position-relative mb-1">
                                        <input type="text" class="form-control" name="author_dod" placeholder="<?= lang('app.dod') ?>">
                                    </fieldset>
                                    <label class="text-bold-600"><b><?= lang('app.pob') ?></b></label>
                                    <fieldset class="form-group position-relative mb-1">
                                        <input type="text" class="form-control" name="author_pob" placeholder="<?= lang('app.pob') ?>">
                                    </fieldset>
                                    <label class="text-bold-600"><b><?= lang('app.madhhab') ?></b></label>
                                    <fieldset class="form-group position-relative mb-1">
                                        <select name="author_madhhab" class="form-control">
                                            <option selected disabled><?= lang('app.choose') ?></option>
                                            <option value="hambali"><?= lang('app.hambali') ?></option>
                                            <option value="shafi"><?= lang('app.shafi') ?></option>
                                            <option value="maliki"><?= lang('app.maliki') ?></option>
                                            <option value="hanafi"><?= lang('app.hanafi') ?></option>
                                        </select>
                                    </fieldset>
                                    <label class="text-bold-600"><b><?= lang('app.aqida') ?></b></label>
                                    <fieldset class="form-group position-relative mb-1">
                                        <select name="author_aqida" class="form-control">
                                            <option selected disabled><?= lang('app.choose') ?></option>
                                            <option value="ahluSunna"><?= lang('app.ahluSunna') ?></option>
                                            <option value="firaq"><?= lang('app.firaq') ?></option>
                                        </select>
                                    </fieldset>
                                    <label class="text-bold-600"><b><?= lang('app.profile') ?></b></label>
                                    <fieldset class="form-group position-relative mb-1">
                                        <textarea name="author_info" class="form-control" cols="30" rows="5" placeholder="<?= lang('app.profile') ?>"></textarea>
                                    </fieldset>
                                    <label class="text-bold-600"><b><?= lang('app.teachers') ?></b></label>
                                    <fieldset class="form-group position-relative mb-1">
                                        <textarea name="author_teachers" class="form-control" cols="30" rows="5" placeholder="<?= lang('app.teachers') ?> <?= lang('app.author') ?>"></textarea>
                                    </fieldset>
                                    <label class="text-bold-600"><b><?= lang('app.student') ?></b></label>
                                    <fieldset class="form-group position-relative mb-1">
                                        <textarea name="author_students" class="form-control" cols="30" rows="5" placeholder="<?= lang('app.student') ?> <?= lang('app.author') ?>"></textarea>
                                    </fieldset>
                                    <button type="submit" class="btn btn-block btn-primary btn-lg"><?= lang('app.submit') ?></button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--/ Total earning & Recent Sales  -->
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>