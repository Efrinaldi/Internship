<?= $this->extend('layouts/general') ?>
<?= $this->section('content') ?>

<body>
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Daftar User</h4>
                            <p class="card-description">
                            <div class="table-responsive">
                                <table class="table table-striped" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>Nomor</th>
                                            <th>Nama</th>
                                            <th>Username</th>
                                            <th>User Domain</th>
                                            <th>Departemen</th>
                                            <th>Jabatan</th>
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
                                            $divisi = new DivisiModel();
                                            $divisi = new UserDivisiModel();
                                            $departemen = new DivisiModel();
                                            $div = $departemen->query("SELECT departemen.id_divisi , departemen.divisi FROM departemen inner join user_divisi on user_divisi.id_divisi=departemen.id_divisi where userid = '$id'  ")->getResultArray();
                                            $data = $divisi->select('*')->where('userid', $o["userid"])->get()->getResultArray(); ?>
                                            <td><?= $no++; ?></td>

                                            <td><?= $o['userid'] ?></td>

                                            <td><?= $o['username'] ?></td>


                                            <?php if (count($data) == 0) : ?>
                                                <td><?= "" ?></td>
                                            <?php endif ?>

                                            <?php if (count($data) > 0) : ?>
                                                <td><?= $o['userdomain'] ?></td>
                                            <?php endif ?>


                                            <?php if (count($div) > 0) : ?>
                                                <td><?= $div[0]['divisi'] ?></td>
                                            <?php endif ?>
                                            <?php if (count($div) == 0) : ?>
                                                <td><?= "" ?></td>
                                            <?php endif ?>


                                            <?php if (count($data) > 0) : ?>
                                                <td><?= "" ?></td>
                                            <?php endif ?>
                                            <?php if (count($data) == 0) : ?>
                                                <td></td>
                                            <?php endif ?>



                                            <td> <button type="submit" class="btn btn-primary mt-1 mr-2" data-toggle="modal" data-target="#userModal<?php echo $o["userid"] ?>"><i class="fa fa-solid fa-pencil"></i></button></td>
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
                                                <div class="modal fade in mx-auto" tabindex="-1" role="dialog" id="userModal<?php echo $o["userid"] ?>">
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
                                                                    <label for="exampleSelectGender">Satuan Kerja</label>
                                                                    <select id="satker" class="form-control" style="height:50px !important;" name="satker" onchange="getValue(this.value)">
                                                                        <?php foreach ($satker as $di) : ?>
                                                                            <option value="<?= $di["id"] ?>" selected="selected"><?= $di["nama_satuan_kerja"] ?></option>
                                                                        <?php endforeach; ?>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="exampleSelectGender">Department</label>
                                                                    <select id="departemen" class="form-control departemen" style="height:50px !important;"></select>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="exampleSelectGender">Jabatan</label>
                                                                    <select class="form-control" style="height:50px !important;" name="jabatan">
                                                                        <option value="staff" selected="selected">Staff</option>
                                                                        <option value="kadep" selected="selected">Kepala Departemen</option>
                                                                        <option value="kasat" selected="selected">Kepala Satuan Kerja</option>
                                                                        <option value="direksi" selected="selected">Direksi</option>
                                                                    </select>
                                                                </div>

                                                                <?php
                                                                $atasan = new AtasanModel();
                                                                $data_atasan = $atasan->query("SELECT * FROM atasan where userid = '$id' ")->getResultArray(); ?>


                                                                <div class="form-check">
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
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</div>
<script>
    function getValue(id) {
        var id = id;
        $.ajax({
            url: "<?php echo site_url('get_dept'); ?>",
            method: "POST",
            data: {
                id: id,
            },
            async: true,
            dataType: "JSON",
            success: function(data) {
                var html = '';
                $('select.departemen').empty();
                var i;
                $.each(data, function(index, data) {
                    $('select.departemen').append($('<option>', {
                        value: data.id_divisi,
                        text: data.id_divisi + ' - ' + data.divisi
                    }));
                });
            }
        });

    }
</script>
<?= $this->endSection() ?>