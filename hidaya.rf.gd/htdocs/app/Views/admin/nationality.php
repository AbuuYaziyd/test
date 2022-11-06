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
                                    <h2>
                                        <?= $title ?>
                                    </h2>
                                </div>
                                <div class="card-content collapse show">
                                    <div class="card-body card-dashboard">
                                        <?php foreach ($nationality as $key => $data) : ?>
                                            <a href="<?= base_url('admin/nat/' . $data['nat']) ?>" class="btn btn-warning round m-1"><?= $data['nationality'] ?> (<?= $data['jm'] ?>)</a>
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