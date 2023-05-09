<?= $this->extend('super/layout') ?>
<?= $this->section('content') ?>
<!-- main title -->
<!-- main title -->
<div class="col-12">
    <div class="main__title">
        <h2>Empresa</h2>

        <div class="main__title-wrap"> 
            <a href="/superadmin/empresas/new" class="main__title-link">Nova empresa</a>
            <!-- search -->
            <form action="#" class="main__title-form">
                <input type="text" placeholder="Pesquisar">
                <button type="button">
                    <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <circle cx="8.25998" cy="8.25995" r="7.48191" stroke="#2F80ED" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></circle>
                        <path d="M13.4637 13.8523L16.3971 16.778" stroke="#2F80ED" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                    </svg>
                </button>
            </form>
            <!-- end search -->
        </div>
    </div>
</div>
<!-- end main title -->



<!-- users -->
<div class="col-12">
    <div class="main__table-wrap">
        <table class="main__table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>NOME DA EMPRESA</th>
                    <th>DADOS CONTRATO</th>
                    <th>STATUS</th>
                    <th>CRAETED DATE</th>
                    <th>ACTIONS</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($empresa as $row) : ?>
                    <tr>
                        <td>
                            <div class="main__table-text"><?= $row['id'] ?></div>
                        </td>
                        <td>
                            <div class="main__user">
                                <div class="main__avatar">
                                    <img src="/assets/admin/img/user.svg" alt="">
                                </div>
                                <div class="main__meta">
                                    <h3><?= $row['name'] ?></h3>
                                    <span><?= $row['empresa'] ?></span>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="main__table-text"><?= $row['contrato'] ?></div>
                        </td>
                        <td>
                            <div class="main__table-text main__table-text--green">Approved</div>
                        </td>
                        <td>
                            <div class="main__table-text"><?= $row['created_at'] ?></div>
                        </td>
                        <td>
                            <div class="main__table-btns">
                                <a href="#modal-status" class="main__table-btn main__table-btn--banned open-modal">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                        <path d="M12,13a1.49,1.49,0,0,0-1,2.61V17a1,1,0,0,0,2,0V15.61A1.49,1.49,0,0,0,12,13Zm5-4V7A5,5,0,0,0,7,7V9a3,3,0,0,0-3,3v7a3,3,0,0,0,3,3H17a3,3,0,0,0,3-3V12A3,3,0,0,0,17,9ZM9,7a3,3,0,0,1,6,0V9H9Zm9,12a1,1,0,0,1-1,1H7a1,1,0,0,1-1-1V12a1,1,0,0,1,1-1H17a1,1,0,0,1,1,1Z" />
                                    </svg>
                                </a>
                                <a href="/superadmin/edit/<?= $row['id'] ?>" class="main__table-btn main__table-btn--edit">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                        <path d="M22,7.24a1,1,0,0,0-.29-.71L17.47,2.29A1,1,0,0,0,16.76,2a1,1,0,0,0-.71.29L13.22,5.12h0L2.29,16.05a1,1,0,0,0-.29.71V21a1,1,0,0,0,1,1H7.24A1,1,0,0,0,8,21.71L18.87,10.78h0L21.71,8a1.19,1.19,0,0,0,.22-.33,1,1,0,0,0,0-.24.7.7,0,0,0,0-.14ZM6.83,20H4V17.17l9.93-9.93,2.83,2.83ZM18.17,8.66,15.34,5.83l1.42-1.41,2.82,2.82Z" />
                                    </svg>
                                </a>
                                <a href="#modal-delete" class="main__table-btn main__table-btn--delete open-modal">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                        <path d="M10,18a1,1,0,0,0,1-1V11a1,1,0,0,0-2,0v6A1,1,0,0,0,10,18ZM20,6H16V5a3,3,0,0,0-3-3H11A3,3,0,0,0,8,5V6H4A1,1,0,0,0,4,8H5V19a3,3,0,0,0,3,3h8a3,3,0,0,0,3-3V8h1a1,1,0,0,0,0-2ZM10,5a1,1,0,0,1,1-1h2a1,1,0,0,1,1,1V6H10Zm7,14a1,1,0,0,1-1,1H8a1,1,0,0,1-1-1V8H17Zm-3-1a1,1,0,0,0,1-1V11a1,1,0,0,0-2,0v6A1,1,0,0,0,14,18Z" />
                                    </svg>
                                </a>
                                <a href="#modal-delete" class="main__table-btn open-modal">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-people" viewBox="0 0 16 16">
                                        <path d="M15 14s1 0 1-1-1-4-5-4-5 3-5 4 1 1 1 1h8Zm-7.978-1A.261.261 0 0 1 7 12.996c.001-.264.167-1.03.76-1.72C8.312 10.629 9.282 10 11 10c1.717 0 2.687.63 3.24 1.276.593.69.758 1.457.76 1.72l-.008.002a.274.274 0 0 1-.014.002H7.022ZM11 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4Zm3-2a3 3 0 1 1-6 0 3 3 0 0 1 6 0ZM6.936 9.28a5.88 5.88 0 0 0-1.23-.247A7.35 7.35 0 0 0 5 9c-4 0-5 3-5 4 0 .667.333 1 1 1h4.216A2.238 2.238 0 0 1 5 13c0-1.01.377-2.042 1.09-2.904.243-.294.526-.569.846-.816ZM4.92 10A5.493 5.493 0 0 0 4 13H1c0-.26.164-1.03.76-1.724.545-.636 1.492-1.256 3.16-1.275ZM1.5 5.5a3 3 0 1 1 6 0 3 3 0 0 1-6 0Zm3-2a2 2 0 1 0 0 4 2 2 0 0 0 0-4Z" />
                                    </svg>
                                </a>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
<!-- end users -->









<!-- modal status -->
<div id="modal-status" class="zoom-anim-dialog mfp-hide modal">
    <h6 class="modal__title">Status change</h6>

    <p class="modal__text">Are you sure about immediately change status?</p>

    <div class="modal__btns">
        <button class="modal__btn modal__btn--apply" type="button">Apply</button>
        <button class="modal__btn modal__btn--dismiss" type="button">Dismiss</button>
    </div>
</div>
<!-- end modal status -->

<!-- modal delete -->
<div id="modal-delete" class="zoom-anim-dialog mfp-hide modal">
    <h6 class="modal__title">User delete</h6>

    <p class="modal__text">Are you sure to permanently delete this user?</p>

    <div class="modal__btns">
        <button class="modal__btn modal__btn--apply" type="button">Delete</button>
        <button class="modal__btn modal__btn--dismiss" type="button">Dismiss</button>
    </div>
</div>
<!-- end modal delete -->
<?= $this->endSection() ?>