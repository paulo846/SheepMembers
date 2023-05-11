<header>
    <nav class="navbar navbar--header navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            
            <a class="navbar-brand" href="#">
                <img src="<?= ($logo) ? $logo : '/assets/admin/img/logo-1.png' ?>" alt="logo" height="100px" class="img-fluid logo">
            </a>

            <div class="d-flex ms-auto">
                <div class="btn-group">
                    <div type="button" class="dropdown-toggle text-white" data-bs-toggle="dropdown" data-bs-display="static" aria-expanded="false">
                        <img class="rounded-circle" src="/assets/img/user.png" alt="foto" width="60px">
                    </div>
                    <ul class="dropdown-menu dropdown-menu-dark dropdown-menu-end">
                        <li>
                            <a class="dropdown-item" href="#">
                                <?= esc(session('name')) ?>
                            </a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li>
                            <a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#staticBackdrop" href="#">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-right" viewBox="0 0 16 16">
                                    <path d="M6 12.796V3.204L11.481 8 6 12.796zm.659.753 5.48-4.796a1 1 0 0 0 0-1.506L6.66 2.451C6.011 1.885 5 2.345 5 3.204v9.592a1 1 0 0 0 1.659.753z" />
                                </svg> <?= lang('Panel.perfil') ?>
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="/lang/pt-BR"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-right" viewBox="0 0 16 16">
                                    <path d="M6 12.796V3.204L11.481 8 6 12.796zm.659.753 5.48-4.796a1 1 0 0 0 0-1.506L6.66 2.451C6.011 1.885 5 2.345 5 3.204v9.592a1 1 0 0 0 1.659.753z" />
                                </svg> PT-BR
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="/lang/en">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-right" viewBox="0 0 16 16">
                                    <path d="M6 12.796V3.204L11.481 8 6 12.796zm.659.753 5.48-4.796a1 1 0 0 0 0-1.506L6.66 2.451C6.011 1.885 5 2.345 5 3.204v9.592a1 1 0 0 0 1.659.753z" />
                                </svg> EN
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="/lang/es">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-right" viewBox="0 0 16 16">
                                    <path d="M6 12.796V3.204L11.481 8 6 12.796zm.659.753 5.48-4.796a1 1 0 0 0 0-1.506L6.66 2.451C6.011 1.885 5 2.345 5 3.204v9.592a1 1 0 0 0 1.659.753z" />
                                </svg> ES
                            </a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li>
                            <a class="dropdown-item d-flex" href="/sair">
                                <div class="d-inline">
                                    Sair
                                </div>
                                <div class="ms-auto d-inline">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-in-right" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd" d="M6 3.5a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-2a.5.5 0 0 0-1 0v2A1.5 1.5 0 0 0 6.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-8A1.5 1.5 0 0 0 5 3.5v2a.5.5 0 0 0 1 0v-2z" />
                                        <path fill-rule="evenodd" d="M11.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5H1.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z" />
                                    </svg>
                                </div>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
</header>


<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content bg-dark text-white">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel"><?= lang('Panel.perfil') ?></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <?= form_open() ?>
                <div class="form-group mb-3">
                    <label for="">Nome</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Nome" value="<?= session('name') ?>" readonly>
                </div>
                <div class="form-group mb-3">
                    <label for="">Email</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Email" value="<?= session('email') ?>" readonly>
                </div>
                <!--
                <div class="form-group mb-3">
                    <label for="imagemInput" class="form-label">Uma foto para o seu perfil</label>
                    <input type="file" class="form-control form-control-file" name="imagem" id="imagem" placeholder="Escolher foto!" accept="image/*">
                    <div id="upload-demo" class="mt-5"></div>
                </div> -->
                </form>
            </div>
            <!-- <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-primary">Atualizar</button>
            </div> -->
        </div>
    </div>
</div>