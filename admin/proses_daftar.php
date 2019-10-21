<?php
include_once 'securimage/securimage.php';

if (!isset($_SESSION['username'])){
	session_start();
}
require('../connection.php');
if(isset($_POST['register'])){
	$securimage = new Securimage();
    if ($securimage->check($_POST['captcha_code'])==false){
	    $_SESSION['alert'] = "Kode captcha tidak tepat";
	    header("location: register.php");
  	} else{
		$username       = $_POST['username'];
		$password       = $_POST['password'];
		$password2		= $_POST['password2'];
		
		$sql = "SELECT * FROM admin WHERE admin_uname = '$username'";
		$resultsql = mysqli_query($con, $sql);
		$jumlah = mysqli_num_rows($resultsql);
		if ($jumlah > 0) {
			$_SESSION['alert'] = "Username sudah ada";
    		header("location: register.php");
		}else{
			if($password==$password2){
				$sql = "INSERT INTO admin (admin_uname, admin_pass ) 
				VALUES ('$username', '$password')";
				mysqli_query($con, $sql);
				$_SESSION['alert2'] = "Akun Admin Berhasil Dibuat, <a href='halaman_admin.php'>klik</a> untuk kembali ke dashboard admin";
    			header("location: register.php");
			}else{ 
			 	$_SESSION['alert'] = "Password tidak sama, silahkan ketik ulang password anda!";
    			header("location: register.php");
			}			
		}	
  	}
	
}