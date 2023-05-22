<?= $this->extend('newSuper/template/template') ?>
<?= $this->section('linkcss') ?>
<?= $this->endSection() ?>
<?= $this->section('css') ?>
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
<?= $this->endSection() ?>
<?= $this->section('content') ?>
<?= view('newSuper/template/title', ['title' => $title, 'map' => 'Ações']) ?>

<?= $this->endSection() ?>