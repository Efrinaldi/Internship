<li class="menu-header">Main Menu</li>
<li class="active"><a class="nav-link" href="<?= site_url('homes'); ?>"><i class="fas fa-fire"></i> <span>Dashboard</span></a></li>
<?php if (adminLogin()->role === 'Admin Reimburse' || adminLogin()->role === 'Driver') : ?>
    <li class="nav-item dropdown">
        <a href="#" class="nav-link has-dropdown"><i class="fas fa-keyboard"></i> <span>Reimbursement</span></a>
        <ul class="dropdown-menu">
        <?php if (adminLogin()->role === 'Driver') : ?>
            <li><a class="nav-link" href="<?= site_url('reimburse/list'); ?>">List Order</a></li>
        <?php endif; ?>
        <?php if (adminLogin()->role === 'Admin Reimburse') : ?>
            <li><a class="nav-link" href="<?= site_url('reimburse'); ?>">Daftar Reimbursement</a></li>
            <li><a class="nav-link" href="<?= site_url('reimburse/approve'); ?>">Daftar Approval</a></li>
        <?php endif; ?>
        </ul>
    </li>
<?php endif; ?>