<?= $this->extend('layouts/general') ?>
<?= $this->section('content') ?>
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Daftar Pesanan</h4>
                        <p class="card-description">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Nomor</th>
                                        <th>Nama</th>
                                        <th>Unit Kerja</th>
                                        <th>Waktu</th>
                                        <th>Tujuan Pakai</th>
                                        <th>Lokasi Tujuan</th>
                                        <th>Keterangan</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($order as $o) : ?>
                                        <tr>
                                            <td class="py-1"><?= $no++; ?></td>
                                            <td><?= $no++; ?></td>
                                            <td><?= $o['nama'] ?></td>
                                            <td><?= $o['divisi'] ?></td>
                                            <td><?= $o['tanggal'], " ",  $o['waktu'] ?></td>
                                            <td><?= $o['tujuan_pakai'] ?></td>
                                            <td><?= $o['tujuan'] ?></td>
                                            <td><?= $o['keterangan'] ?></td>
                                            <td class="py-1"><button id="range-submit" type="submit" value="Submit" class="btn btn-primary col-lg-12" data-toggle="modal" data-target="#sendApproval<?php echo $o["id_order"] ?>" type="button" class="btn btn-primary">Send Approval</button></td>
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
                                                        <select id="category" class="form-control" style="height:50px !important;" name="category" value="">

                                                        </select>
                                                    </div>

                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Keluar</button>
                                                        <a class="btn btn-primary" type="submit" name="submit" href="<?= base_url("dashboard") ?>" onclick="<?php echo "approvalSpv(" . $o["id_order"] . ")" ?>" class="btn btn-info mb-3">Submit SPV</a>
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
            <script type="text/javascript">
                function getValue(v) {
                    var div = $('#dept').val();
                    var id = document.getElementById("dept").value;
                    console.log(v);
                    $.ajax({
                        url: "<?php echo site_url('get_sub_spv'); ?>",
                        method: "POST",
                        data: {
                            id: id,
                        },
                        async: true,
                        dataType: "JSON",
                        success: function(data) {
                            var html = '';
                            var i;
                            for (i = 0; i < data.length; i++) {
                                html += '<option value=' + data[i].userid + '>' + data[i].username + '</option>';
                            }
                            $('#category').html(html);
                        }
                    });
                }

                function approvalSpv(val) {
                    var div = $('#dept').val();
                    var id = document.getElementById("dept").value;
                    var spv = document.getElementById("category").value;
                    console.log(val);
                    $.ajax({
                        url: "<?php echo site_url('approval_spv'); ?>",
                        method: "POST",
                        data: {
                            id_spv: spv,
                            id_order: val,
                            id_dept: id
                        },
                        async: true,
                        dataType: "JSON",
                        success: function(data) {
                            console.log(data)
                            var html = '';
                            var i;
                            for (i = 0; i < data.length; i++) {
                                html += ' <a class="btn btn-primary" type="submit" name="submit" id="update" class="btn btn-info mb-3">Berhasil</a>';
                            }
                            $('#update').html(html);
                        }
                    });
                }
            </script>
        </div>
        <?= $this->endSection() ?>