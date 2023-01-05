<?= $this->extend('layouts/admin') ?>
<?= $this->section('content') ?>
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Operational Vehicle Management System - BCA Syariah</h1>
    </div>
    <div class="row">
        <div class="col-xl-3 col-md-6 mb-4 ">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Pesanan Disetujui
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo ($available) ?> Pesanan</div>
                        </div>
                        <a href="<?= base_url("/approve") ?>" class="stretched-link" type="hidden"></a>
                        <div class="col-auto">
                            <i class="fas fa-car fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-danger shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Pesanan Ditolak
                            </div>
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?php echo ($unavailable) ?> Pesanan</div>
                                </div>
                            </div>
                        </div>
                        <a href="<?= base_url("/reject") ?>" class="stretched-link" type="hidden"></a>
                        <div class="col-auto">
                            <i class="fas fa-car-side fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>