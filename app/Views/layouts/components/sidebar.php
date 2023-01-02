<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center">
        <div class="sidebar-brand-icon">
            <i class="fas fa-user-cog"></i>
        </div>
        <?php helper('custom_helper');
        ?>
        <div class="sidebar-brand-text mx-3">
            <?= adminLogin() ?>

        </div>
    </a>
    <hr class="sidebar-divider my-0">
    <li class="nav-item active">
        <a class="nav-link" href="<?= base_url("/dashboard") ?>">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>
    <?php if (adminAtasan() !== "DEPARTEMEN LOGISTIK" and adminAtasan() !== "DRIVER" and adminAtasan() !== "SECURITY" and adminAtasan() !== "user") : ?>

        <hr class="sidebar-divider">
        <li class="nav-item">
            <a class="nav-link" href="<?= base_url("/request") ?>">
                <i class="fas fa-history"></i>
                <span>Pesan Kendaraan</span></a>
        </li>
        <hr class="sidebar-divider">

        <li class="nav-item">
            <a class="nav-link" href="<?= base_url("/history_supervisor") ?>">
                <i class="fas fa-history"></i>
                <span>Riwayat Pesanan</span></a>
        </li>
        <hr class="sidebar-divider">
        <li class="nav-item">
            <a class="nav-link" href="<?= base_url("/activity_log") ?>">
                <i class="fas fa-history"></i>
                <span>Activity Log</span></a>
        </li>

        <hr class="sidebar-divider">
        <li class="nav-item">
            <a class="nav-link" href="<?= base_url("/order_departemen") ?>">
                <i class="fas fa-user-friends"></i>
                <span>Order Departemen</span></a>
        </li>

    <?php endif; ?>
    <?php if (adminAtasan() === "user") : ?>
        <hr class="sidebar-divider">
        <!-- Nav Item - Tables -->
        <li class="nav-item">
            <a class="nav-link" href="<?= base_url("/order") ?>">
                <i class="fas fa-clipboard-list"></i>
                <span>Daftar Pesanan</span></a>
        </li>


        <hr class="sidebar-divider">
        <li class="nav-item">
            <a class="nav-link" href="<?= base_url("/request") ?>">
                <i class="fas fa-history"></i>
                <span>Pesan Kendaraan</span></a>
        </li>
    <?php endif; ?>

    <!-- Supervisor logistik -->
    <!-- Divider -->
    <?php if (adminAtasan() === "DEPARTEMEN LOGISTIK") : ?>
        <!-- Divider -->

        <hr class="sidebar-divider">
        <li class="nav-item">
            <a class="nav-link" href="<?= base_url("/request") ?>">
                <i class="fas fa-history"></i>
                <span>Pesan Kendaraan</span></a>
        </li>
        <hr class="sidebar-divider">

        <li class="nav-item">
            <a class="nav-link" href="<?= base_url("/order_logistik") ?>">
                <i class="fas fa-user-friends"></i>
                <span>Order Logistik</span></a>
        </li>
        <hr class="sidebar-divider">
        <li class="nav-item">
            <a class="nav-link" href="<?= base_url("/driver") ?>">
                <i class="fas fa-car"></i>
                <span>Pengemudi</span></a>
        </li>
        <hr class="sidebar-divider">
        <li class="nav-item">
            <a class="nav-link" href="<?= base_url("/history") ?>">
                <i class="fas fa-history"></i>
                <span>Riwayat Pesanan</span></a>
        </li>

        <!-- Divider -->
    <?php endif; ?>
    <!-- Supervisor -->
    <?php if (adminAtasan() === "SECURITY") : ?>
        <!-- Security -->
        <!-- Divider -->
        <hr class="sidebar-divider">
        <!-- Nav Item - Tables -->
        <li class="nav-item">
            <a class="nav-link" href="<?= base_url("/driver") ?>">
                <i class="fas fa-car"></i>
                <span>Daftar Pengemudi</span></a>
        </li>


        <hr class="sidebar-divider">
        <li class="nav-item">
            <a class="nav-link" href="<?= base_url("/driver") ?>">
                <i class="fas fa-car"></i>
                <span>Pengemudi</span></a>
        </li>
        <hr class="sidebar-divider d-none d-md-block">
        <!-- Sidebar Toggler (Sidebar) -->
        <div class="text-center d-none d-md-inline">
            <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>
    <?php endif; ?>
</ul>