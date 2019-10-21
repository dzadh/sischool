<?php
	date_default_timezone_set("Asia/Jakarta");
	$dbhost = "localhost";
	$dbuser = "root";
	$dbpass = "";
	$dbname = "sischool";
	$con=mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
	if(!$con) {
		die("Connection failed" . mysqli_connect_error());
	}
?>
