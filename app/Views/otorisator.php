<?= $this->extend('layouts/admin') ?>
<?= $this->section('content') ?>
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Operational Vehicle Management System - BCA Syariah</h1>
    </div>

    <body>
        <div class="container">
            <h2>Daftar Supervisor Unit Kerja</h2>
            <p>Anda dapat mengelola daftar Supervisor Unit Kerja</p>
            <a href="<?= base_url("/register") ?>" class="btn btn-info mb-3">Tambah Supervisor</a>
            <div class="table-responsive">
                <table class="table table-dark">
                    <thead class="text-center">
                        <tr>
                            <th>Nomor</th>
                            <th>NIP</th>
                            <th>Nama</th>
                            <th>Unit Kerja</th>
                            <th>Role</th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        <?php
                        $no = 1;
                        foreach ($oauth_user as $o) :
                            if ($o['role'] === 'Supervisor') {
                        ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $o['nip'] ?></td>
                            <td><?= $o['first_name'], " ", $o['last_name'] ?></td>
                            <td><?= $o['unit_kerja'] ?></td>
                            <td><?= $o['role'];
                                    } ?></td>
                        </tr>
                        <?php
                        endforeach;
                            ?>
                    </tbody>
                </table>
            </div>
        </div>
    </body>
</div>
<?= $this->endSection() ?>