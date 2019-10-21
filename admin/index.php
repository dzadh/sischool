<?php
session_start();
if (isset($_SESSION['username'])){
  echo "<script language=\"javascript\">alert(\"Anda Sudah Login\");document.location.href='halaman_admin.php';</script>";  
 }
require('../connection.php');
include "koneksi.php";
include_once 'securimage/securimage.php';

IF(ISSET($_POST['login'])){
  $securimage = new Securimage();

  if ($securimage->check($_POST['captcha_code'])==false){
    $alert = "Kode captcha tidak tepat";
  }
  else{
    $username = stripslashes($_REQUEST['username']);
    $username = mysqli_real_escape_string($con,$username);
    $password = stripslashes($_REQUEST['password']);
    $password = mysqli_real_escape_string($con,$password);
    $query = "SELECT * FROM admin WHERE admin_uname='$username'
              and admin_pass='$password'";
    $result = mysqli_query($con,$query) or die(mysql_error());
    $rows = mysqli_num_rows($result);
    if($rows==1){
      $_SESSION['username'] = $username;
      header("Location: halaman_admin.php");
    }else{
      $alert = 'Username atau Password Salah!';
    }
  }
  
}
?>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Login Admin</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">

  <link rel="stylesheet" href="dist/css/skin-blue-light.min.css">

</head>
<body class="skin-blue-light fixed layout-top-nav">
  <div class="wrapper">
    <header class="main-header">
      <nav class="navbar navbar-static-top">
        <div class="container">
          <div class="navbar-header">
            <!--               <a href="index.html" class="navbar-brand-img">  <img src="dist/img/logo.png" alt="User Image" width="50px" ></a> -->
            <a href="index.php" class="navbar-brand logo2"><img src="../images/logo.png" alt="Header image" width="50px" height="47px">
             <a href="index.php" class="navbar-brand "><b> Sistem Informasi </b>School
             </a>
          </div>
          <div class="collapse navbar-collapse pull-right" id="navbar-collapse">
           <a href="index.html" class="navbar-brand"></a>
           
        </div><!-- /.navbar-collapse -->
      </div><!-- /.container-fluid -->
    </nav>
  </header>
  <div class="content-wrapper">
    <div class="container">
      <!-- Content Header (Page header) -->
      <section class="content-header ">
      </section>
      <!-- Main content -->
      <div class="col-md-3">
      </div>
       <div class="col-md-6">
      <section class="content">
        </br>
        </br>
        <div class="box box-default">

          <div class="box-body">

          <div class="col-xs-12 col-sm-12 col-md-10 col-sm-offset-2 col-md-offset-1">
          <form action="index.php" method="POST">
            <h2 class="tengah"><b>LOGIN ADMIN</b></h2>
            <hr class="colorgraph">
            <?php
             if(isset($alert)){
              ?>
              <div class="alert alert-danger"><?php echo $alert; ?></div>
              <?php
            }
               unset($_SESSION['alert']);
            ?>
            <div class="form-group has-feedback">
               <input type="text" class="form-control input-lg" name="username" id="username" required placeholder="Username" tabindex="4"/>
               <span class="fa fa-user form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
              <input type="password" class="form-control input-lg" id="password" name="password" required ="Password" placeholder="Password" tabindex="4">
              <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>
            <div class="row">
              <div class="col-xs-2 col-sm-3 col-md-3">
                <input type="hidden" name="token" value="MyFormPage">
                <img id="captcha" src="securimage/securimage_show.php" alt="chaptcha image"/>
                <br/>        
              </div>
            </div>
            <label>
              Enter Image:
            </label>
            <div class="row">
              <div class="col-xs-12 col-md-6">
                <input class="form-control" type="text" name="captcha_code" size="10" maxlength="6" tabindex="4"/>
              </div>
              <div class="col-xs-12 col-md-6">
                <a href="#" onclick="document.getElementById('captcha').src='securimage/securimage_show.php?'+ Math.random(); return false">
                  New captcha
                </a>
              </div>
            </div>
            <hr class="colorgraph">
            <div class="row"> 
              <div class="col-xs-12 col-md-6"><input type="submit" value="Login" name="login"  class="btn btn-primary btn-block btn-lg" tabindex="7"></div>             
            </div>
          </form>
          </br>
      </div>
    </div><!-- /.box-body -->
  </div><!-- /.box -->
  </div>
</section><!-- /.content -->
</div><!-- /.container -->
</div><!-- /.content-wrapper -->
<footer class="main-footer">
  <div class="container tengah">
    <strong>Copyright © 2017 <a href="index.php">Sistem Informasi School</a></strong> 
  </div><!-- /.container -->
</footer>
</div><!-- ./wrapper -->
<!-- jQuery 2.1.4 -->
<script src="plugins/jQuery/jQuery-2.1.4.min.js"></script>
<!-- Bootstrap 3.3.5 -->
<script src="bootstrap/js/bootstrap.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/app.min.js"></script>
</body>
</html>