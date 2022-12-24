<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="content-body">
            <div id="recent-transactions" class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3><b><?= lang('app.peopletobedonefor') ?></b></h3>
                    </div>
                    <div class="card-content">
                        <?php $validation = \Config\Services::validation(); ?>
                        <?= form_open_multipart('tanfidh/create') ?>
                            <div class="row p-1 m-1">
                                <div class="col-md-4">
                                    <a href="<?= base_url('app-assets/tanfidh.csv') ?>" download="tanfidh.csv" class="btn btn-outline-success btn-block round m-2">tanfdh.csv</a>
                                </div>
                                <div class="col-md-8">
                                    <label class="ml-1"><b><?= lang('app.chooseFileIfyouhavedownlad') ?></b></label>
                                    <?php if ($validation->getError('csv')) : ?>
                                        <span class="badge badge-danger"> <?= $errors = $validation->getError('csv') ?></span>
                                    <?php endif ?>
                                    <div class="input-group ">
                                        <div class="custom-file">
                                            <input type="file" name="csv" id="image" class="custom-file-input" id="inputGroupFile02">
                                            <label class="custom-file-label"><?= lang('app.chooseFile') ?></label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row p-1">
                                <div class="col-12">
                                    <button type="submit" class="btn btn-primary btn-block round"><?= lang('app.add') ?></button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <?php if ($new1) : ?>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h2>
                                    <b><?= $title ?></b> 
                                    <span class="badge badge badge-info badge-pill mr-2"><?= $tanfidh ?></span>
                                    <?php if ($tanfidh>0) : ?>
                                        <div class="btn-group pull-left" role="group" aria-label="Basic example">
                                            <a href="<?= base_url('tanfidh/delete') ?>" class="btn round btn-danger delete"><?= lang('app.delete') ?></a>
                                            <a href="<?= base_url('tanfidh/connect') ?>" class="btn round btn-outline-success"><?= lang('app.add') ?></a>
                                        </div>
                                    <?php else : ?>
                                        <a href="<?= base_url('tanfidh/delete') ?>" class="btn pull-left round btn-danger delete"><?= lang('app.delete') ?></a>
                                    <?php endif  ?>
                                </h2>
                            </div>
                            <div class="card-content collapse show">
                                <div class="card-body card-dashboard">
                                    <table class="table table-striped table-bordered dataex-res-constructor">
                                        <thead>
                                            <tr>
                                                <th><?= lang('app.ism') ?></th>
                                                <th><?= lang('app.sabab') ?></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($new1 as $key => $dt) : ?>
                                                <tr>
                                                    <td><?= $dt['ism'] ?></td>
                                                    <td><?= $dt['sabab'] ?></td>
                                                </tr>
                                            <?php endforeach ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif ?>
            <?php if ($new0) : ?>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h2>
                                    <b><?= $title ?> <?= lang('app.now') ?></b>
                                </h2>
                            </div>
                            <div class="card-content collapse show">
                                <div class="card-body card-dashboard">
                                    <table class="table table-striped table-bordered responsive">
                                        <thead>
                                            <tr>
                                                <th><?= lang('app.malaf') ?></th>
                                                <th><?= lang('app.name') ?></th>
                                                <th><?= lang('app.iqama') ?></th>
                                                <th><?= lang('app.phone') ?></th>
                                                <th><?= lang('app.nationality') ?></th>
                                                <th><?= lang('app.jamia') ?></th>
                                                <th><?= lang('app.ism') ?></th>
                                                <th><?= lang('app.sabab') ?></th>
                                                <th><?= lang('app.date') ?></th>
                                                <th><?= lang('app.amount') ?></th>
                                                <th><?= lang('app.iban') ?></th>
                                                <th><?= lang('app.bank') ?></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($new0 as $key => $dt) : ?>
                                                <tr>
                                                    <td><span class="badge badge-<?= ( $dt['role']=='mushrif'?'success':'') ?>"><?= sprintf('%04s', $dt['malaf']) ?></span></td>
                                                    <td><?= $dt['name'] ?></td>
                                                    <td><?= $dt['iqama'] ?></td>
                                                    <td><a href="tel:+966<?= $dt['phone'] ?>" class="badge badge-secondary">966<?= $dt['phone'] ?></a></td>
                                                    <td><?= $dt['country_arName'] ?></td>
                                                    <td><?= $dt['uni_name'] ?></td>
                                                    <td><?= $dt['ism'] ?></td>
                                                    <td><?= $dt['sabab'] ?></td>
                                                    <td><?= $dt['date'] ?></td>
                                                    <td><?= $dt['amount'] ?></td>
                                                    <td><?= $dt['iban'] ?></td>
                                                    <td><?= $dt['bankName'] ?> - <?= $dt['bankShort'] ?></td>
                                                </tr>
                                            <?php endforeach ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif ?>
        </div>
    </div>
</div>

<?= $this->endSection() ?>
<?= $this->include('layouts/table') ?>
<?= $this->section('scripts') ?>
<script>
    (function (window, document, $) {
        'use strict';
        $('.custom-file input').change(function (e) {
            $(this).next('.custom-file-label').html(e.target.files[0].name);
        });
    })(window, document, jQuery);
</script>
<script>
    $('.delete').on('click', function(e) {
        e.preventDefault();
        url = $(this).attr('href');
        Swal.fire({
            title: 'هل ترييد أن تحذف؟',
            text: "جميع ما أضفته هنا!",
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
                    title: 'تمام',
                    text: 'ما حذفت شيء :)',
                    type: 'error',
                    showConfirmButton: false,
                })
            }
        })
    });
</script>
<?= $this->endSection() ?>