<?= $this->extend('newSuper/template/template') ?>

<?= $this->section('linkcss') ?>

<?= $this->endSection() ?>
<?= $this->section('css') ?>

<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

<?= $this->endSection() ?>

<?= $this->section('content') ?>
<?php

use CodeIgniter\I18n\Time; ?>
<?= view('newSuper/template/title', ['title' => $title, 'map' => 'Ações']) ?>

<div class="row">
    <div class="col-xl-12">
        <?php if (count($cliente)) : ?>
            <div class="live-preview">
                <div class="table-responsive">
                    <table class="table table-bordered table-nowrap">
                        <thead>
                            <tr>
                                <th scope="col">Id</th>
                                <th scope="col">Nome</th>
                                <th scope="col">Status</th>
                                <th scope="col">Eventos</th>
                                <th scope="col">Acessos</th>
                                <th scope="col">Criado</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($cliente as $row) : ?>
                                <tr>
                                    <th scope="row" class="position-relative">
                                        <div class="position-absolute top-50 start-50 translate-middle">
                                            <?= $row['id'] ?>
                                        </div>
                                    </th>
                                    <td>
                                        <?= $row['name'] ?><br>
                                        <small><?= $row['email'] ?></small><br>
                                        <small class="text-success"><b><?= $row['phone'] ?></b></small>
                                    </td>
                                    <td>
                                        <?php if (!$row['bloqueio']) : ?>
                                            <span class="badge badge-soft-success">Ativo</span>
                                        <?php else : ?>
                                            <span class="badge badge-soft-danger">Bloqueado</span>
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <?= view_cell('App\Libraries\Viewhtml::relacionamento', ['idAluno' => $row['id'], 'eventos' => $eventos]) ?>
                                    </td>
                                    <td>
                                        <?php
                                        echo $acessos->where('id_cliente', $row['id'])->countAllResults();
                                        ?>
                                    </td>
                                    <td>
                                        <?php
                                        $current = Time::parse(date('Y-m-d H:i:s'));
                                        $test    = Time::parse($row['created_at']);
                                        $diff = $current->difference($test);
                                        echo $diff->humanize();
                                        ?>
                                    </td>
                                    <td>
                                        <div class="dropdown">
                                            <a href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="ri-more-2-fill"></i>
                                            </a>
                                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                <!-- <li><a class="dropdown-item" href="#">View</a></li>
                                <li><a class="dropdown-item" href="#">Edit</a></li>-->
                                                <li><a href="#" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#varyingcontentModal" onclick="search_item('<?= $row['id'] ?>')">Reenviar</a></li>
                                                <?php if (!$row['bloqueio']) : ?>
                                                    <li><a class="dropdown-item" href="#" onclick="bloquear('<?= $row['id'] ?>', 1)">Bloquear</a></li>
                                                <?php else : ?>
                                                    <li><a class="dropdown-item" href="#" onclick="bloquear('<?= $row['id'] ?>', 0)">Desbloquear</a></li>
                                                <?php endif; ?>
                                                <!-- <li><a class="dropdown-item" href="#">Delete</a></li>-->
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        <?php else : ?>
            <div class="noresult">
                <div class="text-center">
                    <lord-icon src="https://cdn.lordicon.com/msoeawqm.json" trigger="loop" colors="primary:#121331,secondary:#08a88a" style="width:75px;height:75px"></lord-icon>
                    <h5 class="mt-2">Desculpe! Nenhum resultado encontrado</h5>
                    <p class="text-muted mb-0">Pesquisamos mais de <?= $totalAlunos ?> cadastros não encontramos nenhum aluno para sua pesquisa.</p>
                </div>
            </div>
        <?php endif; ?>
    </div>
</div>

<?= $this->include('newSuper/pages/alunos/modals/reenvio') ?>

<?= $pager->links('default', 'pager_movie') ?>

<?= $this->endSection() ?>

<?= $this->section('js') ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script src="https://malsup.github.io/jquery.form.js"></script>
<script>
    function search_item(id) {
        $("#r_name, #r_email, #r_id").val('...');
        $.getJSON(baseUrl + "/superadmin/api/aluno/" + id,
            function(data, _textStatus) {
                $("#r_name").val(data.name);
                $("#r_email").val(data.email);
                $("#r_id").val(id);
            }
        );
    }

    function bloquear(id, tipo) {
        toastr.warning('Bloqueando usuário!!!')
        $.getJSON(baseUrl + "/superadmin/api/aluno/bloquear/" + id + '/' + tipo,
            function(data, _textStatus) {
                toastr.success('Usuário bloqueado!!!')
                setTimeout(function() {
                    location.reload();
                }, 5000);
            }
        ).fail(function(jqxhr, textStatus, error) {
            toastr.error('Verique os logs do navegador!')
            var err = textStatus + ", " + error;
            toastr.error('Erro ao bloquear o usuário: ' + err);
        });
    }

    $(document).ready(function() {
        $('.form').ajaxForm({
            dataType: 'json',
            // Ação a ser executada em caso de sucesso

            // Configuração para adicionar barra de progresso
            beforeSubmit: function() {
                toastr.warning('Enviando dados!!!')
            },

            success: function(response) {
                // Ação a ser executada em caso de sucesso
                toastr.success('Enviado com sucesso!!!')
                /*setTimeout(function() {
                    location.reload();
                }, 5000);*/
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