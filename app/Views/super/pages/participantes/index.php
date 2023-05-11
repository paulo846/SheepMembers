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

                    $list = (isset($_GET['list'])) ? $_GET['list'] : false ; ;


                    if ($list == $row['id']) {
                        $dd[$row['id']] = ['name' => $row['name']];
                ?>
                <a href="/superadmin/participantes/?list=<?= $row['id'] ?>" class="btn btn-info active">
                        <?= $row['name'] ?> <?= (isset($_GET['list'])) ? count($cliente) : false; ?>
                    </a>
                    <?php
                    } else {
                    ?>
                    <a href="/superadmin/participantes/?list=<?= $row['id'] ?>" class="btn btn-info active">
                        <?= $row['name'] ?>
                    </a>

                    <?php
                    }
                    ?>
                    
                <?php endforeach ?>
            </div>
        </div>
    </div>
</div>

<?php if (isset($_GET['list'])) :
?>
    <!-- users -->
    <div class="col-12">
        <div class="main__table-wrap">
            <table class="main__table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>BASIC INFO</th>
                        <th>COMMENTS</th>
                        <th>REVIEWS</th>
                        <th>STATUS</th>
                        <th>CRAETED DATE</th>
                        <th>ACTIONS</th>
                    </tr>
                </thead>

                <tbody>
                    <?php foreach ($cliente as $row) : ?>
                        <tr>
                            <td>
                                <div class="main__table-text">
                                    <?= $row['id'] ?>
                                </div>
                            </td>
                            <td>
                                <div class="main__user">
                                    <div class="main__avatar">
                                        <img src="/assets/admin/img/user.svg" alt="">
                                    </div>
                                    <div class="main__meta">
                                        <h3><?= $row['name'] ?></h3>
                                        <span><?= $row['email'] ?></span>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="main__table-text">0</div>
                            </td>
                            <td>
                                <div class="main__table-text">0</div>
                            </td>
                            <td>
                                <div class="main__table-text main__table-text--green">Ativo</div>
                            </td>
                            <td>
                                <div class="main__table-text">
                                    <?= $row['created_at'] ?>
                                </div>
                            </td>
                            <td>
                                <div class="main__table-btns">
                                    <a href="#modal-status" class="main__table-btn main__table-btn--banned open-modal">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                            <path d="M12,13a1.49,1.49,0,0,0-1,2.61V17a1,1,0,0,0,2,0V15.61A1.49,1.49,0,0,0,12,13Zm5-4V7A5,5,0,0,0,7,7V9a3,3,0,0,0-3,3v7a3,3,0,0,0,3,3H17a3,3,0,0,0,3-3V12A3,3,0,0,0,17,9ZM9,7a3,3,0,0,1,6,0V9H9Zm9,12a1,1,0,0,1-1,1H7a1,1,0,0,1-1-1V12a1,1,0,0,1,1-1H17a1,1,0,0,1,1,1Z" />
                                        </svg>
                                    </a>
                                    <a href="edit-user.html" class="main__table-btn main__table-btn--edit">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                            <path d="M22,7.24a1,1,0,0,0-.29-.71L17.47,2.29A1,1,0,0,0,16.76,2a1,1,0,0,0-.71.29L13.22,5.12h0L2.29,16.05a1,1,0,0,0-.29.71V21a1,1,0,0,0,1,1H7.24A1,1,0,0,0,8,21.71L18.87,10.78h0L21.71,8a1.19,1.19,0,0,0,.22-.33,1,1,0,0,0,0-.24.7.7,0,0,0,0-.14ZM6.83,20H4V17.17l9.93-9.93,2.83,2.83ZM18.17,8.66,15.34,5.83l1.42-1.41,2.82,2.82Z" />
                                        </svg>
                                    </a>
                                    <a href="#modal-delete" class="main__table-btn main__table-btn--delete open-modal">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                            <path d="M10,18a1,1,0,0,0,1-1V11a1,1,0,0,0-2,0v6A1,1,0,0,0,10,18ZM20,6H16V5a3,3,0,0,0-3-3H11A3,3,0,0,0,8,5V6H4A1,1,0,0,0,4,8H5V19a3,3,0,0,0,3,3h8a3,3,0,0,0,3-3V8h1a1,1,0,0,0,0-2ZM10,5a1,1,0,0,1,1-1h2a1,1,0,0,1,1,1V6H10Zm7,14a1,1,0,0,1-1,1H8a1,1,0,0,1-1-1V8H17Zm-3-1a1,1,0,0,0,1-1V11a1,1,0,0,0-2,0v6A1,1,0,0,0,14,18Z" />
                                        </svg>
                                    </a>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>



        </div>
    </div>

    <?= $pager->links('default', 'pager_movie') ?>

    <?php if (isset($_GET['list'])) : ?>
        <!-- modal status -->
        <div id="modal-csv<?= $_GET['list'] ?>" class="zoom-anim-dialog mfp-hide modal">
            <h6 class="modal__title">Envio em massa</h6>
            <p class="modal__text">Lista de contatos</p>
            <?= form_open_multipart('/superadmin/api/cliente/new/list',  'class="form_cliente"') ?>

            <div class="col-12">
                <div class="sign__group">
                    <label class="sign__label" for="list">Lista em CSV</label>
                    <input id="list" type="file" name="csvfile" class="form-control">
                </div>
            </div>

            <input type="hidden" name="empresa" value="<?= $_GET['list'] ?>">

            <div class="modal__btns">
                <button class="modal__btn modal__btn--apply" type="submit">Enviar</button>
                <button class="modal__btn modal__btn--dismiss" type="button">Dismiss</button>
            </div>

            </form>
        </div>
        <!-- end modal status -->

        <!-- modal status -->
        <div id="modal-unic<?= $_GET['list'] ?>" class="zoom-anim-dialog mfp-hide modal">
            <h6 class="modal__title">Envio único</h6>
            <?= form_open_multipart('/superadmin/api/cliente/new',  'class="form_cliente" ') ?>
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

<?= $this->section('script') ?>
<script src="https://malsup.github.io/jquery.form.js"></script>
<script>
    $(document).ready(function() {
        $('.form_cliente').ajaxForm({
            dataType: 'json',
            // Ação a ser executada em caso de sucesso

            // Configuração para adicionar barra de progresso
            beforeSubmit: function() {
                toastr.warning('Enviando dados!!!')
            },

            success: function(response) {
                // Ação a ser executada em caso de sucesso
                toastr.success('Enviado com sucesso!!!')
                setTimeout(function() {
                    location.reload();
                }, 5000);
            },

            error: function(response) {
                // Ação a ser executada em caso de erro
                toastr.error('Verique os logs do navegador!')
                console.log(response)


            }
        });
    });
</script>

<?= $this->endSection() ?>