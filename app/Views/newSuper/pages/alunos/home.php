<?= $this->extend('newSuper/template/template') ?>
<?= $this->section('linkcss') ?>

<!--datatable css-->
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css" />
<!--datatable responsive css-->
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap.min.css" />

<link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.2/css/buttons.dataTables.min.css">


<?= $this->endSection() ?>


<?= $this->section('content') ?>
<?php

use CodeIgniter\I18n\Time; ?>
<?= view('newSuper/template/title', ['title' => $title, 'map' => 'Ações']) ?>

<?php if (count($cliente)) : ?>
    <!-- Bordered Tables -->
    <table class="table table-bordered table-nowrap">
        <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Nome</th>
                <th scope="col">Status</th>
                <th scope="col">Eventos</th>
                <th scope="col">Acessos</th>
                <th scope="col">Criado em</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($cliente as $row) : ?>
                <tr>
                    <th scope="row"><?= $row['id'] ?></th>
                    <td>
                        <?= $row['name'] ?><br>
                        <small><?= $row['email'] ?></small>
                    </td>
                    <td><span class="badge badge-soft-success">Ativo</span></td>
                    <td></td>
                    <td></td>
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
                                <li><a class="dropdown-item" href="#">View</a></li>
                                <li><a class="dropdown-item" href="#">Edit</a></li>
                                <li><a class="dropdown-item" href="#">Delete</a></li>
                            </ul>
                        </div>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php else : ?>
    <div class="noresult">
        <div class="text-center">
            <lord-icon src="https://cdn.lordicon.com/msoeawqm.json" trigger="loop" colors="primary:#121331,secondary:#08a88a" style="width:75px;height:75px"></lord-icon>
            <h5 class="mt-2">Desculpe! Nenhum resultado encontrado</h5>
            <p class="text-muted mb-0">Pesquisamos mais de <?= $totalAlunos ?> cadastros não encontramos nenhum aluno para sua pesquisa.</p>
        </div>
    </div>
<?php endif; ?>

<?= $pager->links('default', 'pager_movie') ?>





<?= $this->endSection() ?>

<?= $this->section('js') ?>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<!--datatable js-->
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.print.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.html5.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>

<script src="/assets/js/pages/datatables.init.js"></script>

<?= $this->endSection() ?>