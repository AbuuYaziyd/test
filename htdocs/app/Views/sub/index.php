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
                                <h3>
                                    <b><?= lang('app.subcats') ?></b>
                                    <a class="btn btn-outline-success box-shadow-2 round pull-right" href="<?= base_url('subcat/add') ?>"><?= lang('app.add') ?></a>
                                </h3>
                            </div>
                            <div class="card-content mt-1">
                                <div class="table-responsive">
                                    <table id="recent-orders" class="table table-hover table-xl mb-0">
                                        <thead>
                                            <tr>
                                                <th class="border-top-0">#</th>
                                                <th class="border-top-0"><?= lang('app.subcat') ?></th>
                                                <th class="border-top-0"><?= lang('app.category') ?></th>
                                                <th class="border-top-0"><?= lang('app.books') ?></th>
                                                <th class="border-top-0"><?= lang('app.choose') ?></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($sub as $key => $data) : ?>
                                                <tr>
                                                    <td><?= $key + 1 ?></td>
                                                    <td><?= $data['sub_name'] ?></td>
                                                    <td><?= $data['cat_name'] ?></td>
                                                    <td><span class="badge badge-info">10</span> </td>
                                                    <td>
                                                        <a href="<?= base_url('subcat/edit/' . $data['sub_id']) ?>" class="btn btn-sm btn-outline-warning round"><?= lang('app.edit') ?></a>
                                                    </td>
                                                </tr>
                                            <?php endforeach ?>
                                        </tbody>
                                    </table>
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