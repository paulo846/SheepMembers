<?= $this->extend('super/layout') ?>
<?= $this->section('css') ?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<?= $this->endSection() ?>
<?= $this->section('content') ?>

<!-- main title -->
<div class="col-12">
    <div class="main__title">
        <h2><?= (isset($title)) ? $title : 'Stream' ?></h2>
        <?php if (isset($_GET['list'])) : ?>
            <div class="main__title-wrap">
                <a href="#modal-csv<?= $_GET['list'] ?>" class="main__title-link open-modal me-2">Envio em massa</a>
                <a href="#modal-unic<?= $_GET['list'] ?>" class="main__title-link open-modal">Envio único</a>
            </div>
        <?php endif ?>
    </div>
</div>

<div class="col-12">
    <div class="sign__wrap">
        <div class="row">
            <div class="col-12 col-lg-12">
                <?php
                $dd = array();
                foreach ($mEmpresa->findAll() as $row) :
                    if (isset($_GET['list']) == $row['id']) {
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

<?php if (isset($_GET['list'])) : ?>
    <pre>
    <?php
    print_r($dd[$_GET['list']]);
    ?>
</pre>

    <div class="col-12">
        <div class="sign__wrap">
            <div class="row">
                <div class="col-12 col-lg-12">
                </div>
            </div>
        </div>
    </div>






    <?php if (isset($_GET['list'])) : ?>
        <!-- modal status -->
        <div id="modal-csv<?= $_GET['list'] ?>" class="zoom-anim-dialog mfp-hide modal">
            <h6 class="modal__title">Envio em massa</h6>
            <p class="modal__text">Lista de contatos</p>
            <?= form_open_multipart('/',  'class=""') ?>

            <div class="col-12">
                <div class="sign__group">
                    <label class="sign__label" for="list">Lista em CSV</label>
                    <input id="list" type="file" name="list" class="form-control">
                </div>
            </div>

            <input type="hidden" name="empresa" value="<?= $_GET['list'] ?>">

            <div class="modal__btns">
                <button class="modal__btn modal__btn--apply" type="button">Enviar</button>
                <button class="modal__btn modal__btn--dismiss" type="button">Dismiss</button>
            </div>

            </form>
        </div>
        <!-- end modal status -->

        <!-- modal status -->
        <div id="modal-unic<?= $_GET['list'] ?>" class="zoom-anim-dialog mfp-hide modal">
            <h6 class="modal__title">Envio único</h6>
            <?= form_open_multipart('/superadmin/api/cliente/new',  'class=""') ?>
            <div class="col-12">
                <div class="sign__group">
                    <label class="sign__label" for="name">Nome completo</label>
                    <input id="name" type="text" name="name" class="form-control">
                </div>
            </div>
            <div class="col-12">
                <div class="sign__group">
                    <label class="sign__label" for="email">Email</label>
                    <input id="email" type="email" name="email" class="form-control">
                </div>
            </div>
            <div class="col-12">
                <div class="sign__group">
                    <label class="sign__label" for="phone">Telefone</label>
                    <input id="phone" type="text" name="phone" class="form-control">
                </div>
            </div>

            <input type="hidden" name="empresa" value="<?= $_GET['list'] ?>">

            <p class="modal__text"><b>SENHA PADRÃO:</b> mudar123</p>

            <div class="modal__btns">
                <button class="modal__btn modal__btn--apply" type="submit">Enviar</button>
                <button class="modal__btn modal__btn--dismiss" type="button">Dismiss</button>
            </div>

            </form>
        </div>
        <!-- end modal status -->
    <?php endif ?>

<?php else : ?>




<?php endif; ?>
<?= $this->endSection() ?>