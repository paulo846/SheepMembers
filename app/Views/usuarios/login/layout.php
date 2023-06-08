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

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <!-- CSS -->
    <link rel="stylesheet" href="<?= url_cloud_front() ?>assets/admin/css/bootstrap-reboot.min.css">
    <link rel="stylesheet" href="<?= url_cloud_front() ?>assets/admin/css/bootstrap-grid.min.css">
    <link rel="stylesheet" href="<?= url_cloud_front() ?>assets/admin/css/magnific-popup.css">
    <link rel="stylesheet" href="<?= url_cloud_front() ?>assets/admin/css/select2.min.css">
    <link rel="stylesheet" href="<?= url_cloud_front() ?>assets/admin/css/admin.css">
    <!-- Favicons -->

    <!-- Favicons -->
    <link rel="icon" type="image/png" href="<?= ($favicon) ? $favicon : url_cloud_front() . 'favicon.ico' ?>" sizes="32x32">
    <link rel="apple-touch-icon" href="<?= ($favicon) ? $favicon : url_cloud_front() . 'favicon.ico' ?>">
    <meta name="description" content="<?= $description ?>">
    <meta name="keywords" content="<?= $name ?>">
    <meta name="author" content="SHEEP MEMBERS">
    <title><?= $title ?></title>
    <style>
        .whatsapp-button {
            position: fixed;
            bottom: 20px;
            right: 20px;
            z-index: 9999;
            width: 60px;
            height: 60px;
            border-radius: 50%;
            background-color: #25d366;
            color: #fff;
            text-align: center;
            font-size: 24px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
            cursor: pointer;
        }

        .whatsapp-button i {
            line-height: 60px;
        }

        .whatsapp-button:hover {
            background-color: #128c7e;
        }

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
    <!-- Meta Pixel Code -->
    <script>
        ! function(f, b, e, v, n, t, s) {
            if (f.fbq) return;
            n = f.fbq = function() {
                n.callMethod ?
                    n.callMethod.apply(n, arguments) : n.queue.push(arguments)
            };
            if (!f._fbq) f._fbq = n;
            n.push = n;
            n.loaded = !0;
            n.version = '2.0';
            n.queue = [];
            t = b.createElement(e);
            t.async = !0;
            t.src = v;
            s = b.getElementsByTagName(e)[0];
            s.parentNode.insertBefore(t, s)
        }(window, document, 'script',
            'https://connect.facebook.net/en_US/fbevents.js');
        fbq('init', '588447679769578');
        fbq('track', 'PageView');
    </script>
    <noscript><img height="1" width="1" style="display:none" src="https://www.facebook.com/tr?id=588447679769578&ev=PageView&noscript=1" /></noscript>
    <!-- End Meta Pixel Code -->
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
    <?php if ($suporte) : ?>
        <a href="https://api.whatsapp.com/send?phone=<?= $suporte ?>" target="_blank" class="whatsapp-button">
            <i class="fab fa-whatsapp"></i>
        </a>
    <?php endif; ?>
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