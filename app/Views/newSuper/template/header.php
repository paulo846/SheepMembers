<!doctype html>
<html lang="pt-BR" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg" data-sidebar-image="none" data-layout-mode="light" data-body-image="img-1" data-preloader="disable">
<head>
    <meta charset="utf-8" />
    <title>Dashboard | <?= (isset($title)) ? $title : 'SheepMembers' ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="" name="description" />
    <meta content="IGR SISTEMAS" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="<?= url_cloud_front() ?>favicon.ico">
    <?= $this->renderSection('linkcss') ; ?>
    <!-- Layout config Js -->
    <script src="<?= url_cloud_front() ?>assets/js/layout.js"></script>
    <!-- Bootstrap Css -->
    <link href="<?= url_cloud_front() ?>assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="/assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="<?= url_cloud_front() ?>assets/css/app.min.css" rel="stylesheet" type="text/css" />
    <!-- custom Css-->
    <link href="<?= url_cloud_front() ?>assets/css/custom.min.css" rel="stylesheet" type="text/css" />
    <?= $this->renderSection('css') ; ?>
</head>
<body>
    <!-- Begin page -->
    <div id="layout-wrapper">