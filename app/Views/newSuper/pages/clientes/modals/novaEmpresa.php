<!-- Grids in modals -->
<div class="modal fade" id="novaEmpresa" tabindex="-1" aria-labelledby="novaEmpresaLabel" aria-modal="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="novaEmpresaLabel">Nova empresa</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <?= form_open('superadmin/api/empresas', 'class="ajax_envio_simples"') ?>
                <div class="row g-3">
                    <div class="col-xxl-12">
                        <div>
                            <label for="nome">Nome do responsável</label>
                            <input type="text" class="form-control" name="nome" id="nome" placeholder="Nome do responsável" required>
                        </div>
                    </div><!--end col-->
                    <div class="col-xxl-12">
                        <div>
                            <label for="empresa">Nome da empresa</label>
                            <input type="text" class="form-control" name="empresa" id="empresa" placeholder="Nome da empresa" required>
                        </div>
                    </div><!--end col-->
                    <div class="col-lg-12">
                        <div class="hstack gap-2 justify-content-end">
                            <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancelar</button>
                            <button type="submit" class="btn btn-primary">Cadastrar empresa</button>
                        </div>
                    </div><!--end col-->
                </div><!--end row-->
                </form>
            </div>
        </div>
    </div>
</div>