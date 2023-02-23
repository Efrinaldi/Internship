<?= $this->extend('layouts/general') ?>
<?= $this->section('content') ?>


<body>
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Daftar Pengemudi</h4>
                            <?php if (count($mobil) == 0) : ?>
                                <a href="<?= base_url("driver") ?>" class="btn btn-primary mb-3">Ubah Status Driver</a>
                            <?php endif; ?>
                            <div class="table-responsive">
                                <table class="table table-striped" id="dataTable">
                                    <thead>
                                        <tr>
                                            <th>Nomor</th>
                                            <th>Nama</th>
                                            <th>Plat Mobil</th>
                                            <th>Status</th>
                                            <th>Proses</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php if (count($mobil) == 0) : ?>
                                            <div class="alert alert-success alert-dismissible fade show mt-auto mt-2" role="alert">
                                                <?php echo ("Pengemudi Tidak Tersedia, Harap menunggu pengemudi yang tersedia") ?>
                                            </div>
                                        <?php endif ?>
                                        <?php
                                        $no = 1;

                                        foreach ($mobil as $c) : ?>


                                            <td><?= $no++; ?></td>
                                            <td><?= $c['nama_pengemudi'] ?></td>
                                            <td><?= $c['plat_nomor'] ?></td>
                                            <td><?= $c['status_pengemudi'] ?></td>
                                            <td>
                                                <a href="<?= base_url("insert_order/" . $id_pemesanan . "/" . $c['id_mobil']  . "/" . $c["userid"]) ?>" class="btn btn-primary" onclick="submit()" type="hidden">Pilih Driver</a>
                                            </td>
                                            </tr>
                                            <div class="modal" tabindex="-1" role="dialog" id="hapus_driver<?php echo $c["userid"] ?>">
                                                <div class=" modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">Hapus Data </h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <p>Apakah anda ingin menyimpan perubahan ?</p>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Keluar</button>
                                                            <a href="<?= base_url("/hapus_driver/" . $c["userid"]) ?>" class="btn btn-primary" type="submit" name="submit">Hapus</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php
                                        endforeach;
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                            <form class="forms-sample" action="<?= base_url("/add_car/") ?>" method="POST">
                                <div class="modal mx-auto" tabindex="-1" role="dialog" id="addCar">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Simpan Data</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label for="exampleSelectGender">Plat Nomor</label>
                                                    <input type="text" name="plat_nomor" class="form-control" id="plat_nomor" placeholder="Plat Nomor">
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleSelectGender">User</label>
                                                    <select class="form-control" style="height:50px !important;" name="userid">
                                                        <?php foreach ($driver as $d) : ?>
                                                            <option value="<?= $d["userid"] ?>" selected="selected">User ID =<?= $d["userid"] ?> Username <?= $d["username"] ?></option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleSelectGender">Status Mobil</label>
                                                    <select class="form-control" style="height:50px !important;" name="status_mobil">
                                                        <option value="Tersedia" selected="selected">Tersedia</option>
                                                        <option value="Tidak Tersedia" selected="selected">Tidak Tersedia</option>
                                                    </select>
                                                </div>

                                                <div class="form-group">
                                                    <label for="exampleSelectGender">Jenis Mobil</label>
                                                    <input type="text" name="jenis_mobil" class="form-control" id="" placeholder="Jenis Mobil">
                                                </div>

                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Keluar</button>
                                                <button class="btn btn-primary" type="submit" name="submit">Submit</button>
                            </form>

                        </div>
                    </div>
                </div>
            </div>

</body>
</div>
<script>
    function submit() {
        Swal.fire(
            'Good job!',
            'Selamat Driver anda sudah disetujui',
            'success'
        )
    }
</script>

<?= $this->endSection() ?>