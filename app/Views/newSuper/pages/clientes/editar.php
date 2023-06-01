<?= $this->extend('newSuper/template/template') ?>
<?= $this->section('linkcss') ?>
<?= $this->endSection() ?>
<?= $this->section('css') ?>
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
<style>
    .img--place {
        color: #482668 !important;
        background-color: #482668 !important;
    }

    .form__logo {
        position: relative;
        width: 150px;
        height: 150px;
        overflow: hidden;
        background-color: #f9f9f9;
        margin-bottom: 20px;
        border-radius: 16px;
        overflow: hidden;
    }

    .form__logo input {
        position: absolute;
        left: -9999px;
        opacity: 0;
    }

    .form__logo label {
        position: absolute;
        display: flex;
        flex-direction: row;
        justify-content: center;
        align-items: center;
        top: 0;
        right: 0;
        bottom: 0;
        left: 0;
        z-index: 2;
        cursor: pointer;
        margin: 0;
        font-weight: normal;
        font-size: 14px;
        color: #e0e0e0;
        transition: 0.5s;
    }

    .form__logo label:hover {
        color: #fff;
    }

    .form__logo img {
        position: absolute;
        z-index: 1;
        top: -100px;
        right: -100px;
        bottom: -100px;
        left: -100px;
        margin: auto;
        width: 100%;
    }

    .form__img {
        position: relative;
        width: 100%;
        height: 400px;
        overflow: hidden;
        background-color: #151f30;
        margin-bottom: 20px;
        border-radius: 16px;
        overflow: hidden;
    }

    .form__img input {
        position: absolute;
        left: -9999px;
        opacity: 0;
    }

    .form__img label {
        position: absolute;
        display: flex;
        flex-direction: row;
        justify-content: center;
        align-items: center;
        top: 0;
        right: 0;
        bottom: 0;
        left: 0;
        z-index: 2;
        cursor: pointer;
        margin: 0;
        font-weight: normal;
        font-size: 14px;
        color: #e0e0e0;
        transition: 0.5s;
    }

    .form__img label:hover {
        color: #fff;
    }

    .form__img img {
        position: absolute;
        z-index: 1;
        top: -100px;
        right: -100px;
        bottom: -100px;
        left: -100px;
        margin: auto;
        width: 100%;
    }

    @media (min-width: 768px) {
        .form__cover {
            -ms-flex: 0 0 290px;
            flex: 0 0 290px;
            max-width: 290px;
        }

        .form__content {
            -ms-flex: 0 0 calc(100% - 290px);
            flex: 0 0 calc(100% - 290px);
            max-width: 100%;
        }

        .form__btn {
            width: 180px;
        }
    }
</style>
<?= $this->endSection() ?>
<?= $this->section('content') ?>
<?php

use CodeIgniter\I18n\Time; ?>
<?= view('newSuper/template/title', ['title' => $title, 'map' => 'Ações']) ?>

<!-- <ul id="items">
    <li data-id="1">Item 1</li>
    <li data-id="2">Item 2</li>
    <li data-id="3">Item 3</li>
    <li data-id="4">Item 4</li>
</ul> -->


<div class="col-12">

    <div class="align-items-center d-flex">
        <h1 class="mb-3 flex-grow-1">Editar plataforma</h1>
        <div class="flex-shrink-0">
            <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#avisosPlataforma">
                <i class="bx bxs-megaphone" title="Aviso na plataforma!" data-bs-toggle="tooltip"></i>
            </button>
        </div>
    </div>



    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-lg-3 border-end">
                    <div class="nav nav-pills flex-column nav-pills-tab custom-verti-nav-pills text-center" role="tablist" aria-orientation="vertical">

                        <a class="nav-link active show" id="pills-dados-empresa-tab" data-bs-toggle="pill" href="#pills-dados-empresa" role="tab" aria-controls="pills-dados-empresa" aria-selected="true">
                            <i class="ri-home-4-line d-block fs-20 mb-1"></i> Dados da empresa
                        </a>

                        <a class="nav-link" id="pills-configuracoes-tab" data-bs-toggle="pill" href="#pills-configuracoes" role="tab" aria-controls="pills-configuracoes" aria-selected="false">
                            <i class="ri-user-2-line d-block fs-20 mb-1"></i> Configurações
                        </a>

                        <a class="nav-link" id="pills-imagens-tab" data-bs-toggle="pill" href="#pills-imagens" role="tab" aria-controls="pills-imagens" aria-selected="false">
                            <i class="ri-image-line d-block fs-20 mb-1"></i> Imagens
                        </a>

                        <a class="nav-link" id="pills-traducoes-tab" data-bs-toggle="pill" href="#pills-traducoes" role="tab" aria-controls="pills-traducoes" aria-selected="false">
                            <i class="ri-translate d-block fs-20 mb-1"></i> Transmissões e traduções
                        </a>

                        <a class="nav-link" id="pills-gravados-tab" data-bs-toggle="pill" href="#pills-gravados" role="tab" aria-controls="pills-gravados" aria-selected="false">
                            <i class="ri-video-upload-line d-block fs-20 mb-1"></i> Gravados
                        </a>

                    </div>
                </div> <!-- end col-->
                <div class="col-lg-9">
                    <div class="tab-content text-muted mt-3 mt-lg-0">
                        <div class="tab-pane fade active show" id="pills-dados-empresa" role="tabpanel" aria-labelledby="pills-dados-empresa-tab">
                            <?= $this->include('newSuper/pages/clientes/forms/dadosEmpresa') ?>
                        </div>
                        <!--end tab-pane-->
                        <div class="tab-pane fade" id="pills-configuracoes" role="tabpanel" aria-labelledby="pills-configuracoes-tab">
                            <?= $this->include('newSuper/pages/clientes/forms/configuracoes') ?>
                        </div>
                        <!--end tab-pane-->
                        <div class="tab-pane fade" id="pills-imagens" role="tabpanel" aria-labelledby="pills-imagens-tab">
                            <?= $this->include('newSuper/pages/clientes/forms/imagens') ?>
                        </div>
                        <!--end tab-pane-->
                        <div class="tab-pane fade" id="pills-traducoes" role="tabpanel" aria-labelledby="pills-traducoes-tab">
                            <?= $this->include('newSuper/pages/clientes/forms/traducoes') ?>
                        </div>
                        <!--end tab-pane-->
                        <div class="tab-pane fade" id="pills-gravados" role="tabpanel" aria-labelledby="pills-gravados-tab">
                            <div class="align-items-center d-flex mb-3">
                                <h4 class="text-info mb-0 flex-grow-1">Configuração da disponibilidade das grações na plataforma</h4>
                                <div class="flex-shrink-0">
                                    <button class="btn btn-info ms-auto" data-bs-toggle="modal" data-bs-target="#exampleModalgrid">Cadastrar carrossel</button>
                                </div>
                            </div>

                            <?php if (count($carrosseis)) :
                                foreach ($carrosseis as $carrossel) :
                            ?>
                                    <div class="card">
                                        <div class="card-header align-items-center d-flex">
                                            <h4 class="card-title mb-0 flex-grow-1">
                                                <b>Titulo do carrossel:</b> <?= $carrossel['title']; ?><br>
                                                <b>Tipo:</b> <?= ($carrossel['config'] == 1) ? 'Grade' : 'Slides'; ?>
                                            </h4>
                                            <div class="flex-shrink-0">
                                                <button class="btn btn-info" data-bs-toggle="modal" data-bs-target="#exampleModalgrid"><i class="ri-pencil-line" title="Editar carrossel!" data-bs-toggle="tooltip"></i></button>
                                                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#newGravacao<?= $carrossel['id'] ?>"><i class="ri-video-upload-line" title="Nova gravação!" data-bs-toggle="tooltip"></i></button>
                                                <a href="#<?= $carrossel['id'] ?>" class="btn btn-danger"><i class="ri-delete-bin-line" title="Editar carrossel!" data-bs-toggle="tooltip"></i></a>
                                            </div>
                                        </div><!-- end card header -->
                                        <div class="card-body">
                                            <!-- Lista de videos cadastrados -->
                                            <?php $gravacoesFor = $gravacoes->where('id_carrossel', $carrossel['id'])->findAll();
                                            if (count($gravacoesFor)) :
                                                foreach ($gravacoesFor as $gravacao) :
                                            ?><div class="accordion" id="default-accordion-example">
                                                        <div class="accordion-item">
                                                            <h2 class="accordion-header" id="headingOne">
                                                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#gravacoesAcordion<?= $gravacao['id'] ?>" aria-expanded="false" aria-controls="collapseOne">
                                                                    <?= $gravacao['title'] ?>
                                                                </button>
                                                            </h2>
                                                            <div id="gravacoesAcordion<?= $gravacao['id'] ?>" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#default-accordion-example">
                                                                <div class="accordion-body">
                                                                    <div class=" align-items-center d-flex">
                                                                        <h4 class="card-title mb-0 flex-grow-1">
                                                                            <?= $gravacao['title'] ?><br>
                                                                            <?= $gravacao['description'] ?>
                                                                        </h4>
                                                                        <div class="flex-shrink-0">
                                                                            <button class="btn btn-info btn-sm"><i class="ri-pencil-line" title="Em construção!" data-bs-toggle="tooltip"></i></button>
                                                                            <a href="#<?= $carrossel['id'] ?>" class="btn btn-danger btn-sm"><i class="ri-delete-bin-line" title="Excluir!" data-bs-toggle="tooltip"></i></a>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-12">
                                                                            <a href="https://<?= $config['slug'] . '/filme/' . $gravacao['slug'] ?>" target="_blank"><?= $config['slug'] . '/filme/' . $gravacao['slug'] ?></a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                <?php endforeach;
                                            else : ?>
                                                <div class="alert alert-danger bg-danger text-white" role="alert">
                                                    Cadastre pelo menos uma gravação
                                                </div>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <?= view(
                                        'newSuper/pages/clientes/modals/criaGravacao',
                                        [
                                            'carrossel' => $carrossel,
                                            'empresa' => $empresa
                                        ]
                                    ) ?>
                                <?php endforeach;
                            else : ?>
                                <div class="alert alert-danger bg-danger text-white" role="alert">
                                    Cadastre um carrossel para continuar!
                                </div>
                            <?php endif; ?>
                        </div>
                        <!--end tab-pane-->
                    </div>
                </div> <!-- end col-->
            </div> <!-- end row-->
        </div><!-- end card-body -->
    </div>
    <!--end card-->
</div>
<!--end col-->
<?= $this->include('newSuper/pages/clientes/modals/criarCarrossel') ?>
<?= $this->include('newSuper/pages/clientes/modals/aviso') ?>
<?= $this->endSection() ?>
<?= $this->section('jstemplate') ?>
<!-- prismjs plugin -->
<script src="<?= url_cloud_front() ?>assets/libs/prismjs/prism.js"></script>
<!-- ckeditor -->
<script src="<?= url_cloud_front() ?>assets/libs/@ckeditor/ckeditor5-build-classic/build/ckeditor.js"></script>
<!-- init js -->
<script src="<?= url_cloud_front() ?>assets/js/pages/form-editor.init.js"></script>

<script>
    ClassicEditor
        .create(document.querySelector('#editor'))
        .catch(error => {
            console.error(error);
        });
</script>
<!-- sortablejs -->
<script src="<?= url_cloud_front() ?>assets/libs/sortablejs/Sortable.min.js"></script>
<script>
    var el = document.getElementById('items');
    var sortable = new Sortable(el, {
        onUpdate: function(evt) {
            var item = evt.item; // the current dragged HTMLElement
            var order = sortable.toArray();
            console.log(order)
        }
    });
</script>
<?= $this->endSection() ?>

<?= $this->section('js') ?>
<!-- Jquery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<!-- Toastr -->
<script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<!-- Jquery Forms -->
<script src="https://malsup.github.io/jquery.form.js"></script>
<!-- MaskMoney -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-maskmoney/3.0.2/jquery.maskMoney.min.js" integrity="sha512-Rdk63VC+1UYzGSgd3u2iadi0joUrcwX0IWp2rTh6KXFoAmgOjRS99Vynz1lJPT8dLjvo6JZOqpAHJyfCEZ5KoA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script>
    $(document).ready(function() {
        $("#valorContrato").maskMoney({
            thousands: '.',
            decimal: ',',
            allowZero: true,
            prefix: 'R$ '
        });




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

        $('.ajax_envio_update').ajaxForm({
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



        function readLogo(input, idClass) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $(idClass).attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
        $('#form__img-favicon').on('change', function() {
            readLogo(this, '#form__favicon');
        });
        $('#form__img-logo').on('change', function() {
            readLogo(this, '#form__logo');
        });
        $('#form__img-capa').on('change', function() {
            readLogo(this, '#form__capa');
        });
        $('#form__img-background').on('change', function() {
            readLogo(this, '#form__background');
        });
        /*var sortable = Sortable.create(el, {
            onUpdate: function(evt) {
                var item = evt.item; // the current dragged HTMLElement
                var order = sortable.toArray();
                /*$.ajax({
                    url: 'update_order.php',
                    type: 'POST',
                    data: {
                        order: order
                    },
                    success: function(data) {
                        // handle success
                    },
                    error: function() {
                        // handle error
                    }
                });

                console.log(order)
            }
        });*/
    });
</script>
<?= $this->endSection() ?>