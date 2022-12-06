<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center">
        <div class="sidebar-brand-icon">
            <i class="fas fa-user-cog"></i>
        </div>
        <?php helper('custom_helper');

        use App\Models\AtasanModel;

        ?>
        <div class="sidebar-brand-text mx-3">
            <?= adminLogin() ?>

        </div>
    </a>

    <hr class="sidebar-divider my-0">
    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="<?= base_url("/dashboard") ?>">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>
    <?php if (adminAtasan() !== "DEPARTEMEN LOGISTIK" and adminAtasan() !== "DRIVER" and adminAtasan() !== "SECURITY") : ?>
        <hr class="sidebar-divider">
        <li class="nav-item">
            <a class="nav-link" href="<?= base_url("/list_car") ?>">
                <i class="fas fa-address-card"></i>
                <span>Daftar Mobil</span></a>
        </li>
        <hr class="sidebar-divider">
        <li class="nav-item">
            <a class="nav-link" href="<?= base_url("/history_supervisor") ?>">
                <i class="fas fa-history"></i>
                <span>Riwayat Pesanan</span></a>
        </li>

    <?php endif; ?>



    <?php if (adminLogin() !== "DRIVER" or adminLogin() !== "SECURITY") : ?>

        <hr class="sidebar-divider">
        <!-- Nav Item - Tables -->
        <li class="nav-item">
            <a class="nav-link" href="<?= base_url("/order") ?>">
                <i class="fas fa-clipboard-list"></i>
                <span>Daftar Pesanan</span></a>
        </li>
        <!-- Divider -->

        <!-- Operator -->
        <!-- Operator -->
        <!-- Divider -->
        <hr class="sidebar-divider">
        <!-- Nav Item - Tables -->
        <li class="nav-item">
            <a class="nav-link" href="<?= base_url("/request") ?>">
                <i class="fas fa-address-card"></i>
                <span>Pesan Kendaraan</span></a>
        </li>
    <?php endif; ?>

    <!-- Supervisor logistik -->
    <!-- Divider -->
    <?php if (adminAtasan() === "DEPARTEMEN LOGISTIK") : ?>
        <!-- Divider -->
        <hr class="sidebar-divider">
        <li class="nav-item">
            <a class="nav-link" href="<?= base_url("/admin") ?>">
                <i class="fas fa-user-gear"></i>
                <span>Supervisor Logistik</span></a>
        </li>
        <hr class="sidebar-divider">
        <li class="nav-item">
            <a class="nav-link" href="<?= base_url("/otorisator") ?>">
                <i class="fas fa-user-gear"></i>
                <span>Supervisor Unit Kerja</span></a>
        </li>
        <hr class="sidebar-divider">
        <li class="nav-item">
            <a class="nav-link" href="<?= base_url("/user") ?>">
                <i class="fas fa-user-friends"></i>
                <span>Operator</span></a>
        </li>
        <hr class="sidebar-divider">
        <li class="nav-item">
            <a class="nav-link" href="<?= base_url("/driver") ?>">
                <i class="fas fa-car"></i>
                <span>Pengemudi</span></a>
        </li>
        <hr class="sidebar-divider">
        <!-- Divider -->
        <!-- Nav Item - Tables -->
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


        <hr class="sidebar-divider d-none d-md-block">
        <!-- Sidebar Toggler (Sidebar) -->
        <div class="text-center d-none d-md-inline">
            <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>
    <?php endif; ?>
</ul>