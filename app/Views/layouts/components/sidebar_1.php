   <ul class="nav">
       <li class="nav-item">
           <a class="nav-link" href="<?= base_url("/dashboard") ?>">
               <i class="icon-columns menu-icon"></i>
               <span class="menu-title">Dashboard</span>
           </a>
       </li>
       <?php if (adminAtasan() !== "DEPARTEMEN LOGISTIK" and adminAtasan() !== "DRIVER" and adminAtasan() !== "SECURITY" and adminAtasan() !== "user") : ?>

           <li class="nav-item">
               <a class="nav-link" data-toggle="collapse" href="#form-elements" aria-expanded="false" aria-controls="form-elements">
                   <i class="icon-columns menu-icon"></i>
                   <span class="menu-title">Pemesanan Kendaraan</span>
                   <i class="menu-arrow"></i>
               </a>
               <div class="collapse" id="form-elements">
                   <ul class="nav flex-column sub-menu">
                       <li class="nav-item"><a href="<?= base_url("/request") ?>" class="nav-link">Pemesanan Kendaraan</a></li>
                   </ul>
                   <ul class="nav flex-column sub-menu">
                       <li class="nav-item"><a href="<?= base_url("/riwayat") ?>" class="nav-link">Riwayat Pemesanan</a></li>
                   </ul>
               </div>
           </li>
           <li class="nav-item">
               <a class="nav-link" data-toggle="collapse" href="#charts" aria-expanded="false" aria-controls="charts">
                   <i class="icon-bar-graph menu-icon"></i>
                   <span class="menu-title">Riwayat Pesanan</span>
                   <i class="menu-arrow"></i>
               </a>
               <div class="collapse" id="charts">
                   <ul class="nav flex-column sub-menu">
                       <li class="nav-item"> <a class="nav-link" href="<?= base_url("/perjalanan") ?>">Perjalanan</a></li>
                   </ul>
                   <ul class="nav flex-column sub-menu">
                       <li class="nav-item"> <a class="nav-link" href="<?= base_url("/riwayat") ?>">Riwayat Pesanan</a></li>
                   </ul>
                   <ul class="nav flex-column sub-menu">
                       <li class="nav-item"> <a class="nav-link" href="<?= base_url("/activity_log") ?>">Activity Log</a></li>
                   </ul>
                   <ul class="nav flex-column sub-menu">
                       <li class="nav-item"> <a class="nav-link" href="<?= base_url("/order") ?>">Daftar Pesanan</a></li>
                   </ul>
               </div>
           </li>
           <li class="nav-item">
               <a class="nav-link" href="<?= base_url("/order_departemen") ?>">
                   <i class="icon-columns menu-icon"></i>
                   <span class="menu-title">Approval Pesanan</span>
               </a>
           </li>

       <?php endif; ?>



       <?php if (adminAtasan() === "SECURITY") : ?>
           <li class="nav-item">
               <a class="nav-link" href="<?= base_url("/driver") ?>" data-toggle="collapse" href="#form-elements" aria-expanded="false">
                   <span class="menu-title">Daftar Pengemudi</span>
               </a>
           </li>
       <?php endif; ?>

       <?php if (adminLogin() === "SEKURITI TEKNOLOGI INFORMASI") : ?>
           <li class="nav-item">
               <a class="nav-link" data-toggle="collapse" href="#charts" aria-expanded="false">
                   <i class="icon-bar-graph menu-icon"></i>
                   <span class="menu-title">Riwayat Pesanan</span>
                   <i class="menu-arrow"></i>
               </a>
               <div class="collapse" id="charts">
                   <ul class="nav flex-column sub-menu">
                       <li class="nav-item"> <a class="nav-link" href="<?= base_url("/order") ?>">List User</a></li>
                   </ul>
                   <ul class="nav flex-column sub-menu">
                       <li class="nav-item"> <a class="nav-link" href="<?= base_url("/riwayat") ?>">List Atasan</a></li>
                   </ul>
                   <ul class="nav flex-column sub-menu">
                       <li class="nav-item"> <a class="nav-link" href="<?= base_url("/activity_log") ?>">List Satuan Kerja</a></li>
                   </ul>
               </div>
           </li>
       <?php endif; ?>



       <?php if (adminAtasan() === "DEPARTEMEN LOGISTIK") : ?>
           <li class="nav-item">
               <a class="nav-link" data-toggle="collapse" href="#form-elements" aria-expanded="false">
                   <i class="icon-columns menu-icon"></i>
                   <span class="menu-title">Pemesanan Kendaraan</span>
                   <i class="menu-arrow"></i>
               </a>
               <div class="collapse" id="form-elements">
                   <ul class="nav flex-column sub-menu">
                       <li class="nav-item"><a href="<?= base_url("/request") ?>" class="nav-link">Pemesanan Kendaraan</a></li>
                   </ul>
                   <ul class="nav flex-column sub-menu">
                       <li class="nav-item"><a href="<?= base_url("/riwayat") ?>" class="nav-link">Riwayat Pemesanan</a></li>
                   </ul>
               </div>
           </li>


           <li class="nav-item">
               <a class="nav-link" data-toggle="collapse" href="#apaya" aria-expanded="false">
                   <i class="icon-bar-graph menu-icon"></i>
                   <span class="menu-title">Riwayat Pesanan</span>
                   <i class="menu-arrow"></i>
               </a>
               <div class="collapse" id="apaya">


                   <ul class="nav flex-column sub-menu">
                       <li class="nav-item"><a href="<?= base_url("/activity_log") ?>" class="nav-link">Activity Log</a></li>
                   </ul>
                   <ul class="nav flex-column sub-menu">
                       <li class="nav-item"><a href="<?= base_url("/order") ?>" class="nav-link">Daftar Pesanan</a></li>
                   </ul>
               </div>
           </li>


           <li class="nav-item">
               <a class="nav-link" data-toggle="collapse" href="#form-elements_3" aria-expanded="false">
                   <i class="icon-columns menu-icon"></i>
                   <span class="menu-title">Approval Pesanan</span>
                   <i class="menu-arrow"></i>
               </a>
               <div class="collapse" id="form-elements_3">
                   <ul class="nav flex-column sub-menu">
                       <li class="nav-item"><a href="<?= base_url("/order_departemen") ?>" class="nav-link">Departemen</a></li>
                   </ul>
                   <ul class="nav flex-column sub-menu">
                       <li class="nav-item"><a href="<?= base_url("/order_logistik") ?>" class="nav-link">Logistik</a></li>
                   </ul>
                   <ul class="nav flex-column sub-menu">
                       <li class="nav-item"><a href="<?= base_url("/change_mobil") ?>" class="nav-link">Change car</a></li>
                   </ul>
               </div>
           </li>

           <li class="nav-item">
               <a class="nav-link" href="<?= base_url("/driver") ?>">
                   <i class="icon-columns menu-icon"></i>
                   <span class="menu-title">Daftar Pengemudi</span>
               </a>
           </li>

       <?php endif; ?>


   </ul>