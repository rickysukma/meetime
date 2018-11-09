<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Supono">
    <meta name="keyword" content="Login Admin">
    <link rel="shortcut icon" href="<?php echo site_url()?>assets/images/admin/favicon.png">

    <title>Login - Web Panel</title>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo site_url()?>assets/stylesheets/admin/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo site_url()?>assets/stylesheets/admin/bootstrap-reset.css" rel="stylesheet">
    <!--external css-->
    <link href="<?php echo site_url()?>assets/javascripts/admin/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <!-- Custom styles for this template -->
    <link href="<?php echo site_url()?>assets/stylesheets/admin/style.css" rel="stylesheet">
    <link href="<?php echo site_url()?>assets/stylesheets/admin/style-responsive.css" rel="stylesheet" />

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 tooltipss and media queries -->
    <!--[if lt IE 9]>
    <script src="<?php echo site_url()?>assets/javascripts/admin/html5shiv.js"></script>
    <script src="<?php echo site_url()?>assets/javascripts/admin/respond.min.js"></script>
    <![endif]-->
</head>

  <body class="login-body">

    <div class="container">

      <form class="form-signin" action="<?php echo site_url()?>admin/login/process" method="post">
        <h2 class="form-signin-heading">login admin</h2>
        <div class="login-wrap">

        <?php if(!is_null($msg)):?>
        <div class="alert alert-block alert-danger fade in">
            <button data-dismiss="alert" class="close close-sm" type="button">
              <i class="icon-remove"></i>
            </button>
            <strong>Upsss! </strong> Username atau Password Salah
        </div>
        <?php endif?>
        
            <input type="text" class="form-control" placeholder="Username" name="username" <?php if ($uname){ echo "value='$uname'";}?> autofocus>
            <input type="password" class="form-control" placeholder="Password" name="password">
            <label class="checkbox">
                <input type="checkbox" value="remember-me"> Remember me
            </label>
            <button class="btn btn-lg btn-login btn-block" type="submit">Login</button>
        </div>
      </form>

    </div>

    <!-- js placed at the end of the document so the pages load faster -->
    <script src="<?php echo site_url()?>assets/javascripts/admin/jquery.js"></script>
    <script src="<?php echo site_url()?>assets/javascripts/admin/bootstrap.min.js"></script>

  </body>
</html>
