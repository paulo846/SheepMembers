<div class="row">
    <div class="col-lg-12">
        <?= form_open('superadmin/api/empresa/update', 'class="ajax_envio_simples"') ?>
        <input type="hidden" name="id_empresa" value="<?= $empresa['id'] ?>">
            <div class="row">
                <div class="col-8">
                    <div class="mb-3">
                        <label for="empresaResponsavel" class="form-label">Nome do responsável</label>
                        <input type="text" class="form-control" placeholder="Nome do responsável pela empresa" id="empresaResponsavel" name="empresaResponsavel" value="<?= $empresa['name'] ?>">
                    </div>
                </div><!--end col-->
                <div class="col-4">
                    <div class="mb-3">
                        <label for="prazo" class="form-label">Prazo para bloqueio</label>
                        <input type="number" class="form-control" placeholder="" id="prazo" name="prazo" value="<?= $empresa['prazo'] ?>">
                    </div>
                </div><!--end col-->
                <div class="col-3">
                    <div class="mb-3">
                        <label for="empresaNome" class="form-label">Empresa</label>
                        <input type="text" class="form-control" placeholder="Nome da empresa" id="empresaNome" name="empresaNome" value="<?= $empresa['empresa'] ?>">
                    </div>
                </div><!--end col-->
                <div class="col-6">
                    <div class="mb-3">
                        <label for="nomeEvento" class="form-label">Nome do evento</label>
                        <input type="text" class="form-control" placeholder="Nome do eventor" id="nomeEvento" name="nomeEvento" value="<?= $empresa['evento'] ?>">
                    </div>
                </div><!--end col-->
                <div class="col-3">
                    <div class="mb-3">
                        <label for="valorContrato" class="form-label">Valor do contrato</label>
                        <input type="text" class="form-control" placeholder="R$ 0,00" id="valorContrato" name="valorContrato" value="<?= $empresa['valor'] ?>">
                    </div>
                </div><!--end col-->
                <div class="col-12">
                    <div class="mb-3">
                        <label for="editor" class="form-label">Contrato</label>
                        <textarea name="content" id="editor" class="form-control"><?= $empresa['contrato'] ?></textarea>
                    </div>
                </div><!--end col-->
                <div class="col-lg-12">
                    <div class="text-end">
                        <button type="submit" class="btn btn-primary">Atualizar</button>
                    </div>
                </div><!--end col-->
            </div><!--end row-->
        </form>
    </div>
</div>