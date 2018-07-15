<?php
include "../../../../koneksi.php";
$username = $_POST['username'];
$password = $_POST['password'];
$type_user = $_POST['type_user'];

$updateLogin = "UPDATE login set username='$username' , password='$password' , type_user='$type_user' where username='$username'";

$updateLogin_query = mysqli_query($connect,$updateLogin);

if ($updateLogin_query)
{
	header('location:../../../../halaman_utama.php?tabel_login=$tabel_login');
}
else
{
	echo "Update gagal dijalankan";
}

?>