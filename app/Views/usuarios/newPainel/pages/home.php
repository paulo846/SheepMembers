<?= $this->extend('usuarios/newPainel/template/template') ?>
<?= $this->section('content') ?>

<!-- details -->
<section class="section section--head section--head-fixed section--gradient section--details-bg">
    <div class="section__bg" data-bg="<?= ($capa) ? $capa : '/assets/painel/img/details.jpg' ?>"></div>
    <div class="container" style="margin-top: -80px;">
        <?php if ($stream) : ?>
            <!-- article -->
            <div class="article">
                <div class="row">
                    <div class="col-12 col-xl-8 offset-xl-2">
                        <div class="article__content">
                            <h1><?= $name ?></h1>
                            <p style="margin-top: -30px;"><?= $description ?></p>
                        </div>
                    </div>
                    <div class="col-12 col-xl-8  offset-xl-2" style="margin-top: -30px;">
                        <div id="player3" data-plyr-provider="youtube" data-plyr-embed-id="<?= obterIDVideoYouTube($stream) ?>" crossorigin poster="<?= $capaVideo ?>"></div>
                    </div>
                </div>
            </div>
        <?php endif; ?>
        <div class="article">
            <div class="row">
                <div class="col-12 col-xl-8 offset-xl-2">
                    <div id="lista-avisos"></div>
                </div>
            </div>
        </div>

        <?= view_cell('App\Cells\ListaFilmes::grade', ['idEmpresa' => $idEmpresa]) ?>
        <?= view_cell('App\Cells\ListaFilmes::slides', ['idEmpresa' => $idEmpresa]) ?>
    </div>
</section>



<?= $this->endSection() ?>






<?= $this->section('js') ?>
<script>
    const player3 = new Plyr('#player3');
</script>
<script>
    function ouvirAvisos() {
        $.getJSON(site + "client/api/avisos/<?= $idEmpresa ?>", (function(res) {
            var $listaAvisos = $("#lista-avisos");

            $listaAvisos.empty(), $.each(res, (function(_i, aviso) {
                if (aviso.text) {
                    $listaAvisos.html(aviso.text)
                } else {
                    $listaAvisos.empty();
                }
            }))
        }))
    }

    $(document).ready(function() {
        ouvirAvisos(), setInterval(ouvirAvisos, 10000);
    });
</script>
<?= $this->endSection() ?>