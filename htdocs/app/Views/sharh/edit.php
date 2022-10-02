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
                                    <?= form_open('sharh/edit/' . $sharh['sharh_id']) ?>
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
                                                <option value="<?= $data['book_id'] ?>" <?= ($data['book_id'] == $sharh['book_id'] ? 'selected' : '') ?>><?= $data['book_name'] ?></option>
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
                                                <option value="<?= $data['author_id'] ?>" <?= ($data['author_id'] == $sharh['author_id'] ? 'selected' : '') ?>>
                                                    <?= $data['author_name'] ?>
                                                    <?php if ($data['author_dod'] == null) : ?>
                                                        <?= lang('app.hafidhahullah') ?></span>
                                                    <?php else : ?>
                                                        <?= '(' . $data['author_dod'] . ') ' . lang('app.rahimahullah') ?>
                                                        </span>
                                                    <?php endif ?></option>
                                            <?php endforeach ?>
                                        </select>
                                    </fieldset>
                                    <label class="text-bold-600"><b><?= lang('app.name') ?> <?= lang('app.sharh') ?></b></label>
                                    <?php if ($validation->getError('sharh_name')) : ?>
                                        <span class="badge badge-danger">
                                            <?= $errors = $validation->getError('sharh_name') ?></span>
                                    <?php endif ?>
                                    <fieldset class="form-group position-relative mb-1">
                                        <input type="text" class="form-control" name="sharh_name" value="<?= $sharh['sharh_name'] ?>">
                                    </fieldset>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label class="text-bold-600"><b><?= lang('app.cover') ?> </b></label>
                                            <fieldset class="form-group">
                                                <select class="custom-select" name="sharh_cover">
                                                    <option selected disabled><?= lang('app.choose') ?></option>
                                                    <option value="0" <?= ($sharh['sharh_cover'] == 0 ? 'selected' : '') ?>><?= lang('app.ghilaf') ?></option>
                                                    <option value="1" <?= ($sharh['sharh_cover'] == 1 ? 'selected' : '') ?>><?= lang('app.mujalad') ?></option>
                                                </select>
                                            </fieldset>
                                        </div>
                                        <div class="col-md-8">
                                            <label class="text-bold-600"><b><?= lang('app.count') ?> </b></label>
                                            <fieldset class="form-group position-relative mb-1">
                                                <input type="number" class="form-control" name="sharh_volume" value="<?= $sharh['sharh_volume'] ?>">
                                            </fieldset>
                                        </div>
                                    </div>
                                    <!-- <button type="submit" class="btn btn-block btn-primary btn-lg"><?= lang('app.submit') ?></button> -->
                                    <div class="row">
                                        <div class="col-md-6">
                                            <button type="submit" class="btn btn-block btn-primary btn-lg mb-1"><?= lang('app.submit') ?></button>
                                        </div>
                                        <div class="col-md-6">
                                            <a href="<?= base_url('sharh/delete/' . $sharh['sharh_id']) ?>" id="delete" class="btn btn-block btn-danger btn-lg mb-1"><?= lang('app.delete') ?></a>
                                        </div>
                                    </div>
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

<?= $this->section('scripts') ?>
<script>
    $('#delete').on('click', function(e) {
        e.preventDefault();
        url = $(this).attr('href');
        Swal.fire({
            // title: <?= lang('app.graduated?') ?>,
            title: 'حقيقة تريد الحذف؟',
            text: "بعد الحذف خلاص فهو محذوف!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'نعم!',
            cancelButtonText: 'لا!',
            confirmButtonClass: 'btn btn-warning',
            cancelButtonClass: 'btn btn-danger ml-1',
            buttonsStyling: false,
        }).then(function(result) {
            if (result.value) {
                window.location.href = url;
            } else if (result.dismiss === Swal.DismissReason.cancel) {
                Swal.fire({
                    title: 'آسف',
                    text: 'ما حذفنا شيء :)',
                    type: 'error',
                    showConfirmButton: true,
                    confirmButtonText: "<?= lang('app.ok') ?>",
                })
            }
        })
    });
</script>
<?= $this->endsection() ?>