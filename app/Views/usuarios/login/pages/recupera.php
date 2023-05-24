<?= $this->extend('usuarios/login/layout') ?>
<?= $this->section('form') ?>

<?= form_open('recover', 'class="sign__form"') ?>
    <input type="hidden" name="idEmpresa" value="<?= $id_empresa ?>">
    <a href="/" class="sign__logo">
        <img src="<?= ($logo) ? $logo : url_cloud_front().'assets/admin/img/logo-1.png' ?>" alt="">
    </a>
    <div class="sign__group">
        <input name="email" id="email" type="email" class="sign__input" placeholder="<?= lang('Panel.loginEmail') ?>" required>
    </div>
    <button class="sign__btn" type="submit"><?= lang('Panel.recuperarBtn') ?>
</button>
    <span class="sign__text"><a href="/login"><?= lang('Panel.loginVoltar') ?></a></span>
</form>
<?= $this->endSection() ?>