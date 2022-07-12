<?= $this->extend('layout/default'); ?>

<?= $this->section('title'); ?>
<title>Data Reimburse &mdash; Project</title>

<?= $this->endSection(); ?>

<?= $this->section('content'); ?>

<section class="section">
    <div class="section-header">
        <h1>Reimburse Approved</h1>
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
                <h4>Data Reimburse Approved</h4>
            </div>
            <div class="card-header justify-content-center">
                <form action="" method="get" autocomplete="off" class="form-inline">
                    <div class="form-group mr-sm-5">
                        <input type="text" name="keyword" id="keyword" value="<?= $keyword; ?>" class="form-control" style="width: 155pt" placeholder="search driver" required>
                    </div>
                    <div class="form-group mr-sm-2">
                        <label class="mr-sm-2">Tanggal</label>
                        <input type="date" name="tgl_awal" id="tgl_awal" value="<?= $tgl_awal; ?>" class="form-control" style="width: 150pt" required>
                    </div>
                    <div class="form-group mr-sm-5">
                        <label class="mr-sm-2">s.d</label>
                        <input type="date" name="tgl_akhir" id="tgl_akhir" value="<?= $tgl_akhir; ?>" class="form-control" style="width: 150pt" required>
                    </div>
                    <div class="text-right">
                        <button type="submit" class="btn btn-primary" id="btnSearch"><i class="fas fa-search"></i></button>
                    </div>
                </form>
            </div>  
            <div class="card-body table-responsive">
                <table class="table table-striped table-md" id="entryTable">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Driver</th>
                            <th>Foto</th>
                            <th>Deskripsi</th>
                            <th>Tanggal Approved</th>
                            <th>Nominal</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $sum = 0;?>
                        <?php foreach ($reimburse as $key => $value) : ?>
                            <tr>
                                <td><?= $key + 1; ?></td>
                                <td><?= $value->nama_pengemudi ?></td>
                                <td><img width="75px" class="img-thumbnail" src="<?= base_url() . "/template/assets/img/upload/" . $value->photo; ?>"></td>
                                <td><?= $value->deskripsi; ?></td>
                                <td><?= date('d F, Y', strtotime($value->updated_at)); ?></td>
                                <td><?= format_rupiah($value->nominal); ?></td>
                                <td>
                                    <?php if ($value->status == "Approved") { ?>
                                        <div class="badge badge-success"><?= $value->status; ?></div>
                                    <?php } else if ($value->status == "Rejected") { ?>
                                        <div class="badge badge-danger"><?= $value->status; ?></div>
                                    <?php } else { ?>
                                        <div class="badge badge-warning"><?= $value->status; ?></div>
                                    <?php } ?>
                                </td>
                                <td>
                                    <a href="<?= base_url() . "/template/assets/img/upload/" . $value->photo; ?>" target="_blank">Preview</a>
                                </td>
                            </tr>
                        <?php $sum += $value->nominal;?>
                        <?php endforeach; ?>
                        <tfoot>
                            <tr>
                                <td colspan="5" class="text-center font-weight-bold h4">Total</td>
                                <td colspan="3" class="h4"><?= format_rupiah($sum); ?></td>
                            </tr>
                        </tfoot>
                    </tbody>
                </table>
                <div class="btn btn-success mt-3" id="exportBtn1" onclick="downloadExcel()">
                    Export to Excel
                </div>
                <!-- <a href="" class="btn btn-success mt-3" id="exportBtn1" onclick="downloadExcel()">Export To Excel</a> -->
            </div>
        </div>
    </div>
    
    <script>
        window.setTimeout(() => {
            $(".alert").fadeTo(500,0).slideUp(500,function(){
                $(this).remove();
            });
        }, 2000);

        $(document).ready(function()
        {
            $("#btnSearch").click(function()
            {
                var startDt=document.getElementById("tgl_awal").value;
                var endDt=document.getElementById("tgl_akhir").value;

                if( (new Date(startDt).getTime() > new Date(endDt).getTime()))
                {
                    alert('tanggal awal melebihi tanggal akhir!');
                    return false;
                }
                $("#entryTable").toggle()
            });
        });
        // $(document).ready(function () {
        //     let key = $('#keyword').val()
        //     let awal = $('#tgl_awal').val()
        //     let akhir = $('#tgl_awal').val()
        //     $("#exportBtn1").click(function(){
        //         TableToExcel.convert(document.getElementById("entryTable"), {
        //             name: key+awal+akhir+".xlsx",
        //             sheet: {
        //                 name: "Sheet1"
        //             }
        //         });
        //     });
        // });
        
    </script>
</section>

<?= $this->endSection(); ?>