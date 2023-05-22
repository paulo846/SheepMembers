<!-- removeNotificationModal -->
<div id="removeNotificationModal" class="modal fade zoomIn" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="NotificationModalbtn-close"></button>
            </div>
            <div class="modal-body">
                <div class="mt-2 text-center">
                    <lord-icon src="https://cdn.lordicon.com/gsqxdxog.json" trigger="loop" colors="primary:#f7b84b,secondary:#f06548" style="width:100px;height:100px"></lord-icon>
                    <div class="mt-4 pt-2 fs-15 mx-4 mx-sm-5">
                        <h4>Tem certeza ?</h4>
                        <p class="text-muted mx-4 mb-0">Tem certeza de que deseja remover esta notificação?</p>
                    </div>
                </div>
                <div class="d-flex gap-2 justify-content-center mt-4 mb-2">
                    <button type="button" class="btn w-sm btn-light" data-bs-dismiss="modal">Fechar</button>
                    <button type="button" class="btn w-sm btn-danger" id="delete-notification">Sim, excluí-lo!</button>
                </div>
            </div>

        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- ========== App Menu ========== -->
<div class="app-menu navbar-menu border-end">
    <!-- LOGO -->
    <div class="navbar-brand-box">
        <!-- Dark Logo-->
        <a href="<?= site_url('superadmin') ?>" class="logo logo-dark">
            <span class="logo-sm">
                <img src="/assets/images/logo-sm.png" alt="" height="22">
            </span>
            <span class="logo-lg">
                <img src="/assets/images/logo-dark.png" alt="" height="17">
            </span>
        </a>
        <!-- Light Logo-->
        <a href="<?= site_url('superadmin') ?>" class="logo logo-light">
            <span class="logo-sm">
                <img src="/assets/images/logo-sm.png" alt="" height="22">
            </span>
            <span class="logo-lg">
                <img src="/assets/images/logo-light.png" alt="" height="17">
            </span>
        </a>
        <button type="button" class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover" id="vertical-hover">
            <i class="ri-record-circle-line"></i>
        </button>
    </div>

    <div id="scrollbar">
        <div class="container-fluid">
            <div id="two-column-menu">
            </div>
            <ul class="navbar-nav" id="navbar-nav">
                <li class="menu-title"><span data-key="t-menu">Menu</span></li>
                <li class="nav-item">
                    <a class="nav-link menu-link" href="<?= site_url('superadmin') ?>">
                        <i class="ri-dashboard-2-line"></i> <span data-key="t-widgets">Dashboard</span>
                    </a>
                </li>
                <!-- end Dashboard Menu -->
                <li class="menu-title">
                    <i class="ri-more-fill"></i> <span data-key="t-pages">Clientes</span>
                </li>
                <li class="nav-item">
                    <a class="nav-link menu-link" href="<?= site_url('superadmin/empresas') ?>">
                        <i class="ri-building-line"></i> <span data-key="t-widgets">Ações</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link menu-link" href="<?= site_url('superadmin/empresas/antigo') ?>">
                        <i class="ri-building-line"></i> <span data-key="t-widgets">Painel antigo</span>
                    </a>
                </li>
                <li class="menu-title">
                    <i class="ri-more-fill"></i> <span data-key="t-pages">Alunos</span>
                </li>
                <li class="nav-item">
                    <a class="nav-link menu-link" href="<?= site_url('superadmin/alunos') ?>">
                        <i class="ri-user-search-line"></i> <span data-key="t-widgets">Ações</span>
                    </a>
                </li>
            </ul>
        </div>
        <!-- Sidebar -->
    </div>
    <div class="sidebar-background"></div>
</div>
<!-- Left Sidebar End -->
<!-- Vertical Overlay-->
<div class="vertical-overlay"></div>
<!-- ============================================================== -->
<!-- Start right Content here -->
<!-- ============================================================== -->
<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">