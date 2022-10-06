<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>


<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <?= $this->include('user/info') ?>
    </div>
</div>

<?= $this->endSection() ?>