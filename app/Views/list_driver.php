<?= $this->extend('layouts/general') ?>
<?= $this->section('content') ?>


<body>
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <button type="submit" class="btn btn-primary mx-1 mt-1" data-toggle="modal" data-target="#addDriver">Tambah Pengemudi</button>
                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Tambah Pengemudi</h4>
                            <p class="card-description">
                            <div class="table-responsive">
                                <table class="table table-striped" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>Nama</th>
                                            <th>User ID </th>
                                            <th>Nama Pengemudi</th>
                                            <th>Divisi</th>
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
                                            <td><?= $o['nama_pengemudi'] ?></td>
                                            <?php if (count($data) > 0) : ?>
                                                <td> Driver</td>
                                            <?php endif ?>
                                            <?php if (count($data) == 0) : ?>
                                                <td> </td>
                                            <?php endif ?>
                                            <?php if (count($data_user) > 0) : ?>
                                                <td> <button type="submit" class="btn btn-primary" data-toggle="modal" data-target="#hapusDriver<?php echo $o["userid"] ?>"><i class="fa fa-solid fa-trash"></i></button></td>
                                            <?php endif ?>
                                            </tr>
                                            <form class="forms-sample" action="<?= base_url("/add_driver/") ?>" method="POST">
                                                <div class="modal fade in  mx-auto" tabindex="-1" role="dialog" id="addDriver">
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
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Keluar</button>
                                                                <button class="btn btn-primary" type="submit" name="submit">Submit</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
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