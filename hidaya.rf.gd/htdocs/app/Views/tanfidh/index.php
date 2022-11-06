<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="content-wrapper">
        <div class="content-header row">
        </div>
                <div id="recent-transactions" class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3>
                                <?php if (session('role') == 'superadmin') : ?>
                                    <div class="btn-group mb-1 pull-right" role="group" aria-label="Basic example">
                                        <a href="<?= base_url('tanfidh/show') ?>" class="btn round btn-outline-warning"><?= lang('app.edit') ?></a>
                                        <a href="<?= base_url('tanfidh/add') ?>" class="btn round btn-outline-success"> <?= lang('app.add') ?></a>
                                    </div>
                                <?php else : ?>
                                    <a class="btn btn-outline-warning box-shadow-2 round pull-right" href="<?= base_url('tanfidh/show') ?>"><?= lang('app.edit') ?></a>
                                <?php endif ?>
                            </h3>
                        </div>
                        <div class="card-content">
                            <div class="table-responsive">
                                <table id="recent-orders" class="table table-hover table-xl mb-0">
                                    <thead>
                                        <tr>
                                            <th class="border-top-0"><?= lang('app.tasrihDate') ?></th>
                                            <th class="border-top-0"><?= lang('app.tanfidhEndDate') ?></th>
                                            <!-- <th class="border-top-0"><?= lang('app.status') ?></th> -->
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($set as $dt) : ?>
                                        <tr>
                                            <td><span><?= $dt['extra'] ?></span></td>
                                            <td><a href="<?= base_url('tanfidh/show') ?>"><?= $dt['value'] ?></a></td>
                                            <!-- <td><button type="button" class="btn btn-sm btn-outline-warning round"><?= lang('app.show') ?></button></td> -->
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

<?= $this->endSection() ?>