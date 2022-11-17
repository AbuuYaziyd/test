<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="content-wrapper">
        <div class="content-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-3">
                            <a id="count" data-toggle="modal" data-target="#default">
                                <div class="card pull-up">
                                    <div class="card-content">
                                        <div class="card-body">
                                            <div class="media d-flex">
                                                <div class="media-body text-left">
                                                    <h6 class="text-muted"><b><?= lang('app.studentCount') ?></b></h6>
                                                    <h3><?= $count['value'] ?></h3>
                                                </div>
                                                <div class="align-self-center">
                                                    <i class="la la-users success font-large-3 float-right"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <?php foreach ($tasrih as $key => $dt) : ?>
                        <div class="col-md-3">
                            <a id="count" data-toggle="modal" data-target="#tanfidh">
                                <div class="card pull-up">
                                    <div class="card-content">
                                        <div class="card-body">
                                            <div class="media d-flex">
                                                <div class="media-body text-left">
                                                    <h6 class="text-muted"><b><?= lang('app.tanfidh') ?> - <?= $key+1 ?></b></h6>
                                                    <h3 class="<?= $dt['value']<date('Y-m-d')?'danger':'success' ?>"><?= date('d/m/Y', strtotime($dt['value'])) ?></h3>
                                                </div>
                                                <div class="align-self-center">
                                                    <i class="la la-calendar success font-large-3 float-right"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <?php endforeach ?>
                        <div class="col-md-3">
                            <a id="count" data-toggle="modal" data-target="#tasrih">
                                <div class="card pull-up">
                                    <div class="card-content">
                                        <div class="card-body">
                                            <div class="media d-flex">
                                                <div class="media-body text-left">
                                                    <h6 class="text-muted"><b><?= lang('app.tasrihDate') ?></b></h6>
                                                    <h3 class="<?= $extra<date('Y-m-d')?'danger':'success' ?>"><?= date('d/m/Y', strtotime($extra)) ?></h3>
                                                </div>
                                                <div class="align-self-center">
                                                    <i class="la la-calendar-times-o danger font-large-3 float-right"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-3">
                            <a id="count" data-toggle="modal" data-target="#settings">
                                <div class="card pull-up">
                                    <div class="card-content">
                                        <div class="card-body">
                                            <div class="media d-flex">
                                                <div class="media-body text-left">
                                                    <h6 class="text-muted"><b><?= lang('app.tanfidhSettings') ?></b></h6>
                                                    <h3><?= lang('app.settings') ?></h3>
                                                </div>
                                                <div class="align-self-center">
                                                    <i class="la la-cog dark spinner font-large-2 float-right"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="card-body">
    <div class="row my-2">
        <div class="modal fade text-left" id="default" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel1">
                            <?= lang('app.edit') ?> <?= lang('app.studentCount') ?>
                            <span class="badge badge badge-info badge-pill float-right mr-2"><?= $count['value'] ?></span>
                        </h4>
                    </div>
                    <div class="modal-body m-1">
                        <?= form_open('set/student-count') ?>
                            <fieldset>
                                <label><b><?= lang('app.studentCount') ?></b></label>
                                <input type="hidden" name="id" value="<?= $count['id'] ?>">
                                <input type="text" class="form-control" name="stuCount" value="<?= $count['value'] ?>">
                            </fieldset>
                            <button type="submit" class="btn btn-block btn-lg btn-primary my-1"><?= lang('app.send') ?></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="card-body">
    <div class="row my-2">
        <div class="modal fade text-left" id="tanfidh" tabindex="-1" role="dialog" aria-labelledby="myModalLabel2" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel2">
                            <?= lang('app.edit') ?> <?= lang('app.tanfidh') ?>
                        </h4>
                    </div>
                    <div class="modal-body m-1">
                        <?= form_open('set/tanfidh') ?>
                            <?php foreach ($tasrih as $key => $dt) : ?>
                                <fieldset>
                                    <label><b><?= lang('app.tanfidhDate') ?> - <?= $key+1 ?></b></label>
                                    <input type="hidden" name="id[]" value="<?= $dt['id'] ?>">
                                    <input type="date" class="form-control" name="tanfidhDate[]" value="<?= $dt['value'] ?>">
                                </fieldset>
                            <?php endforeach ?>
                            <button type="submit" class="btn btn-block btn-lg btn-primary my-1"><?= lang('app.send') ?></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="card-body">
    <div class="row my-2">
        <div class="modal fade text-left" id="tasrih" tabindex="-1" role="dialog" aria-labelledby="myModalLabel3" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel3">
                            <?= lang('app.edit') ?> <?= lang('app.tasrih') ?>
                        </h4>
                    </div>
                    <div class="modal-body m-1">
                        <?= form_open('set/tasrih') ?>
                            <fieldset>
                                <label><b><?= lang('app.tasrihDate') ?></b></label>
                                <input type="date" class="form-control" name="tasrihDate" value="<?= $extra ?>">
                            </fieldset>
                            <button type="submit" class="btn btn-block btn-lg btn-primary my-1"><?= lang('app.send') ?></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="card-body">
    <div class="row my-2">
        <div class="modal fade text-left" id="settings" tabindex="-1" role="dialog" aria-labelledby="myModalLabel3" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel3">
                            <?= lang('app.tanfidhSettings') ?>
                        </h4>
                    </div>
                    <div class="modal-body m-1">
                        <?= form_open('set/tanfidh-settings') ?>
                            <fieldset>
                                <label><b><?= lang('app.tasrihDate') ?></b></label>
                                <input type="date" class="form-control" name="tasrihDate" value="<?= $extra ?>">
                            </fieldset>
                            <button type="submit" class="btn btn-block btn-lg btn-primary my-1"><?= lang('app.send') ?></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>