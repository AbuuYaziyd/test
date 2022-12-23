<div class="main-menu menu-fixed menu-light menu-accordion    menu-shadow " data-scroll-to-active="true">
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
            <li class="<?= ($title == lang('app.dashboard') ? 'active' : '') ?> nav-item">
                <a href="<?= base_url('user') ?>">
                    <i class="la la-home"></i>
                    <span class="menu-title"><?= lang('app.dashboard') ?></span>
                    <span class="badge badge badge-info badge-pill float-right mr-2"><?= lang('app.'.session('role')) ?></span>
                </a>
            </li>
            <?php if (session('role') === 'admin')  : ?>
            <li class="<?= ($title == lang('app.settings') ? 'active' : '') ?> nav-item">
                <a href="<?= base_url('set') ?>">
                    <i class="la la-cog spinner"></i>
                    <span class="menu-title"><?= lang('app.settings') ?></span>
                </a>
            </li>
            <li class="<?= ($title == lang('app.tanfidh') ? 'active' : '') ?> nav-item">
                <a href="<?= base_url('tanfidh') ?>">
                    <i class="la la-balance-scale"></i>
                    <span class="menu-title"><?= lang('app.tanfidh') ?></span>
                </a>
            </li>
            <?php endif ?>
            <li class="<?= ($title == lang('app.profile') ? 'active' : '') ?> nav-item">
                <a href="<?= base_url('user/profile/' . session('id')) ?>">
                    <i class="la la-television"></i>
                    <span class="menu-title"><?= lang('app.profile') ?></span>
                </a>
            </li>
            <?php if (session('role') != 'admin')  : ?>
            <li class="<?= ($title == lang('app.data') ? 'active' : '') ?> nav-item">
                <a href="<?= base_url('image') ?>">
                    <i class="la la-newspaper-o"></i>
                    <span class="menu-title"><?= lang('app.data') ?></span>
                </a>
            </li>
            <?php endif ?>
            <?php if (session('role') != 'user')  : ?>
            <li class="<?= ($title == lang('app.tasrihs') ? 'active' : '') ?> nav-item">
                <a href="<?= base_url('tanfidh/tasrih') ?>">
                    <i class="la la-file-image-o"></i>
                    <span class="menu-title"><?= lang('app.tasrihs') ?></span>
                </a>
            </li>
            <?php endif ?>
            <li class="<?= ($title == lang('app.whatsapp') ? 'active' : '') ?> nav-item">
                <a href="<?= base_url('whatsapp') ?>">
                    <i class="la la-whatsapp"></i>
                    <span class="menu-title"><?= lang('app.whatsapp') ?></span>
                </a>
            </li>
        </ul>
    </div>
</div>