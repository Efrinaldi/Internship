<!DOCTYPE html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>AdminLTE 2 | Log in</title>

    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="<?= base_url() ?>/AdminLTE 2 _ Log in_files/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= base_url() ?>/AdminLTE 2 _ Log in_files/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="<?= base_url() ?>/AdminLTE 2 _ Log in_files/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url() ?>/AdminLTE 2 _ Log in_files/AdminLTE.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="<?= base_url() ?>/AdminLTE 2 _ Log in_files/blue.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

    <!-- Google Font -->
    <link rel="stylesheet" href="./AdminLTE 2 _ Log in_files/css">
</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <div class="login-logo">
        </div>
        <!-- /.login-logo -->
        <div class="login-box-body">
            <p class="login-box-msg">
                <img src="<?= base_url('assets') ?>/img/bcas.png" alt="" width="300" height="100" style="padding:15px 0 0 0">
            </p>

            <form action="<?= base_url() ?>/auth" method="post">
                <?php if (session()->getFlashdata('msg')) : ?>
                    <div class="alert alert-danger"><?= session()->getFlashdata('msg') ?></div>
                <?php endif; ?>
                <div class="form-group has-feedback">
                    <input type="email" name="email" class="form-control" placeholder="Email" id="email" value="<?= set_value('email') ?>">
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                    <input type="password" class="form-control" name="password" placeholder="Password" id="password" value="<?= set_value('password') ?>">
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                </div>
                <div class="row">
                    <div class="col-xs-6">
                        <button type="submit" class="btn btn-primary btn-block btn-flat">Sign in</button>
                    </div>
                    <!-- /.col -->
                    <div class="col-xs-6">
                        <a href="<?= base_url() ?>/register" class="btn btn-primary btn-block btn-google btn-flat">Register</a>
                    </div>
                    <!-- /.col -->
                </div>
            </form>
        </div>
        <!-- /.login-box-body -->
    </div>
    <!-- /.login-box -->

    <!-- jQuery 3 -->
    <script src="./AdminLTE 2 _ Log in_files/jquery.min.js.download"></script>
    <!-- Bootstrap 3.3.7 -->
    <script src="./AdminLTE 2 _ Log in_files/bootstrap.min.js.download"></script>
    <!-- iCheck -->
    <script src="./AdminLTE 2 _ Log in_files/icheck.min.js.download"></script>
    <script>
        $(function() {
            $('input').iCheck({
                checkboxClass: 'icheckbox_square-blue',
                radioClass: 'iradio_square-blue',
                increaseArea: '20%' /* optional */
            });
        });
    </script>


</body>

</html>