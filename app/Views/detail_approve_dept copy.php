<?= $this->extend('layouts/general') ?>
<?= $this->section('content') ?>
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" type="text/css" rel="stylesheet">

<div class="main-panel">
    <div class="content-wrapper">

        <div class="container-xl ">
            <div class="row">
                <div class="col-xl-4">
                    <!-- Profile picture card-->
                    <div class="card mb-4 mb-xl-0">
                        <div class="card-header">Pengemudi</div>
                        <div class="card-body text-center">
                            <!-- Profile picture image-->
                            <img class="img-account-profile rounded-circle mb-2" style="height:200px;width:200px;" src="<?= base_url('/public/assets_c/img/user.png') ?>" alt="">
                            <!-- Profile picture help block-->
                            <h5 for="nama_pengemudi"><?php echo $data["nama_pengemudi"] ?></h5>
                            <h5 for="nama_pengemudi"><?php echo $data["plat_nomor"] ?></h5>
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
                        <div class="card-header">Informasi Pesanan</div>
                        <div class="card-body">
                            <form>
                                <!-- Form Group (username)-->
                                <div class="mb-3">
                                    <label class="small mb-1" for="inputUsername">Nama</label>
                                    <input type="text" class="form-control" name="nama" id="nama" value="<?= $data["nama"] ?>" readonly required />
                                </div>
                                <div class="mb-3">
                                    <label class="small mb-1" for="inputUsername">Tujuan Pakai</label>
                                    <input type="text" class="form-control" name="tujuan_pakai" id="tujuan_pakai" value="<?= $data["tujuan_pakai"] ?>" readonly required />
                                </div>
                                <div class="row gx-3 mb-3">
                                    <!-- Form Group (phone number)-->
                                    <div class="col-md-6">
                                        <label class="small mb-1" for="inputPhone">Plat Mobil</label>
                                        <input type="text" id="plat_nomor" value="<?= $data["plat_nomor"] ?>" name="plat_nomor" width="276" class="form-control file-upload-info" readonly required />
                                    </div>
                                    <!-- Form Group (birthday)-->
                                    <div class="col-md-6">
                                        <label class="small mb-1" for="inputBirthday">Nama Pengemudi</label>
                                        <input type="text" id="nama_pengemudi" value="<?= $data["nama_pengemudi"] ?>" name="nama_pengemudi" width="276" class="form-control file-upload-info" readonly required />
                                    </div>
                                </div>
                                <!-- Form Row-->
                                <div class="row gx-3 mb-3">

                                    <div class="col-md-6">
                                        <label class="small mb-1" for="inputLastName">Unit Kerja</label>
                                        <input type="text" class="form-control" name="nama" id="nama" value="<?= $data["id_divisi"] ?>" readonly required />
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
                                    <label class="small mb-1" for="inputEmailAddress">Tanggal Memakai</label>
                                    <input type="text" class="form-control" name="tanggal" id="tanggal" value="<?= $data["tanggal"] ?>" readonly required />
                                </div>

                                <div class="mb-3">
                                    <label class="small mb-1" for="inputEmailAddress">Status</label>
                                    <input type="text" class="form-control" name="tanggal" id="tanggal" value="<?= $data["keterangan"] ?>" readonly required />
                                </div>
                                <!-- Form Row-->
                                <?php if ($data["keterangan"] === "reject_logistik") : ?>
                                    <div class="track">
                                        <div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Order Telah Diterima</span> </div>
                                        <div class="step active"> <span class="icon"> <i class="fa fa-user"></i> </span> <span class="text"> Di approve oleh Supervisor</span> </div>
                                        <div class="step "> <span class="icon"> <i class="fa-solid fa-xmark"></i> </span> <span class="text"> Di tolak oleh logistik </span> </div>
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
                                        <div class="step active"> <span class="icon"> <i class="fa fa-user"></i> </span> <span class="text"> Di approve oleh Supervisor</span> </div>
                                        <div class="step"> <span class="icon"> <i class="fa fa-user"></i> </span> <span class="text"> Di approve oleh logistik </span> </div>
                                        <div class="step"> <span class="icon"> <i class="fa fa-truck"></i> </span> <span class="text">Driver menjemput anda</span> </div>
                                    </div>
                                <?php endif; ?>
                                <?php if ($data["keterangan"] === "approve_logistik") : ?>
                                    <div class="track">
                                        <div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Order Telah Diterima</span> </div>
                                        <div class="step active"> <span class="icon"> <i class="fa fa-user"></i> </span> <span class="text"> Di approve oleh Supervisor</span> </div>
                                        <div class="step active"> <span class="icon"> <i class="fa fa-user"></i> </span> <span class="text"> Di approve oleh logistik </span> </div>
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script>









        </script>

        <?= $this->endSection() ?>