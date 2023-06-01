<?= $this->extend('usuarios/newPainel/template/template') ?>
<?= $this->section('content') ?>
<!-- head -->
<section class="section section--head">
    <div class="container">
        <div class="row">
            <div class="col-12 col-xl-6">
                <h1 class="section__title section__title--head">Perfil</h1>
            </div>

            <div class="col-12 col-xl-6">
                <ul class="breadcrumb">
                    <li class="breadcrumb__item"><a href="/">Home</a></li>
                    <li class="breadcrumb__item breadcrumb__item--active">Perfil</li>
                </ul>
            </div>
        </div>
    </div>
</section>
<!-- end head -->

<!-- profile -->
<div class="catalog catalog--page">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="profile" style="height: 80px !important;">
                    <div class="profile__user">
                        <div class="profile__avatar">
                            <img src="img/avatar.svg" alt="">
                        </div>
                        <div class="profile__meta">
                            <h3><?= session('email') ?></h3>
                            <span>Sheep ID: <?= session('idUser') ?></span>
                        </div>
                    </div>
                    <a href="/sair" class="profile__logout">
                        <span>Sair</span>
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                            <path d="M4,12a1,1,0,0,0,1,1h7.59l-2.3,2.29a1,1,0,0,0,0,1.42,1,1,0,0,0,1.42,0l4-4a1,1,0,0,0,.21-.33,1,1,0,0,0,0-.76,1,1,0,0,0-.21-.33l-4-4a1,1,0,1,0-1.42,1.42L12.59,11H5A1,1,0,0,0,4,12ZM17,2H7A3,3,0,0,0,4,5V8A1,1,0,0,0,6,8V5A1,1,0,0,1,7,4H17a1,1,0,0,1,1,1V19a1,1,0,0,1-1,1H7a1,1,0,0,1-1-1V16a1,1,0,0,0-2,0v3a3,3,0,0,0,3,3H17a3,3,0,0,0,3-3V5A3,3,0,0,0,17,2Z"></path>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <!-- content tabs -->
        <div class="row">
            <div class="col-12">
                <div class="sign__wrap">
                    <div class="row">
                        <!-- details form -->
                        <div class="col-12 col-lg-6">
                            <form action="#" class="sign__form sign__form--profile sign__form--first">
                                <div class="row">
                                    <div class="col-12">
                                        <h4 class="sign__title">Detalhes do perfil</h4>
                                    </div>
                                    <div class="col-12 col-md-6 col-lg-12 col-xl-6">
                                        <div class="sign__group">
                                            <label class="sign__label" for="firstname">Primeiro nome</label>
                                            <input id="firstname" type="text" name="firstname" class="sign__input" placeholder="John">
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 col-lg-12 col-xl-6">
                                        <div class="sign__group">
                                            <label class="sign__label" for="lastname">Segundo nome</label>
                                            <input id="lastname" type="text" name="lastname" class="sign__input" placeholder="Doe">
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 col-lg-12 col-xl-6">
                                        <div class="sign__group">
                                            <label class="sign__label" for="email">Email</label>
                                            <input id="email" type="text" name="email" class="sign__input" placeholder="email@email.com">
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 col-lg-12 col-xl-6">
                                        <div class="sign__group">
                                            <label class="sign__label" for="phone">Telefone/WhatsApp</label>
                                            <input id="phone" type="text" name="phone" class="sign__input" placeholder="(62) 9 9999-9999">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <button class="sign__btn" type="button">Salvar</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!-- end details form -->

                        <!-- password form -->
                        <div class="col-12 col-lg-6">
                            <form action="#" class="sign__form sign__form--profile">
                                <div class="row">
                                    <div class="col-12">
                                        <h4 class="sign__title">Alterar senha <br> <small>Você precisa estar com seu número de whatsapp atualizado.</small></h4>
                                    </div>

                                    <div class="col-12">
                                        <div class="sign__group">
                                            <label class="sign__label" for="oldpass">Senha antiga</label>
                                            <input id="oldpass" type="password" name="oldpass" class="sign__input">
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="sign__group">
                                            <label class="sign__label" for="newpass">Nova senha</label>
                                            <input id="newpass" type="password" name="newpass" class="sign__input">
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="sign__group">
                                            <label class="sign__label" for="confirmpass">Confirme nova senha</label>
                                            <input id="confirmpass" type="password" name="confirmpass" class="sign__input">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <button class="sign__btn" type="button">Mudar</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!-- end password form -->
                    </div>
                </div>
            </div>
        </div>
        <!-- end content tabs -->
    </div>
</div>
<!-- end profile -->
<?= $this->endSection() ?>

<?= $this->section('js') ?>
<script>
    alert('teste');
</script>
<?= $this->endSection() ?>
