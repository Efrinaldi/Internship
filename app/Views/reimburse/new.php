<?= $this->extend('layout/default'); ?>

<?= $this->section('title'); ?>
<title>Create New Reimbursement &mdash; Project</title>

<?= $this->endSection(); ?>

<?= $this->section('content'); ?>

<section class="section">
    <div class="section-header">
        <div class="section-header-back">
            <a href="<?= site_url(''); ?>" class="btn"><i class="fas fa-arrow-left"></i></a>
        </div>
        <h1>Create Reimbursement</h1>
    </div>

    <div class="section-body">
        <div class="card">
            <div class="card-header">
                <h4>Input Data Reimbursement</h4>
            </div>
            <div class="card-body col-md-6">
                <?php $validation = \Config\Services::validation(); ?>
                <form action="<?= site_url('reimburse'); ?>" method="POST" enctype="multipart/form-data" autocomplete="off">
                    <?= csrf_field() ?>
                    <div class="form-group hidden">
                        <input type="text" name="pemesanan" value="<?= $reimburse['id_pemesanan']; ?>" class="form-control <?= $validation->hasError('pemesanan') ? 'is-invalid' : ''; ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('pemesanan'); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Deskripsi</label>
                        <input type="text" name="deskripsi" value="<?= old('deskripsi'); ?>" class="form-control <?= $validation->hasError('deskripsi') ? 'is-invalid' : ''; ?>" autofocus>
                        <div class="invalid-feedback">
                            <?= $validation->getError('deskripsi'); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Nominal</label>
                        <input type="nominal" name="nominal" value="<?= old('nominal'); ?>" class="form-control <?= $validation->hasError('nominal') ? 'is-invalid' : ''; ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('nominal'); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Image</label>
                        <input type="file" id="photo" name="photo" class="form-control <?= $validation->hasError('photo') ? 'is-invalid' : ''; ?>">
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
</section>

<?= $this->endSection(); ?>