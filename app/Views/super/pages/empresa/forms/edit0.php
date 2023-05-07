<!-- details form -->
<div class="col-12 col-lg-4">
    <?= form_open("/superadmin/api/empresas/{$empresa['id']}", 'class="sign__form sign__form--profile sign__form--first" id="formEmpresa"') ?>
    <div class="row">
        <div class="col-12">
            <h4 class="sign__title">Dados nova empresa</h4>
        </div>

        <div class="col-12">
            <div class="sign__group">
                <label class="sign__label" for="username">Nome do responsável</label>
                <input id="nome" type="text" name="nome" class="sign__input" placeholder="Nome do responsável" value="<?= $empresa['name'] ?>">
            </div>
        </div>

        <div class="col-12">
            <div class="sign__group">
                <label class="sign__label" for="empresa">Empresa</label>
                <input id="empresa" type="text" name="empresa" class="sign__input" placeholder="Empresa" value="<?= $empresa['empresa'] ?>">
            </div>
        </div>

        <div class="col-12">
            <div class="sign__group">
                <label class="sign__label" for="valor">Valor do contrato</label>
                <input id="valor" type="text" name="valor" class="sign__input" placeholder="0,00" value="<?= number_to_currency($empresa['valor'], 'BRL', 'pt-BR', 2); ?>">
            </div>
        </div>

        <div class="col-12">
            <div class="sign__group">
                <label class="sign__label" for="contrato">Descrição do contrato</label>
                <textarea class="sign__input" style="padding: 10px;" name="contrato" id="contrato" cols="30" rows="25" placeholder="Descrição do contrato"><?= $empresa['contrato'] ?></textarea>
            </div>
        </div>

        <div class="col-12">
            <input type="hidden" name="id" value="<?= $empresa['id'] ?>">
            <button class="sign__btn" type="submit">Save</button>
        </div>
    </div>
    </form>
</div>
<!-- end details form -->