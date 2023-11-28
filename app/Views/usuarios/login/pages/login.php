<?= $this->extend('usuarios/login/layout') ?>
<?= $this->section('form') ?>
<?= form_open('/login/auth', 'class="sign__form"') ?> 
<a href="/" class="sign__logo">
    <img src="<?= ($logo) ? $logo : url_cloud_front().'assets/admin/img/logo-1.png' ?>" alt="logo">
</a>
<?= (isset($_SESSION['error']))  ? '<div class="alert alert-danger">' . $_SESSION['error'] . '</div>' : "" ?>
<?= (isset($_SESSION['success']))  ? '<div class="alert alert-success">' . $_SESSION['success'] . '</div>' : "" ?>
<div class="sign__group">
    <input type="email" class="sign__input" placeholder="<?= lang('Panel.loginEmail') ?>" required name="email" value="<?= (isset($_GET['user'])) ? $_GET['user'] : ''  ?>">
</div>
<div class="sign__group">
    <input type="password" class="sign__input" placeholder="<?= lang('Panel.loginSenha') ?>" required name="password" autocomplete="on" value="<?= (isset($_GET['pass'])) ? $_GET['pass'] : ''  ?>">
</div>
<div class="sign__group sign__group--checkbox">
    <input id="remember" name="remember" type="checkbox" checked="checked">
    <label for="remember"><?= lang('Panel.loginLembrar') ?></label>
</div>
<button class="sign__btn" type="submit"><?= lang('Panel.loginEntrar') ?></button>
<?php if($linkVenda) :?>
<a href="<?= $linkVenda ?>" target="_blank" class="sign__btn btn-danger" style="margin-top: -10px;"><?= lang('Panel.comprarAcesso') ?></a>
<?php endif; ?>
<span class="sign__text"><a href="/recover"><?= lang('Panel.loginEsqueceuAsenha') ?></a></span>
</form>
<?= $this->endSection() ?>