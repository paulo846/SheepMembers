<?= $this->extend('super/layout') ?>
<?= $this->section('css') ?>

<?= $this->endSection() ?>

<?= $this->section('content') ?>
<!-- main title -->
<div class="col-12">
    <div class="main__title">
        <h2><?= (isset($title)) ? $title : 'Stream' ?></h2>
    </div>
</div>



<div class="col-12">
    <div class="sign__wrap">
        <div class="row">
            <!-- details form -->
            <div class="col-12 col-lg-12">
                <?= form_open('/superadmin/api/empresas', 'class="sign__form sign__form--profile sign__form--first" id="formEmpresa"') ?>
                    <div class="row">
                        <div class="col-12">
                            <h4 class="sign__title">Dados nova empresa</h4>
                        </div>

                        <div class="col-12 col-md-6 col-lg-12 col-xl-6">
                            <div class="sign__group">
                                <label class="sign__label" for="username">Nome do responsável</label>
                                <input id="nome" type="text" name="nome" class="sign__input" placeholder="Nome do responsável">
                            </div>
                        </div>

                        <div class="col-12 col-md-6 col-lg-12 col-xl-6">
                            <div class="sign__group">
                                <label class="sign__label" for="empresa">Empresa</label>
                                <input id="empresa" type="text" name="empresa" class="sign__input" placeholder="Empresa">
                            </div>
                        </div>

                        <div class="col-12 col-md-6 col-lg-12 col-xl-6">
                            <div class="sign__group">
                                <label class="sign__label" for="valor">Valor do contrato</label>
                                <input id="valor" type="text" name="valor" class="sign__input" placeholder="0,00">
                            </div>
                        </div>

                        <div class="col-12 col-md-6 col-lg-12 col-xl-6">
                            <div class="sign__group">
                                <label class="sign__label" for="contrato">Descrição do contrato</label>
                                <textarea class="sign__input" name="contrato" id="contrato" cols="30" rows="10" placeholder="Descrição do contrato"></textarea>
                            </div>
                        </div>

                        <div class="col-12">
                            <button class="sign__btn" type="submit">Save</button>
                        </div>
                    </div>
                </form>
            </div>
            <!-- end details form -->
        </div>
    </div>
</div>


<?= $this->endSection() ?>
<?= $this->section('script') ?>
<script src="https://malsup.github.io/jquery.form.js"></script>
<script>
    $(document).ready(function() {
        $('#formEmpresa').ajaxForm({
            dataType: 'json',
            success: function(response) {
                // Ação a ser executada em caso de sucesso
                toastr.success('Cadastrado com sucesso, agora configure as transmissões!!!')
                $("#formEmpresa")[0].reset()
                //console.log(response.id)
                window.location.href = `${baseUrl}superadmin/edit/${response.id}`;

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
