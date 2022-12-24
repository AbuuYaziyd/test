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
<?= $this->include('layouts/table') ?>