<nav class="header-navbar navbar-expand-md navbar navbar-with-menu navbar-without-dd-arrow fixed-top navbar-semi-light bg-info navbar-shadow">
    <div class="navbar-wrapper">
        <div class="navbar-header">
            <ul class="nav navbar-nav flex-row">
                <li class="nav-item mobile-menu d-md-none mr-auto"><a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i class="ft-menu font-large-1"></i></a></li>
                <li class="nav-item"><a class="navbar-brand" href="<?= base_url() ?>"><img class="brand-logo" alt="modern admin logo" src="<?= base_url('app-assets/images/logo/logo.png') ?> ">
                        <h3 class="brand-text"><?= APP_NAME ?></h3>
                    </a></li>
                <li class="nav-item d-md-none"><a class="nav-link open-navbar-container" data-toggle="collapse" data-target="#navbar-mobile"><i class="la la-ellipsis-v"></i></a></li>
            </ul>
        </div>
        <div class="navbar-container content">
            <div class="collapse navbar-collapse" id="navbar-mobile">
                <ul class="nav navbar-nav mr-auto float-left">
                    <li class="nav-item d-none d-md-block"><a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i class="ft-menu"></i></a></li>
                </ul>
                <ul class="nav navbar-nav float-right">
                    <li class="dropdown dropdown-user nav-item">
                        <a class="dropdown-toggle nav-link dropdown-user-link" href="#" data-toggle="dropdown">
                            <span class="mr-1 user-name text-bold-700"><?= $_SESSION['name'] ?></span>
                            <span class="avatar avatar-online">
                                <img src="https://ui-avatars.com/api/?name=<?= $_SESSION['name'] ?>&background=random&length=1&font-size=0.7" alt=" avatar">
                                <i></i>
                            </span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="#"><i class="ft-user"></i> <b class="badge badge-secondary badge-glow"><?= $_SESSION['malaf'] ?></b></a>
                            <a class="dropdown-item" href="<?= base_url('user/profile/' . $_SESSION['id']) ?>"><i class="ft-clipboard"></i> <?= lang('app.profile') ?></a>
                            <a class="dropdown-item" href="<?= base_url('change/password') ?>"><i class="ft-check-square"></i> <?= lang('app.passchange') ?></a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="<?= base_url('logout') ?>"><i class="ft-power"></i> <?= lang('app.logout') ?></a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>