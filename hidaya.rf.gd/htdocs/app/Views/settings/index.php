<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="content-wrapper">
        <div class="content-body">
            <div class="row">
                <div class="col-md-6">
                    <!-- <div class="card">
                        <div class="card-header">
                            <h3><b><?= lang('app.studentCount') ?></b>
                            <?php if (session('role') == 'superuser' || session('role') == 'admin') : ?>
                            <a class="btn btn-outline-success box-shadow-2 round pull-right" href="<?= base_url('set/add') ?>"><?= $count['value'] ?></a>
                            <?php endif ?>
                            </h3>
                        </div>
                    </div> -->
                    <div class="row">
                        <div class="col-lg-6 col-12">
                            <a href="#">
                                <div class="card pull-up">
                                    <div class="card-content">
                                        <div class="card-body">
                                            <div class="media d-flex">
                                                <div class="media-body text-left">
                                                    <h6 class="text-muted"><b><?= lang('app.studentCount') ?></b></h6>
                                                    <h3><?= $count['value'] ?></h3>
                                                </div>
                                                <div class="align-self-center">
                                                    <i class="la la-trophy success font-large-2 float-right"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-lg-6 col-12">
                            <!-- <?= form_open('admin/student-count' ) ?> -->
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
                            <!-- </form> -->
                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <div class="card">
                        <div class="card-header">
                            <h3><b><?= $title ?></b>
                            <?php if (session('role') == 'superuser' || session('role') == 'admin') : ?>
                            <a class="btn btn-outline-success box-shadow-2 round pull-right" href="<?= base_url('set/add') ?>"><?= lang('app.add') ?></a>
                            <?php endif ?>
                            </h3>
                        </div>
                        <div class="card-content">
                            <div class="table-responsive">
                                <table id="recent-orders" class="table table-hover table-xl mb-0">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th><?= lang('app.setting') ?></th>
                                            <th><?= lang('app.value') ?></th>
                                            <th><?= lang('app.info') ?></th>
                                            <th><?= lang('app.choose') ?></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($tasrih as $key => $data) : ?>
                                            <tr>
                                                <td><?= $key+1 ?></td>
                                                <td><span class="badge badge-info"><?= $data['name'] ?></span></td>
                                                <td><span><?= $data['value'] ?></span></td>
                                                <td><span><?= $data['info'] ?></span></td>
                                                <td><a href="<?= base_url('set/show/'. $data['id']) ?>" class="btn btn-sm btn-outline-warning round"><?= lang('app.show') ?></a></td>

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

                                <div class="card-content collapse show">
                                    <div class="card-body">
                                        <div class="row my-2">
                                            <div class="col-lg-4 col-md-6 col-sm-12">
                                                <div class="form-group">
                                                    <h5>Default Modal</h5>
                                                    <p>Toggle a modal via JavaScript by clicking the button above.</p>
                                                    <!-- Button trigger modal -->
                                                    <button type="button" class="btn btn-outline-primary block btn-lg" data-toggle="modal" data-target="#count">
                                                        Launch Modal
                                                    </button>

                                                    <!-- Modal -->
                                                    <div class="modal fade text-left" id="default" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h4 class="modal-title" id="myModalLabel1">Basic Modal</h4>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <h5>Check First Paragraph</h5>
                                                                    <p>Oat cake ice cream candy chocolate cake chocolate cake cotton candy dragée apple pie. Brownie carrot
                                                                        cake candy canes bonbon fruitcake topping halvah. Cake sweet roll cake cheesecake cookie chocolate cake
                                                                        liquorice. Apple pie sugar plum powder donut soufflé.</p>
                                                                    <p>Sweet roll biscuit donut cake gingerbread. Chocolate cupcake chocolate bar ice cream. Danish candy
                                                                        cake.</p>
                                                                    <hr>
                                                                    <h5>Some More Text</h5>
                                                                    <p>Cupcake sugar plum dessert tart powder chocolate fruitcake jelly. Tootsie roll bonbon toffee danish.
                                                                        Biscuit sweet cake gummies danish. Tootsie roll cotton candy tiramisu lollipop candy cookie biscuit pie.</p>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">Close</button>
                                                                    <button type="button" class="btn btn-outline-primary">Save changes</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

<?= $this->endSection() ?>