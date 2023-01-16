<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Skydash Admin</title>

    <link rel="stylesheet" href="<?= base_url('/public/assets_p/vendors/feather/feather.css') ?>">
    <link rel="stylesheet" href="<?= base_url('/public/assets_p/vendors/ti-icons/css/themify-icons.css') ?>">
    <link rel="stylesheet" href="<?= base_url('/public/assets_p/vendors/ti-icons/css/themify-icons.css') ?>">
    <link rel="stylesheet" href="<?= base_url('/public/assets_p/vendors/css/vendor.bundle.base.css') ?>">
    <link rel="stylesheet" href="<?= base_url('/public/assets_p/vendors/ti-icons/css/themify-icons.css') ?>">
    <link rel="stylesheet" href="<?= base_url('/public/assets_p/css/vertical-layout-light/style.css') ?>">
    <link rel="stylesheet" href="<?= base_url('/public/assets_p/images/favicon.png') ?>">
</head>
<body>
    <div class="container-scroller">
        <div class="container-fluid page-body-wrapper full-page-wrapper">
            <div class="content-wrapper d-flex align-items-center auth px-0">
                <div class="row w-100 mx-0">
                    <div class="col-lg-4 mx-auto">
                        <div class="auth-form-light text-center py-5 px-4 px-sm-5">
                            <?= csrf_field(); ?>
                            <?php if (session()->getFlashdata('msg')) : ?>
                                <div class="alert alert-danger"><?= session()->getFlashdata('msg') ?></div>
                            <?php endif; ?>
                            <div class="brand-logo justify-content-between align-items-center">

                                <img src="<?= base_url('/public/assets_p/images/bcas.png') ?>" class="justify-content-between align-items-center" alt="logo">
                            </div>
                            <h4>Hello! let's get started</h4>
                            <h6 class="font-weight-light">Sign in to continue.</h6>
                            <form class="pt-3" action="<?= base_url() ?>/auth" method="post">
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-lg" id="exampleInputEmail1" name="username" placeholder="Username">
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control form-control-lg" id="exampleInputPassword1" name="password" placeholder="Password">
                                </div>
                                <div class="mt-3">
                                    <button type="submit" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">SIGN IN</button>
                                </div>
                                <div class="my-2 d-flex justify-content-between align-items-center">

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="<?= base_url('/public/assets_p/vendors/js/vendor.bundle.base.js') ?>"></script>
    <script src="<?= base_url('/public/assets_p/js/off-canvas.js') ?>"></script>
    <script src="<?= base_url('/public/assets_p/js/hoverable-collapse.js') ?>"></script>
    <script src="<?= base_url('/public/assets_p/js/settings.js') ?>"></script>
    <script src="<?= base_url('/public/assets_p/js/todolist.js') ?>"></script>
    <link rel="stylesheet" href="<?= base_url('/public/assets_p/images/favicon.png') ?>">
</body>
<script>
    $(function() {
        $('input').iCheck({
            checkboxClass: 'icheckbox_square-blue',
            radioClass: 'iradio_square-blue',
            increaseArea: '20%' /* optional */
        });
    });
</script>

</html>