<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>AdminLTE 2 | Registration Page</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="<?= base_url("/public") ?>/AdminLTE%202%20Registration%20Page_files/bootstrap.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= base_url("/public") ?>/AdminLTE%202%20Registration%20Page_files/font-awesome.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="<?= base_url("/public") ?>/AdminLTE%202%20Registration%20Page_files/ionicons.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url("/public") ?>/AdminLTE%202%20Registration%20Page_files/AdminLTE.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="<?= base_url("/public") ?>/AdminLTE%202%20Registration%20Page_files/blue.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

    <!-- Google Font -->
    <link rel="stylesheet" href="AdminLTE%202%20Registration%20Page_files/css.css">
</head>

<body class="bg-primary">
    <div class="register-box">
        <div class="register-logo">
            <b class="text-white">Admin BCA Syariah</b>
        </div>

        <div class="register-box-body">
            <p class="login-box-msg">Form Register</p>
            <?php if (isset($validation)) : ?>
                <div class="alert alert-danger"><?= $validation->listErrors() ?></div>
            <?php endif; ?>
            <form action="<?= base_url() ?>/reg" method="post">
                <?= csrf_field(); ?>
                <div class="form-group has-feedback">
                    <input type="text" id="InputForFirstName" name="first_name" class="form-control" placeholder="First name" required>
                </div>
                <div class="form-group has-feedback">
                    <input type="text" id="InputForLastName" name="last_name" class="form-control" placeholder="Last name" required>
                </div>
                <div class="form-group has-feedback">
                    <select name="role" class="form-control" required>
                        <option value="">Role</option>
                        <option value="Supervisor Logistik">Supervisor Logistik</option>
                        <option value="Supervisor">Supervisor</option>
                        <option value="Security">Security</option>
                        <option value="User">User</option>

                    </select>
                </div>
                <div class="form-group has-feedback">
                    <input type="text" id="InputForName" name="username" class="form-control" placeholder="Username" required>
                </div>
                <div class="form-group has-feedback">
                    <input type="email" id="InputForEmail" name="email" class="form-control" placeholder="Email" required>
                </div>
                <div class="form-group has-feedback">
                    <input type="text" id="InputForNIP" name="nip" class="form-control" placeholder="NIP" required>
                </div>
                <div class="form-group has-feedback">
                    <select name="unit_kerja" class="form-control" required>
                        <option value="">Unit Kerja</option>
                        <option value="SKTILOG">SKTILOG</option>
                        <option value="SKHSDM">SKHSDM</option>
                        <option value="SKAI">SKAI</option>
                        <option value="BSIT">BSIT</option>
                    </select>
                </div>
                <div class="form-group has-feedback">
                    <input type="password" name="password" class="form-control" placeholder="Password" required>
                </div>
                <div class="form-group has-feedback">
                    <input type="password" name="confpassword" class="form-control" placeholder="Retype password" required>
                </div>
                <div class="row">
                    <!-- /.col -->
                    <div class="col-xs-12">
                        <button type="submit" class="btn btn-primary btn-block btn-flat">Register</button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>
        </div>
        <!-- /.form-box -->
    </div>
    <!-- /.register-box -->

    <!-- jQuery 3 -->
    <script src="AdminLTE%202%20Registration%20Page_files/jquery.js"></script>
    <!-- Bootstrap 3.3.7 -->
    <script src="AdminLTE%202%20Registration%20Page_files/bootstrap.js"></script>
    <!-- iCheck -->
    <script src="AdminLTE%202%20Registration%20Page_files/icheck.js"></script>
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