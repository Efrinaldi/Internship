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


            <form class="row g-3" action="<?= base_url() ?>/requestOrder" method="post" autocomplete="off">
                <?= csrf_field(); ?>
                <div class="col-md-6">
                    <label for="inputNama" class="form-label">Nama Karyawan</label>
                    <input type="text" class="form-control" id="inputNama" name="name" required>
                </div>
                <div class="col-md-6">
                    <label for="inputUnit" class="form-label">Unit Kerja</label>
                    <select type="text" class="form-control" id="inputUnit" name="unit" required>
                        <option value="">Pilih Unit Kerja</option>
                        <option value="SKTILOG">SKTILOG</option>
                        <option value="SKHSDM">SKHSDM</option>
                        <option value="SKAI">SKAI</option>
                        <option value="BSIT">BSIT</option>
                    </select>
                </div>
                <div class="col-md-6">
                    <label for="inputWaktu" class="form-label">Waktu</label>
                    <input type="time" class="form-control" id="inputWaktu" name="time" required>
                </div>
                <div class="col-md-6">
                    <label for="inputTanggal" class="form-label">Tanggal</label>
                    <input type="date" class="form-control" id="inputTanggal" name="date" required>
                </div>
                <div class="col-md-6">
                    <label for="inputTujuan" class="form-label">Tujuan</label>
                    <input type="text" class="form-control" id="inputTujuan" name="destination" required>
                </div>
                <input type="hidden" class="form-control " id="keterangan" value="Pending" name="keterangan">
                <span class="d-flex justify-content-end col-md-12 mt-3 ">
                    <button class="btn btn-primary me-md-2 mb-3" type="submit">Submit</button>
                </span>
            </form>
        </div>
    </body>
</div>
<?= $this->endSection() ?>