<?= $this->extend('layout/default'); ?>

<?= $this->section('title'); ?>
<title>Add Data Reimburse &mdash; Project</title>

<?= $this->endSection(); ?>

<?= $this->section('content'); ?>

<section class="section">
    <div class="section-header">
        <div class="section-header-back">
            <a href="<?= site_url('reimburse'); ?>" class="btn"><i class="fas fa-arrow-left"></i></a>
        </div>
        <h1>Add Data Reimbursement</h1>
    </div>

    <div class="section-body">
        <div class="card">
            <div class="card-header">
                <h4>Add Data Reimbursement</h4>
            </div>
            <div class="row">
                <div class="card-body col-md-6">
                    <div class="row justify-content-center">
                        <div class="col-sm">
                            <div class="form-group">
                                <label>Nama Pengemudi</label>
                                <input type="text" value="<?= $pengemudi['nama_pengemudi']; ?>" class="form-control" disabled>
                            </div>
                        </div>
                        <div class="col-sm">
                            <div class="form-group">
                                <label>Tujuan</label>
                                <input type="text" value="<?= $order['tujuan']; ?>" class="form-control" disabled>
                            </div>
                        </div>     
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-sm">
                            <div class="form-group">
                                <label>Nama User</label>
                                <input type="text" value="<?= $order['nama']; ?>" class="form-control" disabled>
                            </div>
                        </div>
                        <div class="col-sm">
                            <div class="form-group">
                                <label>Unit Kerja</label>
                                <input type="text" value="<?= $order['unit_kerja']; ?>" class="form-control" disabled>
                            </div>
                        </div>     
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-sm">
                            <div class="form-group">
                                <label>Tanggal</label>
                                <input type="text" value="<?= $order['tanggal']; ?>" class="form-control" disabled>
                            </div>
                        </div>
                        <div class="col-sm">
                            <div class="form-group">
                                <label>Waktu</label>
                                <input type="text" value="<?= $order['waktu']; ?>" class="form-control" disabled>
                            </div>
                        </div>     
                    </div>
                </div>

                <div class="card-body col-md-6">
                <?php $validation = \Config\Services::validation(); ?>
                    <form action="<?= site_url('reimburse/store_reimburse/' . $reimburse['id_pemesanan']); ?>" method="post" autocomplete="off" enctype="multipart/form-data">
                        <?= csrf_field() ?>
                        <div class="form-group">
                            <label>Deskripsi</label>
                            <input type="text" name="deskripsi" value="<?= old('deskripsi'); ?>" class="form-control <?= $validation->hasError('deskripsi') ? 'is-invalid' : ''; ?>" autofocus>
                            <div class="invalid-feedback">
                                <?= $validation->getError('deskripsi'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Nominal</label>
                            <input type="text" id="dengan-rupiah" name="nominal" value="<?= old('nominal'); ?>" class="form-control <?= $validation->hasError('nominal') ? 'is-invalid' : ''; ?>">
                            <div class="invalid-feedback">
                                <?= $validation->getError('nominal'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Image</label>
                            <input type="file" id="photo" name="photo" class="form-control <?= $validation->hasError('photo') ? 'is-invalid' : ''; ?>" onchange="previewImageFile(this);" required>
                            <img src="" alt="Image preview" id="preview-image" width="400px" class="hideImage">
                            <div class="invalid-feedback">
                                <?= $validation->getError('photo'); ?>
                            </div>
                        </div>
    
                        <div class="form-group">
                            <button type="submit" class="btn btn-success"><i class="fas fa-paper-plane">Save</i></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    function previewImageFile(input, id) {
    var output = document.getElementById('preview-image');
        output.removeAttribute("class");
        output.src = URL.createObjectURL(event.target.files[0]);
        output.onload = function() {
            URL.revokeObjectURL(output.src)
        }
    }

    var dengan_rupiah = document.getElementById('dengan-rupiah');
    dengan_rupiah.addEventListener('keyup', function(e)
    {
        dengan_rupiah.value = formatRupiah(this.value, 'Rp. ');
    });

    /* Fungsi */
    function formatRupiah(angka, prefix)
    {
        var number_string = angka.replace(/[^,\d]/g, '').toString(),
            split    = number_string.split(','),
            sisa     = split[0].length % 3,
            rupiah     = split[0].substr(0, sisa),
            ribuan     = split[0].substr(sisa).match(/\d{3}/gi);
            
        if (ribuan) {
            separator = sisa ? '.' : '';
            rupiah += separator + ribuan.join('.');
        }
        
        rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
        return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
    }
</script>

<?= $this->endSection(); ?>