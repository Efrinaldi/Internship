<?= $this->extend('layouts/admin') ?>
<?= $this->section('content') ?>
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Operational Vehicle Management System - BCA Syariah</h1>
    </div>

    <body>
        <div class="container">
            <h2>Pesan Kendaraan</h2>
            <p>Anda dapat melakukan pemesanan kendaraan operasional</p>


            <form class="row g-3" action="<?=base_url()?>/requestOrder" method="post" autocomplete="off">
                <?= csrf_field(); ?>
                <div class="col-md-6">
                    <label for="inputNama" class="form-label">Nama Karyawan</label>
                    <input type="text" class="form-control" id="inputNama" name="name">
                </div>
                <div class="col-md-6">
                    <label for="inputUnit" class="form-label">Unit Kerja</label>
                    <input type="text" class="form-control" id="inputUnit" name="unit">
                </div>
                <div class="col-md-6">
                    <label for="inputWaktu" class="form-label">Waktu</label>
                    <input type="time" class="form-control" id="inputWaktu" name="time">
                </div>
                <div class="col-md-6">
                    <label for="inputTanggal" class="form-label">Tanggal</label>
                    <input type="date" class="form-control" id="inputTanggal" name="date">
                </div>
                <div class="col-md-6">
                    <label for="inputTujuan" class="form-label">Tujuan</label>
                    <input type="text" class="form-control" id="inputTujuan" name="destination">
                </div>
                <span class="d-flex justify-content-end col-md-12 mt-3 ">
                    <button class="btn btn-primary me-md-2 mb-3" type="submit">Submit</button>
                </span>
            </form>

        </div>
    </body>
</div>
<?= $this->endSection() ?>