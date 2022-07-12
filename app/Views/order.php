<?= $this->extend('layouts/admin') ?>
<?= $this->section('content') ?>
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Operational Vehicle Management System - BCA Syariah</h1>
    </div>


    <body>
        <div class="container">
            <h2>Daftar Pesanan</h2>
            <p>Anda dapat mengelola daftar pesanan</p>
            <table class="table table-dark">
                <thead>
                    <tr>
                        <th>Nomor</th>
                        <th>Nama</th>
                        <th>Unit Kerja</th>
                        <th>Waktu</th>
                        <th>Tujuan</th>
                        <th>Proses</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    foreach ($order as $o) :
                    ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $o['nama'] ?></td>
                            <td><?= $o['unit_kerja'] ?></td>
                            <td><?= $o['tanggal'], " ",  $o['waktu'] ?></td>
                            <td><?= $o['tujuan'] ?></td>
                            <td>
                                <a href="reject/<?= $o['ID'] ?>" class="btn btn-danger">Tolak</a>
                                <a href="approve/<?= $o['ID'] ?>" class="btn btn-success">Terima</a>
                            </td>
                        </tr>
                    <?php
                    endforeach;
                    ?>
                </tbody>
            </table>
        </div>
    </body>

</div>
<?= $this->endSection() ?>