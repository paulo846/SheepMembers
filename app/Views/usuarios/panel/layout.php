<!doctype html>
<html lang="pt-BR">

<head>
    <title><?= $title ?></title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.5/croppie.min.css" integrity="sha512-zxBiDORGDEAYDdKLuYU9X/JaJo/DPzE42UubfBw9yg8Qvb2YRRIQ8v4KsGHOx2H1/+sdSXyXxLXv5r7tHc9ygg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Favicons -->
    <link rel="icon" type="image/png" href="<?= ($logo) ? $logo : '/assets/admin/img/logo-1.png' ?>" sizes="32x32">
    <link rel="apple-touch-icon" href="<?= ($logo) ? $logo : '/assets/admin/img/logo-1.png' ?>">
    <meta name="description" content="<?= $description ?>">
    <meta name="keywords" content="<?= $name ?>">
    <meta name="author" content="SHEEP MEMBERS">

    <style>
        body {
            background-color: #131720;
            background-image: url("/assets/admin/img/bg.jpg");
            background-size: cover;
            background-repeat: no-repeat;
        }

        body::before {
            content: "";
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100vh;
            background-color: rgba(0, 0, 0, 0.5);
        }

        header .navbar--header {
            background: linear-gradient(to top, rgba(0, 0, 0, 0) 0%, #000000 100%) !important;
            background-image: -webkit-linear-gradient(top, rgba(0, 0, 0, 0) 0%, #000000 100%);
        }

        header .navbar--header .logo {
            width: 100px;
        }

        #container {
            height: 60vh;
            margin-top: 5%;
            margin-bottom: 5%;
        }

        #container iframe {
            border-radius: 10px;
        }

        footer .navbar--footer {
            background: linear-gradient(to top, rgba(0, 0, 0, 0) 0%, rgba(0, 0, 0, 0) 100%) !important;
        }

        footer .navbar--footer span,

        footer .navbar--footer ul {
            font-size: 10px;
            font-style: normal;
            font-weight: 300;
        }

        footer .navbar--footer .logo {
            width: 90px;
        }

        footer .navbar--footer .footer--text {
            font-size: small;
            color: #fff;
            font-weight: 300;
        }

        <?php if ($fundo) : ?>body {
            background-image: url("<?= $fundo ?>") !important;
        }

        <?php endif; ?>
    </style>
</head>

<body>
    <?= $this->include('usuarios/panel/header'); ?>

    <main class="container" id="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-2 text-center">
                <?php if ($stream_pt) : ?>
                    <div class="ratio ratio-16x9">
                        <iframe class="shadow-lg p-3 mb-5 bg-body rounded" src="<?= $stream_pt ?>" title="YouTube video" allowfullscreen></iframe>
                    </div>
                <?php else : ?>
                    <div class="card">
                        <div class="card-body">
                            <p class="fs-1 text-capitalize">
                                <?= lang('Panel.stream') ?>
                            </p>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-8 offset-lg-2 text-center">
                <div id="lista-avisos"></div>
            </div>
        </div>
    </main>

    <footer>
        <nav class="navbar navbar--footer navbar-expand-lg navbar-dark bg-dark ">
            <div class="container ">
                <a class="navbar-brand text-white" href="#">
                    <img src="<?= '/assets/admin/img/logo-1.png' ?>" alt="logo" class="img-fluid logo"><br>
                    <span><?= lang('Panel.termos.direitos') ?><a href="#"><?= lang('Panel.termos.suporte') ?></a><a href="#"><?= lang('Panel.termos.uso') ?></a><a href="#"><?= lang('Panel.termos.privacidade') ?></a></span> 
                </a>
            </div>
        </nav>
    </footer>


    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
    </script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.js"></script>



    <script src="https://malsup.github.io/jquery.form.js"></script>

    <script>
        var site = "<?= site_url() ?>";
        var stream = "<?= $id ?>";
        var client = "<?= $id ?>";
    </script>

    <script>
        function ouvirAvisos() {
            $.getJSON(site + "client/api/avisos/" + stream, (function(res) {
                var $listaAvisos = $("#lista-avisos");

                $listaAvisos.empty(), $.each(res, (function(_i, aviso) {
                    if (aviso.text) {
                        $listaAvisos.html('<div class="alert alert-danger mt-3">' + aviso.text + '</div>')
                    } else {
                        $listaAvisos.empty();
                    }
                }))
            }))
        }

        $(document).ready(function() {
            ouvirAvisos(), setInterval(ouvirAvisos, 5e3);
        });
    </script>
    <!--Start of Tawk.to Script-->
    <script type="text/javascript">
        var Tawk_API = Tawk_API || {},
            Tawk_LoadStart = new Date();
        (function() {
            var s1 = document.createElement("script"),
                s0 = document.getElementsByTagName("script")[0];
            s1.async = true;
            s1.src = 'https://embed.tawk.to/642db75b4247f20fefea075e/1gt998fmu';
            s1.charset = 'UTF-8';
            s1.setAttribute('crossorigin', '*');
            s0.parentNode.insertBefore(s1, s0);
        })();
    </script>
    <!--End of Tawk.to Script-->
</body>

</html>