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
                                    <b><?= lang('app.sharhs') ?></b>
                                    <a class="btn btn-outline-success box-shadow-2 round pull-right" href="<?= base_url('sharh/add') ?>"><?= lang('app.add') ?></a>
                                </h3>
                            </div>
                            <div class="card-content mt-1">
                                <div class="table-responsive">
                                    <table id="recent-orders" class="table table-hover table-xl mb-0">
                                        <thead>
                                            <tr>
                                                <th class="border-top-0">#</th>
                                                <th class="border-top-0"><?= lang('app.book') ?></th>
                                                <th class="border-top-0"><?= lang('app.sharh') ?></th>
                                                <th class="border-top-0"><?= lang('app.choose') ?></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($sharh as $key => $data) : ?>
                                                <tr>
                                                    <td><?= $key + 1 ?></td>
                                                    <td>
                                                        <?= $data['book_name'] ?>
                                                        <span class="badge badge-<?= ($data['book_cover'] == 0 ? 'info' : 'success') ?> "><?= $data['book_volume'] ?></span>
                                                    </td>
                                                    <td>
                                                        <?= $data['sharh_name'] ?>
                                                        <span class="badge badge-<?= ($data['sharh_cover'] == 0 ? 'info' : 'success') ?> "><?= $data['sharh_volume'] ?></span>
                                                    </td>
                                                    <td>
                                                        <a href="<?= base_url('sharh/edit/' . $data['sub_id']) ?>" class="btn btn-sm btn-outline-warning round"><?= lang('app.edit') ?></a>
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