<?= $this->extend('layouts/general') ?>
<?= $this->section('content') ?>
<div class="main-panel">
    <div class="content-wrapper col-md-12 col-sm-12 col-lg-12">
        <div class="row">
            <div class="card-body col-md-12  col-sm-12 col-lg-12">
                <h4 class="card-title">Riwayat Pemesanan</h4>
                <p class="card-description col-md-12 col-sm-12 col-lg-12">
                </p>
                <a href="<?= base_url("/approve") ?>" class="">
                    <div class="col-md-6 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <a href="<?= base_url("/approve") ?>">
                                    <h4 class="card-title">Pemesanan Disetujui</h4>
                                </a>
                                <div class="media">
                                    <i class="ti-world icon-md text-info d-flex align-self-start mr-3"></i>
                                    <div class="media-body">
                                        <p class="card-text"><?php echo ($available) ?> Pesanan</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
                <div class="col-md-6 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <a href="<?= base_url("/reject") ?>">
                                <h4 class="card-title">Pemesanan Ditolak</h4>
                            </a>
                            <div class="media">
                                <i class="ti-world icon-md text-info d-flex align-self-center mr-3"></i>
                                <div class="media-body">
                                    <p class="card-text"><?php echo ($unavailable) ?> Pesanan</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
</div>
</div>

<?= $this->endSection() ?>