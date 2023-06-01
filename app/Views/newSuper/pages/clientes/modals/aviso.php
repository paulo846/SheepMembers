<!-- Grids in modals -->
<div class="modal fade" id="avisosPlataforma" tabindex="-1" aria-labelledby="avisosPlataformaLabel" aria-modal="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="avisosPlataformaLabel">Ativar aviso na plataforma</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="alert bg-primary text-white">
                    Para retirar o aviso, você precisa apagar a mensagem e clicar em atualizar!
                </div>
                <?= form_open('superadmin/api/empresa/aviso/add', 'class="ajax_envio_update"') ?>
                <input type="hidden" name="id_empresa" value="<?= $empresa['id'] ?>">
                <input type="hidden" name="id_config" value="<?= $config['id'] ?>">
                <div class="row g-3">
                    <div class="col-xxl-12">
                        <div>
                            <label for="avisoPlataforma" class="form-label">O aviso que aparecerá na sua página principal da plataforma</label>
                            <textarea class="form-control" name="avisoPlataforma" id="avisoPlataforma" cols="30" rows="5"><?= $config['alertas'] ?></textarea>
                        </div>
<div class="code-view mt-1">
<pre class="language-markup">
<code>Exemplo para atualizar a página do cliente:
&lt;script&gt;window.location.reload();&lt;/script&gt;</code>
<code>Exemplo para aviso com mensagem escrita <b>MENSAGEM TIPO ERRO COM FUNDO VERMELHO</b>
&lt;div class="alert alert-danger"&gt;
&lt;div style="font-size: 22px;"&gt;Sua mensagem aqui&lt;/div&gt;
&lt;/div&gt;</code>
<code>Exemplo para aviso com mensagem escrita <b>MENSAGEM DE SUCESSO COM FUNDO VERDE</b>
&lt;div class="alert alert-success"&gt;
&lt;div style="font-size: 22px;"&gt;Sua mensagem aqui&lt;/div&gt;
&lt;/div&gt;</code>
</pre>
</div>
                    </div><!--end col-->

                    <div class="col-lg-12">
                        <div class="hstack gap-2 justify-content-end">
                            <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancelar</button>
                            <button type="submit" class="btn btn-primary">Atualizar</button>
                        </div>
                    </div><!--end col-->
                </div><!--end row-->
                </form>
            </div>
        </div>
    </div>
</div>