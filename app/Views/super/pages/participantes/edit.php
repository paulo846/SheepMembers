<?= $this->extend('super/layout') ?>
<?= $this->section('content') ?>
<!-- main title -->
<div class="col-12">
    <div class="main__title">
        <h2><?= (isset($title)) ? $title : 'Stream' ?></h2>
        <a href="add-item.html" class="main__title-link">add item</a>
    </div>
</div>
<?= $this->endSection() ?>