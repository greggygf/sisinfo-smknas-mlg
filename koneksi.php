<?php
	$host = "localhost";
	$user = "root";
	$password = "";
	$database = "sekolah";
	
	$connect = mysqli_connect($host,$user,$password,$database) or die (mysql_error());
	//mysql_select_db($database) or die (mysql_error());
?>