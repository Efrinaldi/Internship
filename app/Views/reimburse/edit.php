<?= $this->extend('layout/default'); ?>

<?= $this->section('title'); ?>
<title>Update Data &mdash; Project</title>

<?= $this->endSection(); ?>

<?= $this->section('content'); ?>

<section class="section">
    <div class="section-header">
        <div class="section-header-back">
            <a href="<?= site_url('reimburse'); ?>" class="btn"><i class="fas fa-arrow-left"></i></a>
        </div>
        <h1>Update Reimbursement</h1>
    </div>

    <div class="section-body">
        <div class="card">
            <div class="card-header">
                <h4>Edit Data Reimbursement</h4>
            </div>
            <div class="card-body col-md-6">
                <?php $validation = \Config\Services::validation(); ?>
                <form action="<?= site_url('reimburse/update/' . $reimburse->id); ?>" method="post" autocomplete="off">
                    <?= csrf_field() ?>
                    <div class="form-group">
                        <label>Deskripsi</label>
                        <input type="text" name="deskripsi" value="<?= old('deskripsi', $reimburse->deskripsi); ?>" class="form-control <?= $validation->hasError('deskripsi') ? 'is-invalid' : ''; ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('deskripsi'); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Nominal</label>
                        <input type="text" name="nominal" value="<?= old('nominal', $reimburse->nominal); ?>" class="form-control <?= $validation->hasError('nominal') ? 'is-invalid' : ''; ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('nominal'); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Image</label>
                        <div>
                            <img width="150px" class="img-thumbnail" src="<?= base_url() . "/template/assets/img/upload/" . $reimburse->photo; ?>">
                        </div>
                        <div class="invalid-feedback">
                            <?= $validation->getError('photo'); ?>
                        </div>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="status" value="Requesting" <?php if ($reimburse->status == 'Requesting') echo 'checked="checked"'; ?> id="flexRadioDefault1">
                        <label class="form-check-label" for="flexRadioDefault1">
                            Requesting
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="status" value="Approved" <?php if ($reimburse->status == 'Approved') echo 'checked="checked"'; ?> id="flexRadioDefault2">
                        <label class="form-check-label" for="flexRadioDefault2">
                            Approved
                        </label>
                    </div>
                    <div class="form-check mb-3">
                        <input class="form-check-input" type="radio" name="status" value="Rejected" <?php if ($reimburse->status == 'Rejected') echo 'checked="checked"'; ?> id="flexRadioDefault3">
                        <label class="form-check-label" for="flexRadioDefault3">
                            Rejected
                        </label>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-success"><i class="fas fa-paper-plane">Save</i></button>
                        <!-- <button type="submit" class="btn btn-secondary">Reset</button> -->
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<?= $this->endSection(); ?>