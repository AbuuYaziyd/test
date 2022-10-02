<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="content-body">
            <div class="content-body">
                <!-- users view start -->
                <section class="users-view">
                    <!-- users view media object start -->
                    <div class="row">
                        <div class="col-12 col-sm-7">
                            <div class="media mb-2">
                                <a class="mr-1" href="#">
                                    <img src="https://ui-avatars.com/api/?length=1&&name=<?= $profile['fname'] ?>&&background=random&&bold=true" alt="users view avatar" class="users-avatar-shadow rounded-circle" height="64" width="64">
                                </a>
                                <div class="media-body pt-25">
                                    <h4 class="media-heading"><span class="users-view-name"><?= $profile['fname'] ?></span><span class="text-muted font-medium-1"> @</span><span class="users-view-username text-muted font-medium-1 "><?= APP_NAME ?></span></h4>
                                    <span><?= lang('app.username') ?>:</span>
                                    <span class="users-view-id"><?= $profile['username'] ?></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-5 px-0 d-flex justify-content-end align-items-center px-1 mb-2">
                            <a href="<?= base_url('user/info/' . $profile['user_id']) ?>" class="btn btn-outline-warning round"><i class="ft-edit font-small-3"></i> <?= lang('app.edit') ?></a>
                        </div>
                    </div>
                    <!-- users view media object ends -->
                    <!-- users view card data start -->
                    <div class="card">
                        <div class="card-content">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="table-responsive">
                                            <table class="table mb-0">
                                                <thead>
                                                    <tr>
                                                        <th><?= lang('app.registered') ?> :</th>
                                                        <th><?= lang('app.role') ?> :</th>
                                                        <th><?= lang('app.status') ?> :</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td><?= date("d/m/Y", strtotime($profile['created_at'])) ?></td>
                                                        <td class="users-view-role"><?= ($profile['role'] == 'user' ? 'مستخدم' : 'مندوب') ?></td>
                                                        <td><span class="badge badge-success users-view-status"><?= lang('app.active') ?></span></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- users view card data ends -->
                    <!-- users view card details start -->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-content">
                                    <div class="card-body">
                                        <div class="row bg-primary bg-lighten-5 rounded mb-2 mx-25 text-center text-lg-left">
                                            <div class="col-12 col-sm-4 p-2">
                                                <h4 class="text-primary mb-0"><b><?= lang('app.profile') ?> : </b></h4>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <table class="table table-borderless">
                                                <tbody>
                                                    <tr>
                                                        <td><?= lang('app.username') ?> :</td>
                                                        <td class="users-view-username"><?= $profile['username'] ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td><?= lang('app.fname') ?> :</td>
                                                        <td class="users-view-name"><?= $profile['fname'] ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td><?= lang('app.email') ?> :</td>
                                                        <td class="users-view-email"><a href="mailto:<?= $profile['email'] ?>"><?= $profile['email'] ?></a></td>
                                                    </tr>
                                                    <tr>
                                                        <td><?= lang('app.dob') ?> :</td>
                                                        <td><?= date('d/m/Y', strtotime($profile['dob'])) ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td><?= lang('app.phone') ?> :</td>
                                                        <td><a href="tel:+<?= $profile['phone'] ?>" class="badge badge-secondary"><?= $profile['phone'] ?></a></td>
                                                    </tr>
                                                    <tr>
                                                        <td><?= lang('app.level') ?> :</td>
                                                        <td><?php
                                                            switch ($profile['level']) {
                                                                case '4':
                                                                    echo lang('app.dukturi');
                                                                    break;
                                                                case '3':
                                                                    echo lang('app.master');
                                                                    break;
                                                                case '2':
                                                                    echo lang('app.degree');
                                                                    break;
                                                                default:
                                                                    echo lang('app.thanawi');
                                                                    break;
                                                            } ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td><?= lang('app.sex') ?> :</td>
                                                        <td><?= lang('app.' . $profile['sex']) ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td><?= lang('app.profile') ?> :</td>
                                                        <td><?= $profile['user_info'] ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td><?= lang('app.maktabaName') ?> :</td>
                                                        <td><?= $profile['maktaba_name'] ?></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- <div class="col-md-6">
                            <div class="card">
                                <div class="card-content">
                                    <div class="card-body">
                                        <div class="row bg-primary bg-lighten-5 rounded mb-2 mx-25 text-center text-lg-left">
                                            <div class="col-12 col-sm-4 p-2">
                                                <h6 class="text-primary mb-0">Followers: <span class="font-large-1 align-middle">534</span></h6>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <h5 class="mb-1"><i class="ft-info"></i> Personal Info</h5>
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
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> -->
                    </div>
                    <!-- users view card details ends -->

                </section>
                <!-- users view ends -->
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>