<?= $this->extend('usuarios/login/layout') ?>
<?= $this->section('css') ?>
<style>
    .alert {
        padding: 15px;
        text-align: center;
        font-weight: bold;
        width: 100%;
        margin-top: 10px;
        margin-bottom: 10px;
        border-radius: 10px;
    }
    .alert-danger {
        background-color: red;
        color: #ffffff;
    }
</style>
<?= $this->endSection() ?>
<?= $this->section('form') ?>
<?= form_open('/login/auth', 'class="sign__form"') ?>
<a href="/" class="sign__logo">
    <img src="<?= ($logo) ? $logo : url_cloud_front().'assets/admin/img/logo-1.png' ?>" alt="logo">
</a>
<?= (isset($_SESSION['error']))  ? '<div class="alert alert-danger">' . $_SESSION['error'] . '</div>' : "" ?>
<div class="sign__group">
    <input type="email" class="sign__input" placeholder="<?= lang('Panel.loginEmail') ?>" required name="email">
</div>
<div class="sign__group">
    <input type="password" class="sign__input" placeholder="<?= lang('Panel.loginSenha') ?>" required name="password" autocomplete="on">
</div>
<div class="sign__group sign__group--checkbox">
    <input id="remember" name="remember" type="checkbox" checked="checked">
    <label for="remember"><?= lang('Panel.loginLembrar') ?></label>
</div>
<button class="sign__btn" type="submit"><?= lang('Panel.loginEntrar') ?></button>
<span class="sign__text"><a href="/recover"><?= lang('Panel.loginEsqueceuAsenha') ?></a></span>
</form>
<?= $this->endSection() ?>