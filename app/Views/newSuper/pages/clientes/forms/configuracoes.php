<div class="row">
    <div class="col-lg-12">
        <?= form_open('superadmin/api/config/update/analytics', 'class="ajax_envio_simples"') ?>
        <input type="hidden" name="id_empresa" value="<?= $empresa['id'] ?>">
        <div class="row">
            <div class="col-12">
                <div class="mb-3">
                    <label for="slug" class="form-label">Informe um domínio ou utilize um subdominios da sheepmembers</label>
                    <input type="text" class="form-control" placeholder="https://exemplo.com" id="slug" name="slug" value="<?= $config['slug'] ?>">
                    <p class="mt-1">
                        Opções para subdominios: <br>
                        <b>*.vinhaonline.com</b><br>
                        <b>*.conect.app</b><br>
                        <b>*.sheepmembers.com</b> <br>
                        <span class="text-danger fw-bolder">
                            Após apontamento do dominio personalizado, verificar SSL.
                        </span>
                    </p>
                </div>
            </div><!--end col-->
            <div class="col-12">
                <div class="mb-3">
                    <label for="scriptHeader" class="form-label">Scripts de rastreamento no header</label>
                    <textarea name="scriptHeader" class="form-control" id="scriptHeader" cols="30" rows="10"><?= $config['analytics'] ?></textarea>
                </div>
            </div><!--end col-->
            <div class="col-12">
                <div class="mb-3">
                    <label for="scriptFooter" class="form-label">Scripts de rastreamento no footer</label>
                    <textarea name="scriptFooter" class="form-control" id="scriptFooter" cols="30" rows="10"><?= $config['scripts_footer'] ?></textarea>
                </div>
            </div><!--end col-->
            <div class="col-lg-12">
                <div class="text-end">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div><!--end col-->
        </div><!--end row-->
        </form>
    </div>
</div>