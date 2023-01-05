<?= $this->extend('layouts/admin') ?>
<?= $this->section('content') ?>
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Operational Vehicle Management System - BCA Syariah</h1>
    </div>

    <div class="container">




        <h2>Pesan Kendaraan</h2>

        <?php if (!empty($waktuErr) or !$waktuErr === "") : ?>
            <button type="button" class="btn btn-danger"><?= $waktuErr ?></button>
        <?php endif; ?>
        <?php if (!empty($gagal)) : ?>
            <button type="button" class="btn btn-danger"><?= $gagal ?></button>
        <?php endif; ?>

        <form class="row g-3" action="<?= base_url() ?>/requestOrder" onsubmit="return validate();" method="post" autocomplete="off">
            <?= csrf_field(); ?>
            <div class="col-md-12">
                <label for="inputWaktu" class="form-label">Nama </label>
                <input type="text" class="form-control" id="nama" name="nama" value="<?= session("username") ?>" pattern="([1]?[0-9]|2[0-3]):[0-5][0-9]" readonly>
                <?php  ?>
            </div>
            <div class="col-md-12">
                <label for="inputUnit" class="form-label">Unit Kerja</label>
                <input type="text" class="form-control" id="unit_kerja" name="nama" value="<?= session("unit_kerja") ?>" pattern="([1]?[0-9]|2[0-3]):[0-5][0-9]" readonly>

            </div>
            <div class="col-md-12">
                <label for="inputWaktu" class="form-label">Waktu Mulai</label>
                <input type="time" class="form-control" id="inputWaktuStart" name="inputWaktuStart" pattern="([1]?[0-9]|2[0-3]):[0-5][0-9]" required>
                <?php  ?>
            </div>
            <div class="col-md-12">
                <label for="inputWaktu" class="form-label">Waktu Berakhir</label>
                <input type="time" class="form-control" id="inputWaktuEnd" name="inputWaktuEnd" pattern="([1]?[0-9]|2[0-3]):[0-5][0-9]" required>
                <label for="error" class="error"></label>
            </div>

            <div class="form-group col-md-12">
                <label>Tanggal Memakai</label>
                <input type="text" id="tanggal_memakai" name="tanggal_memakai" width="276" class="form-control file-upload-info" placeholder="Tanggal Memakai" />
            </div>
            <div class="col-md-12">
                <label for="inputPemakaian" class="form-label">Tujuan Pakai</label>
                <input type="text" class="form-control" id="inputPemakaian" name="purpose" placeholder="Isi Tujuan Pakai" required>

            </div>
            <div class="col-md-12">
                <label for="inputTujuan" class="form-label">Lokasi Asal</label>
                <input type="text" class="form-control" id="inputAsal" name="asal" placeholder="Pilih Lokasi Asal" required>
            </div>
            <script src="<?= base_url('public/assets/js/javascript.js') ?>"></script>
            <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD8aM8vpu-Y-Qt5hSeeV_mVGGimuwfjpIk&libraries=places&callback=initialize">
            </script>
            <div class="col-md-12">
                <label for="inputTujuan" class="form-label">Lokasi Tujuan</label>
                <input type="text" class="form-control" id="inputTujuan" name="destination" placeholder="Pilih Lokasi Tujuan" required>
            </div>

            <div class="col-md-12">
                <label for="jumlahOrang" class="form-label">Jumlah Orang</label>
                <input type="text" class="form-control" min="1" max="4" id="jumlahOrang" name="jumlah_orang" placeholder="Jumlah Orang" required>
            </div>

            <div id="map-canvas" hidden></div>
            <script src="<?= base_url('public/assets/js/javascript.js') ?>"></script>
            <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD8aM8vpu-Y-Qt5hSeeV_mVGGimuwfjpIk&libraries=places&callback=initialize">
            </script>
            <input type="hidden" class="form-control " id="keterangan" value="Pending" name="keterangan">
            <span class="d-flex justify-content-end col-md-12 mt-3 ">

                <button onclick="myFunction()" class="btn btn-primary me-md-2 mb-3" type="submit">Submit</button>
            </span>
        </form>





    </div>

    <script>
        function myFunction() {
            var x = document.getElementById("waktuMulai").value;
            document.getElementById("demo").innerHTML = x;
            var jumlah_orang = document.getElementById("jumlahOrang").value;
            if (jumlah_orang > 5) {

            }
        }
        $('#tanggal_memakai').datepicker({
            format: 'dd/mm/yyyy',

            uiLibrary: 'bootstrap4'
        });
    </script>
</div>

<?= $this->endSection() ?>