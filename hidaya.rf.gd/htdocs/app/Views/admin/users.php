<?= $this->extend('layouts/main') ?>
<?= $this->section('styles') ?>

<link rel="stylesheet" type="text/css" href="<?= base_url('app-assets/vendors/css/vendors-rtl.min.css') ?>">
<link rel="stylesheet" type="text/css" href="<?= base_url('app-assets/vendors/css/tables/datatable/datatables.min.css') ?>">
<link rel="stylesheet" type="text/css" href="<?= base_url('app-assets/vendors/css/tables/extensions/responsive.dataTables.min.css') ?>">
<link rel="stylesheet" type="text/css" href="<?= base_url('app-assets/vendors/css/tables/extensions/colReorder.dataTables.min.css') ?>">
<link rel="stylesheet" type="text/css" href="<?= base_url('app-assets/vendors/css/tables/extensions/buttons.dataTables.min.css') ?>">
<link rel="stylesheet" type="text/css" href="<?= base_url('app-assets/vendors/css/tables/datatable/buttons.bootstrap4.min.css') ?>">
<link rel="stylesheet" type="text/css" href="<?= base_url('app-assets/vendors/css/tables/extensions/fixedHeader.dataTables.min.css') ?>">

<?= $this->endsection() ?>

<?= $this->section('content') ?>
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="content-wrapper">
        <div class="content-body">
            <div class="content-body">
                <section id="configuration">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h2>
                                        <?= $title ?>
                                    </h2>
                                </div>
                                <div class="card-content collapse show">
                                    <div class="card-body card-dashboard">
                                        <table class="table table-striped table-bordered dataex-res-constructor">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th><?= lang('app.malaf') ?></th>
                                                    <th><?= lang('app.name') ?></th>
                                                    <th><?= lang('app.iqama') ?></th>
                                                    <th><?= lang('app.phone') ?></th>
                                                    <?php if ($type == 'mushrif') : ?>
                                                        <th><?= lang('app.jamia') ?> - <?= lang('app.nationality') ?></th>
                                                    <?php endif ?>
                                                    <th><?= lang('app.show') ?></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($users as $key => $data) : ?>
                                                    <tr>
                                                        <td><?= $key+1 ?></td>
                                                        <td><?= sprintf('%04s', $data['malaf']) ?></td>
                                                        <td><span <?= ( $data['role']=='mushrif'?'class="badge badge-success"':'') ?>><?= $data['name'] ?></span></td>
                                                        <td><?= $data['iqama'] ?></td>
                                                        <td><a href="tel:+966<?= $data['phone'] ?>" class="badge badge-secondary">966<?= $data['phone'] ?></a></td>
                                                        <?php if ($type == 'mushrif') : ?>
                                                            <td><a href="<?= base_url('admin/users/'. $data['nationality'].'/'. $data['jamia']) ?>" class="btn btn-sm round btn-outline-info"><?= $data['uni_name'] ?> - <?= $data['country_arName'] ?></a></td>
                                                        <?php endif ?>
                                                        <td><a href="<?= base_url('admin/show/' . $data['id']) ?>" class="btn btn-sm round btn-outline-warning"><?= lang('app.show') ?></a></td>
                                                    </tr>
                                                <?php endforeach ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
</div>

<?= $this->endsection() ?>
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
        "url": "//cdn.datatables.net/plug-ins/1.12.1/i18n/ar.json"
        },
        dom: 'Bfrtip',
        buttons: [{
                extend: 'print',
            },
            {
                extend: 'excelHtml5',
            },
        ],
        responsive: true
    });
</script>

<?= $this->endSection() ?>