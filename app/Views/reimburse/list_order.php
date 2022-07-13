<?= $this->extend('layout/default'); ?>

<?= $this->section('title'); ?>
<title>List Order &mdash; Project</title>

<?= $this->endSection(); ?>

<?= $this->section('content'); ?>

<section class="section">
    <div class="section-header">
        <h1>List Perjalanan</h1>
    </div>

    <div class="section-body">
        <div class="card">
            <div class="card-header">
                <h4>Data List Perjalanan Order</h4>
            </div>
            <?php if (session()->getFlashdata('success')) : ?>
                <div class="alert alert-success alert-dismissible show fade">
                    <div class="alert-body">
                        <button class="close" data-dismiss="alert">x</button>
                        <b>Success !</b>
                        <?= session()->getFlashdata('success'); ?>
                    </div>
                </div>
            <?php endif; ?>

            <?php if (session()->getFlashdata('error')) : ?>
                <div class="alert alert-danger alert-dismissible show fade">
                    <div class="alert-body">
                        <button class="close" data-dismiss="alert">x</button>
                        <b>error !</b>
                        <?= session()->getFlashdata('error'); ?>
                    </div>
                </div>
            <?php endif; ?>
            
            <div class="card-body table-responsive">
                <table class="table table-striped table-md" id="table1">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Pemesan</th>
                            <th>Tujuan</th>
                            <th>Tanggal</th>
                            <th>Waktu</th>
                            <th>Nama Driver</th>
                            <th>Keterangan</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; ?>
                        <?php foreach ($list as $key) : ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $key->nama ?></td>
                            <td><?= $key->tujuan ?></td>
                            <td><?= $key->tanggal ?></td>
                            <td><?= $key->waktu ?></td>
                            <td><?= $key->nama_pengemudi ?></td>
                            <td><?= $key->keterangan ?></td>
                            <td>
                                <a href="<?= site_url('reimburse/add_reimburse/' . $key->id_pemesanan); ?>" class="btn btn-primary"><i class="fas fa-pencil-alt"></i></a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    
    <script>
        window.setTimeout(() => {
            $(".alert").fadeTo(500,0).slideUp(500,function(){
                $(this).remove();
            });
        }, 2000);

    </script>

</section>

<?= $this->endSection(); ?>