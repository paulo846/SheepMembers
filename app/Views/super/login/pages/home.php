<?= $this->extend('super/login/layout') ?>
<?= $this->section('meta') ?>
<title><?= $title ?></title>
<?= $this->endSection() ?>

<?= $this->section('css') ?>

<?= $this->endSection() ?>


<?= $this->section('form') ?>

<div class="header">
    <div class="logo">
        <a href="#">
            <img src="/assets/admin/img/logo-1.png" alt="logo">
        </a>
    </div>
</div>

<div class="login_body">
    <div class="login_box">
    <?= (session()->getFlashdata('error')) ? '<div class="alert alert-danger">'.session()->getFlashdata('error'). '</div>' : "" ; ?>
        
        <h2>Super-admin</h2>
        <?= form_open('superadmin/auth') ?>

            <div class="input_box">
                <input required type="email" name="email" placeholder="Email">
            </div>

            <div class="input_box">
                <input required type="password" name="password" placeholder="Senha">
            </div>

            <div>
                <button class="submit">
                    Entrar
                </button>
            </div>
        </form>

        <div class="support">
            <div class="help">
                <a href="#">
                    Precisa de ajuda?
                </a>
                <a href="/recover">
                    Recuperar senha
                </a>
            </div>
        </div>

        <div class="login_footer">
            <div class="terms" style="text-align: center;">
                <p>Site protegido, otimizado e administrado por <a href="#">conference-on</a></p>
                <?= site_url() ; ?>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>