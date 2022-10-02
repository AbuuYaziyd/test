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
                                    <?= form_open('book/edit/' . $book['book_id']) ?>
                                    <label class="text-bold-600"><b><?= lang('app.category') ?> </b></label>
                                    <?php if ($validation->getError('cat_id')) : ?>
                                        <span class="badge badge-danger"> <?= $errors = $validation->getError('cat_id') ?></span>
                                    <?php endif ?>
                                    <fieldset class="form-group">
                                        <select class="custom-select" name="cat_id" id="cat">
                                            <?php foreach ($cat as $key => $data) : ?>
                                                <option value="<?= $data['cat_id'] ?>" <?= ($book['cat_id'] == $data['cat_id'] ? 'selected' : '') ?>><?= $data['cat_name'] ?></option>
                                            <?php endforeach ?>
                                        </select>
                                    </fieldset>
                                    <label class="text-bold-600"><b><?= lang('app.subcat') ?> </b></label>
                                    <?php if ($validation->getError('sub_id')) : ?>
                                        <span class="badge badge-danger"> <?= $errors = $validation->getError('sub_id') ?></span>
                                    <?php endif ?>
                                    <fieldset class="form-group">
                                        <select class="custom-select" name="sub_id" id="sub">
                                            <?php foreach ($sub as $key => $data) : ?>
                                                <option value="<?= $data['sub_id'] ?>" <?= ($book['sub_id'] == $data['sub_id'] ? 'selected' : '') ?>><?= $data['sub_name'] ?></option>
                                            <?php endforeach ?>
                                        </select>
                                    </fieldset>
                                    <label class="text-bold-600"><b><?= lang('app.author') ?> </b></label>
                                    <?php if ($validation->getError('author_id')) : ?>
                                        <span class="badge badge-danger"> <?= $errors = $validation->getError('author_id') ?></span>
                                    <?php endif ?>
                                    <fieldset class="form-group position-relative mb-1">
                                        <select name="author_id" class="custom-select">
                                            <option selected disabled><?= lang('app.choose') ?></option>
                                            <?php foreach ($author as $key => $data) : ?>
                                                <option value="<?= $data['author_id'] ?>" <?= ($book['author_id'] == $data['author_id'] ? 'selected' : '') ?>><?= $data['author_name'] ?>
                                                    <?php if ($data['author_dod'] == null) : ?> <?= lang('app.hafidhahullah') ?></span>
                                                    <?php else : ?> <?= '(' . $data['author_dod'] . ') ' . lang('app.rahimahullah') ?></span>
                                                    <?php endif ?>
                                                </option>
                                            <?php endforeach ?>
                                        </select>
                                    </fieldset>
                                    <label class="text-bold-600"><b><?= lang('app.bookName') ?> </b></label>
                                    <?php if ($validation->getError('book_name')) : ?>
                                        <span class="badge badge-danger"> <?= $errors = $validation->getError('book_name') ?></span>
                                    <?php endif ?>
                                    <fieldset class="form-group position-relative mb-1">
                                        <input type="text" class="form-control" name="book_name" value="<?= $book['book_name'] ?>">
                                    </fieldset>
                                    <label class="text-bold-600"><b><?= lang('app.price') ?> </b></label>
                                    <fieldset class="form-group position-relative mb-1">
                                        <input type="text" class="form-control" name="book_price" value="<?= $book['book_price'] ?>">
                                    </fieldset>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label class="text-bold-600"><b><?= lang('app.cover') ?> </b></label>
                                            <fieldset class="form-group">
                                                <select class="custom-select" name="book_cover">
                                                    <option selected disabled><?= lang('app.choose') ?></option>
                                                    <option value="0" <?= ($book['book_cover'] == 0 ? 'selected' : '') ?>><?= lang('app.ghilaf') ?></option>
                                                    <option value="1" <?= ($book['book_cover'] == 1 ? 'selected' : '') ?>><?= lang('app.mujalad') ?></option>
                                                </select>
                                            </fieldset>
                                        </div>
                                        <div class="col-md-8">
                                            <label class="text-bold-600"><b><?= lang('app.count') ?> </b></label>
                                            <fieldset class="form-group position-relative mb-1">
                                                <input type="number" class="form-control" name="book_volume" value="<?= $book['book_volume'] ?>">
                                            </fieldset>
                                        </div>
                                    </div>
                                    <label class="text-bold-600"><b><?= lang('app.bookInfo') ?> </b></label>
                                    <fieldset class="form-group position-relative mb-1">
                                        <textarea name="book_info" class="form-control" cols="30" rows="4"><?= $book['book_info'] ?></textarea>
                                    </fieldset>
                                    <label class="text-bold-600"><b><?= lang('app.muhaqqiq') ?> </b></label>
                                    <fieldset class="form-group position-relative mb-1">
                                        <input type="text" class="form-control" name="muhaqqiq" value="<?= $book['muhaqqiq'] ?>">
                                    </fieldset>
                                    <label class="text-bold-600"><b><?= lang('app.link_waqefeya') ?> </b></label>
                                    <fieldset class="form-group position-relative mb-1">
                                        <input type="text" class="form-control" name="link_waqefeya" value="<?= $book['link_waqefeya'] ?>">
                                    </fieldset>
                                    <label class="text-bold-600"><b><?= lang('app.link_archive') ?> </b></label>
                                    <fieldset class="form-group position-relative mb-1">
                                        <input type="text" class="form-control" name="link_archive" value="<?= $book['link_archive'] ?>">
                                    </fieldset>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <button type="submit" class="btn btn-block btn-primary btn-lg"><?= lang('app.submit') ?></button>
                                        </div>
                                        </form>
                                        <div class="col-md-6">
                                            <a href="<?= base_url('book/delete/' . $book['book_id']) ?>" id="delete" class="btn btn-block btn-danger btn-lg mb-1"><?= lang('app.delete') ?></a>
                                        </div>
                                    </div>
                                </div>


                            </div>
                        </div>
                        <div class="row">
                            <section class="users-view col-md-9">
                                <?= form_open_multipart('book/upload/' . $book['book_id']) ?>
                                <!-- users view card details start -->
                                <div class="card col-md-12">
                                    <div class="card-header">
                                        <h3><?= lang('app.bookPicture') ?></h3>
                                        <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                                    </div>
                                    <div class="card-content">
                                        <div class="card-body">
                                            <p><code style="font-family: Cairo;"><?= lang('app.imgErr') ?></code></p>
                                            <div class="row">
                                                <div class="col-12 my-1">
                                                    <div class="input-group">
                                                        <div class="custom-file">
                                                            <input type="file" name="img" class="custom-file-input">
                                                            <label class="custom-file-label"><?= lang('app.chooseFile') ?></label>
                                                        </div>
                                                    </div>
                                                    <?php if ($validation->getError('img')) : ?>
                                                        <span class="badge badge-danger"> <?= $errors = $validation->getError('img') ?></span>
                                                    <?php endif ?>
                                                </div>
                                            </div>
                                            <button type="submit" class="btn btn-lg btn-block btn-secondary">
                                                <i class="ft ft-check-circle white"></i> <?= lang('app.submit') ?></button>
                                        </div>
                                    </div>
                                </div>
                                <!-- users view card details ends -->
                                </form>
                            </section>
                            <div class="col-md-3 col-sm-12">
                                <div class="card">
                                    <div class="card-content">
                                        <div class="card-body">
                                            <h4 class="card-title"><?= lang('app.bookPicture') ?> </h4>
                                        </div>
                                        <img class="img-fluid" height="27px" src="<?= base_url('app-assets/images/' . ($book['book_picture'] == 0000 ? 'logo/logo.png' : 'book/' . $book['book_picture'])) ?>" alt="img">
                                    </div>
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

<script>
    jQuery(document).on('change', 'select#cat', function(e) {
        e.preventDefault();
        var cat = jQuery(this).val();
        catList(cat);
    });

    function catList(cat) {
        $.ajax({
            url: '<?= base_url('book/sub') ?>',
            type: 'post',
            data: {
                cat: cat
            },
            dataType: 'json',
            beforeSend: function() {
                jQuery('select#sub').find("option:eq(0)").html("بالهدو...");
            },
            success: function(json) {
                var options = '';
                options += '<option selected disabled><?= lang('app.choose') . ' ' . lang('app.subcat') ?></option>';
                for (var i = 0; i < json.length; i++) {
                    options += '<option value="' + json[i].sub_id + '">' + json[i].sub_name + '</option>';
                }
                jQuery("select#sub").html(options);

            },
            error: function(xhr, ajaxOptions, thrownError) {
                console.log(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
            }
        });
    }
</script>
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