<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>


<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="content-body">
            <!-- users view start -->
            <section class="users-view">
                <!-- users view media object start -->
                <div class="row">
                    <div class="col-12 col-sm-7">
                        <div class="media mb-2">
                            <div class="mr-1">
                                <img src="https://ui-avatars.com/api/?name=<?= $_SESSION['malaf'] ?>&background=random&length=4" alt="users view avatar" class="users-avatar-shadow rounded-circle " height="64" width="64">
                            </div>
                                
                            <div class="media-body pt-25">
                                <h4 class="media-heading"><span class="users-view-name"><?= $_SESSION['name'] ?> </span><span class="text-muted font-medium-1"> @</span><span class="users-view-username text-muted font-medium-1 "><?= $user['jamia'] ?></span></h4>
                                <span><?= lang('app.malaf') ?>:</span>
                                <span class="users-view-id"><?= $_SESSION['malaf'] ?></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-5 px-0 d-flex justify-content-end align-items-center px-1 mb-2">
                        <!-- <a href="#" class="btn btn-sm mr-25 border"><i class="bx bx-envelope font-small-3"></i></a> -->
                        <!-- <a href="#" class="btn btn-sm mr-25 border">Profile</a> -->
                        <!-- <a href="#" class="btn btn-sm btn-primary"><b><?= lang('app.edit') ?></b></a> -->
                    </div>
                </div>
                <!-- users view media object ends -->
                <!-- users view card details start -->
                <div class="card">
                    <div class="card-content">
                        <div class="card-body">
                            <div class="row bg-primary bg-lighten-5 rounded mb-2 mx-25 text-center text-lg-left">
                                <div class="col-12 col-sm-4 p-2">
                                    <!-- <h2 class="text-primary mb-0"><?= lang('app.umraCount') ?>: <span class="font-large-1 align-middle"> <?= ' 70' ?></span></h2> -->
                                </div>
                            </div>
                            <div class="col-12">
                                <table class="table table-borderless">
                                    <tbody>
                                        <tr>
                                            <td><?= lang('app.name') ?>:</td>
                                            <td><b><?= $user['name'] ?></b></td>
                                        </tr>
                                        <tr>
                                            <td><?= lang('app.jamia') ?>:</td>
                                            <td><b><?= $user['jamia'] ?></b></td>
                                        </tr>
                                        <tr>
                                            <td><?= lang('app.malaf') ?>:</td>
                                            <td><b><?= $user['malaf'] ?></b></td>
                                        </tr>
                                        <tr>
                                            <td><?= lang('app.passport') ?>:</td>
                                            <td><b class="<?= $user['passport']?? 'danger' ?>"><?= $user['passport']??lang('app.notFound') ?></b></td>
                                        </tr>
                                        <tr>
                                            <td><?= lang('app.bitaqa') ?>:</td>
                                            <td><b class="<?= $user['bitaqa']?? 'danger' ?>"><?= $user['bitaqa']??lang('app.notFound') ?></b></td>
                                        </tr>
                                        <tr>
                                            <td><?= lang('app.email') ?>:</td>
                                            <td><b class="<?= $user['email']?? 'danger' ?>"><?= $user['email']??lang('app.notFound') ?></b></td>
                                        </tr>
                                        <tr>
                                            <td><?= lang('app.nationality') ?>:</td>
                                            <td><b><?= $user['nationality'] ?></b></td>
                                        </tr>
                                        <tr>
                                            <td><?= lang('app.phone') ?>:</td>
                                            <td><a href="tel:+966<?= $user['phone'] ?>" class="badge badge-secondary badge-glow"><b><?= '966' . $user['phone'] ?></b></a></td>
                                        </tr>
                                        <tr>
                                            <td><?= lang('app.bank') ?>:</td>
                                            <td><b><?= $user['bankName'] ?> - <?= $user['bankShort'] ?></b></td>
                                        </tr>
                                        <tr>
                                            <td><?= lang('app.iban') ?>:</td>
                                            <td><b><?= $user['iban'] ?></b></td>
                                        </tr>


                                    </tbody>
                                </table><a href="<?= base_url('user/edit/' . $user['id']) ?>" class="btn btn-lg btn-block btn-primary mt-2"><?= lang('app.edit') ?></a>
                                <!-- <h5 class="mb-1"><i class="bx bx-info-circle"></i> Personal Info</h5>
                                <table class="table table-borderless mb-0">
                                    <tbody>
                                        <tr>
                                            <td>Birthday:</td>
                                            <td>03/04/1990</td>
                                        </tr>
                                        <tr>
                                            <td>Country:</td>
                                            <td>USA</td>
                                        </tr>
                                        <tr>
                                            <td>Languages:</td>
                                            <td>English</td>
                                        </tr>
                                        <tr>
                                            <td>Contact:</td>
                                            <td>+(305) 254 24668</td>
                                        </tr>
                                    </tbody>
                                </table> -->
                            </div>
                        </div>
                    </div>
                </div>
                <!-- users view card details ends -->

            </section>
            <!-- users view ends -->
        </div>
    </div>
</div>

<?= $this->endSection() ?>