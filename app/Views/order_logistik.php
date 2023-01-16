<?= $this->extend('layouts/general') ?>
<?= $this->section('content') ?>

<body>
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
                                <table class="table table-striped" id="dataTable">
                                    <thead>
                                        <tr>
                                            <th>Nomor</th>
                                            <th>Nama</th>
                                            <th>Unit Kerja</th>
                                            <th>Waktu</th>
                                            <th>Tujuan Pakai</th>
                                            <th>Keterangan</th>
                                            <th>Plat Nomor</th>
                                            <th>Lokasi Tujuan</th>
                                            <th>Proses</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php
                                        $no = 1;
                                        foreach ($order as $o) : ?>
                                            <tr>
                                                <td><?= $no++; ?></td>
                                                <td><?= $o['nama'] ?></td>
                                                <td><?= $o['divisi'] ?></td>
                                                <td><?= $o['tanggal'], " ",  $o['waktu'] ?></td>
                                                <td><?= $o['tujuan_pakai'] ?></td>
                                                <td><?= $o['keterangan'] ?></td>
                                                <td><?= $o['plat_nomor'] ?></td>
                                                <td><?= $o['tujuan'] ?></td>
                                                <td>
                                                    <a href="pick_driver/<?= $o['id'] ?>/<?= $o['userid'] ?>" class="btn btn-primary">Terima</a>
                                                    <a href="reject_order/<?= $o['id'] ?>" class="btn btn-secondary">Tolak</a>
                                                </td>
                                            </tr>


                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>




</body>

</div>
<?= $this->endSection() ?>