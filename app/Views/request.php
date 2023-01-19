<?= $this->extend('layouts/general') ?>
<?= $this->section('content') ?>

<?php

use App\Models\DivisiModel;

$data_div = new DivisiModel();
$userid = session("userid");
$divisi = $data_div->query("SELECT * FROM user_divisi where userid= '$userid' or user_domain='$userid'")->getResultArray();
$id_divisi = $divisi[0]["id_divisi"];
$div  = $data_div->query("SELECT    *    FROM departemen where id_divisi= '$id_divisi'")->getResultArray();
$d_div = $div[0]["divisi"];
?>
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title">Request Pemesanan Mobil</h4>

                        <form class="form-sample" action="<?= base_url() ?>/requestOrder" onsubmit="return validate();" method="post" autocomplete="off">

                            <div class="col-12 grid-margin">
                                <div class="card">

                                    <div class="card-body" style="height: 500px;">
                                        <?php if (!empty($waktuErr) or !$waktuErr === "") : ?>
                                            <button type="button" class="btn btn-danger"><?= $waktuErr ?></button>
                                        <?php endif; ?>
                                        <?php if (!empty($gagal)) : ?>
                                            <button type="button" class="btn btn-danger"><?= $gagal ?></button>
                                        <?php endif; ?>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label">Nama</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control" name="nama" value="<?= session("username") ?>" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label">Unit Kerja</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" id="unit_kerja" name="unit_kerja" value="<?= $d_div ?>" pattern="([1]?[0-9]|2[0-3]):[0-5][0-9]" readonly class="form-control" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label">Waktu Mulai</label>
                                                    <div class="col-sm-9">

                                                        <input class="form-control" placeholder="dd/mm/yyyy" type="time" class="form-control" id="inputWaktuStart" name="inputWaktuStart" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label">Waktu Berakhir</label>
                                                    <div class="col-sm-9">
                                                        <input type="time" class="form-control" id="inputWaktuEnd" name="inputWaktuEnd" pattern="([1]?[0-9]|2[0-3]):[0-5][0-9]" required>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label">Tanggal Memakai</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" id="tanggal_memakai" name="tanggal_memakai" width="276" class="form-control file-upload-info" placeholder="Tanggal Memakai" />

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label">Jumlah Orang</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control" min="1" max="4" id="jumlahOrang" name="jumlah_orang" placeholder="Jumlah Orang" required>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label">Tujuan Pakai</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control" id="inputPemakaian" name="purpose" placeholder="Isi Tujuan Pakai" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div id="map-canvas" hidden>

                                            </div>

                                            <div class="col-md-6">
                                                <script src="<?= base_url('public/assets/js/javascript.js') ?>"></script>
                                                <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD8aM8vpu-Y-Qt5hSeeV_mVGGimuwfjpIk&libraries=places&callback=initialize">
                                                </script>
                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label">Lokasi Tujuan</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control" id="inputTujuan" name="destination" placeholder="Pilih Lokasi Tujuan" required>
                                                    </div>
                                                </div>

                                            </div>
                                            <button onclick="myFunction()" data-toggle="modal" data-target="#myModal" class="col-md-12 btn btn-primary me-md-2 mb-3" type="submit">Submit</button>

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
                                        <i class="material-icons">&#xE876;</i>
                                    </div>
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                </div>
                                <div class="modal-body text-center">
                                    <h2>Berhasil</h2>
                                    <h2>Pesanan Berhasil Dibuat</h2>
                                    <button class="btn btn-success" data-dismiss="modal"><span>Start Exploring</span> <i class="material-icons">&#xE5C8;</i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                    </form>

                </div>
            </div>

        </div>
        <script type="text/javascript">
            function myFunction() {
                var x = document.getElementById("waktuMulai").value;
                document.getElementById("demo").innerHTML = x;
                var jumlah_orang = document.getElementById("jumlahOrang").value;
                if (jumlah_orang > 5) {}
            }
            $('#tanggal_memakai').datepicker({
                format: 'dd/mm/yyyy',
                uiLibrary: 'bootstrap4'
            });
        </script>
    </div>
</div>


</div>

<?= $this->endSection() ?>