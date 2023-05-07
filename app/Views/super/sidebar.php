<!-- sidebar -->
<div class="sidebar">
    <!-- sidebar logo -->
    <a href="/superadmin" class="sidebar__logo">
        <img src="/assets/admin/img/logo-1.png" alt="">
    </a>
    <!-- end sidebar logo -->

    <!-- sidebar user -->
    <div class="sidebar__user">
        <div class="sidebar__user-img">
            <img src="/assets/admin/img/user.svg" alt="">
        </div>

        <div class="sidebar__user-title">
            <span>Admin</span>
            <p><?= session('name') ?></p>
        </div>

        <a href="/superadmin/logout" class="sidebar__user-btn">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                <path d="M4,12a1,1,0,0,0,1,1h7.59l-2.3,2.29a1,1,0,0,0,0,1.42,1,1,0,0,0,1.42,0l4-4a1,1,0,0,0,.21-.33,1,1,0,0,0,0-.76,1,1,0,0,0-.21-.33l-4-4a1,1,0,1,0-1.42,1.42L12.59,11H5A1,1,0,0,0,4,12ZM17,2H7A3,3,0,0,0,4,5V8A1,1,0,0,0,6,8V5A1,1,0,0,1,7,4H17a1,1,0,0,1,1,1V19a1,1,0,0,1-1,1H7a1,1,0,0,1-1-1V16a1,1,0,0,0-2,0v3a3,3,0,0,0,3,3H17a3,3,0,0,0,3-3V5A3,3,0,0,0,17,2Z" />
            </svg>
        </a>
    </div>
    <!-- end sidebar user -->
    <?= $this->include('super/menu') ?>
    <!-- sidebar copyright -->
    <div class="sidebar__copyright">© SheepMembers, <?= date('Y') ?>.</div>
    <!-- end sidebar copyright -->
</div>
<!-- end sidebar -->