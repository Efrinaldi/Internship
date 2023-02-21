<?= $this->extend('layouts/general') ?>
<?= $this->section('content') ?>
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" type="text/css" rel="stylesheet">

<div class="main-panel">
    <div class="content-wrapper">

        <div class="container-xl px-4 mt-4">
            <hr class="mt-0 mb-4">
            <div class="row">
                <div class="col-xl-4">
                    <!-- Profile picture card-->
                    <div class="card mb-4 mb-xl-0">
                        <div class="card-header">Pengemudi</div>
                        <div class="card-body text-center">
                            <!-- Profile picture image-->
                            <img style="height:200px;width:200px;" class="img-account-profile rounded-circle mb-2" src="<?= base_url('/public/assets_c/img/user.png') ?>" alt="">
                            <!-- Profile picture help block-->
                        </div>
                    </div>
                </div>
                <style>
                    @import url('https://fonts.googleapis.com/css?family=Open+Sans&display=swap');

                    body {
                        background-color: #eeeeee;
                        font-family: 'Open Sans', serif
                    }

                    .container {
                        margin-top: 50px;
                        margin-bottom: 50px
                    }

                    .card {
                        position: relative;
                        display: -webkit-box;
                        display: -ms-flexbox;
                        display: flex;
                        -webkit-box-orient: vertical;
                        -webkit-box-direction: normal;
                        -ms-flex-direction: column;
                        flex-direction: column;
                        min-width: 0;
                        word-wrap: break-word;
                        background-color: #fff;
                        background-clip: border-box;
                        border: 1px solid rgba(0, 0, 0, 0.1);
                        border-radius: 0.10rem
                    }

                    .card-header:first-child {
                        border-radius: calc(0.37rem - 1px) calc(0.37rem - 1px) 0 0
                    }

                    .card-header {
                        padding: 0.75rem 1.25rem;
                        margin-bottom: 0;
                        background-color: #fff;
                        border-bottom: 1px solid rgba(0, 0, 0, 0.1)
                    }

                    .track {
                        position: relative;
                        background-color: #ddd;
                        height: 7px;
                        display: -webkit-box;
                        display: -ms-flexbox;
                        display: flex;
                        margin-bottom: 60px;
                        margin-top: 50px
                    }

                    .track .step {
                        -webkit-box-flex: 1;
                        -ms-flex-positive: 1;
                        flex-grow: 1;
                        width: 25%;
                        margin-top: -18px;
                        text-align: center;
                        position: relative
                    }

                    .track .step.active:before {
                        background: #FF5722
                    }

                    .track .step::before {
                        height: 7px;
                        position: absolute;
                        content: "";
                        width: 100%;
                        left: 0;
                        top: 18px
                    }

                    .track .step.active .icon {
                        background: #ee5435;
                        color: #fff
                    }

                    .track .icon {
                        display: inline-block;
                        width: 40px;
                        height: 40px;
                        line-height: 40px;
                        position: relative;
                        border-radius: 100%;
                        background: #ddd
                    }

                    .track .step.active .text {
                        font-weight: 400;
                        color: #000
                    }

                    .track .text {
                        display: block;
                        margin-top: 7px
                    }

                    .itemside {
                        position: relative;
                        display: -webkit-box;
                        display: -ms-flexbox;
                        display: flex;
                        width: 100%
                    }

                    .itemside .aside {
                        position: relative;
                        -ms-flex-negative: 0;
                        flex-shrink: 0
                    }

                    .img-sm {
                        width: 80px;
                        height: 80px;
                        padding: 7px
                    }

                    ul.row,
                    ul.row-sm {
                        list-style: none;
                        padding: 0
                    }

                    .itemside .info {
                        padding-left: 15px;
                        padding-right: 7px
                    }

                    .itemside .title {
                        display: block;
                        margin-bottom: 5px;
                        color: #212529
                    }

                    p {
                        margin-top: 0;
                        margin-bottom: 1rem
                    }

                    .btn-warning {
                        color: #ffffff;
                        background-color: #ee5435;
                        border-color: #ee5435;
                        border-radius: 1px
                    }

                    .btn-warning:hover {
                        color: #ffffff;
                        background-color: #ff2b00;
                        border-color: #ff2b00;
                        border-radius: 1px
                    }
                </style>
                <div class="col-xl-8">
                    <!-- Account details card-->
                    <div class="card mb-4">
                        <div class="card-header col-md-12 d-inline-flex">

                            <div class="col-md-6"> Informasi Pesanan</div>

                            <div class="d-flex justify-content-end col-md-6">
                                <a class="btn btn-primary col-md-6" data-toggle="modal" data-target="#confirmation<?= $data['id'] ?>" style="height:40px;max-height:40px; justify-content:center;align-items: center;">Terima</a>
                                <a class="btn btn-secondary col-md-6" data-toggle="modal" data-target="#delete<?= $data['id'] ?>" style="height:40px;max-height:40px; justify-content:center;align-items: center;">Tolak</a>
                            </div>
                        </div>

                        <div class="card-body">
                            <form>

                                <!-- Form Group (username)-->
                                <div class="mb-3">
                                    <label class="small mb-1" for="inputUsername">Nama</label>
                                    <input type="text" class="form-control" name="nama" id="nama" value="<?= $data["nama"] ?>" readonly required />
                                </div>
                                <div class="mb-3">
                                    <label class="small mb-1" for="inputUsername">Tujuan Pakai</label>
                                    <te type="text" style="height:80px" class="form-control" name="tujuan_pakai" id="tujuan_pakai" value="<?= $data["tujuan_pakai"] ?>" readonly required />
                                </div>
                                <!-- Form Row-->
                                <div class="row gx-3 mb-3">
                                    <div class="col-md-6">
                                        <label class="small mb-1" for="inputLastName">Unit Kerja</label>
                                        <input type="text" class="form-control" name="nama" id="nama" value="<?= $divisi ?>" readonly required />
                                    </div>
                                    <div class="col-md-6">
                                        <label class="small mb-1" for="inputFirstName">Jumlah Orang</label>
                                        <input type="text" class="form-control" name="nama" id="nama" value="<?= $data["jumlah_orang"] ?>" readonly required />
                                    </div>
                                </div>
                                <!-- Form Row        -->
                                <div class="row gx-3 mb-3">
                                    <!-- Form Group (organization name)-->
                                    <div class="col-md-6">
                                        <label class="small mb-1" for="inputOrgName">Waktu Mulai</label>
                                        <input type="text" class="form-control" name="waktu" id="waktu" value="<?= $data["waktu"] ?>" readonly required />
                                    </div>
                                    <!-- Form Group (location)-->
                                    <div class="col-md-6">
                                        <label class="small mb-1" for="inputLocation">Waktu Berakhir</label>
                                        <input type="text" class="form-control" name="waktu_end" id="waktu_end" value="<?= $data["waktu_end"] ?>" readonly required />
                                    </div>
                                </div>
                                <!-- Form Group (email address)-->
                                <div class="mb-3">
                                    <label class="small mb-1">Tanggal Memakai</label>
                                    <input type="text" class="form-control" name="tanggal" id="tanggal" value="<?= $data["tanggal"] ?>" readonly required />
                                </div>

                                <div class="mb-3">
                                    <label class="small mb-1">Tujuan Lokasi</label>
                                    <input type="text" style="height:80px" class="form-control" name="tanggal" id="tanggal" value="<?= $data["tujuan"] ?>" readonly required />
                                </div>


                                <!-- Form Row-->
                                <?php if ($data["keterangan"] === "reject_logistik") : ?>
                                    <div class="track">
                                        <div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Order Telah Diterima</span> </div>
                                        <div class="step active"> <span class="icon"> <i class="fa fa-user"></i> </span> <span class="text"> Di approve oleh Supervisor</span> </div>
                                        <div class="step "> <span class="icon"> <i class="fa fa-ban"></i> </span> <span class="text"> Di tolak oleh logistik </span> </div>
                                        <div class="step "> <span class="icon"> <i class="fa fa-truck"></i> </span> <span class="text">Driver menjemput anda</span> </div>
                                    </div>
                                <?php endif; ?>
                                <?php if ($data["keterangan"] === "reject_departemen") : ?>
                                    <div class="track">
                                        <div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Order Telah Diterima</span> </div>
                                        <div class="step active"> <span class="icon"> <i class="fa fa-ban"></i> </span> <span class="text"> Di tolak oleh Departemen</span> </div>
                                        <div class="step "> <span class="icon"> <i class="fa fa-user"></i> </span> <span class="text"> Di tolak oleh logistik </span> </div>
                                        <div class="step "> <span class="icon"> <i class="fa fa-truck"></i> </span> <span class="text">Driver menjemput anda</span> </div>
                                    </div>
                                <?php endif; ?>
                                <?php if ($data["keterangan"] === "pending") : ?>
                                    <div class="track">
                                        <div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Order Telah Diterima</span> </div>
                                        <div class="step"> <span class="icon"> <i class="fa fa-user"></i> </span> <span class="text"> Di approve oleh Supervisor</span> </div>
                                        <div class="step"> <span class="icon"> <i class="fa fa-user"></i> </span> <span class="text"> Di approve oleh logistik </span> </div>
                                        <div class="step"> <span class="icon"> <i class="fa fa-truck"></i> </span> <span class="text">Driver menjemput anda</span> </div>
                                    </div>
                                <?php endif; ?>
                                <?php if ($data["keterangan"] === "approval_departemen") : ?>
                                    <div class="track">
                                        <div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Order Telah Diterima</span> </div>
                                        <div class="step"> <span class="icon"> <i class="fa fa-user"></i> </span> <span class="text"> Di approve oleh Supervisor</span> </div>
                                        <div class="step"> <span class="icon"> <i class="fa fa-user"></i> </span> <span class="text"> Di approve oleh logistik </span> </div>
                                        <div class="step"> <span class="icon"> <i class="fa fa-truck"></i> </span> <span class="text">Driver menjemput anda</span> </div>
                                    </div>
                                <?php endif; ?>
                                <?php if ($data["keterangan"] === "approve_logistik") : ?>
                                    <div class="track">
                                        <div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Order Telah Diterima</span> </div>
                                        <div class="step active"> <span class="icon"> <i class="fa fa-user"></i> </span> <span class="text"> Di approve oleh Supervisor</span> </div>
                                        <div class="step"> <span class="icon"> <i class="fa fa-user"></i> </span> <span class="text"> Di approve oleh logistik </span> </div>
                                        <div class="step"> <span class="icon"> <i class="fa fa-truck"></i> </span> <span class="text">Driver menjemput anda</span> </div>
                                    </div>
                                <?php endif; ?>
                                <?php if ($data["keterangan"] === "approve") : ?>
                                    <div class="track">
                                        <div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Order Telah Diterima</span> </div>
                                        <div class="step active"> <span class="icon"> <i class="fa fa-user"></i> </span> <span class="text"> Di approve oleh Supervisor</span> </div>
                                        <div class="step active"> <span class="icon"> <i class="fa fa-user"></i> </span> <span class="text"> Di approve oleh logistik </span> </div>
                                        <div class="step active"> <span class="icon"> <i class="fa fa-truck"></i> </span> <span class="text">Driver menjemput anda</span> </div>
                                    </div>
                                <?php endif; ?>


                            </form>
                            <div class="modal fade in" tabindex="-1" role="dialog" id="confirmation<?= $data['id'] ?>">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 id="b" class="modal-title">Selesaikan Perjalanan</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>

                                        <div class="modal-body">
                                            <label for="exampleSelectGender">Apakah anda yakin menerima pemesanan ini?</label>
                                        </div>

                                        <div class="modal-footer">
                                            <a href="<?= base_url() ?>/approve_order_dept/<?= $data['id'] ?>" class="btn btn-primary" type="submit" onclick="success()" name="submit">OK </a>
                                            </form>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="modal fade in" tabindex="-1" role="dialog" id="delete<?= $data['id'] ?>">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 id="b" class="modal-title">Selesaikan Perjalanan</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>

                                        <div class="modal-body">
                                            <label for="exampleSelectGender">Apakah anda yakin menolak pemesanan ini? </label>
                                        </div>

                                        <div class="modal-footer">
                                            <a href="<?= base_url() ?>/reject_order/<?= $data['id'] ?>" class="btn btn-primary" onclick="reject()" type="submit" name="submit">OK </a>
                                            </form>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script>
            function success() {
                Swal.fire(
                    'Good job!',
                    'Data Pemesanan Berhasil Di Approve!',
                    'success'
                )
            }

            function reject() {
                Swal.fire(
                    'Good job!',
                    'Data Pemesanan Berhasil Di Reject!',
                    'success'
                )
            }
        </script>

        <?= $this->endSection() ?>