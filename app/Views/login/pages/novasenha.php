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
        <div class="alert-success">
            TESTE DE ERRO
        </div>
        <h2>Entrar</h2>
        <form>
            <div class="input_box">
                <input required type="email" placeholder="Email">
            </div>
            <div class="input_box">
                <input required type="password" placeholder="Senha">
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