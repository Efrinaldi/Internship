<?= $this->extend('layouts/general') ?>
<?= $this->section('content') ?>
<?php

use App\Models\DivisiModel;

$validation = \Config\Services::validation();
$request = \Config\Services::request();
$data_div = new DivisiModel();
$userid = session("userid");
?><style>
    body {
        font-family: 'Varela Round', sans-serif;
    }

    .modal-confirm {
        color: #636363;
        width: 325px;
        margin: 30px auto;
    }

    .modal-confirm .modal-content {
        padding: 20px;
        border-radius: 5px;
        border: none;
    }

    .modal-confirm .modal-header {
        border-bottom: none;
        position: relative;
    }

    .modal-confirm h4 {
        text-align: center;
        font-size: 26px;
        margin: 30px 0 -15px;
    }

    .modal-confirm .form-control,
    .modal-confirm .btn {
        min-height: 40px;
        border-radius: 3px;
    }

    .modal-confirm .close {
        position: absolute;
        top: -5px;
        right: -5px;
    }

    .modal-confirm .modal-footer {
        border: none;
        text-align: center;
        border-radius: 5px;
        font-size: 13px;
    }

    .modal-confirm .icon-box {
        color: #fff;
        position: absolute;
        margin: 0 auto;
        left: 0;
        right: 0;
        top: -70px;
        width: 95px;
        height: 95px;
        border-radius: 50%;
        z-index: 9;
        background: #82ce34;
        padding: 15px;
        text-align: center;
        box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.1);
    }

    .modal-confirm .icon-box i {
        font-size: 58px;
        position: relative;
        top: 3px;
    }

    .modal-confirm.modal-dialog {
        margin-top: 80px;
    }

    .modal-confirm .btn {
        color: #fff;
        border-radius: 4px;
        background: #82ce34;
        text-decoration: none;
        transition: all 0.4s;
        line-height: normal;
        border: none;
    }

    .modal-confirm .btn:hover,
    .modal-confirm .btn:focus {
        background: #6fb32b;
        outline: none;
    }

    .trigger-btn {
        display: inline-block;
        margin: 100px auto;
    }
</style>
</head>
<style>
    body {
        font-family: 'Varela Round', sans-serif;
    }

    .modal-confirm {
        color: #434e65;
        width: 525px;
        margin: 30px auto;
    }

    .modal-confirm .modal-content {
        padding: 20px;
        font-size: 16px;
        border-radius: 5px;
        border: none;
    }

    .modal-confirm .modal-header {
        background: #47c9a2;
        border-bottom: none;
        position: relative;
        text-align: center;
        margin: -20px -20px 0;
        border-radius: 5px 5px 0 0;
        padding: 35px;
    }

    .modal-confirm h4 {
        text-align: center;
        font-size: 36px;
        margin: 10px 0;
    }

    .modal-confirm .form-control,
    .modal-confirm .btn {
        min-height: 40px;
        border-radius: 3px;
    }

    .modal-confirm .close {
        position: absolute;
        top: 15px;
        right: 15px;
        color: #fff;
        text-shadow: none;
        opacity: 0.5;
    }

    .modal-confirm .close:hover {
        opacity: 0.8;
    }

    .modal-confirm .icon-box {
        color: #fff;
        width: 95px;
        height: 95px;
        display: inline-block;
        border-radius: 50%;
        z-index: 9;
        border: 5px solid #fff;
        padding: 15px;
        text-align: center;
    }

    .modal-confirm .icon-box i {
        font-size: 64px;
        margin: -4px 0 0 -4px;
    }

    .modal-confirm .btn {
        color: #fff;
        border-radius: 4px;
        background: #eeb711;
        text-decoration: none;
        transition: all 0.4s;
        line-height: normal;
        border-radius: 30px;
        margin-top: 10px;
        padding: 6px 20px;
        border: none;
    }

    .modal-confirm .btn:hover,
    .modal-confirm .btn:focus {
        background: #eda645;
        outline: none;
    }

    .modal-confirm .btn span {
        margin: 1px 3px 0;
        float: left;
    }

    .modal-confirm .btn i {
        margin-left: 1px;
        font-size: 20px;
        float: right;
    }

    .trigger-btn {
        display: inline-block;
        margin: 100px auto;
    }
</style>
</head>

<body>
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-md-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Request Pemesanan Mobil</h4>
                            <?php $validation = \config\services::validation(); ?>
                            <form class="form-sample" name="myForm" id="myForm" action="<?= base_url("/requestOrder") ?>" method="post" autocomplete="off">
                                <div class="col-12 grid-margin">
                                    <div class="card">
                                        <div class="card-body" style="height: 100%;">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group row">
                                                        <label class="col-sm-3 col-form-label">Nama</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" class="form-control" name="nama" id="nama" value="<?= session("username") ?>" />
                                                        </div>
                                                    </div>
                                                    <?php if ($validation->getError('nama')) : ?>
                                                        <div class='alert alert-danger mt-2'>
                                                            <?= $error = $validation->getError('nama'); ?>
                                                        </div>
                                                    <?php endif; ?>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group row">
                                                        <label class="col-sm-3 col-form-label">Unit Kerja</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" id="unit_kerja" name="unit_kerja" value="<?php echo $divisi ?>" pattern="([1]?[0-9]|2[0-3]):[0-5][0-9]" readonly class="form-control" />
                                                            <input type="hidden" id="id_divisi" value="<?php echo $id_divisi ?>" />

                                                        </div>
                                                    </div>
                                                    <?php if ($validation->getError('unit_kerja')) : ?>
                                                        <div class='alert alert-danger mt-2'>
                                                            <?= $error = $validation->getError('unit_kerja'); ?>
                                                        </div>
                                                    <?php endif; ?>

                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group row">
                                                        <label class="col-sm-3 col-form-label">Jumlah Orang</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" class="form-control" min="1" max="4" id="jumlah_orang" name="jumlah_orang" placeholder="Jumlah Orang">
                                                        </div>
                                                        <?php if ($validation->getError('jumlah_orang')) : ?>

                                                            <div class='alert alert-danger mt-2'>
                                                                <?= $error = $validation->getError('jumlah_orang'); ?>
                                                            </div>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group row">
                                                        <label class="col-sm-3 col-form-label">Tujuan Pakai</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" class="form-control" id="purpose" name="purpose" placeholder="Isi Tujuan Pakai">
                                                        </div>
                                                    </div>
                                                    <?php if ($validation->getError('purpose')) : ?>
                                                        <div class='alert alert-danger mt-2'>
                                                            <?= $error = $validation->getError('purpose'); ?>
                                                        </div>
                                                    <?php endif; ?>

                                                </div>


                                                <div class="col-md-12">
                                                    <div class="form-group row">
                                                        <label class="col-sm-3 col-form-label">Tanggal Memakai</label>
                                                        <div class="col-sm-9">
                                                            <div class="input-group date" id='tanggal'>
                                                                <input type="text" name="tanggal_memakai" class="form-control" id="tanggal_memakai" placeholder="Tanggal Memakai" />
                                                                <span class="input-group-append">
                                                                    <span class="input-group-text bg-light d-block">
                                                                        <i class="fa fa-calendar"></i>
                                                                    </span>
                                                                </span>
                                                            </div>
                                                        </div>
                                                        <?php if ($validation->getError('tanggal_memakai')) : ?>
                                                            <div class='alert alert-danger mt-2'>
                                                                <?= $error = $validation->getError('tanggal_memakai'); ?>
                                                            </div>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>




                                                <div class="col-md-12">
                                                    <div class="form-group row">
                                                        <label class="col-sm-3 col-form-label">Waktu Berakhir</label>
                                                        <div class="col-md-9 input-group date" id="timepickerEnd" data-target-input="nearest">
                                                            <input type="time" class="form-control datetimepicker-input" name="inputWaktuStart" id="inputWaktuStart" placeholder="Waktu Berakhir" />
                                                        </div>

                                                    </div>


                                                    <?php if ($validation->getError('inputWaktuStart')) : ?>

                                                        <div class='alert alert-danger mt-2'>
                                                            <?= $error = $validation->getError('inputWaktuStart'); ?>
                                                        </div>
                                                    <?php endif; ?>

                                                    </script>
                                                </div>
                                                <div class="col-md-12">

                                                    <div class="form-group row">
                                                        <label class="col-sm-3 col-form-label">Waktu Berakhir</label>
                                                        <div class="col-md-9 input-group date" id="timepickerEnd" data-target-input="nearest">
                                                            <input type="time" class="form-control datetimepicker-input" name="inputWaktuEnd" id="inputWaktuEnd" placeholder="Waktu Berakhir" />
                                                        </div>

                                                    </div>


                                                    <?php if ($validation->getError('inputWaktuEnd')) : ?>

                                                        <div class='alert alert-danger mt-2'>
                                                            <?= $error = $validation->getError('inputWaktuEnd'); ?>
                                                        </div>
                                                    <?php endif; ?>

                                                </div>


                                                <div id="map-canvas" hidden>
                                                </div>
                                                <div class="col-md-12">
                                                    <script src="<?= base_url('public/assets/js/javascript.js') ?>"></script>
                                                    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD8aM8vpu-Y-Qt5hSeeV_mVGGimuwfjpIk&libraries=places&callback=initialize">
                                                    </script>
                                                    <div class="form-group row">
                                                        <label class="col-sm-3 col-form-label">Lokasi Tujuan</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" class="form-control" id="inputTujuan" name="destination" placeholder="Pilih Lokasi Tujuan">
                                                        </div>
                                                        <?php if ($validation->getError('destination')) : ?>

                                                            <div class='alert alert-danger mt-2'>
                                                                <?= $error = $validation->getError('destination'); ?>
                                                            </div>
                                                        <?php endif; ?>

                                                    </div>
                                                </div>
                                                <button class="col-md-12 btn btn-primary me-md-2 mb-3" onclick="approve()" id="submit" type="button">Submit</button>
                                            </div>
                            </form>
                        </div>
                    </div>
                </div>


                <div class="modal fade in" tabindex="-1" role="dialog" id="sendApprovalID">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content" id="content-approval">
                            <div class="modal-header">
                                <h5 id="b" class="modal-title">Kirim Approval</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>


                            <div class="modal-body">
                                <label for="exampleSelectGender">Departemen</label>
                                <select id="deptID" class="form-control" style="height:50px !important;" name="dept" value="" onclick="getValueID(<?php echo $id_divisi ?>)">
                                    <option selected id="div" value="<?= $id_divisi ?>"><?= $divisi ?></option>
                                </select>
                                <label for="exampleSelectGender">Supervisor</label>
                                <select id="categoryID" class="form-control" style="height:50px !important;" name="category" value="">
                                </select>

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Keluar</button>
                                <a class="btn btn-primary" type="button" name="submit" onclick="approvalSpvID(),success()" class="btn btn-info mb-3">Submit SPV</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal fade in" tabindex="-1" role="dialog" id="sendApproval">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content" id="content-approval">
                            <div class="modal-header">
                                <h5 id="b" class="modal-title">Kirim Approval ke Departemen Satu Unit Kerja</h5>
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
                                <a class="btn btn-primary" type="button" name="submit" onclick="approvalSpv(),success()" class="btn btn-info mb-3">Submit SPV</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="myModal" class="modal fade">
                <div class="modal-dialog modal-confirm">
                    <div class="modal-content">
                        <div class="modal-header justify-content-center">
                            <div class="icon-box">
                                <i class="material-icons"></i>
                            </div>
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        </div>
                        <div class="modal-body text-center">
                            <h2>Pesanan Gagal Masuk</h2>
                            <div class='alert alert-danger mt-2' id='notes'>

                            </div>
                            <a href="<?= base_url("request") ?>" class="btn btn-failure"><span>OK</span></a>
                        </div>
                    </div>
                </div>
            </div>

            <div id="myModalSucces" class="modal fade">
                <div class="modal-dialog modal-confirm">
                    <div class="modal-content">
                        <div class="modal-header justify-content-center">
                            <div class="icon-box">
                                <i class="material-icons"></i>
                            </div>
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        </div>
                        <div class="modal-body text-center">
                            <h2>Pesanan Berhasil Masuk</h2>
                            <a href="<?= base_url("request") ?>" class="btn btn-failure"><span>OK</span></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

    <script type="text/javascript">
        $('#tanggal').datepicker({
            format: 'dd/mm/yyyy',
            uiLibrary: 'bootstrap4'
        });





        function success() {
            Swal.fire(
                'Selamat!',
                'Data Berhasil di Approve',
                'success'
            )
            window.location.href = "dashboard";

        }

        $(function() {
            $('#datetimepicker3').datetimepicker({


            });
            $('#datetimepickerEnd').datetimepicker({

                format: 'DD/MM/YYYY, HH:mm',


            });



        });
        $(document).ready(function() {
            // $('#timepickerStart').datetimepicker({
            //     format: 'HH:mm'
            // });
            // $('#timepickerEnd').timepicker({
            //     timeFormat: 'HH:mm',
            //     interval: 60,
            //     defaultTime: '10',
            // });
        });

        function myFunction() {
            var x = document.getElementById("waktuMulai").value;
            document.getElementById("demo").innerHTML = x;
            var jumlah_orang = document.getElementById("jumlahOrang").value;
            if (jumlah_orang > 5) {}
        }

        function approve() {
            var div = $('#dept').val();
            var id = document.getElementById("dept").value;
            var spv = document.getElementById("category").value;
            var nama = document.getElementById("nama").value;
            var unit_kerja = document.getElementById("unit_kerja").value;
            var tanggal_memakai = document.getElementById("tanggal_memakai").value;
            var tujuan = document.getElementById("inputTujuan").value;
            var waktu = document.getElementById("inputWaktuStart").value;
            var id_divisi = document.getElementById("id_divisi").value;
            var waktu_end = document.getElementById("inputWaktuEnd").value;
            var tujuan_pakai = document.getElementById("purpose").value;
            var jumlah_orang = document.getElementById("jumlah_orang").value
            var html = '';
            console.log(tanggal_memakai);
            $.ajax({
                url: "<?php echo site_url('requestOrder'); ?>",
                method: "POST",
                data: {
                    id_spv: spv,
                    id_dept: id,
                    id_divisi: id_divisi,
                    nama: nama,
                    tujuan: tujuan,
                    tanggal_memakai: tanggal_memakai,
                    waktu: waktu,
                    waktu_end: waktu_end,
                    unit_kerja: unit_kerja,
                    tujuan_pakai: tujuan_pakai,
                    jumlah_orang: jumlah_orang
                },
                async: true,
                dataType: "JSON",
                success: function(req) {
                    if (req.validation) {
                        const val = req.validation;
                        for (const key in req.validation) {

                            Swal.fire(
                                'Data Gagal Masuk!',
                                val[key],
                                'error'
                            )

                        }
                    } else {
                        Swal.fire({
                            title: 'Apakah atasan anda hadir?',
                            icon: 'question',
                            showCancelButton: true,
                            confirmButtonColor: '#3085d6',
                            cancelButtonColor: '#d33',
                            confirmButtonText: 'Hadir',
                            cancelButtonText: 'Tidak hadir',
                        }).then((result) => {
                            if (result.isConfirmed) {
                                $('#sendApprovalID').modal('show');

                            } else {
                                $('#sendApproval').modal('show');

                            }
                        })
                    }

                }
            });

        }

        function approvalSpvID() {
            event.preventDefault();
            var div = $('#dept').val();
            var id = document.getElementById("deptID").value;
            var spv = document.getElementById("categoryID").value;
            var tanggal_memakai = document.getElementById("tanggal_memakai").value;
            var nama = document.getElementById("nama").value;
            var unit_kerja = document.getElementById("unit_kerja").value;
            var tujuan = document.getElementById("inputTujuan").value;
            var waktu = document.getElementById("inputWaktuStart").value;
            var waktu_end = document.getElementById("inputWaktuEnd").value;
            var id_divisi = document.getElementById("id_divisi").value;
            var tujuan_pakai = document.getElementById("purpose").value;
            var jumlah_orang = document.getElementById("jumlah_orang").value;
            console.log(id_divisi)

            $.ajax({
                url: "<?php echo site_url('approval_spv_order'); ?>",
                method: "POST",
                data: {
                    id_spv: spv,
                    id_dept: id,
                    nama: nama,
                    tujuan: tujuan,
                    waktu: waktu,
                    waktu_end: waktu_end,
                    id_divisi: id_divisi,
                    tanggal_memakai: tanggal_memakai,
                    unit_kerja: unit_kerja,
                    tujuan_pakai: tujuan_pakai,
                    jumlah_orang: jumlah_orang
                },
                async: true,
                dataType: "JSON",
                success: function(req) {
                    console.log(req);
                    Swal.fire(
                        'Selamat!',
                        'Data Berhasil di request',
                        'success'
                    )
                }
            });
        }

        function approvalSpv() {
            event.preventDefault();
            var div = $('#dept').val();
            var id = document.getElementById("dept").value;
            var spv = document.getElementById("category").value;
            var tanggal_memakai = document.getElementById("tanggal_memakai").value;
            var nama = document.getElementById("nama").value;
            var unit_kerja = document.getElementById("unit_kerja").value;
            var tujuan = document.getElementById("inputTujuan").value;
            var waktu = document.getElementById("inputWaktuStart").value;
            var waktu_end = document.getElementById("inputWaktuEnd").value;
            var id_divisi = document.getElementById("id_divisi").value;
            var tujuan_pakai = document.getElementById("purpose").value;
            var jumlah_orang = document.getElementById("jumlah_orang").value;
            console.log(id_divisi)

            $.ajax({
                url: "<?php echo site_url('approval_spv_order'); ?>",
                method: "POST",
                data: {
                    id_spv: spv,
                    id_dept: id,
                    nama: nama,
                    tujuan: tujuan,
                    waktu: waktu,
                    waktu_end: waktu_end,
                    id_divisi: id_divisi,
                    tanggal_memakai: tanggal_memakai,
                    unit_kerja: unit_kerja,
                    tujuan_pakai: tujuan_pakai,
                    jumlah_orang: jumlah_orang
                },
                async: true,
                dataType: "JSON",
                success: function(req) {
                    console.log(req);
                    Swal.fire(
                        'Selamat!',
                        'Data Berhasil di request',
                        'success'
                    )
                }
            });
        }

        function getValue(v) {
            var div = $('#dept').val();
            var id = document.getElementById("dept").value;
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

        function getValueID(v) {
            var div = $('#deptID').val();
            var id = document.getElementById("deptID").value;
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
                    $('#categoryID').html(html);
                }
            });
        }
    </script>
    </div>
    </div>
    </div>
    <?= $this->endSection() ?>