<?php
session_start();
unset($_SESSION['SESS_USER_ID']);


?>

<?php
    if(isset($_SESSION['ERRMSG_ARR']) && is_array($_SESSION['ERRMSG_ARR']) && count($_SESSION['ERRMSG_ARR'])>0)
    {
        foreach ($_SESSION['ERRMSG_ARR'] as $msg) {
            echo $msg;
        }
        unset($_SESSION['ERRMSG_ARR']);
    }
?>





    <!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Course Management System | Lockscreen</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body class="hold-transition lockscreen" style="background-image:url('images/student2.jpg'); 
  background-size: cover;
  background-repeat: no-repeat;">
<!-- Automatic element centering -->
<div class="lockscreen-wrapper">
  <div class="lockscreen-logo">
    <a href="index.php" style="color:navy;" ><b>Course Management System</b></a>
  </div>
  <!-- User name -->
  

  <!-- START LOCK SCREEN ITEM -->
  <div class="lockscreen-item">
    <!-- lockscreen image -->
    <div class="lockscreen-image">
      <img src="dist/img/avatar.png" alt="User Image">
    </div>
    <!-- /.lockscreen-image -->

    <!-- lockscreen credentials (contains the form) -->
    <form class="lockscreen-credentials" action="userlogin.php" method="post">
      <div class="input-group">
        <input type="text" class="form-control" name="username"  value="Username" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Enter Invalid Username';}"">

        
      </div>

      <div class="input-group">
        <input type="password" class="form-control" value="password" name="password" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Password:';} "">

        <div class="input-group-btn">
          <button type="submit" name="action_login" class="btn"><i class="fa fa-arrow-right text-muted"></i></button>
        </div>
      </div>
    </form>
    <!-- /.lockscreen credentials -->

  </div>
  <!-- /.lockscreen-item -->
  <div class="help-block text-center" style="color:white;">
    Enter Login Infomation To Access the CMS 
  </div>
  <div class="lockscreen-footer text-center" style="color:white;">
    <b>&copy 2015 TOM CMS. Developed by <a href="#" target="_blank">Essietom</a></b><br>
    All rights reserved
  </div>
</div>
<!-- /.center -->

<!-- jQuery 2.2.0 -->
<script src="plugins/jQuery/jQuery-2.2.0.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="bootstrap/js/bootstrap.min.js"></script>
</body>
</html>
