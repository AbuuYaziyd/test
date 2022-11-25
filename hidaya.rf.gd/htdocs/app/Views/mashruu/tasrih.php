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
                    <?php if (count($umrah) > 0) : ?>
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h2>
                                            <?= $title ?>
                                            <span class="badge badge badge-info badge-pill mr-2"><?= count($umrah) ?></span>
                                        </h2>
                                        <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                                        <div class="heading-elements">
                                            <ul class="list-inline mb-0">
                                                <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                                <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                                                <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                                <li><a data-action="close"><i class="ft-x"></i></a></li>
                                            </ul>
                                        </div>
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
                                                        <th><?= lang('app.jamia') ?></th>
                                                        <th><?= lang('app.nationality') ?></th>
                                                        <th><?= lang('app.show') ?></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php foreach ($umrah as $key => $data) : ?>
                                                        <tr>
                                                            <td><?= $key+1 ?></td>
                                                            <td><?= sprintf('%04s', $data['user']['malaf']) ?></td>
                                                            <td><span <?= ( $data['user']['role']=='mushrif'?'class="badge badge-success"':'') ?>><?= $data['user']['name'] ?></span></td>
                                                            <td><?= $data['user']['iqama'] ?></td>
                                                            <td><a href="tel:+966<?= $data['user']['phone'] ?>" class="badge badge-secondary">966<?= $data['user']['phone'] ?></a></td>
                                                            <td><?= $data['user']['uni_name'] ?></td>
                                                            <td><?= $data['user']['country_arName'] ?></td>
                                                            <td><a href="<?= base_url('admin/show/' . $data['user']['id']) ?>" class="btn btn-sm round btn-outline-warning"><?= lang('app.show') ?></a></td>
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
                </section>
            <?php if (count($tasrih) > 0) :?>
                <div class="card">
                    <div class="card-content">
                        <div class="row p-1 m-1">
                            <div class="col">
                                <div class="btn-group btn-block pull-right" role="group" aria-label="Basic example">
                                    <a href="<?= base_url('tanfidh/tasrih/delete') ?>" class="btn round btn-danger delete"><?= lang('app.delete') ?> <?= lang('app.tasrihs') ?></a>
                                    <a href="<?= base_url('tanfidh/download') ?>" class="btn round btn-primary"><?= lang('app.download') ?> <?= lang('app.tasrihs') ?></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                    <div class="row">
                        <?php foreach ($tasrih as $key => $dt) : ?>
                            <div class="col-md-4">
                                <div class="card">
                                    <div class="card-content">
                                        <div class="card-body">
                                            <h4 class="card-title"><?= $dt['name'] ?> @ <b><?= $dt['malaf'] ?></b></h4>
                                            <?php $loc = $dt['country_arName'].' - '.$dt['uni_name'] ?>
                                            <div class="text-center">
                                                <b><?=  date('d/m/Y', strtotime($dt['tnfdhDate'])) ?></b>
                                            </div>
                                        </div>
                                        <img class="img-fluid" src="<?= base_url('app-assets/images/'.($dt['tasrih']==null?'demo/no-image.png':'tasrih/'.$loc.'/'.$dt['tasrih'])) ?>" alt="img">
                                    </div>
                                </div>
                            </div>
                        <?php endforeach ?>
                    </div>
            <?php endif ?>
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