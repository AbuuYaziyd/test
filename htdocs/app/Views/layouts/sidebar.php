<div class="main-menu menu-fixed menu-dark menu-accordion menu-shadow" data-scroll-to-active="true">
	<div class="main-menu-content">
		<ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
			<li class="<?= ($title == lang('app.dashboard') ? 'active' : '') ?> nav-item"><a href="<?= base_url('user') ?>"><i class="la la-home"></i><span class="menu-title" data-i18n="eCommerce"><?= lang('app.dashboard') ?></span></a>
			</li>
			<li class="<?= ($title == lang('app.category') ? 'active' : '') ?> nav-item"><a href="<?= base_url('category') ?>"><i class="la la-lightbulb-o"></i><span class="menu-title" data-i18n="eCommerce"><?= lang('app.categories') ?></span></a>
			</li>
			<li class="<?= ($title == lang('app.subcats') ? 'active' : '') ?> nav-item"><a href="<?= base_url('subcat') ?>"><i class="la la-certificate"></i><span class="menu-title" data-i18n="eCommerce"><?= lang('app.subcats') ?></span></a>
			</li>
			<li class="<?= ($title == lang('app.authors') ? 'active' : '') ?> nav-item"><a href="<?= base_url('author') ?>"><i class="icon icon-users"></i><span class="menu-title" data-i18n="eCommerce"><?= lang('app.authors') ?></span></a>
			</li>
			<li class="<?= ($title == lang('app.books') ? 'active' : '') ?> nav-item"><a href="<?= base_url('book') ?>"><i class="la la-book"></i><span class="menu-title" data-i18n="eCommerce"><?= lang('app.books') ?></span></a>
			</li>
			<li class="<?= ($title == lang('app.sharhs') ? 'active' : '') ?> nav-item"><a href="<?= base_url('sharh') ?>"><i class="icon icon-graduation"></i><span class="menu-title" data-i18n="eCommerce"><?= lang('app.sharhs') ?></span></a>
			</li>
		</ul>
	</div>
</div>