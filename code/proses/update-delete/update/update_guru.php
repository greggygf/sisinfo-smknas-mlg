<?php
include "../../../../koneksi.php";
$kode_guru = $_POST['kode_guru'];
$nama_guru = $_POST['nama_guru'];
$tempat_lahir = $_POST['tempat_lahir'];
$tanggal_lahir = $_POST['tanggal_lahir'];
$jenis_kelamin = $_POST['jenis_kelamin'];
$agama = $_POST['agama'];
$alamat_guru = $_POST['alamat_guru'];

session_start();
$informasi = $_SESSION['kode_guru'];

$updateGuru = "UPDATE guru set kode_guru='$kode_guru' , nama_guru='$nama_guru', tempat_lahir='$tempat_lahir', tanggal_lahir='$tanggal_lahir' , jenis_kelamin='$jenis_kelamin' , agama='$agama', alamat_guru='$alamat_guru' where kode_guru='$kode_guru'";

$updateGuru_query = mysqli_query($connect,$updateGuru);

if ($updateGuru_query)
{
	if($informasi)
	{
	header('location:../../../../halaman_utama.php?informasi_guru=$informasi_guru');
	}
	else
	{
	header('location:../../../../halaman_utama.php?tabel_guru=$tabel_guru');
	}
}
else
{
	echo "Update gagal dijalankan";
}

?>