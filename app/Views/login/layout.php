<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/assets/css/login/style.css?<?= time() ?>">
    <?= $this->renderSection('meta') ?>
    <?= $this->renderSection('css') ?>
</head>

<body>
    <?= $this->renderSection('form') ?>
    <?= $this->renderSection('script') ?>
</body>

</html>