<?= $this->extend('layouts/general') ?>
<?= $this->section('content') ?>

<body>
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <button type="submit" class="btn btn-primary mx-1 mt-1" data-toggle="modal" data-target="#addCar">Tambah Pengemudi</button>

                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">

                        <div class="card-body">
                            <h4 class="card-title">Daftar Pesanan</h4>
                            <p class="card-description">
                            <div class="table-responsive">
                                <table class="table table-striped" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>Nomor</th>
                                            <th>Nama</th>
                                            <th>Plat Mobil</th>
                                            <th>Status</th>
                                            <th>Proses</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1;
                                        foreach ($mobil as $c) : ?>
                                            <tr>
                                                <td><?= $c['id_mobil'] ?></td>
                                                <td><?= $c['nama_pengemudi'] ?></td>
                                                <td><?= $c['plat_nomor'] ?></td>
                                                <td><?= $c['status_pengemudi'] ?></td>
                                                <td>
                                                    <a href="status_unavailable/<?= $c['userid'] ?>" class="btn btn-warning">Tidak Tersedia</a>
                                                    <a href="status_available/<?= $c['userid'] ?>" class="btn btn-primary">Tersedia</a>
                                                </td>
                                                <td>
                                                    <button type="submit" class="btn btn-primary mt-1" data-toggle="modal" data-target="#hapus_driver<?php echo $c["id_mobil"] ?>"><i class="fa fa-solid fa-trash"></i></button>
                                                    <button type="submit" class="btn btn-primary mt-1" data-toggle="modal" data-target="#edit_user<?php echo $c["id_mobil"] ?>"><i class="fa fa-solid fa-pen"></i></button>
                                                </td>
                                            </tr>
                                            <form class="forms-sample" action="<?= base_url("/edit_user/" . $c["id_mobil"])  ?>" method="POST">
                                                <div class="modal fade in mx-auto" tabindex="-1" role="dialog" id="edit_user<?php echo  $c["id_mobil"] ?>">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title">Simpan Data</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="exampleSelectGender">User</label>
                                                                <select class="form-control" style="height:50px !important;" name="userid">
                                                                    <?php foreach ($driver as $d) : ?>
                                                                        <option value="<?= $d["userid"] ?>" selected="selected">User ID =<?= $d["userid"] ?> Username <?= $d["username"] ?></option>
                                                                    <?php endforeach; ?>
                                                                </select>
                                                            </div>


                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Keluar</button>
                                                                <button class="btn btn-primary" type="submit" name="submit">Submit</button>

                                            </form>

                                            <form class="forms-sample" action="<?= base_url("/edit_user/" . $c["id_mobil"])  ?>" method="POST">
                                                <div class="modal fade in mx-auto" tabindex="-1" role="dialog" id="edit_user<?php echo  $c["id_mobil"] ?>">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title">Simpan Data</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="exampleSelectGender">User</label>
                                                                <select class="form-control" style="height:50px !important;" name="userid">
                                                                    <?php foreach ($driver as $d) : ?>
                                                                        <option value="<?= $d["userid"] ?>" selected="selected">User ID =<?= $d["userid"] ?> Username <?= $d["username"] ?></option>
                                                                    <?php endforeach; ?>
                                                                </select>
                                                            </div>


                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Keluar</button>
                                                                <button class="btn btn-primary" type="submit" name="submit">Submit</button>

                                            </form>








                                            

                                            <div class="modal fade in mx-auto" tabindex="-1" role="dialog" id="hapus_driver<?php echo $c["id_mobil"] ?>">
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
                                                            <a href="<?= base_url("/hapus_driver/" . $c["id_mobil"]) ?>" class="btn btn-primary" type="submit" name="submit">Hapus</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>


                            </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
</body>
</div>
<?= $this->endSection() ?>