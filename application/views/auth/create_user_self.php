<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Siaro | Sign up</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- Favicon -->
    <link rel="shortcut icon" href="<?=base_url('assets/images/favicon.ico')?>">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" type="text/css" href="<?=base_url('assets/bootstrap/css/bootstrap.min.css')?>" />
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" type="text/css" href="<?=base_url('assets/plugins/font-awesome-4.4.0/css/font-awesome.min.css')?>" />
    <!-- Ionicons -->
    <link rel="stylesheet" type="text/css" href="<?=base_url('assets/plugins/ionicons-2.0.1/css/ionicons.min.css')?>">
    <!-- Theme style -->
    <link rel="stylesheet" type="text/css" href="<?=base_url('assets/dist/css/AdminLTE.min.css')?>" />
    <!-- iCheck -->
    <link rel="stylesheet" type="text/css" href="<?=base_url('assets/plugins/iCheck/square/blue.css')?>" />

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
  </head>

  <body class="hold-transition login-page">
    <noscript>
      <center>This page needs JavaScript activated to work.</center>
      <style>div { display:none; }</style>
    </noscript>

    <div class="login-box">
      <div class="login-logo">
        <a href="<?=base_url()?>"><b>Halaman</b> Sign up</a>
      </div><!-- /.login-logo -->

      <div class="login-box-body">
        <h1 class="text-blue"><?php echo lang('create_user_heading');?></h1>
        <p><?php echo lang('create_user_subheading');?></p>

        <div id="infoMessage"><?php echo $message;?></div>

        <?php echo form_open("auth/create_user_self");?>
              <p>
                    <?php echo lang('create_user_fname_label', 'first_name');?> <br />
                    <?php echo form_input($first_name);?>
              </p>
              <p>
                    <?php echo lang('create_user_lname_label', 'last_name');?> <br />
                    <?php echo form_input($last_name);?>
              </p>
              <?php
              if($identity_column!=='email') {
                  echo '<p>';
                  echo lang('create_user_identity_label', 'identity');
                  echo '<br />';
                  echo form_error('identity');
                  echo form_input($identity);
                  echo '</p>';
              }
              ?>
              <p>
                    <?php echo lang('create_user_company_label', 'company');?> <br />
                    <?php echo form_input($company);?>
              </p>
              <p>
                    <?php echo lang('create_user_email_label', 'email');?> <br />
                    <?php echo form_input($email);?>
              </p>
              <p>
                    <?php echo lang('create_user_phone_label', 'phone');?> <br />
                    <?php echo form_input($phone);?>
              </p>
              <p>
                    <?php echo lang('create_user_password_label', 'password');?> <br />
                    <?php echo form_input($password);?>
              </p>

              <p>
                    <?php echo lang('create_user_password_confirm_label', 'password_confirm');?> <br />
                    <?php echo form_input($password_confirm);?>
              </p>
              <p><button type="submit" name="submit" class="btn btn-primary btn-block btn-flat"><i class="fa fa-sign-up"></i> <?php echo lang('create_user_submit_btn');?></button></p>
        <?php echo form_close();?>

        <a href="login">Already have an account? <b>Log in.</b></a><br>
        <div class="social-auth-links text-center">
          <p>Arisan-  <a href="http://danang-ekal.com">danang-ekal.com</a> &copy; 2016
              <br>
             Versi 1.0.0
          </p>
        </div><!-- /.social-auth-links -->
      </div><!-- /.login-box-body -->

    </div><!-- /.login-box -->

    <!-- jQuery 2.1.4 -->
    <script src="<?=base_url('assets/plugins/jQuery/jQuery-2.1.4.min.js')?>"></script>
    <!-- Bootstrap 3.3.5 JS -->
    <script src="<?=base_url('assets/bootstrap/js/bootstrap.min.js')?>" type="text/javascript"></script>
    <!-- iCheck -->
    <script src="<?=base_url('assets/plugins/iCheck/icheck.min.js')?>" type="text/javascript"></script>
    <script>
      $(function () {
        $('input').iCheck({
          checkboxClass: 'icheckbox_square-blue',
          radioClass: 'iradio_square-blue',
          increaseArea: '20%' // optional
        });
      });
    </script>
  </body>

</html>
