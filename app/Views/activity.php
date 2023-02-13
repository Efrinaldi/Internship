<?= $this->extend('layouts/general') ?>
<?= $this->section('content') ?>

<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Daftar Pesanan</h4>
                        <p class="card-description">
                        <div class="table-responsive">
                            <table class="table table-striped" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>Nomor</th>
                                        <th>Activity</th>
                                        <th>Tanggal</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1;
                                    foreach ($data as $o) : ?>
                                        <tr>
                                            <td><?= $no++; ?></td>
                                            <td><?= $o['activity'] ?></td>
                                            <td><?= $o['date'] ?></td>
                                        </tr>
                                    <?php
                                    endforeach;
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>



            <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
            <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
            <script type="text/javascript" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
            <script>
                $(document).ready(function() {
                    $('#dataTables-example').DataTable({
                            "pageLength": 50,

                        }

                    );
                });
            </script>
            </script>

            <?= $this->endSection() ?>