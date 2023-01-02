<?= $this->extend('layouts/admin') ?>
<?= $this->section('public/content') ?>
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Operational Vehicle Management System - BCA Syariah</h1>
    </div>

    <body>
        <div class="container">
            <h2>Daftar Mobil</h2>
            <p>Anda dapat melakukan pendaftaran mobil sesuai dengan pengemudi</p>

            <?= csrf_field(); ?>
            <div class="col-md-6">
                <label for="inputNama" class="form-label">Plat Nomor</label>
                <input type="text" class="form-control" id="inputPlat" name="plat_nomor" required>
            </div>
            <div class="col-md-6">
                <label for="inputNama" class="form-label">Jenis Mobil</label>
                <input type="text" class="form-control" id="inputJenis" name="keterangan_mobil" required>
            </div>

            <div class="col-md-6">
                <label for="inputUnit" class="form-label">Status Mobil</label>
                <select type="text" name="status_mobil" class="form-control" id="inputId" required>
                    <option name="status_mobil" value="Tersedia">Tersedia</option>
                    <option name="status_mobil" value="Tidak Tersedia">Tidak Tersedia</option>
                </select>
            </div>
        </div>
        <div class="col-md-6">
            <label for="inputUnit" class="form-label">Nama Pengemudi</label>
            <select type="text" class="form-control" id="inputId" required>
            </select>
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