<?= $this->section('css') ?>
<style>
    .form__logo {
        position: relative;
        width: 150px;
        height: 150px;
        overflow: hidden;
        background-color: #151f30;
        margin-bottom: 20px;
        border-radius: 16px;
        overflow: hidden;
    }

    .form__logo input {
        position: absolute;
        left: -9999px;
        opacity: 0;
    }

    .form__logo label {
        position: absolute;
        display: flex;
        flex-direction: row;
        justify-content: center;
        align-items: center;
        top: 0;
        right: 0;
        bottom: 0;
        left: 0;
        z-index: 2;
        cursor: pointer;
        margin: 0;
        font-weight: normal;
        font-size: 14px;
        color: #e0e0e0;
        transition: 0.5s;
    }

    .form__logo label:hover {
        color: #fff;
    }

    .form__logo img {
        position: absolute;
        z-index: 1;
        top: -100px;
        right: -100px;
        bottom: -100px;
        left: -100px;
        margin: auto;
        width: 100%;
    }

    @media (min-width: 768px) {
        .form__cover {
            -ms-flex: 0 0 290px;
            flex: 0 0 290px;
            max-width: 290px;
        }

        .form__content {
            -ms-flex: 0 0 calc(100% - 290px);
            flex: 0 0 calc(100% - 290px);
            max-width: 100%;
        }

        .form__btn {
            width: 180px;
        }
    }
</style>
<?= $this->endsection() ?>

<!-- details form -->
<div class="col-12 col-lg-8">
    <?= form_open("/superadmin/api/config/{$config['id']}", 'class="sign__form sign__form--profile sign__form--first" id="formEmpresa"') ?>
    <div class="row">
        <div class="col-12">
            <h4 class="sign__title">Configuração da plataforma</h4>
        </div>

        <div class="col-12">
            <div class="sign__group">
                <label class="sign__label" for="">Informe um dominio ou utilize um subdominio</label>
                <input id="dominio" type="text" name="dominio" class="sign__input" placeholder="ex: meudominio.com ou nome.conect.app" value="<?= $config['slug'] ?>">
                <small class="sign__label">
                    Opções de subdominios:
                    <ul class="form__radio mt-2 m-sm-2">
                        <li><span class="subdominio"></span>vinhaonline.com</li>
                        <li><span class="subdominio"></span>conect.com</li>
                    </ul>
                </small>
            </div>
        </div>

        <label class="sign__label">Configuração para o idioma PT-BR</label>
        <div class="col-12">
            <div class="sign__group">
                <label class="sign__label" for="titlept">Titulo para PT-BR</label>
                <input id="titlept" type="text" name="titlept" class="sign__input" placeholder="ENCONTRO DE PASTORES" value="<?= $config['title_pt'] ?>">
            </div>
        </div>
        <div class="col-12">
            <div class="sign__group">
                <label class="sign__label" for="descpt">Descrição para PT-BR</label>
                <textarea class="sign__input" style="padding: 10px;" name="descpt" id="descpt" cols="30" rows="25" placeholder="Descrição do evento"><?= $config['description_pt'] ?></textarea>
            </div>
        </div>
        <div class="col-12">
            <div class="sign__group">
                <label class="sign__label" for="encodingpt">URL da transmissão para PT-BR</label>
                <input id="encodingpt" type="text" name="encodingpt" class="sign__input" placeholder="https://www.youtube.com/embed/ncqcuXZwXJ8" value="<?= $config['stream_pt'] ?>">
            </div>
        </div>
        <div class="col-12">
            <div class="sign__group">
                <label class="sign__label" for="titleen">Titulo para EN</label>
                <input id="titleen" type="text" name="titleen" class="sign__input" placeholder="MEETING OF PASTORS" value="<?= $config['stream_en'] ?>">
            </div>
        </div>
        <div class="col-12">
            <div class="sign__group">
                <label class="sign__label" for="descen">Descrição para EN</label>
                <textarea class="sign__input" style="padding: 10px;" name="descen" id="descen" cols="30" rows="25" placeholder="Description of the event"><?= $config['stream_en'] ?></textarea>
            </div>
        </div>
        <div class="col-12">
            <div class="sign__group">
                <label class="sign__label" for="encodingen">URL da transmissão para EN</label>
                <input id="encodingen" type="text" name="encodingen" class="sign__input" placeholder="https://www.youtube.com/embed/ncqcuXZwXJ8" value="<?= $config['stream_en'] ?>">
            </div>
        </div>
        <div class="col-12">
            <div class="sign__group">
                <label class="sign__label" for="titlees">Titulo para ES</label>
                <input id="titlees" type="text" name="titlees" class="sign__input" placeholder="ENCUENTRO DE PASTORES" value="<?= $config['stream_es'] ?>">
            </div>
        </div>
        <div class="col-12">
            <div class="sign__group">
                <label class="sign__label" for="desces">Descrição para ES</label>
                <textarea class="sign__input" style="padding: 10px;" name="desces" id="desces" cols="30" rows="25" placeholder="Descripción del evento"><?= $config['stream_es'] ?></textarea>
            </div>
        </div>
        <div class="col-12">
            <div class="sign__group">
                <label class="sign__label" for="encodinges">URL da transmissão para ES</label>
                <input id="encodinges" type="text" name="encodinges" class="sign__input" placeholder="https://www.youtube.com/embed/ncqcuXZwXJ8" value="<?= $config['stream_es'] ?>">
            </div>
        </div>

        <div class="row">
            <div class="col-md-5">
                <h1 class="mt-3" style="color: #fff;">Envie um logo 300x300</h1>
            </div>
            <div class="col-md-7">
                <div class="form__logo form__cover_logo">
                    <label for="form__img-logo"></label>
                    <input id="form__img-logo" name="form__img-logo" type="file" accept=".png, .jpg, .jpeg">
                    <img id="form__logo" src="#" alt="">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-5">
                <h1 class="mt-3" style="color: #fff;">Envie uma imagem de fundo 300x300</h1>
            </div>
            <div class="col-md-7">
                <div class="form__img form__cover_logo">
                    <label for="form__img-upload">Upload cover (2500 x 1500)</label>
                    <input id="form__img-upload" name="form__img" type="file" accept=".png, .jpg, .jpeg">
                    <img id="form__img" src="#" alt=" ">
                </div>
            </div>
        </div>


        <div class="col-12">
            <button class="sign__btn" type="submit">Save</button>
        </div>
    </div>
    </form>
</div>
<!-- end details form -->