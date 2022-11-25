
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
        <div class="content-body">
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
                                <table class="table table-striped table-bordered dataex-res-constructor">
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
                                        <?php foreach ($all as $key => $dt) : ?>
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
        </div>
    </div>
</div>

<?= $this->endSection() ?>

<?= $this->section('scripts') ?>
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
        "url": "//cdn.datatables.net/plug-ins/1.13.1/i18n/ar.json"
        },
        dom: 'Bfrtip',
        buttons: [{
                extend: 'print',
            },
            {
                extend: 'excelHtml5',
                },
                'colvis'
            ],
            responsive: true
    });
</script>

<script>
    var tableConstructor = $('.table2').DataTable({
        "language": {
        "url": "//cdn.datatables.net/plug-ins/1.13.1/i18n/ar.json"
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