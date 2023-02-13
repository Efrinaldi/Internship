<?= $this->extend('layouts/admin') ?>
<?= $this->section('content') ?>
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Operational Vehicle Management System - BCA Syariah</h1>
        <h1 class="h3 mb-0 text-gray-800">Daftar Pesanan</h1>

    </div>

    <body>
        <div class="container">
            <div class="table-responsive">
                <table class="table table-dark">
                    <thead class="text-center">
                        <tr>
                            <th>Nomor</th>
                            <th>Nama</th>
                            <th>NIP</th>
                            <th>Unit Kerja</th>
                            <th>Waktu</th>
                            <th>Tujuan Pakai</th>
                            <th>Lokasi Tujuan</th>
                            <th>Keterangan</th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        <?php
                        $no = 1;
                        foreach ($order as $o) :
                        ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= $o['nama'] ?></td>
                                <td><?= $o['nip'] ?></td>
                                <td><?= $o['unit_kerja'] ?></td>
                                <td><?= $o['tanggal'], " ",  $o['waktu'] ?></td>
                                <td><?= $o['tujuan_pakai'] ?></td>
                                <td><?= $o['tujuan'] ?></td>
                                <td><?= $o['keterangan'] ?></td>
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