<style>
    .language-select {
        position: fixed;
        bottom: 0;
        right: 0;
        background-color: #f1f1f1;
        padding: 10px;
        border-top-left-radius: 10px;
    }
    .language-select label {
        font-weight: bold;
        margin-right: 5px;
        font-size: 12px;
    }
    .language-select select {
        font-size: 12px;
        padding: 10px;
        border: none;
        border-radius: 5px;
    }
</style>
<div class="language-select">
    <label for="language"><?= lang('Panel.escolhaIdioma') ?></label>
    <select id="language">
        <option value="pt-BR" <?= (session('lang') === 'pt-BR') ? 'selected' : null ?>><?= lang('Panel.idiomas.br') ?></option>
        <option value="en" <?= (session('lang') === 'en') ? 'selected' : null ?>><?= lang('Panel.idiomas.en') ?></option>
        <option value="es" <?= (session('lang') === 'es') ? 'selected' : null ?>><?= lang('Panel.idiomas.es') ?></option>
    </select>
</div>
<script>
    var urlSite = "<?= site_url() ?>"
    const languageSelect = document.querySelector('#language');
    languageSelect.addEventListener('change', (event) => {
        const languageCode = event.target.value;
        window.location.href = `${urlSite}lang\/${languageCode}`;
    });
</script>