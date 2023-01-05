<?= $this->extend('layouts/admin') ?>
<?= $this->section('content') ?>
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Operational Vehicle Management System - BCA Syariah</h1>
    </div>

    <body>
        <div class="container-fluid">

            <h2>Daftar Pesanan</h2>
            <p>Anda dapat mengelola daftar pesanan</p>

            <div class="table-responsive">
                <table class="table table-dark ">
                    <thead class="text-center">
                        <tr>
                            <th>Nomor</th>
                            <th>Nama</th>
                            <th>Unit Kerja</th>
                            <th>Waktu</th>
                            <th>Tujuan Pakai</th>
                            <th>Keterangan</th>
                            <th>Plat Nomor</th>
                            <th>Lokasi Tujuan</th>
                            <th>Action</th>

                        </tr>
                    </thead>

                    <tbody class="text-center">
                        <?php

                        use App\Models\AtasanModel;
                        use App\Models\UserDivisiModel;

                        $no = 1;
                        foreach ($order as $o) : ?><tr>

                                <td><?= $no++; ?></td>
                                <td><?= $o['nama'] ?></td>
                                <td><?= $o['divisi'] ?></td>
                                <td><?= $o['tanggal'], " ",  $o['waktu'] ?></td>
                                <td><?= $o['tujuan_pakai'] ?></td>
                                <td><?= $o['keterangan'] ?></td>
                                <td><?= $o['plat_nomor'] ?></td>
                                <td><?= $o['tujuan'] ?></td>
                                <td><button id="range-submit" type="submit" value="Submit" class="btn btn-light col-lg-12" data-toggle="modal" data-target="#sendApproval<?php echo $o["id_order"] ?>" type="button" class="btn btn-primary">Send Approval</button></td>
                            </tr>
                            <div class="modal fade in" tabindex="-1" role="dialog" id="sendApproval<?php echo $o["id_order"] ?>">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 id="b" class="modal-title">Simpan Data</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>

                                        <div class="modal-body">
                                            <label for="exampleSelectGender">Departemen</label>
                                            <select id="dept" class="form-control" style="height:50px !important;" name="dept" value="" onchange="getValue(this.value)">
                                                <option selected disabled>Pilih Departemen</option>
                                                <?php foreach ($data_divisi as $di) : ?>
                                                    <option id="div" value="<?= $di["id_divisi"] ?>"><?= $di["divisi"] ?></option>
                                                    <?php session()->set(["divisi" => $di["divisi"]]) ?>
                                                <?php endforeach; ?>
                                            </select>
                                            <label for="exampleSelectGender">Supervisor</label>
                                            <input type="text" id="spv">

                                            <select id="category" class="form-control" style="height:50px !important;" name="category" value="">
                                                <option selected disabled>Pilih Supervisor</option>
                                                <option value=""></option>
                                            </select>

                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Keluar</button>
                                            <button class="btn btn-primary" type="submit" name="submit">Submit</button>
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
</body>
<script type="text/javascript">
    function getValue(v) {
        var div = $('#dept').val();
        var id = document.getElementById("dept").value;
        document.getElementById("spv").value = id;
        console.log(id);
        $.ajax({
            url: "<?php echo site_url('get_sub_spv'); ?>",
            method: "POST",
            data: {
                id: id
            },
            async: true,
            dataType: "JSON",
            success: function(data) {
                console.log(data)
                var html = '';
                var i;
                for (i = 0; i < data.length; i++) {
                    html += '<option value=' + data[i].userid + '>' + data[i].username + '</option>';
                }
                $('#category').html(html);
            }
        });
    }
</script>






</div>
<?= $this->endSection() ?>