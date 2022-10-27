<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="content-wrapper">
        <div class="content-body">
            <div class="row">
                <div id="recent-transactions" class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3><b><?= $title ?></b>
                            <?php if (session('role') == 'superadmin') : ?>
                            <a class="btn btn-outline-success box-shadow-2 round pull-right" href="<?= base_url('set/add') ?>"><?= lang('app.add') ?></a>
                            <?php endif ?>
                            </h3>
                        </div>
                        <div class="card-content">
                            <div class="table-responsive">
                                <table id="recent-orders" class="table table-hover table-xl mb-0">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th><?= lang('app.setting') ?></th>
                                            <th><?= lang('app.value') ?></th>
                                            <th><?= lang('app.info') ?></th>
                                            <th><?= lang('app.choose') ?></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($set as $key => $data) : ?>
                                            <tr>
                                                <td><?= $key+1 ?></td>
                                                <td><span class="badge badge-info"><?= $data['name'] ?></span></td>
                                                <td><span><?= $data['value'] ?></span></td>
                                                <td><span><?= $data['info'] ?></span></td>
                                                <td><a href="<?= base_url('set/show/'. $data['id']) ?>" class="btn btn-sm btn-outline-warning round"><?= lang('app.show') ?></a></td>

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