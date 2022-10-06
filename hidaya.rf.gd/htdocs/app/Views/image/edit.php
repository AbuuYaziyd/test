<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>


<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="content-body">
            <!-- users view start -->
            <section class="users-view">
                <?php $validation = \Config\Services::validation(); ?>
                <?= form_open_multipart('image/upload/' . $_SESSION['id']) ?>
                <!-- users view card details start -->
                <div class="card col-md-12">
                    <div class="card-header">
                        <h4 class="media-heading"><span class="users-view-name"><?= lang('app.edit') . ' ' . lang('app.data') ?> </span><span class="text-muted font-medium-1"> @</span><span class="users-view-username text-muted font-medium-1 "><?= $_SESSION['malaf'] ?></span></h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <p><code style="font-family: Cairo;"><?= lang('app.imgErr') ?></code></p>
                            <div class="row">
                                <div class="col-sm-6 mb-1">
                                    <fieldset class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <label class="input-group-text" for="inputGroupSelect01"><?= lang('app.edit') . ' ' . lang('app.data') ?></label>
                                            </div>
                                            <select class="form-control" name="select">
                                                <option selected disabled><?= lang('app.choose') ?></option>
                                                <option value="imgIqama"><?= lang('app.imgIqama') ?></option>
                                                <option value="imgIban"><?= lang('app.imgIban') ?></option>
                                                <option value="imgStu"><?= lang('app.imgStu') ?></option>
                                                <option value="imgPass"><?= lang('app.imgPass') ?></option>
                                            </select>
                                        </div>
                                        <?php if ($validation->getError('select')) : ?>
                                            <span class="badge badge-danger"> <?= $errors = $validation->getError('select') ?></span>
                                        <?php endif ?>
                                    </fieldset>
                                </div>
                                <div class="col-sm-6 mb-1">
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" name="img" class="custom-file-input" id="inputGroupFile02">
                                            <label class="custom-file-label"><?= lang('app.chooseFile') ?></label>
                                        </div>
                                    </div>
                                    <?php if ($validation->getError('img')) : ?>
                                        <span class="badge badge-danger"> <?= $errors = $validation->getError('img') ?></span>
                                    <?php endif ?>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-lg btn-block btn-secondary mt-2"><?= lang('app.upload') ?></button>
                        </div>
                    </div>
                </div>
                <!-- users view card details ends -->
                </form>
            </section>
            <!-- users view ends -->
        </div>
    </div>
</div>

<?= $this->endSection() ?>