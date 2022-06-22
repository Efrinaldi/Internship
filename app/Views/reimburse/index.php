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
                            <th>
                                <div class="custom-checkbox custom-control">
                                <input type="checkbox" data-checkboxes="mygroup" data-checkbox-role="dad" class="custom-control-input" id="checkbox-all">
                                <label for="checkbox-all" class="custom-control-label">&nbsp;</label>
                                </div>
                            </th>
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
                                <td class="p-0 text-center">
                                    <div class="custom-checkbox custom-control">
                                        <input type="checkbox" data-checkboxes="mygroup" name="pilih" class="custom-control-input" id="checkbox-.<?= $key + 1; ?>">
                                        <label for="checkbox-.<?= $key + 1; ?>" class="custom-control-label">&nbsp;</label>
                                    </div>
                                </td>
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
                                <td class="text-left">
                                    <a href="<?= site_url('reimburse/edit/' . $value->id); ?>" class="btn btn-info"><i class="fas fa-pencil-alt"></i></a>
                                    <a href="#" class="btn btn-success"><i class="fas fa-check"></i></a>
                                    <a href="#" class="btn btn-danger"><i class="fas fa-times"></i></a>
                                    <form action="<?= site_url('reimburse/delete/' . $value->id); ?>" method="POST" class="d-inline" id="del-<?= $value->id; ?>">
                                        <?= csrf_field() ?>
                                        <button type="submit" class="btn btn-warning" data-confirm="Hapus Data ?|Apakah Anda yakin ?" data-confirm-yes="submitDel(<?= $value->id; ?>)">
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

        $('#checkbox-all').click(function() {
            var checked = this.checked;
            $('input[type="checkbox"]').each(function() {
            this.checked = checked;
            });
        })

        // $('#checkbox-all').on('change', function(e){
        //     e.preventDefault()
        //     $('input[name=pilih]').prop('checked', this.checked)
        // })
    </script>

</section>

<?= $this->endSection(); ?>