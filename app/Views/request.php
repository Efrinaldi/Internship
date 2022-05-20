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


            <form class="row g-3" action="<?=base_url('orders')?>" method="post" autocomplete="off">
                <div class="col-md-6">
                    <label for="inputNama" class="form-label">Nama Karyawan</label>
                    <input type="text" class="form-control" id="inputNama">
                </div>
                <div class="col-md-6">
                    <label for="inputUnit" class="form-label">Unit Kerja</label>
                    <input type="text" class="form-control" id="inputUnit">
                </div>
                <div class="col-md-6">
                    <label for="inputWaktu" class="form-label">Waktu</label>
                    <input type="time" class="form-control" id="inputWaktu">
                </div>
                <div class="col-md-6">
                    <label for="inputTanggal" class="form-label">Tanggal</label>
                    <input type="date" class="form-control" id="inputTanggal">
                </div>
                <div class="col-md-6">
                    <label for="inputTujuan" class="form-label">Tujuan</label>
                    <input type="text" class="form-control" id="inputTujuan">
                </div>
            </form>
            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <button class="btn btn-primary me-md-2 mb-3" type="button">Submit</button>
            </div>

        </div>
    </body>
</div>
<?= $this->endSection() ?>