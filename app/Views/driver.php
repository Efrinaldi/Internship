<?= $this->extend('layouts/admin') ?>
<?= $this->section('content') ?>
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Operational Vehicle Management System - BCA Syariah</h1>
    </div>

    <body>
        <div class="container">
            <h2>Daftar Pengemudi</h2>
            <p>Anda dapat mengelola daftar pengemudi</p>
            <a href="<?= base_url("/register") ?>" class="btn btn-info mb-3">Tambah Driver</a>
            <div class="table-responsive">
                <table class="table table-dark">
                    <thead class="text-center">
                        <tr>
                            <th>Nomor</th>
                            <th>Nama</th>
                            <th>Status</th>
                            <th>Proses</th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        <?php
                        $no = 1;
                        foreach ($driver as $d) :
                        ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $d['nama_pengemudi'] ?></td>
                            <td><?= $d['status_pengemudi'] ?></td>

                            <td>
                                <a href="status_unavailable/<?= $d['id_pengemudi'] ?>" class="btn btn-warning">Tidak
                                    Tersedia</a>
                                <a href="status_available/<?= $d['id_pengemudi'] ?>"
                                    class="btn btn-primary">Tersedia</a>
                            </td>
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