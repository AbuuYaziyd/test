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
                            <div class="card-content">
                                <div class="card-body">
                                    <?php $validation = \Config\Services::validation() ?>
                                    <?= form_open('author/edit/' . $author['author_id']) ?>
                                    <label class="text-bold-600"><b><?= lang('app.name') ?> <?= lang('app.author') ?></b></label>
                                    <?php if ($validation->getError('author_name')) : ?>
                                        <span class="badge badge-danger"> <?= $errors = $validation->getError('author_name') ?></span>
                                    <?php endif ?>
                                    <fieldset class="form-group position-relative mb-1">
                                        <input type="text" class="form-control" name="author_name" value="<?= $author['author_name'] ?>">
                                    </fieldset>
                                    <label class="text-bold-600"><b><?= lang('app.dob') ?></b></label>
                                    <fieldset class="form-group position-relative mb-1">
                                        <input type="text" class="form-control" name="author_dob" value="<?= $author['author_dob'] ?>">
                                    </fieldset>
                                    <label class="text-bold-600"><b><?= lang('app.dod') ?></b></label>
                                    <fieldset class="form-group position-relative mb-1">
                                        <input type="text" class="form-control" name="author_dod" value="<?= $author['author_dod'] ?>">
                                    </fieldset>
                                    <label class="text-bold-600"><b><?= lang('app.pob') ?></b></label>
                                    <fieldset class="form-group position-relative mb-1">
                                        <input type="text" class="form-control" name="author_pob" value="<?= $author['author_pob'] ?>">
                                    </fieldset>
                                    <label class="text-bold-600"><b><?= lang('app.madhhab') ?></b></label>
                                    <fieldset class="form-group position-relative mb-1">
                                        <select name="author_madhhab" class="form-control">
                                            <option selected disabled><?= lang('app.choose') ?></option>
                                            <option value="hambali" <?= ($author['author_madhhab'] == 'hambali' ? 'selected' : '') ?>><?= lang('app.hambali') ?></option>
                                            <option value="shafi" <?= ($author['author_madhhab'] == 'shafi' ? 'selected' : '') ?>><?= lang('app.shafi') ?></option>
                                            <option value="maliki" <?= ($author['author_madhhab'] == 'maliki' ? 'selected' : '') ?>><?= lang('app.maliki') ?></option>
                                            <option value="hanafi" <?= ($author['author_madhhab'] == 'hanafi' ? 'selected' : '') ?>><?= lang('app.hanafi') ?></option>
                                        </select>
                                    </fieldset>
                                    <label class="text-bold-600"><b><?= lang('app.aqida') ?></b></label>
                                    <fieldset class="form-group position-relative mb-1">
                                        <select name="author_aqida" class="form-control">
                                            <option selected disabled><?= lang('app.choose') ?></option>
                                            <option value="ahluSunna" <?= ($author['author_aqida'] == 'ahluSunna' ? 'selected' : '') ?>><?= lang('app.ahluSunna') ?></option>
                                            <option value="firaq" <?= ($author['author_aqida'] == 'firaq' ? 'selected' : '') ?>><?= lang('app.firaq') ?></option>
                                        </select>
                                    </fieldset>
                                    <label class="text-bold-600"><b><?= lang('app.profile') ?></b></label>
                                    <fieldset class="form-group position-relative mb-1">
                                        <textarea name="author_info" class="form-control" cols="30" rows="5"><?= $author['author_info'] ?></textarea>
                                    </fieldset>
                                    <label class="text-bold-600"><b><?= lang('app.teachers') ?></b></label>
                                    <fieldset class="form-group position-relative mb-1">
                                        <textarea name="author_teachers" class="form-control" cols="30" rows="5"><?= $author['author_teachers'] ?></textarea>
                                    </fieldset>
                                    <label class="text-bold-600"><b><?= lang('app.student') ?></b></label>
                                    <fieldset class="form-group position-relative mb-1">
                                        <textarea name="author_students" class="form-control" cols="30" rows="5"><?= $author['author_students'] ?></textarea>
                                    </fieldset>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <button type="submit" class="btn btn-block btn-primary btn-lg"><?= lang('app.submit') ?></button>
                                        </div>
                                        <div class="col-md-6">
                                            <a href="<?= base_url('author/delete/'. $author['author_id']) ?>" class="btn btn-block btn-danger btn-lg" id="delete"><?= lang('app.delete') ?></a>
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