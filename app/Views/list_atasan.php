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
                                        <?php

                                        use App\Models\AtasanModel;
                                        use App\Models\DivisiModel;
                                        use App\Models\UserDivisiModel;

                                        $no = 1;
                                        foreach ($data_user as $o) :
                                            $id = $o["userid"];
                                            $divisi = new UserDivisiModel();
                                            $data_atasan = $atasan->query("SELECT * FROM atasan where userid = '.$id' ")->getResultArray();
                                            $data = $divisi->select('*')->where('userid', $o["userid"])->get()->getResultArray(); ?>
                                            <td><?= $no++; ?></td>
                                            <td><?= $o['userid'] ?></td>
                                            <td><?= $o['username'] ?></td>
                                            <?php if (count($data) > 0) : ?>
                                                <td><?= $o['userdomain'] ?></td>
                                            <?php endif ?>
                                            <?php if (count($data) == 0) : ?>
                                                <td> </td>
                                            <?php endif ?>
                                            <?php if (count($data) > 0) : ?>
                                                <td> <?= $data[0]['divisi'] ?></td>
                                            <?php endif ?>
                                            <?php if (count($data) == 0) : ?>
                                                <td> </td>
                                            <?php endif ?>
                                            <td> <button type="submit" class="btn btn-primary mt-1 mr-2" data-toggle="modal" data-target="#userModal<?php echo $o["userid"] ?>"><i class="fa fa-solid fa-pen"></i></button></td>
                                            <?php if (count($data_atasan) == 0) : ?>
                                                <td> <button type="submit" class="btn btn-primary mt-1" data-toggle="modal" data-target="#hapusAtasan<?php echo $o["userid"] ?>"><i class="fa fa-solid fa-trash"></i></button></td>
                                            <?php endif ?>
                                            <?php if (count($data_atasan) > 0) : ?>
                                                <td> <button type="submit" class="btn btn-primary mt-1" data-toggle="modal" data-target="#hapusAtasan<?php echo $o["userid"] ?>"><i class="fa fa-solid fa-trash"></i></button></td>
                                            <?php endif ?>
                                            </tr>


                                            <div class="modal" tabindex="-1" role="dialog" id="hapusAtasan<?php echo $o["userid"] ?>">
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
                                                            <a href="<?= base_url("/hapus_atasan/" . $o["userid"]) ?>" class="btn btn-primary" type="submit" name="submit">Hapus</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            </a>

                                            <form class="forms-sample" action="<?= base_url("/change_user/" . $o["userid"]) ?>" method="POST">
                                                <div class="modal mx-auto" tabindex="-1" role="dialog" id="userModal<?php echo $o["userid"] ?>">
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
                                                                    <label for="exampleSelectGender">User ID</label>
                                                                    <h3 name="userid" class="form-control" readonly="readonly" id="userid" value="<?= $o["userid"] ?>" placeholder="Kegunaan Aplikasi"><?php echo $o["userid"] ?></h3>
                                                                </div>

                                                                <div class="form-group">
                                                                    <label for="exampleSelectGender">Department</label>
                                                                    <select class="form-control" style="height:50px !important;" name="departemen">
                                                                        <?php foreach ($data_divisi as $di) : ?>
                                                                            <option value="<?= $di["id_divisi"] ?>" selected="selected"><?= $di["divisi"] ?></option>
                                                                            <?php session()->set(["divisi" => $di["divisi"]]) ?>
                                                                        <?php endforeach; ?>
                                                                    </select>
                                                                </div>
                                                                <?php
                                                                $atasan = new AtasanModel();
                                                                $data_atasan = $atasan->query("SELECT * FROM atasan where userid = '$id' ")->getResultArray(); ?>
                                                                <div class="form-group">
                                                                    <label for="exampleSelectGender">Email</label>
                                                                    <input type="text" name="email" class="form-control" id="email" placeholder="Email">

                                                                </div>

                                                                <div class="form-check">
                                                                    <input class="form-check-input" name="check_atasan" type="checkbox" value="ada" id="flexCheckDefault">
                                                                    <label class="form-check-label" for="flexCheckDefault">Tandai sebagai supervisor</label>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Keluar</button>
                                                                <button class="btn btn-primary" type="submit" name="submit">Submit</button>

                                            </form>


                                        <?php
                                        endforeach;
                                        ?>

                                    </tbody>

                                </table>
                            </div>
                        </div>
</body>
</div>
<script>
    $
</script>
<?= $this->endSection() ?>