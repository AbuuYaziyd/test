<div class="main-menu menu-fixed menu-light menu-accordion    menu-shadow " data-scroll-to-active="true">
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
            <li class="<?= ($title == lang('app.dashboard') ? 'active' : '') ?> nav-item">
                <a href="<?= base_url('user') ?>">
                    <i class="la la-home"></i>
                    <span class="menu-title"><?= lang('app.dashboard') ?></span>
                    <!-- <span class="badge badge badge-info badge-pill float-right mr-2">3</span> -->
                </a>
            </li>
            <?php if ($_SESSION['role'] == 'superadmin')  : ?>
            <li class="<?= (isset($check) && $check == lang('app.students') ? 'active' : '') ?> nav-item">
                <a href="<?= base_url('admin/mushrif') ?>">
                    <i class="la la-users"></i>
                    <span class="menu-title"><?= lang('app.students') ?></span>
                </a>
            </li>
            <?php endif ?>
            <?php if ($_SESSION['role'] == 'mushrif')  : ?>
            <li class="<?= (isset($check) && $check == lang('app.students') ? 'active' : '') ?> nav-item">
                <a href="<?= base_url('admin/view') ?>">
                    <i class="la la-users"></i>
                    <span class="menu-title"><?= lang('app.students') ?></span>
                </a>
            </li>
            <?php endif ?>
            <li class="<?= ($title == lang('app.profile') ? 'active' : '') ?> nav-item">
                <a href="<?= base_url('user/profile/' . $_SESSION['id']) ?>">
                    <i class="la la-television"></i>
                    <span class="menu-title"><?= lang('app.profile') ?></span>
                </a>
            </li>
            <li class="<?= ($title == lang('app.data') ? 'active' : '') ?> nav-item">
                <a href="<?= base_url('image') ?>">
                    <i class="la la-newspaper-o"></i>
                    <span class="menu-title"><?= lang('app.data') ?></span>
                </a>
            </li>
            <li class="<?= ($title == lang('app.umrah') ? 'active' : '') ?> nav-item">
                <a href="<?= base_url('umrah') ?>">
                    <i class="la la-share-alt"></i>
                    <span class="menu-title"><?= lang('app.umrah') ?></span>
                </a>
            </li>
    </div>
</div>