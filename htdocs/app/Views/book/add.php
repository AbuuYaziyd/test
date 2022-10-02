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
                                    <?= form_open('book/create') ?>
                                    <label class="text-bold-600"><b><?= lang('app.category') ?> </b></label>
                                    <?php if ($validation->getError('cat_id')) : ?>
                                        <span class="badge badge-danger"> <?= $errors = $validation->getError('cat_id') ?></span>
                                    <?php endif ?>
                                    <fieldset class="form-group">
                                        <select class="custom-select" name="cat_id" id="cat">
                                            <option selected disabled><?= lang('app.choose') ?></option>
                                            <?php foreach ($cat as $key => $data) : ?>
                                                <option value="<?= $data['cat_id'] ?>"><?= $data['cat_name'] ?></option>
                                            <?php endforeach ?>
                                        </select>
                                    </fieldset>
                                    <label class="text-bold-600"><b><?= lang('app.subcat') ?> </b></label>
                                    <?php if ($validation->getError('sub_id')) : ?>
                                        <span class="badge badge-danger"> <?= $errors = $validation->getError('sub_id') ?></span>
                                    <?php endif ?>
                                    <fieldset class="form-group">
                                        <select class="custom-select" name="sub_id" id="sub">
                                            <option selected disabled><?= lang('app.choose') ?></option>
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
                                                <option value="<?= $data['author_id'] ?>"><?= $data['author_name'] ?>
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
                                        <input type="text" class="form-control" name="book_name" placeholder="<?= lang('app.bookName') ?>">
                                    </fieldset>
                                    <label class="text-bold-600"><b><?= lang('app.price') ?> </b></label>
                                    <fieldset class="form-group position-relative mb-1">
                                        <input type="text" class="form-control" name="book_price" placeholder="<?= lang('app.price') ?>">
                                    </fieldset>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label class="text-bold-600"><b><?= lang('app.cover') ?> </b></label>
                                            <fieldset class="form-group">
                                                <select class="custom-select" name="book_cover">
                                                    <option selected disabled><?= lang('app.choose') ?></option>
                                                    <option value="0"><?= lang('app.ghilaf') ?></option>
                                                    <option value="1"><?= lang('app.mujalad') ?></option>
                                                </select>
                                            </fieldset>
                                        </div>
                                        <div class="col-md-8">
                                            <label class="text-bold-600"><b><?= lang('app.count') ?> </b></label>
                                            <fieldset class="form-group position-relative mb-1">
                                                <input type="number" class="form-control" name="book_volume" value="1">
                                            </fieldset>
                                        </div>
                                    </div>
                                    <label class="text-bold-600"><b><?= lang('app.bookInfo') ?> </b></label>
                                    <fieldset class="form-group position-relative mb-1">
                                        <textarea name="book_info" class="form-control" cols="30" rows="4"><?= $book['book_info'] ?></textarea>
                                    </fieldset>
                                    <label class="text-bold-600"><b><?= lang('app.muhaqqiq') ?> </b></label>
                                    <fieldset class="form-group position-relative mb-1">
                                        <input type="text" class="form-control" name="muhaqqiq" placeholder="<?= lang('app.muhaqqiq') ?>">
                                    </fieldset>
                                    <label class="text-bold-600"><b><?= lang('app.link_waqefeya') ?> </b></label>
                                    <fieldset class="form-group position-relative mb-1">
                                        <input type="text" class="form-control" name="link_waqefeya" placeholder="<?= lang('app.link_waqefeya') ?>">
                                    </fieldset>
                                    <label class="text-bold-600"><b><?= lang('app.link_archive') ?> </b></label>
                                    <fieldset class="form-group position-relative mb-1">
                                        <input type="text" class="form-control" name="link_archive" placeholder="<?= lang('app.link_archive') ?>">
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