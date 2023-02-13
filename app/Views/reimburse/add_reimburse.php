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
                    <div class="row card-body table-responsive">
                        <h5 class="text-center">Daftar Transaksi Reimburse Dalam Proses</h5>
                        <hr>
                        <table class="table table-striped table-md">
                            <thead>
                                <tr>
                                    <th>Foto</th>
                                    <th>Deskripsi</th>
                                    <th>Nominal</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($reimbursement as $key => $value) : ?>
                                    <tr>
                                        <td><img width="75px" class="img-thumbnail" src="<?= base_url() . "/template/assets/img/upload/" . $value->photo; ?>"></td>
                                        <td><?= $value->deskripsi; ?></td>
                                        <td><?= format_rupiah($value->nominal); ?></td>
                                        <td>
                                            <form action="<?= site_url('reimburse/delete_inDriver/' . $value->id); ?>" method="POST" class="d-inline" id="del-<?= $value->id; ?>">
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

                <div class="card-body col-md-6">
                    <?php $validation = \Config\Services::validation(); ?>
                    <form action="<?= site_url('reimburse/store_reimburse/' . $pemesanan['id_pemesanan']); ?>" method="post" autocomplete="off" enctype="multipart/form-data">
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
                            <!-- <button id="capture">Capture</button>
                            <div id="enhancerUIContainer" style="height: 100vh;"></div> -->

                            <div id="my_camera"></div>
                            <br />
                            <input type=button value="Take Snapshot" onClick="take_snapshot()">
                            <input type="hidden" name="image" class="image-tag">
                            <div class="col-md-6">
                                <div id="results">Your captured image will appear here...</div>
                            </div>


                            <input type="file" id="photo" name="photo" class="form-control <?= $validation->hasError('photo') ? 'is-invalid' : ''; ?>" onchange="previewImageFile(this);" value="<?= old('photo'); ?>" required>
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
    dengan_rupiah.addEventListener('keyup', function(e) {
        dengan_rupiah.value = formatRupiah(this.value, 'Rp. ');
    });

    /* Fungsi */
    function formatRupiah(angka, prefix) {
        var number_string = angka.replace(/[^,\d]/g, '').toString(),
            split = number_string.split(','),
            sisa = split[0].length % 3,
            rupiah = split[0].substr(0, sisa),
            ribuan = split[0].substr(sisa).match(/\d{3}/gi);
        if (ribuan) {
            separator = sisa ? '.' : '';
            rupiah += separator + ribuan.join('.');
        }

        rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
        return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
    }

    // let enhancer = null;
    //     (async () => {
    //         enhancer = await Dynamsoft.DCE.CameraEnhancer.createInstance();
    //         document.getElementById("enhancerUIContainer").appendChild(enhancer.getUIElement());
    //         await enhancer.open(true);
    //     })();

    //     document.getElementById('capture').onclick = () => {
    //         if (enhancer) {
    //             let frame = enhancer.getFrame();

    //             let width = screen.availWidth;
    //             let height = screen.availHeight;
    //             let popW = 640, popH = 640;
    //             let left = (width - popW) / 2;
    //             let top = (height - popH) / 2;

    //             popWindow = window.open('', 'popup', 'width=' + popW + ',height=' + popH +
    //                 ',top=' + top + ',left=' + left + ', scrollbars=yes');

    //             popWindow.document.body.appendChild(frame.canvas);
    //         }
    //     };

    Webcam.set({
        width: 490,
        height: 390,
        image_format: 'jpeg',
        jpeg_quality: 90
    });

    Webcam.attach('#my_camera');

    function take_snapshot() {
        Webcam.snap(function(data_uri) {
            $(".image-tag").val(data_uri);
            document.getElementById('results').innerHTML = '<img src="' + data_uri + '"/>';
        });
    }
</script>

<?= $this->endSection(); ?>