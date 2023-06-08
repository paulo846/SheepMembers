<?= $this->extend('newSuper/template/template') ?>
<?= $this->section('content') ?>
<?= view('newSuper/template/title', ['title' => $title, 'map' => 'Home']) ?>

<div class="row">
    <?php foreach ($clientes->findAll() as $cliente) : ?>
        <div class="col-xl-4 col-md-6">
            <!-- card -->
            <div class="card card-animate">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="flex-grow-1">
                            <p class="text-uppercase fw-medium text-muted mb-0"><?= $cliente['evento'] ?></p>
                        </div>
                        <div class="flex-shrink-0">
                            <h5 class="text-success fs-14 mb-0">
                                <i class="ri-arrow-right-up-line fs-13 align-middle"></i> <?php echo $assinaturas->where('id_empresa', $cliente['id'])->countAllResults(); ?>
                            </h5>
                        </div>
                    </div>
                    <div class="d-flex align-items-end justify-content-between mt-4">
                        <div>
                            <h4 class="fs-22 fw-semibold ff-secondary mb-4"><span class="counter-value" data-target="<?php echo $assinaturas->where('id_empresa', $cliente['id'])->countAllResults(); ?>">0</span></h4>
                            <a href="/superadmin/alunos" class="text-decoration-underline">Mais detalhes</a>
                        </div>
                        <div class="avatar-sm flex-shrink-0">
                            <span class="avatar-title bg-soft-warning rounded fs-3">
                                <i class="bx bx-user-circle text-warning"></i>
                            </span>
                        </div>
                    </div>
                </div><!-- end card body -->
            </div><!-- end card -->
        </div><!-- end col -->
    <?php endforeach; ?>
</div>
<?= $this->endSection() ?>

<?= $this->section('js') ?>

<?= $this->endSection() ?>