<?= $this->extend('usuarios/login/layout') ?>
<?= $this->section('form') ?>
<form action="#" class="sign__form">
    <a href="/" class="sign__logo">
        <img src="<?= ($logo) ? $logo : url_cloud_front().'assets/admin/img/logo-1.png' ?>" alt="">
    </a>
    <div class="sign__group">
        <input type="email" class="sign__input" placeholder="<?= lang('Panel.loginEmail') ?>" required name="email">
    </div>
    <button class="sign__btn" type="button"><?= lang('Panel.recuperarBtn') ?></button>
    <span class="sign__text"><a href="/login"><?= lang('Panel.loginVoltar') ?></a></span>
</form>
<?= $this->endSection() ?>