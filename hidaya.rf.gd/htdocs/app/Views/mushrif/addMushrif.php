<?= $this->extend('layouts/main') ?>
<?= $this->section('scripts') ?>

<!-- BEGIN: DT CSS-->
<link rel="stylesheet" type="text/css" href="<?= base_url('app-assets/vendors/css/vendors-rtl.min.css') ?>">
<link rel="stylesheet" type="text/css" href="<?= base_url('app-assets/vendors/css/tables/datatable/datatables.min.css') ?>">
<link rel="stylesheet" type="text/css" href="<?= base_url('app-assets/vendors/css/tables/extensions/responsive.dataTables.min.css') ?>">
<link rel="stylesheet" type="text/css" href="<?= base_url('app-assets/vendors/css/tables/extensions/colReorder.dataTables.min.css') ?>">
<link rel="stylesheet" type="text/css" href="<?= base_url('app-assets/vendors/css/tables/extensions/buttons.dataTables.min.css') ?>">
<link rel="stylesheet" type="text/css" href="<?= base_url('app-assets/vendors/css/tables/datatable/buttons.bootstrap4.min.css') ?>">
<link rel="stylesheet" type="text/css" href="<?= base_url('app-assets/vendors/css/tables/extensions/fixedHeader.dataTables.min.css') ?>">
<!-- END: DT CSS-->

<?= $this->endsection() ?>

<?= $this->section('content') ?>
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="content-wrapper">
        <div class="content-body">
            <div class="content-body">
                <!-- Configuration option table -->
                <section id="configuration">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h2>
                                        <?= $title ?>
                                        <a class="btn btn-outline-success box-shadow-1 round pull-right" href="<?= base_url('admin/add') ?>"><?= lang('app.new') ?></a>
                                    </h2>
                                </div>
                                <div class="card-content collapse show">
                                    <div class="card-body card-dashboard">
                                        <label for=""><b>jdfklgnf</b></label>
                                        <select name="jamia" class="custom-select">
                                            <option value="dgffg">djksngjngk</option>
                                                    <?php foreach ($jamia as $key => $data) : ?>
                                                        <option value="<?= $data['jamia']?>"><?= $data['jamia'] ?></option>
                                                    <?php endforeach ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!--/ Configuration option table -->
            </div>
        </div>
    </div>
</div>

<?= $this->endsection() ?>
<?= $this->section('scripts') ?>

<!-- BEGIN: Page Vendor JS-->
<script src="<?= base_url('app-assets/vendors/js/vendors.min.js') ?>"></script>
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

<!-- END: Page Vendor JS-->
<script>
    $(document).ready(function() {
        $('.dataex-res-configuration').DataTable({
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
    });
</script>

<?= $this->endSection() ?>