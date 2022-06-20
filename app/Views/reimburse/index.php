<?= $this->extend('layout/default'); ?>

<?= $this->section('title'); ?>
<title>Data Reimburse &mdash; Project</title>

<?= $this->endSection(); ?>

<?= $this->section('content'); ?>

<section class="section">
    <div class="section-header">
        <h1>Reimbursement</h1>
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


    <div class="section-body">
        <div class="card">
            <div class="card-header">
                <h4>Data Reimburse</h4>
            </div>
            <div class="card-body table-responsive">
                <table class="table table-striped table-md" id="table1">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Foto</th>
                            <th>Deskripsi</th>
                            <th>Nominal</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($reimburse as $key => $value) : ?>
                            <tr>
                                <td><?= $key + 1; ?></td>
                                <td><a href="<?= base_url() . "/template/assets/img/upload/" . $value->photo; ?>" target="_blank"><img width="75px" class="img-thumbnail" src="<?= base_url() . "/template/assets/img/upload/" . $value->photo; ?>"></a></td>
                                <td><?= $value->deskripsi; ?></td>
                                <td><?= format_rupiah($value->nominal); ?></td>
                                <td><?php if ($value->status == "Approved") { ?>
                                        <div class="badge badge-success"><?= $value->status; ?></div>
                                    <?php } else if ($value->status == "Rejected") { ?>
                                        <div class="badge badge-danger"><?= $value->status; ?></div>
                                    <?php } else { ?>
                                        <div class="badge badge-warning"><?= $value->status; ?></div>
                                    <?php } ?>
                                </td>
                                <td class="text-center">
                                    <a href="<?= site_url('reimburse/edit/' . $value->id); ?>" class="btn btn-warning"><i class="fas fa-pencil-alt"></i></a>
                                    <form action="<?= site_url('reimburse/delete/' . $value->id); ?>" method="POST" class="d-inline" id="del-<?= $value->id; ?>">
                                        <?= csrf_field() ?>
                                        <button type="submit" class="btn btn-danger" data-confirm="Hapus Data ?|Apakah Anda yakin ?" data-confirm-yes="submitDel(<?= $value->id; ?>)">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
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
        }, 1000);
    </script>

</section>

<?= $this->endSection(); ?>