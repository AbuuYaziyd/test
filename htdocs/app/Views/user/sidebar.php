<div class="main-menu menu-fixed menu-dark menu-accordion menu-shadow" data-scroll-to-active="true">
	<div class="main-menu-content">
		<ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
			<li class="<?= ($title == lang('app.dashboard') ? 'active' : '') ?> nav-item"><a href="<?= base_url('user') ?>"><i class="la la-home"></i><span class="menu-title" data-i18n="eCommerce"><?= lang('app.dashboard') ?></span></a>
			</li>
			<li class="<?= ($title == lang('app.category') ? 'active' : '') ?> nav-item"><a href="<?= base_url('category') ?>"><i class="la la-lightbulb-o"></i><span class="menu-title" data-i18n="eCommerce"><?= lang('app.categories') ?></span></a>
			</li>
			<li class="<?= ($title == lang('app.books') ? 'active' : '') ?> nav-item"><a href="<?= base_url('book') ?>"><i class="la la-book"></i><span class="menu-title" data-i18n="eCommerce"><?= lang('app.books') ?></span></a>
			</li>
			<li class=" nav-item"><a href="#"><i class="la la-television"></i><span class="menu-title" data-i18n="Templates">Templates</span></a>
				<ul class="menu-content">
					<li><a class="menu-item" href="#"><i></i><span data-i18n="Vertical">Vertical</span></a>
						<ul class="menu-content">
							<li><a class="menu-item" href="../vertical-menu-template"><i></i><span data-i18n="Classic Menu">Classic Menu</span></a>
							</li>
							<li><a class="menu-item" href="../vertical-modern-menu-template"><i></i><span>Modern Menu</span></a>
							</li>
							<li><a class="menu-item" href="../vertical-collapsed-menu-template"><i></i><span data-i18n="Collapsed Menu">Collapsed Menu</span></a>
							</li>
							<li><a class="menu-item" href="../vertical-compact-menu-template"><i></i><span data-i18n="Compact Menu">Compact Menu</span></a>
							</li>
							<li><a class="menu-item" href="../vertical-content-menu-template"><i></i><span data-i18n="Content Menu">Content Menu</span></a>
							</li>
							<li><a class="menu-item" href="../vertical-overlay-menu-template"><i></i><span data-i18n="Overlay Menu">Overlay Menu</span></a>
							</li>
						</ul>
					</li>
					<li><a class="menu-item" href="#"><i></i><span data-i18n="Horizontal">Horizontal</span></a>
						<ul class="menu-content">
							<li><a class="menu-item" href="../horizontal-menu-template"><i></i><span data-i18n="Classic">Classic</span></a>
							</li>
							<li><a class="menu-item" href="../horizontal-menu-template-nav"><i></i><span data-i18n="Full Width">Full Width</span></a>
							</li>
						</ul>
					</li>
				</ul>
			</li>
			<li class=" navigation-header"><span data-i18n="Admin Panels">Admin Panels</span><i class="la la-ellipsis-h" data-toggle="tooltip" data-placement="right" data-original-title="Admin Panels"></i>
			</li>
			<li class=" nav-item"><a href="../ecommerce-menu-template" target="_blank"><i class="la la-shopping-cart"></i><span class="menu-title" data-i18n="eCommerce">eCommerce</span></a>
			</li>
			<li class=" nav-item"><a href="../travel-menu-template" target="_blank"><i class="la la-plane"></i><span class="menu-title" data-i18n="Travel &amp; Booking">Travel &amp; Booking</span></a>
			</li>
			<li class=" nav-item"><a href="../hospital-menu-template" target="_blank"><i class="la la-stethoscope"></i><span class="menu-title" data-i18n="Hospital">Hospital</span></a>
			</li>
		</ul>
	</div>
</div>