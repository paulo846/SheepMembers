<!doctype html>
<html lang="pt-BR">

<head>
    <title><?= $title ?></title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.plyr.io/3.6.2/plyr.css" />

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
            background-color: rgba(0, 0, 0, 0.8);
        }

        header .navbar--header {
            background: linear-gradient(to top, rgba(0, 0, 0, 0) 0%, #000000 100%) !important;
            background-image: -webkit-linear-gradient(top, rgba(0, 0, 0, 0) 0%, #000000 100%);
        }

        header .navbar--header .logo {
            width: 100px;
        }

        /* #container {
            height: 60vh;
            margin-top: 1%;
            margin-bottom: 20%;
        }*/
        /*
        #container iframe {
            border-radius: 10px;
        }
        */

        footer {
            margin-top: 100px;
            padding-top: 50px;
        }

        footer .navbar--footer {
            background: linear-gradient(to top, rgba(0, 0, 0, 0) 0%, rgba(0, 0, 0, 0) 100%) !important;
        }

        footer .navbar--footer a span {
            font-size: 10px;
            font-style: normal;
            font-weight: 300;
            color: #fff !important;

            bottom: 0px;
        }

        a {
            text-decoration: none !important;
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

    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

</head>
<?= $analytics ?>

<body>
    <?= $this->include('usuarios/panel/header'); ?>
    <main class="container mt-3" id="container">
        <!-- <div class="row">
            <div class="col-md-6 offset-md-3 text-center">
                <?php if ($stream_pt) : ?>
                    <div class="ratio ratio-21x9 plyr__video-embed" id="player">
                        <iframe src="<?= $stream_pt ?>" allowfullscreen allowtransparency>
                        </iframe>
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
        </div> -->
        <div class="row">
            <div class="col-lg-12 text-center">
                <div id="lista-avisos"></div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-6">
                <div class="card bg-dark">
                    <div class="card-header">
                        <h4 class="text-white">Sexta-feira | 12.05.23</h4>
                    </div>
                    <div class="card-body p-0">
                        <!-- <div class="plyr__video-embed" id="player">
                            <iframe src="https://www.youtube.com/embed/gFiJs8okVRA" allowfullscreen allowtransparency></iframe>
                            </div>-->
                        <div id="player" data-plyr-provider="youtube" data-plyr-embed-id="gFiJs8okVRA"></div>

                    </div>
                </div>

            </div>
            <div class="col-lg-6">
                <div class="card bg-dark">
                    <div class="card-header">
                        <h4 class="text-white">Sábado - 1ª parte</h4>
                    </div>
                    <div class="card-body p-0">
                        <!--<div class="plyr__video-embed" id="player1">
                            <iframe src="https://www.youtube.com/embed/l-G-KphxiOI" allowfullscreen allowtransparency></iframe>
                        </div> -->
                        <div id="player1" data-plyr-provider="youtube" data-plyr-embed-id="kcPxNcgbemc"></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-lg-6">
                <div class="card bg-dark">
                    <div class="card-header">
                        <h4 class="text-white">Sábado - 2ª parte</h4>
                    </div>
                    <div class="card-body p-0">
                        <!-- <div class="plyr__video-embed player2" id="player2">
                            <iframe src="https://www.youtube.com/embed/ku7NzsHMc7o" allowfullscreen allowtransparency></iframe>
                        </div>-->
                        <div id="player2" data-plyr-provider="youtube" data-plyr-embed-id="ueinlyALmwo"></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card bg-dark">
                    <div class="card-header">
                        <h4 class="text-white">Sábado - 3ª parte</h4>
                    </div>
                    <div class="card-body p-0">
                        <!-- <div class="plyr__video-embed player3" id="player3">
                            <iframe src="https://www.youtube.com/embed/NGvkD76VGS8" allowfullscreen allowtransparency></iframe>
                        </div>-->
                        <div id="player3" data-plyr-provider="youtube" data-plyr-embed-id="o-tYa5DUds8"></div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <footer>
        <nav class="navbar navbar--footer navbar-expand-lg navbar-dark bg-dark ">
            <div class="container ">
                <a class="text-white" href="#">
                    <img src="<?= '/assets/admin/img/logo-1.png' ?>" alt="logo" class="img-fluid logo"><br>
                    <span>
                        <?= lang('Panel.termos.direitos') ?> <br>
                        Meu IP: <?php $request = service('request');
                                echo $request->getIPAddress(); ?>
                    </span>
                </a>
            </div>
        </nav>
    </footer>

    <script src="https://cdn.plyr.io/3.6.2/plyr.js"></script>
    <script>
        const player = new Plyr('#player');
        const player1 = new Plyr('#player1');
        const player2 = new Plyr('#player2');
        const player3 = new Plyr('#player3');
    </script>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.js"></script>
    <script src="https://malsup.github.io/jquery.form.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <script type="text/javascript">
        var site = "<?= site_url() ?>";
        var stream = "<?= $id ?>";
        var client = "<?= session('idUser') ?>";


        $('.form_update').ajaxForm({
            dataType: 'json',

            // Configuração para adicionar barra de progresso
            beforeSubmit: function() {
                toastr.warning('Enviando dados!!!')
            },

            success: function(response) {
                // Ação a ser executada em caso de sucesso
                toastr.success('Perfil atualizado com sucesso!!!')
            },
            error: function(response) {
                // Ação a ser executada em caso de erro
                toastr.error('Houve um erro ao atualiza, entre em contato com o suporte!')
                console.log(response)
            }
        });


        function logIn() {
            $.ajax({
                type: "get",
                url: site + "client/api/verify/" + client,
                dataType: "json",
                success: function(res) {
                    console.log(res);
                },
                error: function(xhr, status, error) {
                    console.log("Ocorreu um erro na requisição: " + status + " - " + error);
                    window.location.reload();
                }
            });
        }


        function ouvirAvisos() {
            $.getJSON(site + "client/api/avisos/" + stream, (function(res) {
                var $listaAvisos = $("#lista-avisos");

                $listaAvisos.empty(), $.each(res, (function(_i, aviso) {
                    if (aviso.text) {
                        $listaAvisos.html('<div class="alert alert-danger bg-danger text-white mt-3 p-1">' + aviso.text + '</div>')
                    } else {
                        $listaAvisos.empty();
                    }
                }))
            }))
        }

        $(document).ready(function() {
            logIn(), setInterval(logIn, 5e3), ouvirAvisos(), setInterval(ouvirAvisos, 5e3);
        });
    </script>
    <!--  <script type="text/javascript">
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
    </script>-->
</body>

</html>