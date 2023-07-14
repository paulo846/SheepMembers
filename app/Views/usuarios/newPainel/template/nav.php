<!-- header (hidden style) -->
<header class="header header--hidden">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="header__content">
                    <button class="header__menu" type="button">
                        <span></span>
                        <span></span>
                        <span></span>
                    </button>

                    <a href="/" class="header__logo">
                        <img src="<?= ($logo) ? $logo : '/assets/admin/img/logo-1.png' ?>" alt="Sheep Members">
                    </a>
                    <div class="header__actions ml-auto">

                        <ul class="header__nav ml-auto">
                            <li class="header__nav-item">
                                <a class="header__nav-link" href="#" role="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?= lang('Panel.escolhaIdioma') ?> <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" class="bi bi-arrow-down" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd" d="M8 1a.5.5 0 0 1 .5.5v11.793l3.146-3.147a.5.5 0 0 1 .708.708l-4 4a.5.5 0 0 1-.708 0l-4-4a.5.5 0 0 1 .708-.708L7.5 13.293V1.5A.5.5 0 0 1 8 1z" />
                                    </svg></a>

                                <ul class="dropdown-menu header__nav-menu" aria-labelledby="dropdownMenu2">
                                    <li><a href="/lang/pt-BR"><?= lang('Panel.idiomas.br') ?></a></li>
                                    <li><a href="/lang/en"><?= lang('Panel.idiomas.en') ?></a></li>
                                    <li><a href="/lang/es"><?= lang('Panel.idiomas.es') ?></a></li>
                                </ul>
                            </li>
                        </ul>

                        <a href="/sair" class="header__user ml-auto" title="Ver perfil">
                            <span>
                                <?= lang('Panel.saudacao', [limitarNome(session('name'))]) ?>
                            </span>
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                <path d="M20,12a1,1,0,0,0-1-1H11.41l2.3-2.29a1,1,0,1,0-1.42-1.42l-4,4a1,1,0,0,0-.21.33,1,1,0,0,0,0,.76,1,1,0,0,0,.21.33l4,4a1,1,0,0,0,1.42,0,1,1,0,0,0,0-1.42L11.41,13H19A1,1,0,0,0,20,12ZM17,2H7A3,3,0,0,0,4,5V19a3,3,0,0,0,3,3H17a3,3,0,0,0,3-3V16a1,1,0,0,0-2,0v3a1,1,0,0,1-1,1H7a1,1,0,0,1-1-1V5A1,1,0,0,1,7,4H17a1,1,0,0,1,1,1V8a1,1,0,0,0,2,0V5A3,3,0,0,0,17,2Z" />
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- end header -->