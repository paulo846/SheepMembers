<!-- Grids in modals -->
<div class="modal fade" id="modalcsv" tabindex="-1" aria-labelledby="modalcsvLabel" aria-modal="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalcsvLabel">Novo lista de alunos</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <?= form_open_multipart('/superadmin/api/cliente/new/list', ['class' => 'form-update-page']) ?>
                    <div class="row g-3">
                        <div class="col-xxl-12">
                            <div>
                                <label for="csvfile" class="form-label">Arquivo CSV</label>
                                <input type="file" name="csvfile" id="csvfile" class="form-control" required>
                            </div>
                        </div><!--end col-->
                        <div class="col-xxl-12">
                            <div>
                                <label for="eventoAluno" class="col-form-label">Evento</label>
                                <select class="form-select" name="empresa" id="eventoAluno" required>
                                    <option value="">Selecione</option>
                                    <?php foreach ($eventos as $key => $evento) : ?>
                                        <option value="<?= $key ?>"><?= $evento ?></option>
                                    <?php endforeach; ?>
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