     <?php helper('custom_helper'); ?>

     <ul class="nav">



         <?php if (adminAtasan() === "user" or adminLogin() === "user") : ?>
             <li class="nav-item">
                 <a class="nav-link" href="<?= base_url("/dashboard") ?>">
                     <i class="icon-grid menu-icon"></i>
                     <span class="menu-title">Dashboard</span>
                 </a>
             </li>
             <li class="nav-item">
                 <a class="nav-link" href="<?= base_url("/request") ?>">
                     <i class="icon-grid menu-icon"></i>
                     <span class="menu-title">Pemesanan Kendaraan</span>
                 </a>
             </li>

             <li class="nav-item">
                 <a class="nav-link" data-toggle="collapse" href="#form-elements" aria-expanded="false" aria-controls="form-elements">
                     <i class="icon-columns menu-icon"></i>
                     <span class="menu-title">Riwayat Pesanan</span>
                     <i class="menu-arrow"></i>
                 </a>
                 <div class="collapse" id="form-elements">
                     <ul class="nav flex-column sub-menu">
                         <li class="nav-item"> <a href="<?= base_url("/order_pesanan") ?>" class="nav-link">Daftar Pesanan</a></li>
                         <?php if (adminAtasan() === "DEPARTEMEN LOGISTIK") : ?>
                             <li class="nav-item"> <a class="nav-link" href="<?= base_url("/activity_log") ?>">Activity Log</a></li>
                         <?php endif; ?>
                         <li class="nav-item"><a href="<?= base_url("/riwayat") ?>" class="nav-link">Riwayat Pemesanan</a></li>
                     </ul>
                 </div>
             </li>
             <li class="nav-item">
                 <a class="nav-link" href="<?= base_url("/order_departemen") ?>">
                     <i class="icon-grid menu-icon"></i>
                     <span class="menu-title">Approval</span>
                 </a>
             </li>
         <?php endif; ?>
         <?php if (adminAtasan() !== "DRIVER" and adminAtasan() !== "SECURITY" and adminAtasan() !== "user" and adminLogin() !== "DISPATCHER" and adminAtasan() !== "DISPATCHER") : ?>
             <li class="nav-item">
                 <a class="nav-link" href="<?= base_url("/dashboard") ?>">
                     <i class="icon-grid menu-icon"></i>
                     <span class="menu-title">Dashboard</span>
                 </a>
             </li>
             <li class="nav-item">
                 <a class="nav-link" href="<?= base_url("/request") ?>">
                     <i class="icon-grid menu-icon"></i>
                     <span class="menu-title">Pemesanan Kendaraan</span>
                 </a>
             </li>

             <li class="nav-item">
                 <a class="nav-link" data-toggle="collapse" href="#form-elements" aria-expanded="false" aria-controls="form-elements">
                     <i class="icon-columns menu-icon"></i>
                     <span class="menu-title">Riwayat Pesanan</span>
                     <i class="menu-arrow"></i>
                 </a>
                 <div class="collapse" id="form-elements">
                     <ul class="nav flex-column sub-menu">
                         <li class="nav-item"> <a href="<?= base_url("/order_pesanan") ?>" class="nav-link">Daftar Pesanan</a></li>
                         <?php if (adminAtasan() === "DEPARTEMEN LOGISTIK") : ?>
                             <li class="nav-item"> <a class="nav-link" href="<?= base_url("/activity_log") ?>">Activity Log</a></li>
                         <?php endif; ?>
                         <li class="nav-item"><a href="<?= base_url("/riwayat") ?>" class="nav-link">Riwayat Pemesanan</a></li>
                     </ul>
                 </div>
             </li>
             <li class="nav-item">
                 <a class="nav-link" href="<?= base_url("/order_departemen") ?>">
                     <i class="icon-grid menu-icon"></i>
                     <span class="menu-title">Approval</span>
                 </a>
             </li>
         <?php endif; ?>


         <?php if (adminAtasan() === "SECURITY") : ?>
             <li class="nav-item">
                 <a class="nav-link" href="<?= base_url("/driver") ?>">
                     <i class="icon-bar-graph menu-icon"></i>
                     <span class="menu-title">Daftar Pengemudi</span>
                     <i class="menu-arrow"></i>
                 </a>
             </li>

         <?php endif; ?>


         <?php if (adminLogin() === "SEKURITI TEKNOLOGI INFORMASI") : ?>
             <li class="nav-item">
                 <a class="nav-link" href="<?= base_url("/dashboard") ?>">
                     <i class="icon-grid menu-icon"></i>
                     <span class="menu-title">Dashboard</span>
                 </a>
             </li>
             <li class="nav-item">
                 <a class="nav-link" href="<?= base_url("/request") ?>">
                     <i class="icon-grid menu-icon"></i>
                     <span class="menu-title">Pemesanan Kendaraan</span>
                 </a>
             </li>

             <li class="nav-item">
                 <a class="nav-link" data-toggle="collapse" href="#form-elements" aria-expanded="false" aria-controls="form-elements">
                     <i class="icon-columns menu-icon"></i>
                     <span class="menu-title">Riwayat Pesanan</span>
                     <i class="menu-arrow"></i>
                 </a>
                 <div class="collapse" id="form-elements">
                     <ul class="nav flex-column sub-menu">
                         <li class="nav-item"> <a href="<?= base_url("/order_pesanan") ?>" class="nav-link">Daftar Pesanan</a></li>
                         <?php if (adminAtasan() === "DEPARTEMEN LOGISTIK") : ?>
                             <li class="nav-item"> <a class="nav-link" href="<?= base_url("/activity_log") ?>">Activity Log</a></li>
                         <?php endif; ?>
                         <li class="nav-item"><a href="<?= base_url("/riwayat") ?>" class="nav-link">Riwayat Pemesanan</a></li>
                     </ul>
                 </div>
             </li>
             <li class="nav-item">
                 <a class="nav-link" data-toggle="collapse" href="#icons" aria-expanded="false" aria-controls="icons">
                     <i class="icon-contract menu-icon"></i>
                     <span class="menu-title">Security Administrator</span>
                     <i class="menu-arrow"></i>
                 </a>
                 <div class="collapse" id="icons">
                     <ul class="nav flex-column sub-menu">
                         <li class="nav-item"> <a class="nav-link" href="<?= base_url("/list_user") ?>">List User</a></li>
                         <li class="nav-item"> <a class="nav-link" href="<?= base_url("/list_atasan") ?>">List Atasan</a></li>
                     </ul>
                 </div>
             </li>
         <?php endif; ?>

         <?php if (adminAtasan() === "DISPATCHER" or adminLogin() === "DISPATCHER") : ?>
             <li class="nav-item">
                 <a class="nav-link" href="<?= base_url("/dashboard") ?>">
                     <i class="icon-grid menu-icon"></i>
                     <span class="menu-title">Dashboard</span>
                 </a>
             </li>
             <li class="nav-item">
                 <a class="nav-link" data-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
                     <i class="icon-head menu-icon"></i>
                     <span class="menu-title">Pilih Driver</span>
                     <i class="menu-arrow"></i>
                 </a>
                 <div class="collapse" id="auth">
                     <ul class="nav flex-column sub-menu">
                         <li class="nav-item"><a href="<?= base_url("/order_logistik") ?>" class="nav-link">Pilih Driver</a></li>
                         <li class="nav-item"><a href="<?= base_url("/change_mobil") ?>" class="nav-link">Ubah Mobil</a></li>
                     </ul>
                 </div>
             </li>

             <li class="nav-item">
                 <a class="nav-link" data-toggle="collapse" href="#error" aria-expanded="false" aria-controls="error">
                     <i class="icon-ban menu-icon"></i>
                     <span class="menu-title">Pengemudi</span>
                     <i class="menu-arrow"></i>
                 </a>
                 <div class="collapse" id="error">
                     <ul class="nav flex-column sub-menu">
                         <li class="nav-item"><a href="<?= base_url("/driver") ?>" class="nav-link">Tambah Pengemudi</a></li>
                     </ul>
                 </div>
             </li>
             <li class="nav-item">
                 <a class="nav-link" href="<?= base_url("/perjalanan") ?>">
                     <i class="icon-grid menu-icon"></i>
                     <span class="menu-title">Perjalanan</span>
                 </a>
             </li>
             <li class="nav-item">
                 <a class="nav-link" href="<?= base_url("/reporting") ?>">
                     <i class="icon-grid menu-icon"></i>
                     <span class="menu-title">Reporting</span>
                 </a>
             </li>
         <?php endif; ?>




     </ul>