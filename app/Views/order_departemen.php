<?= $this->extend('layouts/general') ?>
<?= $this->section('content') ?>

<body>
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Approval Pesanan</h4>
                            <div class="table-responsive">
                                <table class="table table-striped" id="dataTables-example">
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
                                            <tr style="height:100px; max-height: 100px;max-width: 100%;">
                                                <td><?= $no++; ?></td>
                                                <td><?= $o['nama'] ?></td>
                                                <td><?= $o['divisi'] ?></td>
                                                <td><?= $o['tanggal'], " ",  $o['waktu'] ?></td>
                                                <td><?= $o['tujuan_pakai'] ?></td>
                                                <td><?= $o['keterangan'] ?></td>
                                                <td><?= $o['plat_nomor'] ?></td>
                                                <td><?= $o['tujuan'] ?></td>
                                                <td>
                                                    <a class="btn btn-primary" data-toggle="modal" data-target="#confirmation<?= $o['id'] ?>" style="height:40px;max-height:40px; justify-content:center;align-items: center;">Terima</a>
                                                    <a class="btn btn-secondary" data-toggle="modal" data-target="#delete<?= $o['id'] ?>" style="height:40px;max-height:40px; justify-content:center;align-items: center;">Tolak</a>
                                                </td>
                                            </tr>
                                            <div class="modal fade in" tabindex="-1" role="dialog" id="confirmation<?= $o['id'] ?>">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 id="b" class="modal-title">Selesaikan Perjalanan</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>

                                                        <div class="modal-body">
                                                            <label for="exampleSelectGender">Apakah anda yakin menerima pemesanan ini?</label>
                                                        </div>

                                                        <div class="modal-footer">
                                                            <a href="approve_order_dept/<?= $o['id'] ?>" class="btn btn-primary" type="submit" onclick="success()" name="submit">OK </a>
                                                            </form>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal fade in" tabindex="-1" role="dialog" id="delete<?= $o['id'] ?>">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 id="b" class="modal-title">Selesaikan Perjalanan</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>

                                                        <div class="modal-body">
                                                            <label for="exampleSelectGender">Apakah anda yakin menolak pemesanan ini? </label>
                                                        </div>

                                                        <div class="modal-footer">
                                                            <a href="reject_order/<?= $o['id'] ?>" class="btn btn-primary" onclick="reject()" type="submit" name="submit">OK </a>

                                                            </form>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>

                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
</body>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
<script type="text/javascript" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable();
    });

    function success() {
        Swal.fire(
            'Selamat!',
            'Data Berhasil di Approve',
            'success'
        )
    }

    function reject() {
        Swal.fire(
            'Selamat!',
            'Data Berhasil di reject',
            'success'
        )
    }
</script>
</script>
</div>
<?= $this->endSection() ?>