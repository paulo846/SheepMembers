<div class="modal fade" id="newGravacao<?= $carrossel['id'] ?>" tabindex="-1" aria-labelledby="newGravacao<?= $carrossel['id'] ?>Label" aria-modal="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newGravacao<?= $carrossel['id'] ?>Label">Novo video</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <?= form_open_multipart('superadmin/api/config/gravacao', ['class' => 'ajax_envio_simples']) ?>
                <input type="hidden" name="id_empresa" value="<?= $empresa['id'] ?>">
                <input type="hidden" name="id_carrossel" value="<?= $carrossel['id'] ?>">
                <div class="row g-3">
                    <div class="col-xxl-6">
                        <div>
                            <label for="tituloGravacao<?= $carrossel['id'] ?>" class="form-label">Titulo da gravação</label>
                            <input type="text" class="form-control" id="tituloGravacao<?= $carrossel['id'] ?>" name="title" placeholder="Live 001" required>
                        </div>
                    </div><!--end col-->
                    <div class="col-xxl-6">
                        <div>
                            <label for="comentarios<?= $carrossel['id'] ?>" class="form-label">Permitir comentários?</label> <br>
                            <div class="form-check form-switch form-switch-lg" dir="ltr">
                                <input type="checkbox" class="form-check-input" id="comentarios<?= $carrossel['id'] ?>" checked="" name="ativaComentarios">
                                <label class="form-check-label" for="comentarios<?= $carrossel['id'] ?>"></label>
                            </div>
                        </div>
                    </div><!--end col-->
                    <div class="col-xxl-12">
                        <div>
                            <label for="descricaoGravacao<?= $carrossel['id'] ?>" class="form-label">Descrição da gravação</label>
                            <textarea class="form-control" name="descricao" id="descricaoGravacao<?= $carrossel['id'] ?>" cols="30" rows="5"></textarea>
                        </div>
                    </div><!--end col-->
                    <div class="col-xxl-12">
                        <div>
                            <label for="urlGravacao<?= $carrossel['id'] ?>" class="form-label">URL da gravação</label>
                            <input type="text" class="form-control" id="urlGravacao<?= $carrossel['id'] ?>" name="url" placeholder="https://www.youtube.com/" required>
                        </div>
                    </div><!--end col-->

                    <div class="col-xxl-6">
                        <div>
                            <label for="verticalGravacao<?= $carrossel['id'] ?>" class="form-label">Imagem vertical 192x270</label>
                            <input id="verticalGravacao<?= $carrossel['id'] ?>" class="form-control" name="vertical" type="file" accept=".png, .jpg, .jpeg">
                        </div>
                    </div><!--end col-->

                    <div class="col-xxl-6">
                        <div>
                            <label for="horizontalCapaGravacao<?= $carrossel['id'] ?>" class="form-label">Imagem horizontal capa 1280x720 pixels</label>
                            <input id="horizontalCapaGravacao<?= $carrossel['id'] ?>" name="capaGravados" class="form-control" type="file" accept=".png, .jpg, .jpeg">
                        </div>
                    </div><!--end col-->

                    <div class="col-xxl-12">
                        <div>
                            <label for="heroGravacao<?= $carrossel['id'] ?>" class="form-label">Imagem de exibição da página 1920x450 pixels</label>
                            <input id="heroGravacao<?= $carrossel['id'] ?>" name="heroGravacao" class="form-control" type="file" accept=".png, .jpg, .jpeg">
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