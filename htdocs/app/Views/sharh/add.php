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
                                <h3><b><?= lang('app.sharhs') ?></b>
                                    <a class="btn btn-outline-danger box-shadow-2 round pull-right" href="<?= base_url('sharh') ?>"><?= lang('app.back') ?></a>
                                </h3>
                            </div>
                            <div class="card-content mt-1">
                                <div class="card-body">
                                    <?php $validation = \Config\Services::validation() ?>
                                    <?= form_open('sharh/create') ?>
                                    <label class="text-bold-600"><b><?= lang('app.book') ?></b></label>
                                    <?php if ($validation->getError('book_id')) : ?>
                                        <span class="badge badge-danger">
                                            <?= $errors = $validation->getError('book_id') ?>
                                        </span>
                                    <?php endif ?>
                                    <fieldset class="form-group position-relative mb-1">
                                        <select name="book_id" class="custom-select">
                                            <option selected disabled><?= lang('app.choose') ?></option>
                                            <?php foreach ($book as $key => $data) : ?>
                                                <option value="<?= $data['book_id'] ?>"><?= $data['book_name'] ?></option>
                                            <?php endforeach ?>
                                        </select>
                                    </fieldset>
                                    <label class="text-bold-600"><b><?= lang('app.author') ?></b></label>
                                    <?php if ($validation->getError('author_id')) : ?>
                                        <span class="badge badge-danger"> <?= $errors = $validation->getError('author_id') ?></span>
                                    <?php endif ?>
                                    <fieldset class="form-group position-relative mb-1">
                                        <select name="author_id" class="custom-select">
                                            <option selected disabled><?= lang('app.choose') ?></option>
                                            <?php foreach ($author as $key => $data) : ?>
                                                <option value="<?= $data['author_id'] ?>"><?= $data['author_name'] ?>
                                                    <?php if ($data['author_dod'] == null) : ?> <?= lang('app.hafidhahullah') ?></span>
                                                    <?php else : ?> <?= '(' . $data['author_dod'] . ') ' . lang('app.rahimahullah') ?></span>
                                                    <?php endif ?></option>
                                            <?php endforeach ?>
                                        </select>
                                    </fieldset>
                                    <label class="text-bold-600"><b><?= lang('app.name') ?> <?= lang('app.sharh') ?></b></label>
                                    <?php if ($validation->getError('sharh_name')) : ?>
                                        <span class="badge badge-danger"> <?= $errors = $validation->getError('sharh_name') ?></span>
                                    <?php endif ?>
                                    <fieldset class="form-group position-relative mb-1">
                                        <input type="text" class="form-control" name="sharh_name" placeholder="<?= lang('app.name') ?> <?= lang('app.sharh') ?>">
                                    </fieldset>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label class="text-bold-600"><b><?= lang('app.cover') ?> </b></label>
                                            <fieldset class="form-group">
                                                <select class="custom-select" name="sharh_cover">
                                                    <option selected disabled><?= lang('app.choose') ?></option>
                                                    <option value="0"><?= lang('app.ghilaf') ?></option>
                                                    <option value="1"><?= lang('app.mujalad') ?></option>
                                                </select>
                                            </fieldset>
                                        </div>
                                        <div class="col-md-8">
                                            <label class="text-bold-600"><b><?= lang('app.count') ?> </b></label>
                                            <fieldset class="form-group position-relative mb-1">
                                                <input type="number" class="form-control" name="sharh_volume" value="1">
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