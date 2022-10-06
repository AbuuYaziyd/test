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
                            <a class="mr-1" href="#">
                                <img src="https://ui-avatars.com/api/?name=<?= $_SESSION['name'] ?>&background=random" alt="users view avatar" class="users-avatar-shadow rounded-circle" height="64" width="64">
                                <!-- <img src="<?= base_url('app-assets/images/portrait/small/avatar-s-26.jpg') ?>" alt="users view avatar" class="users-avatar-shadow rounded-circle" height="64" width="64"> -->
                            </a>
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
                                    <!-- <h2 class="text-primary mb-0"><?= lang('app.umraCount') ?>: <span class="font-large-1 align-middle"> <?= 'idadi' ?></span></h2> -->
                                </div>
                                <!-- <div class="col-12 col-sm-4 p-2">
                                    <h6 class="text-primary mb-0">Followers: <span class="font-large-1 align-middle">534</span></h6>
                                </div>
                                <div class="col-12 col-sm-4 p-2">
                                    <h6 class="text-primary mb-0">Following: <span class="font-large-1 align-middle">256</span></h6>
                                </div> -->
                            </div>
                            <div class="col-12">
                                <?= form_open('user/edit/' . $user['id']) ?>
                                <table class="table table-borderless">
                                    <tbody>
                                        <tr>
                                            <td><?= lang('app.name') ?>:</td>
                                            <td class="users-view-name"><input type="text" class="form-control" name="name" value="<?= $user['name'] ?>"></td>
                                        </tr>
                                        <tr>
                                            <td><?= lang('app.jamia') ?>:</td>
                                            <td class="users-view-name"><input type="text" class="form-control" name="jamia" value="<?= $user['jamia'] ?>" readonly></td>
                                        </tr>
                                        <tr>
                                            <td><?= lang('app.malaf') ?>:</td>
                                            <td class="users-view-name"><input type="text" class="form-control" name="malaf" value="<?= $user['malaf'] ?>" readonly></td>
                                        </tr>
                                        <tr>
                                            <td><?= lang('app.email') ?>:</td>
                                            <td class="users-view-name"><input type="email" class="form-control" name="email" value="<?= $user['email'] ?>"></td>
                                        </tr>
                                        <tr>
                                            <td><?= lang('app.nationality') ?>:</td>
                                            <td class="users-view-name"><input type="text" class="form-control" name="nationality" value="<?= $user['nationality'] ?>" readonly></td>
                                        </tr>
                                        <tr>
                                            <td><?= lang('app.phone') ?>:</td>
                                            <td class="users-view-name">
                                                <div class="input-group">
                                                    <input type="text" pattern="[0-9]{9}" title="اترك 0 وادخل 9 أرقام فقط!" class="form-control" name="phone" value="<?= $user['phone'] ?>">
                                                    <div class="input-group-append">
                                                        <span class="input-group-text" id="basic-addon1">966+</span>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><?= lang('app.bank') ?>:</td>
                                            <td class="users-view-name">
                                                <select class="form-control" name="bank">
                                                    <option selected readonly><?= $user['bank'] ?></option>
                                                    <?php foreach ($bank as $key => $data) : ?>
                                                        <option value="<?= $data['bankName'] . '-' . $data['bankShort'] ?>"><?= $data['bankName'] . '-' . $data['bankShort'] ?></option>
                                                    <?php endforeach ?>
                                                </select>
                                                <!-- <input type="text" class="form-control" name="bank" value="<?= $user['bank'] ?>"> -->
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><?= lang('app.iban') ?>:</td>
                                            <td class="users-view-name">
                                                <div class="input-group">
                                                    <input type="text" pattern="[0-9]{24}" title="لازم 24 رقما" class="form-control" name="iban" value="<?= $user['iban'] ?>">
                                                    <div class="input-group-append">
                                                        <span class="input-group-text" id="basic-addon1"><i class="la la-cc-visa"></i></span>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <button type="submit" class="btn btn-lg btn-block btn-secondary mt-2"><?= lang('app.edit') ?></button>
                                </form>
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