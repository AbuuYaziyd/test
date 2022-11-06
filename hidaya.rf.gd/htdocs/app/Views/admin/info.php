<div class="row">
    <div class="col-xl-3 col-lg-6 col-12">
        <a href="<?= base_url('admin/all') ?>">
            <div class="card pull-up">
                <div class="card-content">
                    <div class="card-body">
                        <div class="media d-flex">
                            <div class="media-body text-left">
                                <h3 class="info"><?= $full ?></h3>
                                <h6><?= lang('app.students') ?></h6>
                            </div>
                            <div>
                                <i class="icon-users info font-large-2 float-right"></i>
                            </div>
                        </div>
                        <div class="progress progress-sm mt-1 mb-0 box-shadow-2">
                            <div class="progress-bar bg-gradient-x-info" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>
            </div>
        </a>
    </div>
    <div class="col-xl-3 col-lg-6 col-12">
        <a href="<?= base_url('admin/jamiat') ?>">
            <div class="card pull-up">
                <div class="card-content">
                    <div class="card-body">
                        <div class="media d-flex">
                            <div class="media-body text-left">
                                <h3 class="purple"><?= $jamia ?></h3>
                                <h6><?= lang('app.jamiat') ?></h6>
                            </div>
                            <div>
                                <i class="icon-users purple font-large-2 float-right"></i>
                            </div>
                        </div>
                        <div class="progress progress-sm mt-1 mb-0 box-shadow-2">
                            <div class="progress-bar bg-gradient-x-purple" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>
            </div>
        </a>
    </div>
    <div class="col-xl-3 col-lg-6 col-12">
        <a href="<?= base_url('admin/nationality') ?>">
            <div class="card pull-up">
                <div class="card-content">
                    <div class="card-body">
                        <div class="media d-flex">
                            <div class="media-body text-left">
                                <h3 class="amber"><?= $nationality ?></h3>
                                <h6><?= lang('app.nationalities') ?></h6>
                            </div>
                            <div>
                                <i class="icon-users amber font-large-2 float-right"></i>
                            </div>
                        </div>
                        <div class="progress progress-sm mt-1 mb-0 box-shadow-2">
                            <div class="progress-bar bg-gradient-x-amber" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>
            </div>
        </a>
    </div>
    <div class="col-xl-3 col-lg-6 col-12">
        <a href="<?= base_url('admin/mushrifuna') ?>">
            <div class="card pull-up">
                <div class="card-content">
                    <div class="card-body">
                        <div class="media d-flex">
                            <div class="media-body text-left">
                                <h3 class="warning"><?= $mushrif ?></h3>
                                <h6><?= lang('app.mushrifuna') ?></h6>
                            </div>
                            <div>
                                <i class="icon-pie-chart warning font-large-2 float-right"></i>
                            </div>
                        </div>
                        <div class="progress progress-sm mt-1 mb-0 box-shadow-2">
                            <div class="progress-bar bg-gradient-x-warning" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>
            </div>
        </a>
    </div>
    <div class="col-xl-3 col-lg-6 col-12">
        <a href="<?= base_url('admin/judud') ?>">
            <div class="card pull-up">
                <div class="card-content">
                    <div class="card-body">
                        <div class="media d-flex">
                            <div class="media-body text-left">
                                <h3 class="success"><?= $judud . '/' . $full ?></h3>
                                <h6><?= lang('app.judud') ?></h6>
                            </div>
                            <div>
                                <i class="icon-user-follow success font-large-2 float-right"></i>
                            </div>
                        </div>
                        <div class="progress progress-sm mt-1 mb-0 box-shadow-2">
                            <div class="progress-bar bg-gradient-x-success" role="progressbar" style="width: <?= $judud/$full ?>%" aria-valuenow="<?= ($judud / $full) * 100 ?>" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>
            </div>
        </a>
    </div>
    <div class="col-xl-3 col-lg-6 col-12">
        <a href="#">
            <div class="card pull-up">
                <div class="card-content">
                    <div class="card-body">
                        <div class="media d-flex">
                            <div class="media-body text-left">
                                <h3 class="danger"><?= $status . '/' . $complt ?></h3>
                                <h6><?= lang('app.tanfidh') ?></h6>
                            </div>
                            <div>
                                <i class="icon-heart danger font-large-2 float-right"></i>
                            </div>
                        </div>
                        <div class="progress progress-sm mt-1 mb-0 box-shadow-2">
                            <div class="progress-bar bg-gradient-x-danger" role="progressbar" style="width: <?= ($complt == 0?0: $status / $complt) ?>%" aria-valuenow="<?= ($complt == 0 ? 0 : $status / $complt) * 100 ?>" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>
            </div>
        </a>
    </div>
</div>

<!-- DASH -->
<?= $this->include('user/info') ?>
<!-- !DASH -->