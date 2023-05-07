<?= $this->extend('login/layout') ?>


<?= $this->section('css') ?>
<style>
    body {
        background-image: url(/assets/img/background.jpg) !important;
        background-repeat: no-repeat;
        background-position: center center;
        background-attachment: fixed;
        background-size: cover;
    }
</style>
<?= $this->endSection() ?>


<?= $this->section('form') ?>

<div class="header">
    <div class="logo">
        <a href="#">
            <img src="/assets/img/netflixlogo.png" alt="">
        </a>
    </div>
</div>

<div class="login_body">
    <div class="login_box">
        <h2>Informe seu email</h2>
        <?= form_open() ?>
            <div class="input_box">
                <input required type="email" placeholder="Email">
            </div>
            <div>
                <button class="submit">
                    RECUPERAR
                </button>
            </div>
        </form>

        <div class="support">
            <div class="help">
                <a href="#">
                    Precisa de ajuda?
                </a>
            </div>
        </div>

        <div class="login_footer">
            <div class="terms">
                <p>Esta página é protegida pelo Google reCAPTCHA para garantir que você não é um robô. <a href="#">Saiba mais</a></p>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>