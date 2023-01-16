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
                                    <?php
                                    $no = 1;
                                    foreach ($order as $o) : ?>
                                        <tr>
                                            <td>
                                                <button type="submit" class="btn btn-primary mt-1" data-toggle="modal" data-target="#change_mobil<?php echo $o["ID"] ?>"><i class="fa fa-solid fa-pencil"></i></button>
                                            </td>

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
                                <form class="forms-sample" action="<?= base_url("/change_order/" . $o["ID"]) ?>" method="POST">
                                    <div class="modal mx-auto" tabindex="-1" role="dialog" id="change_mobil<?php echo $o["ID"] ?>">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Simpan Data</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <select class="form-control" style="height:50px !important;" name="user">
                                                        <?php foreach ($data as $di) : ?>
                                                            <option value="<?= $di["userid"] ?>" selected="selected"><?= $di["nama_pengemudi"] ?></option>
                                                        <?php endforeach; ?>
                                                    </select>

                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Keluar</button>
                                                    <button class="btn btn-primary" type="submit" name="submit">Submit</button>

                                </form>
                            <?php endforeach; ?>

                            </table>






                        </div>

                    </div>
                </div>

            </div>




            <!-- Page Heading -->

            <?= $this->endSection() ?>