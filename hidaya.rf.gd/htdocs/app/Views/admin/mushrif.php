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
                                        <?php foreach ($users as $key => $data) : ?>
                                            <a href="<?= base_url('admin/users/'. $data['nationality'].'/'. $data['jamia']) ?>" class="btn btn-outline-primary round m-1"><i class="flag-icon flag-icon-<?= strtolower($data['nationality']) ?>"></i> - <?= $data['name'] ?></a>
                                        <?php endforeach ?>
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