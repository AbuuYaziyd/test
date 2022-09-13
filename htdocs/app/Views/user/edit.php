<?= $this->extend('cat/main') ?>
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
                                    <a class="btn btn-outline-danger box-shadow-2 round pull-right" href="<?= base_url('user/profile/' . $user['id']) ?>"><?= lang('app.back') ?></a>
                                </h3>
                            </div>
                            <div class="card-content mt-1">
                                <div class="card-body">
                                    <?php $validation = \Config\Services::validation() ?>
                                    <?= form_open('user/edit/' . $user['id']) ?>
                                    <label class="text-bold-600"><b><?= lang('app.name') ?></b></label>
                                    <fieldset class="form-group position-relative mb-1">
                                        <input type="text" class="form-control" name="name" value="<?= $info['name'] ?>">
                                    </fieldset>
                                    <label class="text-bold-600"><b><?= lang('app.lname') ?></b></label>
                                    <fieldset class="form-group position-relative mb-1">
                                        <input type="text" class="form-control" name="lname" value="<?= $info['lname'] ?>">
                                    </fieldset>
                                    <label class="text-bold-600"><b><?= lang('app.arName') ?></b></label>
                                    <fieldset class="form-group position-relative mb-1">
                                        <input type="text" class="form-control" name="arName" value="<?= $info['arName'] ?>">
                                    </fieldset>
                                    <label class="text-bold-600"><b><?= lang('app.kun_yah') ?></b></label>
                                    <fieldset class="form-group position-relative mb-1">
                                        <input type="text" class="form-control" name="kun_yah" value="<?= $info['kun_yah'] ?>">
                                    </fieldset>
                                    <label class="text-bold-600"><b><?= lang('app.level') ?></b></label>
                                    <fieldset class="form-group">
                                        <select class="custom-select" name="level">
                                            <?php for ($i = 1; $i < 6; $i++) : ?>
                                                <option <?=( $info['level'] == $i?'selected':'') ?> value="<?= $i ?>"><?= $i ?></option>
                                            <?php endfor ?>
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