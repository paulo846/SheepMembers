<!-- Grids in modals -->
<div class="modal fade" id="exampleModalgrid" tabindex="-1" aria-labelledby="exampleModalgridLabel" aria-modal="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalgridLabel">Novo carrossel</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <?= form_open('superadmin/api/empresa/carrossel', ['class' => 'ajax_envio_simples']) ?>
                <input type="hidden" name="id_empresa" value="<?= $empresa['id'] ?>">
                <div class="row g-3">
                    <div class="col-xxl-12">
                        <div>
                            <label for="nameCarrossel" class="form-label">Nome para o carrossel</label>
                            <input type="text" class="form-control" id="nameCarrossel" name="title" placeholder="Últimos videos" required>
                        </div>
                    </div><!--end col-->

                    <div class="col-xxl-12">
                        <div>
                            <label for="tipoCarrossel" class="form-label">Tipo de carrossel</label>
                            <select class="form-select" name="config" id="tipoCarrossel" required>
                                <option value="">Escolha uma opção</option>
                                <option value="1">Grade</option>
                                <option value="2">Slide</option>
                            </select>
                        </div>
                    </div><!--end col-->

                    <div class="col-lg-12">
                        <div class="hstack gap-2 justify-content-end">
                            <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancelar</button>
                            <button type="submit" class="btn btn-primary">Cadastrar</button>
                        </div>
                    </div><!--end col-->
                </div><!--end row-->
                </form>
            </div>
        </div>
    </div>
</div>