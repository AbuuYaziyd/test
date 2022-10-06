<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="content-wrapper">
        <div class="content-body">
            <!-- eCommerce statistic -->
            <?= $this->include('layouts/info') ?>
            <!--/ eCommerce statistic -->
        </div>
    </div>
</div>
<?= $this->endSection() ?>