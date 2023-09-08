<!DOCTYPE html>
<html lang="<?= service('language')->getLocale() ?>">

<head>
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
    <link rel="icon" type="image/png" href="<?= ($favicon) ? $favicon : url_cloud_front() . 'favicon.ico' ?>" sizes="32x32">
    <link rel="apple-touch-icon" href="<?= ($favicon) ? $favicon : url_cloud_front() . 'favicon.ico' ?>">
    <meta name="keywords" content="<?= $name ?>">
    <meta name="author" content="SHEEP MEMBERS">
    <meta name="description" content="<?= $description ?>">
    <meta name="robots" content="index,follow">
    <!-- Meta Tags de Redes Sociais (Open Graph) -->
    <meta property="og:title" content="<?= $title ?>">
    <meta property="og:description" content="<?= $description ?>">
    <meta property="og:image" content="<?= ($fundo) ? $fundo : url_cloud_front() . 'assets/admin/img/bg.jpg' ?>">
    <meta property="og:url" content="<?= site_url() ?>">
    <meta property="og:type" content="website">
    <!-- Meta Tags do Twitter (Twitter Cards) -->
    <meta name="twitter:card" content="<?= ($fundo) ? $fundo : url_cloud_front() . 'assets/admin/img/bg.jpg' ?>">
    <meta name="twitter:title" content="<?= $title ?>">
    <meta name="twitter:description" content="<?= $description ?>">
    <meta name="twitter:image" content="<?= ($fundo) ? $fundo : url_cloud_front() . 'assets/admin/img/bg.jpg' ?>">
    <title><?= $title ?></title>
    <link rel="stylesheet" href="/assets/css/custom/login.min.css">
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
    <?= $analyticsFooter ?>
</body>

</html>