<?php
include "../../../koneksi.php";
$username = $_POST['username'];
$password = $_POST['password'];
$type_user = $_POST['type_user'];
$kode_guru = $_POST['kode_guru'];
$nis = $_POST['nis'];

$insertLogin = "INSERT INTO login values ('$username','$password','$type_user','$kode_guru','$nis')";

$insertLogin_query = mysqli_query($connect,$insertLogin);

if ($insertLogin_query)
{
	header('location:../../../halaman_utama.php?tabel_login=$tabel_login');
}
else
{
	echo "Insert gagal dijalankan";
}

?>