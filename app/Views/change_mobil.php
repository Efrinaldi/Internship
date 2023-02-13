<?= $this->extend('layouts/general') ?>
<?= $this->section('content') ?>
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Ubah Mobil</h4>
                        <p class="card-description">
                            Add class <code>.table-striped</code> </p>
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Action</th>
                                        <th>Nomor</th>
                                        <th>Nama</th>
                                        <th>Unit Kerja</th>
                                        <th>Waktu</th>
                                        <th>Waktu Berakhir</th>
                                        <th>Tujuan Pakai</th>
                                        <th>Plat Nomor</th>
                                        <th>Lokasi Tujuan</th>
                                        <th>Keterangan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1;
                                    foreach ($order as $o) : ?>
                                        <tr>
                                            <?php if (!empty($o["id_pemesanan"])) : ?>
                                                <td>
                                                    <a href="<?= base_url("change_car/" . $o["id_pemesanan"]) ?>" type="submit" class="btn btn-primary mt-1">Ubah Mobil</a>
                                                </td>
                                            <?php endif; ?>

                                            <?php if (empty($o["id_pemesanan"])) : ?>
                                                <td>
                                                    <a type="submit" class="btn btn-danger mt-1">Menunggu Persetujuan</a>
                                                </td>
                                            <?php endif; ?>
                                            <td class="py-1"><?= $no++; ?></td>
                                            <td><?= $o['nama'] ?></td>
                                            <td><?= $o['divisi'] ?></td>
                                            <td><?= $o['tanggal'], " ",  $o['waktu'] ?></td>
                                            <td><?= $o['waktu_end'] ?></td>
                                            <td><?= $o['tujuan_pakai'] ?></td>
                                            <td><?= $o['plat_nomor'] ?></td>
                                            <td><?= $o['tujuan'] ?></td>
                                            <td><?= $o['keterangan'] ?></td>
                                        </tr>
                                </tbody>
                            <?php endforeach; ?>
                            </table>
                        </div>

                    </div>
                </div>

            </div>




            <!-- Page Heading -->

            <?= $this->endSection() ?>