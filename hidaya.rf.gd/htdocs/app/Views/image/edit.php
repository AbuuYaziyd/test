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
                <?= form_open_multipart('image/upload/' . session('id')) ?>
                <!-- users view card details start -->
                <div class="card col-md-6">
                    <div class="card-header">
                        <h4 class="media-heading"><span class="users-view-name"><?= lang('app.edit') . ' ' . lang('app.'.$type) ?> </span><span class="text-muted font-medium-1"> @</span><span class="users-view-username text-muted font-medium-1 "><?= session('malaf') ?></span></h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <div class="row">
                                <!-- <div class="col-sm-6 mb-1">
                                    <fieldset class="form-group">
                                        <div class="input-group mt-2">
                                            <div class="input-group-prepend">
                                                <label class="input-group-text" for="inputGroupSelect01"><?= lang('app.edit') . ' ' . lang('app.data') ?></label>
                                            </div>
                                            <select class="form-control" name="select">
                                                <option selected disabled><?= lang('app.choose') ?></option>
                                                <option value="imgIqama" <?= $type == 'iqama' ? 'selected':'' ?>><?= lang('app.imgIqama') ?></option>
                                                <option value="imgPass" <?= $type == 'passport' ? 'selected':'' ?>><?= lang('app.imgPass') ?></option>
                                                <option value="imgStu"<?= $type == 'bitaqa' ? 'selected':'' ?>><?= lang('app.imgStu') ?></option>
                                                <option value="imgIban"<?= $type == 'iban' ? 'selected':'' ?>><?= lang('app.imgIban') ?></option>
                                            </select>
                                        </div>
                                        <?php if ($validation->getError('select')) : ?>
                                            <span class="badge badge-danger"> <?= $errors = $validation->getError('select') ?></span>
                                        <?php endif ?>
                                    </fieldset>
                                </div> -->
                                <div class="col mb-1">
                                    
                                <img class="img-fluid mb-2" id="show_image" src="<?= base_url('app-assets/images/' . ($img[$type] == null ? 'demo/no-image.png' : 'malaf/'.session('malaf').'/') . $img[$type]) ?>" alt="img">
                                        <p><code style="font-family: Cairo;"><?= lang('app.imgErr') ?></code></p>
                                        <?php if ($validation->getError('img')) : ?>
                                            <span class="badge badge-danger"> <?= $errors = $validation->getError('img') ?></span>
                                        <?php endif ?>
                                    <div class="input-group mt-0">
                                        <div class="custom-file">
                                            <input type="file" name="img" id="image" class="custom-file-input" id="inputGroupFile02">
                                            <label class="custom-file-label"><?= lang('app.chooseFile') ?></label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <input type="hidden" name="select" value="<?= $type ?>">
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

<!-- <div class="card row">
    <div class="card-body">
        
    <div class="col-md-6">
        <div class="row">
           <div class="col-2">
                <div class="avatar mr-1 avatar-lg">
                    <img id="show_image" src="<?='https://ui-avatars.com/api/?name='.session('name').'&background=random' ?>" height="150px" width="150px" alt="avtar">
                </div>
            </div>
            <div class="col-10 mt-1">
                <fieldset class="form-group">
                     <div class="custom-file">
                         <input type="file" class="custom-file-input" id="image" name="image">
                         <label class="custom-file-label" for="image" aria-describedby="image">{{__('app.selectImage')}}</label>
                    </div>
                </fieldset>
            </div> 
        </div>
    </div>
    </div>
</div> -->

<script>
    $(document).ready(function () {
        $('#image').change(function (e) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#show_image').attr('src', e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);
        });
    });
</script>
<script>
    (function (window, document, $) {
        'use strict';
        $('.custom-file input').change(function (e) {
            $(this).next('.custom-file-label').html(e.target.files[0].name);
        });
    })(window, document, jQuery);
</script>
<?= $this->endSection() ?>