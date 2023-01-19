<?= $this->extend('layouts/general') ?>
<?= $this->section('content') ?>
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Daftar Pesanan</h4>
                        <p class="card-description">
                            Add class <code>.table-striped</code> </p>
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Nomor</th>
                                        <th>Nama</th>
                                        <th>Unit Kerja</th>
                                        <th>Waktu</th>
                                        <th>Waktu Berakhir</th>
                                        <th>Tujuan Pakai</th>
                                        <th>Lokasi Tujuan</th>
                                        <th>Keterangan</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($order as $o) : ?>
                                        <tr>
                                            <td class="py-1"><?= $no++; ?></td>
                                            <td><?= $o['nama'] ?></td>
                                            <td><?= $o['divisi'] ?></td>
                                            <td><?= $o['tanggal'], " ",  $o['waktu'] ?></td>
                                            <td><?= $o['waktu_end'] ?></td>
                                            <td><?= $o['tujuan_pakai'] ?></td>
                                            <td><?= $o['tujuan'] ?></td>
                                            <td><?= $o['keterangan'] ?></td>
                                        </tr>


                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Page Heading -->

            <?= $this->endSection() ?>