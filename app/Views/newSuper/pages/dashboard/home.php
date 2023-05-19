<?= $this->extend('newSuper/template/template') ?>
<?= $this->section('content') ?>
<?= view('newSuper/template/title', ['title' => $title, 'map' => 'Home']) ?>

<?= $this->endSection() ?>

<?= $this->section('js') ?>

<?= $this->endSection() ?>