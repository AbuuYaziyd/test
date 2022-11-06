<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="content-wrapper">
        <div class="content-body">
            <div class="content-body">
                <section id="configuration">
                    <div class="row">
                        <?php foreach ($tasrih as $dt) : ?>
                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-content">
                                    <img class="card-img-top img-fluid" src="<?= base_url('app-assets/images/'.($dt['tasrih']==null?'demo/no-image.png':'tasrih/'.$dt['tasrih'])) ?>" alt="img">
                                    <div class="card-body" style="text-align: center;">
                                        <h3 class="mb-1"><b><?= date('d/m/Y', strtotime($dt['tnfdhDate'])) ?></b></h3>
                                        <a href="#" class="btn btn-outline-purple btn-glow round btn-block"><?= lang('app.send') ?></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php endforeach ?>
                    </div>
                </section>
            </div>
        </div>
    </div>
</div>

<?= $this->endsection() ?>