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