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


<pre>
    <?php print_r($empresas); ?>
</pre>
<div class="row">
    <div class="col-xl-12">
        <div class="table-responsive">
            <table class="table table-bordered table-nowrap">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Nome</th>
                        <th scope="col">Status</th>
                        <th scope="col">Contrato</th>
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
                            <td><?= $empresa['contrato'] ?></td>
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
                                        <!-- <li><a class="dropdown-item" href="#">View</a></li>
                                <li><a class="dropdown-item" href="#">Edit</a></li>-->
                                        <li><a href="#" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#varyingcontentModal" onclick="search_item('<?= $empresa['id'] ?>')">Configurar plataforma</a></li>
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
</div>

<?= $this->endSection() ?>