<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center">
        <div class="sidebar-brand-icon">
            <i class="fas fa-user-cog"></i>
        </div>
        <div class="sidebar-brand-text mx-3">BCA SYARIAH</div>
    </a>
    <?php if (adminLogin()->role === 'Super Admin') : ?>
    <!-- Divider -->
    <hr class="sidebar-divider my-0">
    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="<?=base_url("/dashboard")?>">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>
    <!-- Divider -->

    <hr class="sidebar-divider">
    <!-- Nav Item - Tables -->
    <li class="nav-item">
        <a class="nav-link" href="<?=base_url("/admin")?>">
            <i class="fas fa-user-gear"></i>
            <span>Daftar Admin</span></a>
    </li>
    <!-- Divider -->
    <hr class="sidebar-divider">
    <!-- Nav Item - Tables -->
    <li class="nav-item">
        <a class="nav-link" href="<?=base_url("/user")?>">
            <i class="fas fa-user-friends"></i>
            <span>Daftar User</span></a>
    </li>
    <!-- Divider -->
    <hr class="sidebar-divider">
    <!-- Nav Item - Tables -->
    <li class="nav-item">
        <a class="nav-link" href="<?=base_url("/driver")?>">
            <i class="fas fa-car"></i>
            <span>Daftar Pengemudi</span></a>
    </li>
    <!-- Divider -->
    <hr class="sidebar-divider">
    <!-- Nav Item - Tables -->
    <li class="nav-item">
        <a class="nav-link" href="<?=base_url("/request")?>">
            <i class="fas fa-address-card"></i>
            <span>Pesan Kendaraan</span></a>
    </li>
    <!-- Divider -->
    <hr class="sidebar-divider">
    <!-- Nav Item - Tables -->
    <li class="nav-item">
        <a class="nav-link" href="<?=base_url("/process")?>">
            <i class="fas fa-clipboard-list"></i>
            <span>Daftar Pesanan</span></a>
    </li>
    <!-- Divider -->
    <hr class="sidebar-divider">
    <!-- Nav Item - Tables -->
    <li class="nav-item">
        <a class="nav-link" href="<?=base_url("/history")?>">
            <i class="fas fa-history"></i>
            <span>Riwayat Pesanan</span></a>
    </li>
    <!-- Divider -->
    <?php endif; ?>

    <?php if (adminLogin()->role === 'Admin') : ?>
    <!-- Divider -->
    <hr class="sidebar-divider">
    <!-- Nav Item - Tables -->
    <li class="nav-item">
        <a class="nav-link" href="<?=base_url("/request")?>">
            <i class="fas fa-address-card"></i>
            <span>Pesan Kendaraan</span></a>
    </li>
    <!-- Divider -->
    <!-- Divider -->
    <hr class="sidebar-divider">
    <!-- Nav Item - Tables -->
    <li class="nav-item">
        <a class="nav-link" href="<?=base_url("/order")?>">
            <i class="fas fa-clipboard-list"></i>
            <span>Daftar Pesanan</span></a>
    </li>
    <!-- Divider -->

    <?php endif; ?>

    <?php if (adminLogin()->role === 'User') : ?>
    <!-- Divider -->
    <hr class="sidebar-divider">
    <!-- Nav Item - Tables -->
    <li class="nav-item">
        <a class="nav-link" href="<?=base_url("/request")?>">
            <i class="fas fa-address-card"></i>
            <span>Pesan Kendaraan</span></a>
    </li>
    <!-- Divider -->

    <?php endif; ?>

    <hr class="sidebar-divider d-none d-md-block">
    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>
</ul>