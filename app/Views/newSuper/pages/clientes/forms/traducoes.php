<h3 class="text-info">As lives aparecerão de acordo com as traduções configuradas</h3>
<div class="alert alert-success">
    Para ativar a transmissão ao vivo para a plataforma, é necessário um link de transmissão configurado nas traduções.
</div>
<div class="row">
    <div class="col-lg-4">
        <p class="fw-bolder">Configuração português</p>
        <?= form_open_multipart('superadmin/api/config/traducao/ptbr', ['class' => 'ajax_envio_update']) ?>
        <input type="hidden" name="id_config" value="<?= $config['id'] ?>">
        <input type="hidden" name="id_empresa" value="<?= $empresa['id'] ?>">
        <div class="row">
            <div class="col-12">
                <div class="mb-3">
                    <label for="ptTitulo" class="form-label">Titulo da live</label>
                    <input type="text" class="form-control" value="<?= $config['title_pt'] ?>" id="ptTitulo" name="ptTitulo" autofocus >
                </div>
            </div><!--end col-->
            <div class="col-12">
                <div class="mb-3">
                    <label for="ptDesc" class="form-label">Descrição da live</label>
                    <textarea class="form-control" name="ptDesc" id="ptDesc" cols="30" rows="5"><?= $config['description_pt'] ?></textarea>
                </div>
            </div><!--end col-->
            <div class="col-12">
                <div class="mb-3">
                    <label for="ptLink" class="form-label">Link da live</label>
                    <input type="url" class="form-control" placeholder="" id="ptLink" name="ptLink" value="<?= $config['stream_pt'] ?>">
                </div>
            </div><!--end col-->
            <div class="col-12">
                <div class="mb-3">
                    <label for="ptCapa" class="form-label">Capa para o vídeo 1280x720 pixels</label>
                    <input type="file" class="form-control" id="ptCapa" name="ptcapa" accept=".png, .jpg, .jpeg">
                </div>
            </div><!--end col-->
            <div class="col-lg-12">
                <div class="text-end">
                    <button type="submit" class="btn btn-primary">Atualizar tradução</button>
                </div>
            </div><!--end col-->
        </div><!--end row-->
        </form>
    </div>
    <div class="col-lg-4">
        <p class="fw-bolder">Configuração inglês</p>

        <?= form_open_multipart('superadmin/api/config/traducao/en', ['class' => 'ajax_envio_update']) ?>
        <input type="hidden" name="id_config" value="<?= $config['id'] ?>">
        <input type="hidden" name="id_empresa" value="<?= $empresa['id'] ?>">
        <div class="row">
            <div class="col-12">
                <div class="mb-3">
                    <label for="enTitulo" class="form-label">Titulo da live em inglês</label>
                    <input type="text" class="form-control" value="<?= $config['title_en'] ?>" id="enTitulo" name="enTitulo" >
                </div>
            </div><!--end col-->
            <div class="col-12">
                <div class="mb-3">
                    <label for="enDesc" class="form-label">Descrição da live em inglês</label>
                    <textarea class="form-control" name="enDesc" id="enDesc" cols="30" rows="5" ><?= $config['description_en'] ?></textarea>
                </div>
            </div><!--end col-->
            <div class="col-12">
                <div class="mb-3">
                    <label for="enLink" class="form-label">Link da live com transmissão em inglês</label>
                    <input type="url" class="form-control" value="<?= $config['stream_en'] ?>" id="enLink" name="enLink">
                </div>
            </div><!--end col-->
            <div class="col-12">
                <div class="mb-3">
                    <label for="enCapa" class="form-label">Capa para o vídeo 1280x720 pixels</label>
                    <input type="file" class="form-control" id="enCapa" name="enCapa" accept=".png, .jpg, .jpeg">
                </div>
            </div><!--end col-->
            <div class="col-lg-12">
                <div class="text-end">
                    <button type="submit" class="btn btn-primary">Atualizar tradução</button>
                </div>
            </div><!--end col-->
        </div><!--end row-->
        </form>
    </div>
    <div class="col-lg-4">
        <p class="fw-bolder">Configuração espanhol</p>
        <?= form_open_multipart('superadmin/api/config/traducao/es', ['class' => 'ajax_envio_update']) ?>
        <input type="hidden" name="id_config" value="<?= $config['id'] ?>">
        <input type="hidden" name="id_empresa" value="<?= $empresa['id'] ?>">
        <div class="row">
            <div class="col-12">
                <div class="mb-3">
                    <label for="esTitulo" class="form-label">Titulo da live em espanhol</label>
                    <input type="text" class="form-control" value="<?= $config['title_es'] ?>" id="esTitulo" name="esTitulo" >
                </div>
            </div><!--end col-->
            <div class="col-12">
                <div class="mb-3">
                    <label for="esDesc" class="form-label">Descrição da live em espanhol</label>
                    <textarea class="form-control" name="esDesc" id="esDesc" cols="30" rows="5" ><?= $config['description_es'] ?></textarea>
                </div>
            </div><!--end col-->
            <div class="col-12">
                <div class="mb-3">
                    <label for="esLink" class="form-label">Link da live em espanhol</label>
                    <input type="url" class="form-control" value="<?= $config['stream_es'] ?>" id="esLink" name="esLink">
                </div>
            </div><!--end col-->
            <div class="col-12">
                <div class="mb-3">
                    <label for="esCapa" class="form-label">Capa para o vídeo 1280x720 pixels</label>
                    <input type="file" class="form-control" id="esCapa" name="esCapa" accept=".png, .jpg, .jpeg">
                </div>
            </div><!--end col-->
            <div class="col-lg-12">
                <div class="text-end">
                    <button type="submit" class="btn btn-primary">Atualizar tradução</button>
                </div>
            </div><!--end col-->
        </div><!--end row-->
        </form>
    </div>
</div>