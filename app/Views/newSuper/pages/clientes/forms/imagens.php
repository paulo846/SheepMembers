<div class="row">
    <div class="col-lg-10 offset-lg-1">
        <?= form_open_multipart('superadmin/api/config/upload/images', 'class="ajax_envio_simples"') ?>
        <input type="hidden" name="id_empresa" value="<?= $empresa['id'] ?>">

        <div class="row">

            <div class="col-12">
                <div class="mb-3">
                    <label for="form__img-favicon" class="form-label">Envie um favicon de até 32x32 pixels</label>
                    <div class="form__logo form__cover_logo" style="width: 60px; height: 60px;">
                        <label for="form__img-favicon"></label>
                        <input id="form__img-favicon" name="favicon" type="file" accept=".png, .jpg, .jpeg, .webp">
                        <img id="form__favicon" class="img--place" src="<?= ($config['favicon']) ?  $s3->getImageUrl($config['favicon']) . '?t=' . time() : '#' ?> " alt="">
                    </div>
                </div>
            </div>
            <!--end col-->

            <div class="col-12">
                <div class="mb-3">
                    <label for="form__img-logo">Envie um logo de 230x70 pixels</label>
                    <div class="form__img form__cover_logo " style="width: 270px; height: 70px;">
                        <label for="form__img-logo"></label>
                        <input id="form__img-logo" name="logo" type="file" accept=".png, .jpg, .jpeg, .webp">
                        <img id="form__logo" class="img--place" src="<?= ($config['logo']) ?  $s3->getImageUrl($config['logo']) . '?t=' . time() : '#' ?>" alt="">
                    </div>
                </div>
            </div>
            <!--end col-->

            <div class="col-12">
                <div class="mb-3">
                    <label for="form__img-capa">Capa para a plataforma 1920x450 pixels</label>
                    <div class="form__img form__cover_logo" style="width: 100%; height: 200px;">
                        <label for="form__img-capa"></label>
                        <input id="form__img-capa" name="capa" type="file" accept=".png, .jpg, .jpeg, .webp">
                        <img id="form__capa" class="img--place" src="<?= ($config['capa']) ?  $s3->getImageUrl($config['capa']) . '?t=' . time() : '#' ?>" alt="">
                    </div>
                </div>
            </div>
            <!--end col-->

            <div class="col-12">
                <div class="mb-3">
                    <label for="form__img-background">Background geral 1920x1920 pixels</label>
                    <div class="form__img form__cover_logo" style="width: 100%; height: 420px; max-height: 80%;">
                        <label for="form__img-background"></label>
                        <input id="form__img-background" name="background" type="file" accept=".png, .jpg, .jpeg, .webp">
                        <img id="form__background" class="img--place" src="<?= ($config['background']) ?  $s3->getImageUrl($config['background']) . '?t=' . time() : '#' ?>" alt="">
                    </div>
                </div>
            </div>
            <!--end col-->

            <div class="col-lg-12">
                <div class="text-end">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div><!--end col-->
        </div><!--end row-->
        </form>
    </div>
</div>