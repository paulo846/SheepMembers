<!doctype html>
<html lang="<?= session('lang') ?>">

<head>
    <title><?= lang('Panel.msgEscolhaTransmissao') ?></title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link rel="icon" type="image/png" href="/favicon.ico" sizes="32x32">
    <link rel="apple-touch-icon" href="/favicon.ico">
    <meta name="author" content="IGR Sistemas">

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

    <style>
        body {
            font-family: "Inter", sans-serif;
            background-color: #131720;
            background-image: url("/assets/admin/img/bg.jpg");
            background-size: cover;
            background-repeat: no-repeat;
        }

        .imagem-zoom {
            transition: transform .2s ease-out;
        }

        .imagem-zoom:hover {
            transform: scale(1.1);
        }

        @media (max-width: 768px) {
            .imagem-zoom {
                width: 250px;
            }

            .text--center {
                text-align: center !important;
            }
        }

        .text--center .text--idioma {
            text-align: center !important;
            font-size: medium !important;
            color: #ffffff;
        }

        .navbar--footer {
            background: linear-gradient(to top, #000000 0%, rgba(0, 0, 0, 0) 100%) !important;
        }

        .navbar--footer span {
            font-size: 12px !important;
            color: #ffffff;
        }

        html,
        body,
        .container {
            height: 100vh;
        }
    </style>
</head>

<body>

    <div class="container d-flex align-items-center justify-content-center">
        <div class="row justify-content-center ">
            <div class="col-md-12">
                <h1 class="text-center text-white"><?= lang('Panel.msgEscolhaTransmissao') ?></h1>
            </div>
            <div class="col-sm-4 text--center">
                <a href="/lang/en">
                    <img src="/assets/img/En.png" alt="Inglês" class="img-fluid imagem-zoom text-center">
                </a>
            </div>
            <div class="col-sm-4 text--center">
                <a href="/lang/pt-BR">
                    <img src="/assets/img/Br.png" alt="Pt br" class="img-fluid imagem-zoom">
                </a>
            </div>
            <div class="col-sm-4 text--center">
                <a href="/lang/es"> 
                    <img src="/assets/img/Es.png" alt="Espanhol" class="img-fluid imagem-zoom">
                </a>
            </div>
        </div>
    </div>

    <footer>
        <nav class="navbar fixed-bottom navbar-dark bg-dark navbar--footer">
            <div class="container-fluid">
                <span><?= lang('Panel.msgRodaPe') ?></span>
            </div>
        </nav>
    </footer>
</body>

</html>