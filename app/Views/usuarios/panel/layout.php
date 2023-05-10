<!doctype html>
<html lang="pt-BR">

<head>
    <title><?= $title ?></title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

    <link rel="stylesheet" href="/assets/css/panel/style.css?time=<?= time() ?>">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.5/croppie.min.css" integrity="sha512-zxBiDORGDEAYDdKLuYU9X/JaJo/DPzE42UubfBw9yg8Qvb2YRRIQ8v4KsGHOx2H1/+sdSXyXxLXv5r7tHc9ygg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <style>
        <?php if ($fundo) : ?>body {
            background-image: url("<?= $fundo ?>");
        }

        <?php endif; ?>
    </style>
</head>

<body>
    <?= $this->include('usuarios/panel/header'); ?>

    <main class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-2 text-center">
                <?php if ($stream_pt) : ?>
                    <div class="ratio ratio-16x9">
                        <iframe src="<?= $stream_pt ?>" title="YouTube video" allowfullscreen></iframe>
                    </div>
                <?php else : ?>
                    <p class="fs-1 text-capitalize">
                        <?= lang('Panel.stream') ?>
                    </p>
                <?php endif; ?>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-8 offset-lg-2 text-center">
                <div id="lista-avisos"></div>
            </div>
            <div class="col-lg-12">
                <?= $this->include('usuarios/panel/pages/chat') ?>
            </div>
        </div>
    </main>

    <footer>
        <nav class="navbar navbar--footer navbar-expand-lg navbar-dark bg-dark ">
            <div class="container ">
                <a class="navbar-brand text-white" href="#">
                    <img src="<?= '/assets/admin/img/logo-1.png' ?>" alt="logo" class="img-fluid logo"><br>
                    <span><?= lang('Panel.termos.direitos') ?></span>
                </a>
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0 ">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="#"><?= lang('Panel.termos.suporte') ?></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#"><?= lang('Panel.termos.uso') ?></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#"><?= lang('Panel.termos.privacidade') ?></a>
                    </li>
                </ul>
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

    <script src="/assets/js/script.js?v=<?= time() ?>"></script>

    <script>
        /* $uploadCrop = $('#upload-demo').croppie({
            enableExif: true,
            viewport: {
                width: 200,
                height: 200,
                type: 'square'
            },
            boundary: {
                width: 200,
                height: 200
            }
        });

        $uploadCrop.croppie('bind', {
            url: '/assets/img/200.png',
        });

    Carregue a imagem no Croppie quando selecionada pelo usuário
        $('#imagem').on('change', function() {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#upload-demo').croppie('bind', {
                    url: e.target.result
                });
            }
            reader.readAsDataURL(this.files[0]);
        });*/
    </script>





    <!--Start of Tawk.to Script
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
    </script>-->
    <!--End of Tawk.to Script-->
</body>

</html>