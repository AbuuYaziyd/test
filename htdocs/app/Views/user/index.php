<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="content-body">
            <div class="content-body">
                <!-- Links -->
                <?= $this->include('layouts/links') ?>
                <!--/ Links -->
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>