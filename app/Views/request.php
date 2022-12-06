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

                <div class="col-md-12">
                    <label for="inputUnit" class="form-label">Unit Kerja</label>

                    <select type="text" class="form-control" id="inputUnit" name="unit" required>
                        <option value="">Pilih Unit Kerja</option>
                        <?php foreach ($divisi as $div) : ?>
                            <option value="<?= $div["id_divisi"] ?>"><?= $div["divisi"] ?></option>
                        <?php endforeach ?>
                    </select>
                </div>

                <div class="col-md-12">
                    <label for="inputWaktu" class="form-label">Waktu</label>
                    <input type="time" class="form-control" id="inputWaktu" name="time" required>
                </div>

                <div class="col-md-12">
                    <label for="inputTanggal" class="form-label">Tanggal</label>
                    <input type="date" class="form-control" id="inputTanggal" name="date" required>
                </div>

                <div class="col-md-12">
                    <label for="inputPemakaian" class="form-label">Tujuan Pakai</label>
                    <input type="text" class="form-control" id="inputPemakaian" name="purpose" placeholder="Isi Tujuan Pakai" required>
                </div>

                <div class="col-md-12">
                    <label for="inputTujuan" class="form-label">Asal</label>
                    <input type="text" class="form-control" id="inputAsal" name="destination" placeholder="Pilih Lokasi" required>
                </div>
                <script src="<?= base_url('public/assets/js/javascript.js') ?>"></script>
                <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD8aM8vpu-Y-Qt5hSeeV_mVGGimuwfjpIk&libraries=places&callback=initialize">
                </script>


                <div class="col-md-12">
                    <label for="inputTujuan" class="form-label">Lokasi Tujuan</label>
                    <input type="text" class="form-control" id="inputTujuan" name="destination" placeholder="Pilih Tujuan" required>
                </div>
                <div class="col-md-12">
                    <label for="inputTujuan" class="form-label">Jumlah Orang</label>
                    <input type="text" class="form-control" id="inputTujuan" name="destination" placeholder="Jumlah Orang" required>
                </div>

                <div id="map-canvas" hidden></div>
                <script src="<?= base_url('public/assets/js/javascript.js') ?>"></script>
                <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD8aM8vpu-Y-Qt5hSeeV_mVGGimuwfjpIk&libraries=places&callback=initialize">
                </script>
                <input type="hidden" class="form-control " id="keterangan" value="Pending" name="keterangan">
                <span class="d-flex justify-content-end col-md-12 mt-3 ">
                    <button class="btn btn-primary me-md-2 mb-3" type="submit">Submit</button>
                </span>
            </form>
        </div>
    </body>
</div>
<?= $this->endSection() ?>