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
                                <h3><b><?= lang('app.subcats') ?></b>
                                    <a class="btn btn-outline-danger box-shadow-2 round pull-right" href="<?= base_url('subcat') ?>"><?= lang('app.back') ?></a>
                                </h3>
                            </div>
                            <div class="card-content mt-1">
                                <div class="card-body">
                                    <?php $validation = \Config\Services::validation() ?>
                                    <?= form_open('subcat/create') ?>
                                    <label class="text-bold-600"><b><?= lang('app.choose') ?> <?= lang('app.category') ?></b></label>
                                    <?php if ($validation->getError('cat_name')) : ?>
                                        <span class="badge badge-danger"> <?= $errors = $validation->getError('cat_name') ?></span>
                                    <?php endif ?>
                                    <fieldset class="form-group position-relative mb-1">
                                        <select name="cat_id" class="form-control">
                                            <option selected disabled><?= lang('app.choose') ?></option>
                                            <?php foreach ($cat as $key => $data) : ?>
                                                <option value="<?= $data['cat_id'] ?>"><?= $data['cat_name'] ?></option>
                                            <?php endforeach ?>
                                        </select>
                                    </fieldset>
                                    <label class="text-bold-600"><b><?= lang('app.name') ?> <?= lang('app.subcat') ?></b></label>
                                    <?php if ($validation->getError('cat_name')) : ?>
                                        <span class="badge badge-danger"> <?= $errors = $validation->getError('cat_name') ?></span>
                                    <?php endif ?>
                                    <fieldset class="form-group position-relative mb-1">
                                        <input type="text" class="form-control" name="sub_name" placeholder="<?= lang('app.name') ?> <?= lang('app.subcat') ?>">
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