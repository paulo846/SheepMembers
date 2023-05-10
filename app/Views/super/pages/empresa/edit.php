<?= $this->extend('super/layout') ?>

<?= $this->section('css') ?>
<style>
    .img--place {
        color: #131720 !important;
        background-color: #131720 !important;
    }

    .form__logo {
        position: relative;
        width: 150px;
        height: 150px;
        overflow: hidden;
        background-color: #151f30;
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
<?= $this->endsection() ?>
<?= $this->section('content') ?>
<!-- main title -->
<div class="col-12">
    <div class="main__title">
        <h2>Editar</h2>
    </div>
</div>
<!-- end main title -->
<!-- profile -->
<div class="col-12">
    <div class="profile__content">

        <!-- profile tabs nav -->
        <ul class="nav nav-tabs profile__tabs" id="profile__tabs" role="tablist">
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#tab-1" role="tab" aria-controls="tab-1" aria-selected="true">Dados da empresa</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#tab-2" role="tab" aria-controls="tab-2" aria-selected="false">Imagens</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#tab-3" role="tab" aria-controls="tab-3" aria-selected="false">Config PT-BR</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#tab-4" role="tab" aria-controls="tab-4" aria-selected="false">Config EN</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#tab-5" role="tab" aria-controls="tab-5" aria-selected="false">Config ES</a>
            </li>
        </ul>
        <!-- end profile tabs nav -->
    </div>
</div>
<!-- end profile -->

<!-- content tabs -->
<div class="tab-content" id="myTabContent">
    <div class="tab-pane fade show active" id="tab-1" role="tabpanel" aria-labelledby="1-tab">
        <div class="col-12">
            <div class="sign__wrap">
                <div class="row">

                    <div class="col-12 col-lg-6">
                        <?= form_open("/superadmin/api/empresas/{$empresa['id']}", 'class="form_update sign__form sign__form--profile sign__form--first"') ?>
                        <div class="row">
                            <div class="col-12">
                                <h4 class="sign__title">Atualize a empresa</h4>
                            </div>

                            <div class="col-12">
                                <div class="sign__group">
                                    <label class="sign__label" for="username">Nome do responsável</label>
                                    <input id="nome" type="text" name="nome" class="sign__input" placeholder="Nome do responsável" value="<?= $empresa['name'] ?>">
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="sign__group">
                                    <label class="sign__label" for="empresa">Empresa</label>
                                    <input id="empresa" type="text" name="empresa" class="sign__input" placeholder="Empresa" value="<?= $empresa['empresa'] ?>">
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="sign__group">
                                    <label class="sign__label" for="valor">Valor do contrato</label>
                                    <input id="valor" type="text" name="valor" class="sign__input" placeholder="0,00" value="<?= number_to_currency($empresa['valor'], 'BRL', 'pt-BR', 2); ?>">
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="sign__group">
                                    <label class="sign__label" for="contrato">Descrição do contrato</label>
                                    <textarea class="sign__input" style="padding: 10px;" name="contrato" id="contrato" cols="30" rows="25" placeholder="Descrição do contrato"><?= $empresa['contrato'] ?></textarea>
                                </div>
                            </div>

                            <div class="col-12">
                                <input type="hidden" name="id" value="<?= $empresa['id'] ?>">
                                <button class="sign__btn" type="submit">Save</button>
                            </div>
                        </div>
                        </form>
                    </div>

                    <!-- end details form -->

                    <div class="col-12 col-lg-6">
                        <?= form_open("/superadmin/api/config/{$empresa['id']}/dominio", 'class="form_update sign__form sign__form--profile sign__form--first"') ?>
                        <div class="row">
                            <div class="col-12">
                                <h4 class="sign__title">Informe um domínio ou subdomínio</h4>
                            </div>

                            <div class="col-12">
                                <div class="sign__group">
                                    <label class="sign__label" for="">Informe um dominio ou utilize um subdominio</label>
                                    <input id="dominio" type="text" name="dominio" class="sign__input" placeholder="ex: meudominio.com ou nome.conect.app" value="<?= $config['slug'] ?>">
                                    <div class="sign__label mt-3">
                                        Opções de subdominios:
                                        <ul class="form__radio mt-2">
                                            <li><span class="subdominio"></span>vinhaonline.com</li>
                                            <li><span class="subdominio"></span>conect.com</li>
                                        </ul>

                                        <span>
                                            <?php
                                            if (gethostbyname($config['slug']) == gethostbyname('conect.app')) {
                                                echo '<span class="main__table-text--green"">Seu dominio está configurado!</span>';
                                            } else {
                                                echo '<span class="main__table-text--red">Aponte seu dominio para o nosso ip: ' . gethostbyname('conect.app</span>');
                                            }
                                            ?>
                                        </span>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12">
                                <input type="hidden" name="id" value="<?= $empresa['id'] ?>">
                                <button class="sign__btn" id="btn_aviso" type="submit">Save</button>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="tab-pane fade" id="tab-2" role="tabpanel" aria-labelledby="2-tab">
        <div class="col-12">
            <div class="sign__wrap">
                <div class="row">
                    <!-- details form -->
                    <div class="col-12 col-lg-12">
                        <?= form_open_multipart("/superadmin/api/config/{$empresa['id']}/images", 'class="form_update"') ?>
                        <div class="row">
                            <div class="col-md-5">
                                <p class="mt-3" style="color: #fff;">Envie um logo 300x300</p>
                            </div>
                            <div class="col-md-7">
                                <div class="form__logo form__cover_logo">
                                    <label for="form__img-logo"></label>
                                    <input id="form__img-logo" name="logo" type="file" accept=".png, .jpg, .jpeg">
                                    <img id="form__logo" class="img--place" src="<?= ($config['logo_pt']) ? $s3->getImageUrl($config['logo_pt']) . '?t=' . time() : '#' ?> " alt="">
                                </div>
                            </div>
                            <div class="col-md-5">
                                <p class="mt-3" style="color: #fff;">Envie uma imagem de fundo 2500x1500</p>
                            </div>
                            <div class="col-md-7">
                                <div class="form__img form__cover_logo " style="width: 100%; height: 300px; max-height: 80%;">
                                    <label for="form__img-upload"></label>
                                    <input id="form__img-upload" name="background" type="file" accept=".png, .jpg, .jpeg">
                                    <img id="form__img" class="img--place" src="<?= ($config['fundo']) ? $s3->getImageUrl($config['fundo']) . '?t=' . time() : '#' ?>" alt="">
                                </div>
                            </div>
                            <div class="col-12 col-md-3">
                                <input type="hidden" name="id" value="<?= $empresa['id'] ?>">
                                <button class="sign__btn" type="submit">Save</button>
                            </div>
                        </div>

                        </form>
                    </div>
                    <!-- end details form -->
                </div>
            </div>
        </div>
    </div>

    <div class="tab-pane fade" id="tab-3" role="tabpanel" aria-labelledby="3-tab">
        <div class="col-12">
            <div class="sign__wrap">
                <div class="row">
                    <!-- details form -->
                    <div class="col-12">
                        <?= form_open("/superadmin/api/config/{$empresa['id']}/ptbr", 'class="form_update sign__form sign__form--profile sign__form--first" id="formEmpresa"') ?>
                        <div class="row">
                            <div class="col-12">
                                <div class="sign__group">
                                    <label class="sign__label" for="titlept">Titulo para PT-BR</label>
                                    <input id="titlept" type="text" name="title_pt" class="sign__input" placeholder="ENCONTRO DE PASTORES" value="<?= $config['title_pt'] ?>">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="sign__group">
                                    <label class="sign__label" for="descpt">Descrição para PT-BR</label>
                                    <textarea class="sign__input" style="padding: 10px;" name="desc_pt" id="descpt" cols="30" rows="25" placeholder="Descrição do evento"><?= $config['description_pt'] ?></textarea>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="sign__group">
                                    <label class="sign__label" for="encodingpt">URL da transmissão para PT-BR</label>
                                    <input id="encodingpt" type="text" name="url_pt" class="sign__input" placeholder="https://www.youtube.com/embed/ncqcuXZwXJ8" value="<?= $config['stream_pt'] ?>">
                                </div>
                            </div>

                            <div class="col-12">
                                <input type="hidden" name="id" value="<?= $empresa['id'] ?>">
                                <button class="sign__btn" type="submit">Save</button>
                            </div>
                        </div>
                        </form>

                    </div>
                    <!-- end details form -->
                </div>
            </div>
        </div>
    </div>
    <div class="tab-pane fade" id="tab-4" role="tabpanel" aria-labelledby="4-tab">
        <div class="col-12">
            <div class="sign__wrap">
                <div class="row">
                    <!-- details form -->
                    <div class="col-12 col-lg-12">
                        <?= form_open("/superadmin/api/config/{$empresa['id']}/en", 'class="form_update sign__form sign__form--profile sign__form--first" id="formEmpresa"') ?>
                        <div class="row">
                            <div class="col-12">
                                <div class="sign__group">
                                    <label class="sign__label" for="titleen">Titulo para EN</label>
                                    <input id="titleen" type="text" name="title_en" class="sign__input" placeholder="MEETING OF PASTORS" value="<?= $config['title_en'] ?>">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="sign__group">
                                    <label class="sign__label" for="descen">Descrição para EN</label>
                                    <textarea class="sign__input" style="padding: 10px;" name="desc_en" id="descen" cols="30" rows="25" placeholder="Description of the event"><?= $config['description_en'] ?></textarea>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="sign__group">
                                    <label class="sign__label" for="encodingen">URL da transmissão para EN</label>
                                    <input id="encodingen" type="text" name="url_en" class="sign__input" placeholder="https://www.youtube.com/embed/ncqcuXZwXJ8" value="<?= $config['stream_en'] ?>">
                                </div>
                            </div>
                            <div class="col-12">
                                <input type="hidden" name="id" value="<?= $empresa['id'] ?>">
                                <button class="sign__btn" type="submit">Save</button>
                            </div>
                        </div>
                        </form>

                    </div>
                    <!-- end details form -->
                </div>
            </div>
        </div>
    </div>
    <div class="tab-pane fade" id="tab-5" role="tabpanel" aria-labelledby="5-tab">
        <div class="col-12">
            <div class="sign__wrap">
                <div class="row">
                    <!-- details form -->
                    <div class="col-12 col-lg-12">
                        <div class="col-12 col-lg-12">
                            <?= form_open("/superadmin/api/config/{$empresa['id']}/es", 'class="form_update sign__form sign__form--profile sign__form--first" id="formEmpresa"') ?>
                            <div class="row">
                                <div class="col-12">
                                    <div class="sign__group">
                                        <label class="sign__label" for="titlees">Titulo para ES</label>
                                        <input id="titlees" type="text" name="title_es" class="sign__input" placeholder="ENCUENTRO DE PASTORES" value="<?= $config['title_es'] ?>">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="sign__group">
                                        <label class="sign__label" for="desces">Descrição para ES</label>
                                        <textarea class="sign__input" style="padding: 10px;" name="desc_es" id="desces" cols="30" rows="25" placeholder="Descripción del evento"><?= $config['description_es'] ?></textarea>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="sign__group">
                                        <label class="sign__label" for="encodinges">URL da transmissão para ES</label>
                                        <input id="encodinges" type="text" name="url_es" class="sign__input" placeholder="https://www.youtube.com/embed/ncqcuXZwXJ8" value="<?= $config['stream_es'] ?>">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <input type="hidden" name="id" value="<?= $empresa['id'] ?>">
                                    <button class="sign__btn" type="submit">Save</button>
                                </div>
                            </div>
                            </form>
                        </div>
                        <!-- end details form -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end content tabs -->

    <?= $this->endSection() ?>



    <?= $this->section('script') ?>
    <script src="https://malsup.github.io/jquery.form.js"></script>
    <script>
        $(document).ready(function() {
            $('.form_update').ajaxForm({
                dataType: 'json',

                // Configuração para adicionar barra de progresso
                beforeSubmit: function() {
                    toastr.warning('Enviando dados!!!')
                },

                success: function(response) {
                    // Ação a ser executada em caso de sucesso
                    toastr.success('Cadastrado com sucesso, agora configure as transmissões!!!')
                },
                error: function(response) {
                    // Ação a ser executada em caso de erro
                    toastr.error('Verique os logs do navegador!')
                    console.log(response)
                }
            });


            $('#dominio').keyup(function(e) {
                var dominio = $("#dominio").val();
                $(".subdmonio").html(dominio + '.');
            });


            /*==============================
            Upload cover
            ==============================*/

            function readLogo(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();

                    reader.onload = function(e) {
                        $('#form__logo').attr('src', e.target.result);
                    }

                    reader.readAsDataURL(input.files[0]);
                }
            }

            $('#form__img-logo').on('change', function() {
                readLogo(this);
            });
        });
    </script>
    <?= $this->endSection() ?>