<!-- Varying modal content -->
<div class="modal fade" id="varyingcontentModal" tabindex="-1" aria-labelledby="varyingcontentModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="varyingcontentModalLabel">Enviar acesso</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <?= form_open('/superadmin/api/aluno/reenvio', 'class="form"') ?>
                <div class="modal-body">
                    <div class="mb-2">
                        <label for="r_name" class="col-form-label">Nome:</label>
                        <input type="text" class="form-control" id="r_name" name="r_name" readonly>
                    </div>
                    <div class="mb-2">
                        <label for="r_email" class="col-form-label">Email:</label>
                        <input type="text" class="form-control" id="r_email" name="r_email" readonly>
                    </div>
                    <div class="mb-2">
                        <label for="r_evento" class="col-form-label">Evento</label>
                        <select class="form-select" name="r_evento" id="r_evento" required>
                            <option value="">Selecione</option>
                            <?php foreach ($eventos as $key => $evento) : ?>
                                <option value="<?= $key ?>"><?= $evento ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <input type="hidden" class="form-control" id="r_id" name="r_id">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Reenviar</button>
                </div>
            </form>
        </div>
    </div>
</div>