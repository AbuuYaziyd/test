<?= $this->extend('frontend/main') ?>
<?= $this->section('content') ?>
<div class="app-content container center-layout mt-2">
    <div class="content-overlay"></div>
    <div class="content-wrapper">
        <div class="content-header row"> </div>
        <div class="content-body">
            <!-- Links -->
            <?= $this->include('layouts/links') ?>
            <!--/ Links -->
        </div>
    </div>
</div>
<?= $this->endSection() ?>