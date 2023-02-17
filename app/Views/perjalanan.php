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
                            Add class <code>.table-striped</code> </p>
                        <div class="table-responsive " style="word-wrap: break-word;">
                            <table class="table table-striped ">
                                <thead>
                                    <tr>
                                        <th>Nomor</th>
                                        <th>Nama</th>
                                        <th>Unit Kerja</th>
                                        <th>Waktu </th>
                                        <th>Tujuan Pakai</th>
                                        <th>Keterangan</th>
                                        <th>Plat Nomor</th>
                                        <th style="max-width:200px;  inline-size: 150px; overflow: hidden;">Lokasi Tujuan</th>
                                        <th>Perjalanan</th>
                                    </tr>
                                </thead>

                                <tbody style="heigth:50px">
                                    <?php
                                    $no = 1;
                                    foreach ($order as $o) : ?>
                                        <?php
                                        $id = $o["id_order"]
                                        ?>
                                        <tr> <a href="<?= base_url("/detail_project/$id") ?>">

                                                <td class="py-1"><?= $no++; ?></td>
                                                <td class="py-1"><a href="<?= base_url("/detail_project/$id") ?>"><?= $o['nama'] ?></td>
                                                <td class="py-1"><?= $o['divisi'] ?></td>
                                                <td class="py-1"><?= $o['tanggal'], " ",  $o['waktu'] ?></td>
                                                <td class="py-1"><?= $o['tujuan_pakai'] ?></td>
                                                <td class="py-1"><?= $o['keterangan'] ?></td>
                                                <td class="py-1"><?= $o['plat_nomor'] ?></td>
                                                <td style="max-width:200px;  inline-size: 150px; overflow: hidden;" class=" py-1 "><?= $o['tujuan'] ?></td>
                                                <td class=" py-1"><button id="range-submit" type="submit" value="Submit" class="btn btn-primary col-lg-12" data-toggle="modal" data-target="#endSession<?php echo $o["id_order"] ?>" type="button" class="btn btn-primary">Perjalanan Selesai</button></td>
                                        </tr>
                                        </a>
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
                                                        <a class="btn btn-primary" type="submit" name="submit" href="<?= base_url("dashboard") ?>" onclick="<?php echo "endSession(" . $o["id_order"] . ")" ?>" class="btn btn-info mb-3">Submit SPV</a>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="modal" tabindex="-1" role="dialog" id="endSession<?php echo $o["id_order"] ?>">
                                            <div class=" modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Selesaikan Perjalanan</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body" style="padding: 25px 50px 75px 100px;">
                                                        <label for="exampleSelectGender">Apakah anda yakin menyelesaikan perjalanan?</label>
                                                    </div>
                                                    <div class="modal-footer" style="padding: 25px 50px 75px 100px;">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Keluar</button>
                                                        <a href="<?= base_url("/end_session/" . $o["id_order"] . "/" . $o["id_pengemudi"]) ?>" class="btn btn-primary" type="submit" name="submit">Submit</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        </form>



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