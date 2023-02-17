<?= $this->extend('layouts/general') ?>
<?= $this->section('content') ?>

<body>
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">

                        <div class="card-body">
                            <h4 class="card-title">Tambah Pengemudi</h4>
                            <p class="card-description">
                            <div class="table-responsive">
                                <?php if (!empty(session()->getFlashdata('error_controller'))) : ?>
                                    <div class='alert alert-danger mt-2'>
                                        <?php echo (session()->getFlashdata('error_controller')) ?>
                                    </div>
                                <?php endif; ?>
                                <table class="table table-striped" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>Nomor</th>
                                            <th>Plat Mobil</th>
                                            <th>Nama</th>
                                            <th>User ID</th>
                                            <th>Status Pengemudi</th>
                                            <th>Status Mobil</th>
                                            <th>Ketersediaan Mobil</th>
                                            <th>Ketersediaan Pengemudi</th>
                                            <th>Action</th>


                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php ?>
                                        <?php $no = 1;
                                        foreach ($mobil as $c) : ?>
                                            <tr>
                                                <td><?= $no++ ?></td>

                                                <td><?= $c['plat_nomor'] ?></td>
                                                <td><?= $c['nama_pengemudi'] ?></td>
                                                <td><?= $c['userid'] ?></td>
                                                <td><?= $c['status_pengemudi'] ?></td>
                                                <td><?= $c['status_mobil'] ?></td>
                                                <td>

                                                    <?php if ($c["userid"] !== "") :  ?>
                                                        <a href="status_unavailable/<?= $c['userid'] ?>" class="btn btn-warning">Tidak Tersedia</a>
                                                        <a href="status_available/<?= $c['userid'] ?>" class="btn btn-primary">Tersedia</a>
                                                    <?php endif; ?>
                                                </td>
                                                <td>

                                                    <?php if ($c["userid"] !== "") :  ?>
                                                        <a href="status_unavailable_car/<?= $c['userid'] ?>" class="btn btn-warning">Tidak Tersedia</a>
                                                        <a href="status_available_car/<?= $c['userid'] ?>" class="btn btn-primary">Tersedia</a>
                                                    <?php endif; ?>
                                                </td>

                                                <td>
                                                    <?php if (!empty($c["id_mobil"])) : ?>
                                                        <button type="submit" class="btn btn-primary mt-1" data-toggle="modal" data-target="#hapus_car<?php echo $c["id_mobil"] ?><?php echo $c["id_pengemudi"] ?>"><i class="fa fa-solid fa-trash"></i></button>
                                                    <?php endif; ?>


                                                    <?php if (empty($c["id_mobil"])) : ?>
                                                        <button type="submit" class="btn btn-primary mt-1" data-toggle="modal" data-target="#hapus_driver<?php echo $c["id_pengemudi"] ?>"><i class="fa fa-solid fa-trash"></i></button>
                                                    <?php endif; ?>


                                                    <button type="submit" class="btn btn-primary mt-1" data-toggle="modal" data-target="#changeMobil"><i class="fa fa-solid fa-pencil"></i></button>
                                                </td>
                                            </tr>
                                            <div class="modal fade in" tabindex="-1" role="dialog" id="changeMobil">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 id="b" class="modal-title">Ubah Mobil</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <label for="exampleSelectGender">Pengemudi</label>
                                                            <input type="text" id="nama_pengemudi" value="<?= $c["nama_pengemudi"] ?>" name="nama_pengemudi" width="276" class="form-control file-upload-info" readonly required />
                                                            <input type="hidden" id="userid" value="<?= $c["userid"]  ?>" />
                                                            <label for="exampleSelectGender">Dari Plat Mobil</label>

                                                            <select id="category" class="form-control" style="height:50px !important;" name="category" onclick="getPlatMobil()">

                                                            </select>
                                                            <label for="exampleSelectGender">Menjadi Plat Mobil(yang tersedia)</label>
                                                            <select id="ubah" class="form-control" style="height:50px !important;" name="ubah" value="" onclick="getPlat()">

                                                            </select>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Keluar</button>
                                                            <a class="btn btn-primary" type="submit" name="button" onclick="submitApproval()" class="btn btn-info mb-3">Ubah Pengemudi</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
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
                                                                        <option value="<?= $d["userid"] ?>" selected="selected">User ID =<?= $d["userid"] ?> Username <?= $d["nama_pengemudi"] ?></option>
                                                                    <?php endforeach; ?>
                                                                </select>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Keluar</button>
                                                                <button class="btn btn-primary" type="submit" name="submit">Submit</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
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
                                                            <div class="form-group" style="margin: 10px 50px 20px 0;">
                                                                <label for="exampleSelectGender">User</label>
                                                                <select class="form-control" style="height:50px !important;" name="userid">
                                                                    <?php foreach ($driver as $d) : ?>
                                                                        <option value="<?= $d["userid"] ?>" selected="selected">User ID =<?= $d["userid"] ?> Username <?= $d["nama_pengemudi"] ?></option>
                                                                    <?php endforeach; ?>
                                                                </select>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Keluar</button>
                                                                <button class="btn btn-primary" type="submit" name="submit">Submit</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </form>

                                            <div class="modal fade in" tabindex="-1" role="dialog" id="hapus_car<?php echo $c["id_mobil"] ?><?php echo $c["id_pengemudi"] ?>">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 id="b" class="modal-title">Hapus Data</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <label for="exampleSelectGender">Apakah anda yakin ingin menghapus data?</label>
                                                        </div>

                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Keluar</button>
                                                            <a href="<?= base_url("/hapus_car/" . $c["id_mobil"] . "/" . $c["id_pengemudi"]) ?>" onclick="remove()" class="btn btn-primary" type="submit" name="submit">Hapus</a>
                                                            </form>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal fade in" tabindex="-1" role="dialog" id="hapus_driver<?php echo $c["id_pengemudi"] ?>">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 id="b" class="modal-title">Hapus Data</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>

                                                        <div class="modal-body">
                                                            <label for="exampleSelectGender">Apakah anda yakin ingin menghapus data?</label>
                                                        </div>

                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Keluar</button>
                                                            <a href="<?= base_url("/hapus_driver/" . $c["id_pengemudi"]) ?>" class="btn btn-primary" onclick="remove()" type="submit" name="submit">Hapus</a>
                                                            </form>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-md-2 col-lg-2 col-sm-2">
                                <button type="submit" class="btn btn-primary mx-1 mt-1" data-toggle="modal" data-target="#addCar">Tambah Pengemudi=</button>
                            </div>
                            </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <form class="forms-sample" action="<?= base_url("/add_car/") ?>" method="POST">
                    <div class="modal fade in  mx-auto" tabindex="-1" role="dialog" id="addCar">
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
                                        <label for="exampleSelectGender">userid</label>
                                        <input type="text" name="userid" class="form-control" id="userid" placeholder="User ID">
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleSelectGender">Nama Pengemudi</label>
                                        <input type="text" name="username" class="form-control" id="username" placeholder="Nama Pengemudi">

                                    </div>
                                    <div class="form-group">
                                        <label for="exampleSelectGender">Status Pengemudi</label>
                                        <select class="form-control" style="height:50px !important;" name="status_pengemudi">
                                            <option value="Tersedia" selected="selected">Tersedia</option>
                                            <option value="Tidak Tersedia" selected="selected">Tidak Tersedia</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleSelectGender">Plat Nomor</label>
                                        <input type="text" name="plat_nomor" class="form-control" id="plat_nomor" placeholder="Plat Nomor">
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
                                </div>
                            </div>
                        </div>
                </form>



            </div>
        </div>
    </div>

</body>
</div>
<script>
    function submitApproval() {
        var userid = document.getElementById("dept").value;
        var plat_1 = document.getElementById("category").value;
        var plat_2 = document.getElementById("ubah").value;
        console.log(plat_1, plat_2, userid);
        $.ajax({
            url: "<?php echo site_url('update_driver'); ?>",
            method: "POST",
            data: {
                userid: userid,
                plat_1: plat_1,
                plat_2: plat_2,
            },
            async: true,
            dataType: "JSON",
            success: function(data) {



            }
        });
    }

    function remove() {
        Swal.fire(
            'Selamat!',
            'Data Berhasil di hapus',
            'success'
        )
    }


    function getPlatMobil() {
        var div = $('#dept').val();
        var id = document.getElementById("userid").value;
        console.log(id);
        $.ajax({
            url: "<?php echo site_url('get_sub_mobil'); ?>",
            method: "POST",
            data: {
                id: id,
            },
            async: true,
            dataType: "JSON",
            success: function(data) {
                var html = '';
                var i;
                html += '<option value=' + data[0].id_mobil + ' selected>' + data[0].plat_nomor + '</option>';

                $('#category').html(html);
            }
        });
    }

    function getPlat() {
        var id = document.getElementById("ubah").value;
        var plat_1 = document.getElementById("category").value;

        console.log(id);
        $.ajax({
            url: "<?php echo site_url('get_plat_mobil_1'); ?>",
            method: "POST",
            data: {
                id: id,
                plat_1: plat_1
            },
            async: true,
            dataType: "JSON",
            success: function(data) {
                var html = '';
                var i;
                html += '<option value=' + data[0].id_mobil + ' selected>' + data[0].plat_nomor + '</option>';

                $('#ubah').html(html);
            }
        });
    }
</script>
<?= $this->endSection() ?>