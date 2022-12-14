<?= $this->extend('layouts/main') ?>

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
                                    <h2><?= $title ?></h2>
                                </div>
                                <div class="card-content collapse show">
                                    <div class="card-body card-dashboard">
                                        <table class="table table-striped table-bordered responsive">
                                            <thead>
                                                <tr>
                                                    <th style="width: 5px;">#</th>
                                                    <th style="width: 5%;"><?= lang('app.malaf') ?></th>
                                                    <th><?= lang('app.name') ?></th>
                                                    <th><?= lang('app.iqama') ?></th>
                                                    <th><?= lang('app.phone') ?></th>
                                                    <th><?= lang('app.level') ?></th>
                                                    <th><?= lang('app.jamia') ?></th>
                                                    <th><?= lang('app.nationality') ?></th>
                                                    <th><?= lang('app.bank') ?></th>
                                                    <th><?= lang('app.iban') ?></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($users as $key => $data) : ?>
                                                    <tr>
                                                        <td><?= $key + 1 ?></td>
                                                        <td><a href="<?= base_url('admin/show/' . $data['id']) ?>" class="badge badge-pill badge-<?= ($data['role']=='mushrif'?'warning':'info') ?>"><?= sprintf('%04s', $data['malaf']) ?></a></td>
                                                        <td><?= $data['name'] ?></td>
                                                        <td><?= $data['iqama'] ?></td>
                                                        <td><a href="tel:+966<?= $data['phone'] ?>" class="badge badge-secondary">966<?= $data['phone'] ?></a></td>
                                                        <td><?= $data['level'] ?></td>
                                                        <td><?= $data['uni_name'] ?></td>
                                                        <td><?= $data['country_arNationality'] ?></td>
                                                        <td><?= $data['bankName'] ?></td>
                                                        <td><?= $data['iban'] ?></td>
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
<?= $this->include('layouts/table') ?>