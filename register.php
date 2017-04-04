<?php
require 'functions/functions.php';
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Expenses Manager | Lockscreen</title>
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
<body>
  <div class="content lockscreen-wrapper">
    <h1>Register</h1>
    <form action="register.php" method="POST">
      <label>
        <input name="username" placeholder="Username" class="form-control" />
      </label>
      <label>
        <input name="email" placeholder="E-Mail" class="form-control"/> 
      </label>
      <label>
        <input name="pass" type="password" placeholder="Password" class="form-control"/>
      </label>
      <label>
        <input name="retyped_password" type="password" placeholder="Retype Password" class="form-control"/>
      </label>
      <label>
        <input name="name" placeholder="Name" class="form-control"/>
      </label>
      <label>
        <button name="submit" type="submit" class="btn btn-info">Register</button>
      </label>
    </form>
    <?php
    if( isset($_POST['submit']) ){
      $username = $_POST['username'];
      $email = $_POST['email'];
      $password = $_POST['pass'];
      $retyped_password = $_POST['retyped_password'];
      $name = $_POST['name'];

      if( $username == "" || $email == "" || $password == '' || $retyped_password == '' || $name == '' ){
        echo "<h2>Fields Left Blank</h2>", "<p>Some Fields were left blank. Please fill up all fields.</p>";
      }

      elseif($password != $retyped_password){
        echo "<h2>Passwords Don't Match</h2>", "<p>The Passwords you entered didn't match</p>";
      }

      else{
        $sql2="SELECT * FROM user where user_email='$email' OR username='$username'";
        $query2=$coursemgt->calldb()->query($sql2);
        $count=$query2->rowCount();


        if($count === 1){
          echo "<label>User Exists.</label>";
        }

        else
        {
         $sql = "INSERT INTO user (username,password,user_email,role) values (?,?,?,?)";
         $query=$coursemgt->calldb()->prepare($sql);
         $query->execute(
          array(
            $username,
            $password,
            $email,
            'admin'
             ));
         echo "<label>Success. Created account. <a href='index.php'>Log In</a></label>";
       }
     }
   }
   ?>
   <style>
    label{
      display: block;
      margin-bottom: 5px;
    }
  </style>
</div>
</body>
</html>
