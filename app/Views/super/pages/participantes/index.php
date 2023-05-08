<?= $this->extend('super/layout') ?>
<?= $this->section('css') ?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<?= $this->endSection() ?>
<?= $this->section('content') ?>
<!-- main title -->
<div class="col-12">
    <div class="main__title">
        <h2><?= (isset($title)) ? $title : 'Stream' ?></h2>
        <a href="add-item.html" class="main__title-link">add item</a>
    </div>
</div>

<div class="col-12">
    <div class="sign__wrap">
        <div class="row">
            <div class="col-12 col-lg-12">
                <?php
                $dd = array();
                foreach ($mEmpresa->findAll() as $row) :
                    if(isset($_GET['list']) == $row['id']){
                        $dd[$row['id']] = ['name' => $row['name']];
                    }
                    ?>
                    <a href="/superadmin/participantes/?list=<?= $row['id'] ?>" class="btn btn-dark active">
                        <?= $row['name'] ?>
                    </a>
                <?php endforeach ?>
            </div>
        </div>
    </div>
</div>

<?php if(isset($_GET['list'])): ?>
<pre>
    <?php 
    print_r($dd[$_GET['list']]);
    ?>
</pre>



<?php else : ?>




<?php endif ; ?>
<?= $this->endSection() ?>