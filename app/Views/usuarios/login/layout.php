<!DOCTYPE html>
<html lang="<?= service('language')->getLocale() ?>">

<head>
    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-CDSN5Q7JM1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());
        gtag('config', 'G-CDSN5Q7JM1');
    </script>
    <?= $analytics ?>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- CSS -->
    <link rel="stylesheet" href="<?= url_cloud_front() ?>assets/admin/css/bootstrap-reboot.min.css">
    <link rel="stylesheet" href="<?= url_cloud_front() ?>assets/admin/css/bootstrap-grid.min.css">
    <link rel="stylesheet" href="<?= url_cloud_front() ?>assets/admin/css/magnific-popup.css">
    <link rel="stylesheet" href="<?= url_cloud_front() ?>assets/admin/css/select2.min.css">
    <link rel="stylesheet" href="<?= url_cloud_front() ?>assets/admin/css/admin.css">
    <!-- Favicons -->

    <!-- Favicons -->
    <link rel="icon" type="image/png" href="<?= ($logo) ? $logo : url_cloud_front() . 'favicon.ico' ?>" sizes="32x32">
    <link rel="apple-touch-icon" href="<?= ($logo) ? $logo : url_cloud_front() . 'favicon.ico' ?>">
    <meta name="description" content="<?= $description ?>">
    <meta name="keywords" content="<?= $name ?>">
    <meta name="author" content="SHEEP MEMBERS">
    <title><?= $title ?></title>
    <style>
        .section--bg::before {
            content: '';
            background-color: rgba(0, 0, 0, 0.6);
            width: 100%;
            height: 100%;
            position: absolute;
            top: 0;
            bottom: 0;
            left: 0;
            right: 0;
        }

        .sign__form {
            background-color: rgba(0, 0, 0, 0.6) !important;
        }

        .alert {
            padding: 15px;
            text-align: center;
            font-weight: bold;
            width: 100%;
            margin-top: 10px;
            margin-bottom: 10px;
            border-radius: 10px;
            font-size: 12px;
        }

        .alert-danger {
            background-color: red;
            color: #ffffff;
        }

        .alert-success {
            background-color: green;
            color: #ffffff;
        }
    </style>

    <?= $this->renderSection('css') ?>
</head>

<body>
    <!-- sign in -->
    <div class="sign section--bg" data-bg="<?= ($fundo) ? $fundo : url_cloud_front() . 'assets/admin/img/bg.jpg' ?>">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="sign__content">
                        <!-- authorization form -->
                        <?= $this->renderSection('form') ?>
                        <!-- end authorization form -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?= $this->include('includes/escolhaIdioma.php') ?>
    <!-- end sign in -->
    <!-- JS -->
    <script src="<?= url_cloud_front() ?>assets/admin/js/jquery-3.5.1.min.js"></script>
    <script src="<?= url_cloud_front() ?>assets/admin/js/bootstrap.bundle.min.js"></script>
    <script src="<?= url_cloud_front() ?>assets/admin/js/jquery.magnific-popup.min.js"></script>
    <script src="<?= url_cloud_front() ?>assets/admin/js/smooth-scrollbar.js"></script>
    <script src="<?= url_cloud_front() ?>assets/admin/js/select2.min.js"></script>
    <script src="<?= url_cloud_front() ?>assets/admin/js/admin.js"></script>
</body>

</html>