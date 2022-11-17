
<?= $this->section('styles') ?>

<link rel="stylesheet" type="text/css" href="<?= base_url('app-assets/vendors/css/vendors-rtl.min.css') ?>">
<link rel="stylesheet" type="text/css" href="<?= base_url('app-assets/vendors/css/tables/datatable/datatables.min.css') ?>">
<link rel="stylesheet" type="text/css" href="<?= base_url('app-assets/vendors/css/tables/extensions/responsive.dataTables.min.css') ?>">
<link rel="stylesheet" type="text/css" href="<?= base_url('app-assets/vendors/css/tables/extensions/colReorder.dataTables.min.css') ?>">
<link rel="stylesheet" type="text/css" href="<?= base_url('app-assets/vendors/css/tables/extensions/buttons.dataTables.min.css') ?>">
<link rel="stylesheet" type="text/css" href="<?= base_url('app-assets/vendors/css/tables/datatable/buttons.bootstrap4.min.css') ?>">
<link rel="stylesheet" type="text/css" href="<?= base_url('app-assets/vendors/css/tables/extensions/fixedHeader.dataTables.min.css') ?>">

<?= $this->endsection() ?>
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
                            <?= form_open_multipart('mashruu/create') ?>
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
                                        <button type="submit" class="btn btn-primary btn-block round"><?= lang('app.send') ?></button>
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
                                        <a class="btn btn-outline-success box-shadow-2 round pull-right" href="<?= base_url('mashruu/connect') ?>"><?= lang('app.add') ?></a>
                                        <?php endif  ?>
                                    </h2>
                                </div>
                                <div class="card-content collapse show">
                                    <div class="card-body card-dashboard">
                                        <table class="table table-striped table-bordered dataex-res-constructor">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th><?= lang('app.ism') ?></th>
                                                    <th><?= lang('app.sabab') ?></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($new1 as $key => $dt) : ?>
                                                    <tr>
                                                        <td><?= $key+1 ?></td>
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
                                        <table class="table table-striped table-bordered table2">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
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
                                                        <td><?= $key+1 ?></td>
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
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h2>
                                        <b><?= $title ?> <?= lang('app.old') ?></b>
                                    </h2>
                                </div>
                                <div class="card-content collapse show">
                                    <div class="card-body card-dashboard">
                                        <table class="table table-striped table-bordered table2">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
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
                                                <?php foreach ($all as $key => $dt) : ?>
                                                    <tr>
                                                        <td><?= $key+1 ?></td>
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
        </div>
    </div>
</div>

<?= $this->endSection() ?>

<?= $this->section('scripts') ?>
<script>
    (function (window, document, $) {
        'use strict';
        $('.custom-file input').change(function (e) {
            $(this).next('.custom-file-label').html(e.target.files[0].name);
        });
    })(window, document, jQuery);
</script>
<script src="<?= base_url('app-assets/vendors/js/tables/datatable/datatables.min.js') ?>"></script>
<script src="<?= base_url('app-assets/vendors/js/tables/datatable/dataTables.responsive.min.js') ?>"></script>
<script src="<?= base_url('app-assets/vendors/js/tables/buttons.colVis.min.js') ?>"></script>
<script src="<?= base_url('app-assets/vendors/js/tables/pdfmake.min.js') ?>"></script>
<script src="<?= base_url('app-assets/vendors/js/tables/buttons.print.min.js') ?>"></script>
<script src="<?= base_url('app-assets/vendors/js/tables/datatable/dataTables.colReorder.min.js') ?>"></script>
<script src="<?= base_url('app-assets/vendors/js/tables/datatable/dataTables.buttons.min.js') ?>"></script>
<script src="<?= base_url('app-assets/vendors/js/tables/datatable/buttons.bootstrap4.min.js') ?>"></script>
<script src="<?= base_url('app-assets/vendors/js/tables/datatable/dataTables.fixedHeader.min.js') ?>"></script>
<script src="<?= base_url('app-assets/vendors/js/tables/jszip.min.js') ?>"></script>
<script src="<?= base_url('app-assets/vendors/js/tables/buttons.html5.min.js') ?>"></script>
<script src="<?= base_url('app-assets/vendors/js/tables/buttons.print.min.js') ?>"></script>

<script>
    var tableConstructor = $('.dataex-res-constructor').DataTable({
        "language": {
        "url": "//cdn.datatables.net/plug-ins/1.12.1/i18n/ar.json"
        },
        dom: 'Bfrtip',
        buttons: [{
                extend: 'print',
                    exportOptions: {
                        columns: ':visible'
                    }
            },
            {
                extend: 'excelHtml5',
                    exportOptions: {
                        columns: ':visible'
                    }
                },
                'colvis'
            ],
            responsive: false
    });
</script>

<script>
    var tableConstructor = $('.table2').DataTable({
        "language": {
        "url": "//cdn.datatables.net/plug-ins/1.12.1/i18n/ar.json"
        },
        dom: 'Bfrtip',
        buttons: [{
                extend: 'print',
                    exportOptions: {
                        columns: ':visible'
                    }
            },
            {
                extend: 'excelHtml5',
                    exportOptions: {
                        columns: ':visible'
                    }
                },
                'colvis'
            ],
            responsive: true
    });
</script>

<?= $this->endSection() ?>