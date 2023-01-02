<?= $this->extend('layouts/admin') ?>
<?= $this->section('content') ?>
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Operational Vehicle Management System - BCA Syariah</h1>
    </div>

    <body>
        <div class="container">
            <h2>Daftar User Departemen</h2>
            <p>Anda dapat mengelola daftar Depertament User</p>
            <div class="table-responsive">
                <table class="table table-dark">
                    <thead class="text-center">
                        <tr>
                            <th>Nomor</th>
                            <th>USER ID</th>
                            <th>USERNAME </th>
                            <th>USER DOMAIN</th>
                            <th>DIVISI</th>
                            <th>ACTION</th>
                            <th>Atasan</th>

                        </tr>
                    </thead>
                    <tbody class="text-center">
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