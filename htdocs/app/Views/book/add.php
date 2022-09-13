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
                                <h3><b><?= lang('app.categories') ?></b>
                                    <a class="btn btn-outline-danger box-shadow-2 round pull-right" href="<?= base_url('category') ?>"><?= lang('app.back') ?></a>
                                </h3>
                            </div>
                            <div class="card-content mt-1">
                                <div class="card-body">
                                    <?php $validation = \Config\Services::validation() ?>
                                    <?= form_open('book/create') ?>
                                    <label class="text-bold-600"><b><?= lang('app.category') ?> </b></label>
                                    <?php if ($validation->getError('catId')) : ?>
                                        <span class="badge badge-danger"> <?= $errors = $validation->getError('catId') ?></span>
                                    <?php endif ?>
                                    <fieldset class="form-group">
                                        <select class="custom-select" name="catId">
                                            <option selected disabled><?= lang('app.choose') ?></option>
                                            <?php foreach ($cat as $key => $data) : ?>
                                                <option value="<?= $data['id'] ?>"><?= $data['name'] ?></option>
                                            <?php endforeach ?>
                                        </select>
                                    </fieldset>
                                    <label class="text-bold-600"><b><?= lang('app.bookName') ?> </b></label>
                                    <?php if ($validation->getError('bookName')) : ?>
                                        <span class="badge badge-danger"> <?= $errors = $validation->getError('bookName') ?></span>
                                    <?php endif ?>
                                    <fieldset class="form-group position-relative mb-1">
                                        <input type="text" class="form-control" name="bookName" placeholder="<?= lang('app.bookName') ?>">
                                    </fieldset>
                                    <label class="text-bold-600"><b><?= lang('app.author') ?> </b></label>
                                    <?php if ($validation->getError('author')) : ?>
                                        <span class="badge badge-danger"> <?= $errors = $validation->getError('author') ?></span>
                                    <?php endif ?>
                                    <fieldset class="form-group position-relative mb-1">
                                        <input type="text" class="form-control" name="author" placeholder="<?= lang('app.author') ?>">
                                    </fieldset>
                                    <label class="text-bold-600"><b><?= lang('app.distributor') ?> </b></label>
                                    <?php if ($validation->getError('distributor')) : ?>
                                        <span class="badge badge-danger"> <?= $errors = $validation->getError('distributor') ?></span>
                                    <?php endif ?>
                                    <fieldset class="form-group position-relative mb-1">
                                        <input type="text" class="form-control" name="distributor" placeholder="<?= lang('app.distributor') ?>">
                                    </fieldset>
                                    <label class="text-bold-600"><b><?= lang('app.price') ?> </b></label>
                                    <?php if ($validation->getError('price')) : ?>
                                        <span class="badge badge-danger"> <?= $errors = $validation->getError('price') ?></span>
                                    <?php endif ?>
                                    <fieldset class="form-group position-relative mb-1">
                                        <input type="text" class="form-control" name="price" placeholder="<?= lang('app.price') ?>">
                                    </fieldset>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label class="text-bold-600"><b><?= lang('app.cover') ?> </b></label>
                                            <fieldset class="form-group">
                                                <select class="custom-select" name="cover">
                                                    <option value="0"><?= lang('app.mutun') ?></option>
                                                    <option value="1"><?= lang('app.ghilaf') ?></option>
                                                    <option value="2"><?= lang('app.mujalad') ?></option>
                                                </select>
                                            </fieldset>
                                        </div>
                                        <div class="col-md-8">
                                            <label class="text-bold-600"><b><?= lang('app.count') ?> </b></label>
                                            <fieldset class="form-group position-relative mb-1">
                                                <input type="number" class="form-control" name="count" value="1">
                                            </fieldset>
                                        </div>
                                    </div>
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