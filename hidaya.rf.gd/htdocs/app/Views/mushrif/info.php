
<?= $this->include('user/info') ?>
<!-- <div class="row"> -->
    <div class="col-xl-3 col-lg-6 col-12">
        <a href="<?= base_url('mushrif/users') ?>">
            <div class="card pull-up">
                <div class="card-content">
                    <div class="card-body">
                        <div class="media d-flex">
                            <div class="media-body text-left">
                                <h3 class="info"><?= $total . '/' . $full ?></h3>
                                <h6><?= lang('app.students') ?></h6>
                            </div>
                            <div>
                                <i class="icon-users info font-large-2 float-right"></i>
                            </div>
                        </div>
                        <div class="progress progress-sm mt-1 mb-0 box-shadow-2">
                            <div class="progress-bar bg-gradient-x-info" role="progressbar" style="width: <?= ($total / $full) * 100 ?>%" aria-valuenow="<?= ($total / $full) * 100 ?>" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>
            </div>
        </a>
    </div>
    <div class="col-xl-3 col-lg-6 col-12">
        <a href="<?= base_url('mushrif/judud') ?>">
            <div class="card pull-up">
                <div class="card-content">
                    <div class="card-body">
                        <div class="media d-flex">
                            <div class="media-body text-left">
                                
                                    <h3 class="success"><?= $judud0 ?>/<?= $total ?></h3>
                                <h6><?= lang('app.judud') ?></h6>
                            </div><?php if ($judud1) : ?><span class="danger">(<?= $judud1 ?>)</span><?php endif ?>
                            <div>
                                <i class="icon-user-follow success font-large-2 float-right"></i>
                            </div>
                        </div>
                        <div class="progress progress-sm mt-1 mb-0 box-shadow-2">
                            <div class="progress-bar bg-gradient-x-success" role="progressbar" style="width: <?= ($judud0 / $total) * 100 ?>%" aria-valuenow="<?= ($judud0 / $total) * 100 ?>" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>
            </div>
        </a>
    </div>
    <div class="col-xl-3 col-lg-6 col-12">
        <a href="<?= base_url('mushrif/tanfidh-shahr') ?>">
            <div class="card pull-up">
                <div class="card-content">
                    <div class="card-body">
                        <div class="media d-flex">
                            <div class="media-body text-left">
                                <h3 class="warning"><?= $status.'/'.$lead ?></h3>
                                <h6><?= lang('app.tanfidh') ?> <?= lang('app.thisMonth') ?></h6>
                            </div>
                            <div>
                                <i class="icon-docs warning font-large-2 float-right"></i>
                            </div>
                        </div>
                        <div class="progress progress-sm mt-1 mb-0 box-shadow-2">
                            <div class="progress-bar bg-gradient-x-warning" role="progressbar" style="width: <?= ($lead==0?0:$status/$lead) ?>%" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>
            </div>
        </a>
    </div>
    <div class="col-xl-3 col-lg-6 col-12">
        <a href="<?= base_url('mushrif/tanfidh') ?>">
            <div class="card pull-up">
                <div class="card-content">
                    <div class="card-body">
                        <div class="media d-flex">
                            <div class="media-body text-left">
                                <h3 class="danger"><?= count($month) . '/' . count($all) ?></h3>
                                <h6><?= lang('app.tanfidh') ?></h6>
                            </div>
                            <div>
                                <i class="icon-directions danger font-large-2 float-right"></i>
                            </div>
                        </div>
                        <div class="progress progress-sm mt-1 mb-0 box-shadow-2">
                            <div class="progress-bar bg-gradient-x-danger" role="progressbar" style="width: <?= ($lead == 0?0: $status / $lead) ?>%" aria-valuenow="<?= ($lead == 0 ? 0 : $status / $lead) * 100 ?>" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>
            </div>
        </a>
    </div>
</div>