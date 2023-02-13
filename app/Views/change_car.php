<?= $this->extend('layouts/general') ?>
<?= $this->section('content') ?>
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="col-12 grid-margin">
                            <div class="card">
                                <div class="card-body" style="height: 100%;">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">Nama</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" name="nama" id="nama" value="<?= $data["nama"] ?>" />
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">Unit Kerja</label>
                                                <div class="col-sm-9">
                                                    <input type="text" id="unit_kerja" name="unit_kerja" value="<?php echo $id_divisi ?>" pattern="([1]?[0-9]|2[0-3]):[0-5][0-9]" readonly class="form-control file-upload-info" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">Waktu Mulai</label>
                                                <div class="col-sm-9">
                                                    <input type="text" id="waktu" value="<?= $data["waktu"] ?>" name="waktu" width="276" class="form-control file-upload-info" readonly required />
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">Tanggal Memakai</label>
                                                <div class="col-sm-9">
                                                    <input type="text" id="tanggal_memakai" value="<?= $data["tanggal"] ?>" name="tanggal_memakai" width="276" class="form-control file-upload-info" readonly required />
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">Jumlah Orang</label>
                                                <div class="col-sm-9">
                                                    <input type="text" id="jumlah_orang" value="<?= $data["jumlah_orang"] ?>" name="jumlah_orang" width="276" class="form-control file-upload-info" readonly required />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">Plat Mobil</label>
                                                <div class="col-sm-9">
                                                    <input type="text" id="jumlah_orang" value="<?= $data["plat_nomor"] ?>" name="plat_nomor" width="276" class="form-control file-upload-info" readonly required />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">Nama Pengemudi</label>
                                                <div class="col-sm-9">
                                                    <input type="text" id="jumlah_orang" value="<?= $data["nama_pengemudi"] ?>" name="nama_pengemudi" width="276" class="form-control file-upload-info" readonly required />
                                                    <input type="hidden" id="userid" value="<?= $data["userid"] ?>" name="userid" width="276" class="form-control file-upload-info" readonly required />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">Tujuan Pakai</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control file-upload-info" value="<?= $data["tujuan_pakai"] ?>" id="purpose" name="purpose" readonly placeholder="Isi Tujuan Pakai" required>
                                                    <input type="hidden" id="id_pemesanan" value="<?= $data["id_pemesanan"] ?>" name="id_pemesanan" width="276" class="form-control file-upload-info" readonly required />

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div>
                                        <button class="col-md-12 btn btn-primary me-md-2 mb-3" data-toggle="modal" data-target="#changeMobil" id="submit" type="button">Ubah Pengemudi</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>




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
                                    <select id="dept" class="form-control" style="height:50px !important;" name="dept" value="" onchange="getValue(this.value)">
                                        <option selected disabled>Pilih Pengemudi yang tersedia</option>
                                        <?php foreach ($mobil as $di) : ?>
                                            <option id="div" value="<?= $di["userid"] ?>"><?= $di["nama_pengemudi"] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                    <label for="exampleSelectGender">Dari Plat Mobil</label>
                                    <select id="category" class="form-control" style="height:50px !important;" name="category" value="">
                                    </select>
                                    <label for="exampleSelectGender">Menjadi Plat Mobil</label>
                                    <select id="ubah" class="form-control" style="height:50px !important;" name="ubah" value="" onclick="getPlat()">
                                    </select>
                                </div>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Keluar</button>
                                    <a class="btn btn-primary" type="submit" name="button" onclick="submitApproval(),submit()" class="btn btn-info mb-3">Ubah Pengemudi</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script>
            function submit() {
                Swal.fire(
                    'Good job!',
                    'You clicked the button!',
                    'success'
                )
            }
            function submitApproval() {

                var userid = document.getElementById("dept").value;
                var plat_1 = document.getElementById("category").value;
                var plat_2 = document.getElementById("ubah").value;
                var id_order = document.getElementById("id_pemesanan").value
                console.log(id_order, plat_1, plat_2, userid);
                $.ajax({
                    url: "<?php echo site_url('update_car'); ?>",
                    method: "POST",
                    data: {
                        userid: userid,
                        plat_1: plat_1,
                        plat_2: plat_2,
                        id_order: id_order
                    },
                    async: true,
                    dataType: "JSON",
                    success: function(data) {
                        console.log(data);
                        Swal.fire(
                            'Good job!',
                            'You clicked the button!',
                            'success'
                        )
                    }
                });



            }

            function getValue(v) {
                var div = $('#dept').val();
                var id = document.getElementById("dept").value;
                console.log(v);
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
                console.log(id);
                $.ajax({
                    url: "<?php echo site_url('get_plat_mobil'); ?>",
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

                        $('#ubah').html(html);
                    }
                });
            }
        </script>
        <?= $this->endSection() ?>