<?= $this->extend('usuarios/newPainel/template/template') ?>
<?= $this->section('content') ?>
<!-- details -->
<section class="section section--head section--head-fixed section--gradient section--details-bg">
    <div class="section__bg" data-bg="<?= ($filme['hero']) ? $s3->getImageUrl($filme['hero']) : '/assets/painel/img/details.jpg' ?>"></div>
    <div class="container" style="margin-top: -80px;">
        <!-- article -->
        <div class="article">
            <div class="row">
                <div class="col-12 col-xl-8 offset-xl-2">
                    <!-- article content -->
                    <div class="article__content">
                        <h1><?= $filme['title'] ?></h1>
                        <p style="margin-top: -30px;"><?php print_r($filme['description']) ?></p>
                    </div>
                    <!-- end article content -->
                </div>
                <!-- video player -->
                <div class="col-12 col-xl-8  offset-xl-2" style="margin-top: -30px;">
                    <div id="player3" data-plyr-provider="youtube" data-plyr-embed-id="<?= obterIDVideoYouTube($filme['url']) ?>" crossorigin controls playsinline poster="<?= ($filme['hero']) ? $s3->getImageUrl($filme['horizontal']) : 'https://cdn.plyr.io/static/demo/View_From_A_Blue_Moon_Trailer-HD.jpg' ?>"></div>
                </div>
            </div>
        </div>



        <div class="row">
            <?php if ($filme['comentarios'] == 'on') :
                $buildComentUser = $comentarios->where(['id_gravacao' => $filme['id'], 'aprovado' => false, 'id_usuario' => session('idUser')])->countAllResults();
                $buildComent = $comentarios->where(['id_gravacao' => $filme['id'], 'aprovado' => true])->findAll(10);

            ?>
                <div class="col-12 col-xl-8 offset-xl-2">
                    <!-- comments and reviews -->
                    <div class="comments">
                        <!-- tabs nav -->
                        <ul class="nav nav-tabs comments__title comments__title--tabs" id="comments__tabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#tab-1" role="tab" aria-controls="tab-1" aria-selected="true">
                                    <h4><?= lang('Panel.comentarios.text') ?></h4>
                                    <span><?= (count($buildComent)) ? count($buildComent) : 0 ?></span>
                                </a>
                            </li>
                        </ul>
                        <!-- end tabs nav -->

                        <!-- tabs -->
                        <div class="tab-content">
                            <!-- comments -->
                            <div class="tab-pane fade show active" id="tab-1" role="tabpanel">
                                <?php if ($buildComentUser) : ?>
                                    <div class="alert alert-danger">
                                        <?= lang('Panel.userComentario', [$buildComentUser]) ?>
                                    </div>
                                <?php endif; ?>
                                <?php foreach ($buildComent as $comentario) : ?>
                                    <ul class="comments__list">
                                        <li class="comments__item">
                                            <div class="comments__autor">
                                                <img class="comments__avatar" src="/assets/painel/img/avatar.svg" alt="">
                                                <span class="comments__name"><?= $userComents->find($comentario['id_usuario'])['name'] ?></span>
                                                <span class="comments__time"><?= formatarDataComent($comentario['created_at']) ?> - <?php if($comentario['id_usuario'] == session('idUser')) : ?><a href="/client/api/comentario/<?= session('idUser')  ?>/<?= $comentario['id'] ?>" class="text-danger" onclick="deletar()"><?= lang('Panel.comentarios.excluir') ?></a><?php endif; ?></span>
                                            </div>
                                            <p class="comments__text"><?= esc($comentario['comentario']) ?></p>
                                        </li>
                                    </ul>
                                <?php endforeach; ?>
                                <?= form_open('client/api/comentar', ['class' => 'comments__form']) ?>
                                <div class="sign__group">
                                    <input type="hidden" value="<?= session('idUser') ?>" name="idUser">
                                    <input type="hidden" value="<?= $idEmpresa ?>" name="idEmpresa">
                                    <input type="hidden" value="<?= $filme['id'] ?>" name="idFilme">
                                    <textarea id="text" name="comentario" class="sign__textarea" placeholder="<?= lang('Panel.comentarios.add') ?>"></textarea>
                                </div>
                                <button type="submit" class="sign__btn"><?= lang('Panel.comentarios.button') ?></button>
                                </form>
                            </div>
                            <!-- end comments -->
                        </div>
                        <!-- end tabs -->
                    </div>
                    <!-- end comments and reviews -->
                </div>
            <?php endif; ?>

        </div>

    </div>
    <!-- end article -->
    </div>
</section>

<?= view_cell('App\Cells\ListaFilmes::grade', ['idEmpresa' => $idEmpresa]) ?>
<?= view_cell('App\Cells\ListaFilmes::slides', ['idEmpresa' => $idEmpresa]) ?>


<!-- end details -->
<?= $this->endSection() ?>

<?= $this->section('js') ?>
<script>
    const player3 = new Plyr('#player3');

    function deletar() {
		// Retorna true se confirmado, ou false se cancelado
		return confirm("<?= lang('Panel.comentarios.excluirAviso') ?>");
	}
    
</script>
<?= $this->endSection() ?>