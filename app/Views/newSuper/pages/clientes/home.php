<?= $this->extend('newSuper/template/template') ?>
<?= $this->section('linkcss') ?>
<!-- prismjs plugin -->
<script src="/assets/libs/prismjs/prism.js"></script>
<?= $this->endSection() ?>
<?= $this->section('css') ?>
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
<?= $this->endSection() ?>
<?= $this->section('content') ?>
<?php

use CodeIgniter\I18n\Time; ?>
<?= view('newSuper/template/title', ['title' => $title, 'map' => 'Ações']) ?>
<div class="row mb-2">
    <div class="col-12 text-end">
        <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#novaEmpresa">Novo cliente</button>
    </div>
</div>
<div class="row">
    <div class="col-xl-12">
        <div class="table-responsive">
            <table class="table table-bordered table-nowrap">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Nome</th>
                        <th scope="col">Status</th>
                        <th scope="col">Valído até</th>
                        <th scope="col">Data de criação</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($empresas as $empresa) : ?>
                        <tr>
                            <td scope="row" class="position-relative">
                                <div class="position-absolute top-50 start-50 translate-middle">
                                    <?= $empresa['id'] ?>
                                </div>
                            </td>
                            <td>
                                <?= $empresa['name'] ?><br>
                                <small><b><?= $empresa['empresa'] ?></b></small>
                            </td>
                            <td>
                                <?php if (!$empresa['bloqueio']) : ?>
                                    <span class="badge badge-soft-success">Ativo</span>
                                <?php else : ?>
                                    <span class="badge badge-soft-danger">Bloqueado</span>
                                <?php endif; ?>
                            </td>
                            <td>
                                <?php
                                echo format_date(Time::parse($empresa['created_at'])->addDays(($empresa['prazo']) ? $empresa['prazo'] : 30));
                                ?>
                            </td>
                            <td><?= format_date($empresa['created_at']) ?></td>
                            <td>
                                <div class="dropdown">
                                    <a href="#" role="button" id="dropdownMenuLink<?= $empresa['id'] ?>" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="ri-more-2-fill"></i>
                                    </a>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink<?= $empresa['id'] ?>">
                                        <li><a href="/superadmin/config/<?= $empresa['id'] ?>" class="dropdown-item">Configurar plataforma</a></li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?= $this->include('newSuper/pages/clientes/modals/novaEmpresa') ?>
<?= $this->endSection() ?>

<?= $this->section('js') ?>
<!-- Jquery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<!-- Toastr -->
<script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<!-- Jquery Forms -->
<script src="https://malsup.github.io/jquery.form.js"></script>

<script>
    $('.ajax_envio_simples').ajaxForm({
        dataType: 'json',
        // Ação a ser executada em caso de sucesso

        // Configuração para adicionar barra de progresso
        beforeSubmit: function() {
            toastr.warning('Enviando dados!!!')
        },

        success: function(response) {
            // Ação a ser executada em caso de sucesso
            toastr.success('Enviado com sucesso!!! Atualizando página em 5 segundos.')
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
</script>

<?= $this->endSection() ?>