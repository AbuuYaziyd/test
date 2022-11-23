<div id="crypto-stats-3" class="row">
    <div class="col-xl-4 col-12">
        <div class="card crypto-card-3 pull-up">
            <a href="#">
                <div class="card-content">
                    <div class="card-body pb-0">
                        <div class="row">
                            <div class="col-2">
                                <i class="ft ft-airplay  warning font-large-2" title="BTC"></i>
                            </div>
                            <div class="col-7 pl-2">
                                <h4><?= lang('app.umrahcount') ?></h4>
                                <h6 class="text-muted"><?= lang('app.maashaallah') ?></h6>
                            </div>
                            <div class="col-3 text-right">
                                <h4><?= 0 ?></h4>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="chartjs-size-monitor">
                                <div class="chartjs-size-monitor-expand">
                                    <div class=""></div>
                                </div>
                                <div class="chartjs-size-monitor-shrink">
                                    <div class=""></div>
                                </div>
                            </div><canvas id="btc-chartjs" class="height-75 chartjs-render-monitor" style="display: block; width: 569px; height: 75px;" width="1138" height="150"></canvas>
                        </div>
                    </div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-xl-4 col-12">
        <div class="card crypto-card-3 pull-up">
            <a href="#">
                <div class="card-content">
                    <div class="card-body pb-0">
                        <div class="row">
                            <div class="col-2">
                                <i class="ft ft-check-circle blue-grey lighten-1 font-large-2" title="ETH"></i>
                            </div>
                            <div class="col-8 pl-2">
                                <h4><?= lang('app.umrahmonth') ?></h4>
                                <h6 class="text-muted"><?= lang('app.tabaaraka') ?></h6>
                            </div>
                            <div class="col-2 text-right">
                                <h4><?= 0 ?></h4>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="chartjs-size-monitor">
                                <div class="chartjs-size-monitor-expand">
                                    <div class=""></div>
                                </div>
                                <div class="chartjs-size-monitor-shrink">
                                    <div class=""></div>
                                </div>
                            </div><canvas id="eth-chartjs" class="height-75 chartjs-render-monitor" width="1138" height="150" style="display: block; width: 569px; height: 75px;"></canvas>
                        </div>
                    </div>
                </div>
            </a>
        </div>
    </div>
    <?php if (!$set) : ?>
        <div class="col-xl-4 col-12">
            <div class="card crypto-card-3 pull-up">
                <a href="#">
                    <div class="card-content">
                        <div class="card-body pb-0">
                            <div class="row">
                                <div class="col-2">
                                    <i class="ft ft-cloud-drizzle info font-large-2" title="XRP"></i>
                                </div>
                                <div class="col-5 pl-2">
                                    <h4><?= lang('app.tanfidh') . ' ' . lang('app.next') ?></h4>
                                    <h6 class="text-muted"><?= lang('app.baarik') ?></h6>
                                </div>
                                <div class="col-5 text-right">
                                    <h4 class="danger"><?= lang('app.near') ?></h4>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="chartjs-size-monitor">
                                    <div class="chartjs-size-monitor-expand">
                                        <div class=""></div>
                                    </div>
                                    <div class="chartjs-size-monitor-shrink">
                                        <div class=""></div>
                                    </div>
                                </div><canvas id="xrp-chartjs" class="height-75 chartjs-render-monitor" width="1138" height="150" style="display: block; width: 569px; height: 75px;"></canvas>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    <?php else : ?>
            <div class="col-xl-4 col-12">
                <div class="card crypto-card-3 pull-up">
                    <?php if (session('role') != 'admin') : ?>
                        <?= form_open('umrah') ?>
                    <?php else : ?>
                        <?= form_open('admin/tasrih') ?>
                    <?php endif ?>
                        <div class="card-content">
                            <div class="card-body pb-0">
                                <div class="row">
                                    <div class="col-2">
                                        <i class="ft ft-cloud-drizzle success font-large-2" title="XRP"></i>
                                    </div>
                                    <div class="col-5 pl-2">
                                        <h4><?= lang('app.tanfidh') . ' ' . lang('app.next') ?></h4>
                                        <h6 class="text-muted"><?= lang('app.baarik') ?></h6>
                                    </div>
                                    <div class="col-5 text-right">
                                        <h4 class="warning"><b><?= lang('app.doorOpen') ?></b></h4>
                                        <button type="submit" class="btn btn-outline-success round btn-sm"><?= lang('app.registerNow') ?></button>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 height-75" style="text-align: center;">
                                    <span class="mt-3 btn btn-info btn-pill"><?= lang('app.tasrihDate') ?> - <?= date('d/m/Y', strtotime($set['extra'])) ?></span>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
    <?php endif ?>
</div>