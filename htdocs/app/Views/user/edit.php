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
                                <h3><b><?= lang('app.category') ?></b>
                                    <a class="btn btn-outline-danger box-shadow-2 round pull-right" href="<?= base_url('user/profile/' . $user['user_id']) ?>"><?= lang('app.back') ?></a>
                                </h3>
                            </div>
                            <div class="card-content mt-1">
                                <div class="card-body">
                                    <?php $validation = \Config\Services::validation() ?>
                                    <?= form_open('user/edit/' . $user['user_id']) ?>
                                    <label class="text-bold-600"><b><?= lang('app.fname') ?></b></label>
                                    <fieldset class="form-group position-relative mb-1">
                                        <input type="text" class="form-control" name="fname" value="<?= $user['fname'] ?>">
                                    </fieldset>
                                    <label class="text-bold-600"><b><?= lang('app.username') ?></b></label>
                                    <fieldset class="form-group position-relative mb-1">
                                        <input type="text" class="form-control" name="username" value="<?= $user['username'] ?>" readonly>
                                    </fieldset>
                                    <label class="text-bold-600"><b><?= lang('app.email') ?></b></label>
                                    <fieldset class="form-group position-relative mb-1">
                                        <input type="text" class="form-control" name="email" value="<?= $user['email'] ?>">
                                    </fieldset>
                                    <label class="text-bold-600"><b><?= lang('app.phone') ?></b></label>
                                    <fieldset class="form-group position-relative mb-1">
                                        <input type="text" class="form-control" name="phone" value="<?= $user['phone'] ?>">
                                    </fieldset>
                                    <label class="text-bold-600"><b><?= lang('app.address') ?></b></label>
                                    <fieldset class="form-group position-relative mb-1">
                                        <input type="text" class="form-control" name="address" value="<?= $user['address'] ?>">
                                    </fieldset>
                                    <label class="text-bold-600"><b><?= lang('app.maktabaName') ?></b></label>
                                    <fieldset class="form-group position-relative mb-1">
                                        <input type="text" class="form-control" name="maktaba_name" value="<?= $user['maktaba_name'] ?>">
                                    </fieldset>
                                    <label class="text-bold-600"><b><?= lang('app.dob') ?></b></label>
                                    <fieldset class="form-group position-relative mb-1">
                                        <input type="date" class="form-control" name="dob" id="date" value="<?= date('Y-m-d', strtotime(($user['dob'] ?? '1990-09-23'))) ?>">
                                    </fieldset>
                                    <label class="text-bold-600"><b><?= lang('app.sex') ?></b></label>
                                    <fieldset class="form-group position-relative mb-1">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <input type="radio" name="sex" value="M" <?= $user['sex'] == 'M' ? 'checked' : '' ?>><?= lang('app.M') ?>
                                            </div>
                                            <div class="col-md-6">
                                                <input type="radio" name="sex" value="F" <?= $user['sex'] == 'F' ? 'checked' : '' ?>><?= lang('app.F') ?>
                                            </div>
                                        </div>
                                    </fieldset>
                                    <label class="text-bold-600"><b><?= lang('app.profile') ?></b></label>
                                    <fieldset class="form-group position-relative mb-1">
                                        <textarea name="user_info" class="form-control" cols="30" rows="5"><?= $user['user_info'] ?></textarea>
                                    </fieldset>
                                    <label class="text-bold-600"><b><?= lang('app.level') ?></b></label>
                                    <fieldset class="form-group">
                                        <select class="custom-select" name="level">
                                            <option selected disabled><?= lang('app.choose') ?></option>
                                            <option <?= ($user['level'] == 1 ? 'selected' : '') ?> value="1"><?= lang('app.thanawi') ?></option>
                                            <option <?= ($user['level'] == 2 ? 'selected' : '') ?> value="2"><?= lang('app.degree') ?></option>
                                            <option <?= ($user['level'] == 3 ? 'selected' : '') ?> value="3"><?= lang('app.master') ?></option>
                                            <option <?= ($user['level'] == 4 ? 'selected' : '') ?> value="4"><?= lang('app.dukturi') ?></option>
                                        </select>
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