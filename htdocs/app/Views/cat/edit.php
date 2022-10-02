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
                                <h3><b><?= lang('app.categories') ?></b>
                                    <a class="btn btn-outline-danger box-shadow-2 round pull-right" href="<?= base_url('category') ?>"><?= lang('app.back') ?></a>
                                </h3>
                            </div>
                            <div class="card-content mt-1">
                                <div class="card-body">
                                    <?php $validation = \Config\Services::validation() ?>
                                    <?= form_open('category/edit/' . $cat['cat_id']) ?>
                                    <label class="text-bold-600"><b><?= lang('app.name') ?> <?= lang('app.category') ?></b></label>
                                    <?php if ($validation->getError('cat_name')) : ?>
                                        <span class="badge badge-danger"> <?= $errors = $validation->getError('cat_name') ?></span>
                                    <?php endif ?>
                                    <fieldset class="form-group position-relative mb-1">
                                        <input type="text" class="form-control" name="cat_name" value="<?= $cat['cat_name'] ?>">
                                    </fieldset>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <button type="submit" class="btn btn-block btn-primary btn-lg mb-1"><?= lang('app.submit') ?></button>
                                        </div>
                                        <div class="col-md-6">
                                            <a href="<?= base_url('category/delete/' . $cat['cat_id']) ?>" id="delete" class="btn btn-block btn-danger btn-lg mb-1"><?= lang('app.delete') ?></a>
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