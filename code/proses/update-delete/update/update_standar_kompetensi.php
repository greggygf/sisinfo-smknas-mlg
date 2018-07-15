<?php
include "../../../../koneksi.php";
$kode_sk = $_POST['kode_sk'];
$kode_mp = $_POST['kode_mp'];
$nama_sk = $_POST['nama_sk'];
$kelas_sk = $_POST['kelas_sk'];

$updateStandarKompetensi = "UPDATE standar_kompetensi set kode_sk='$kode_sk' , kode_mp='$kode_mp', nama_sk='$nama_sk', kelas_sk='$kelas_sk' where kode_sk='$kode_sk'";

$updateStandarKompetensi_query = mysqli_query($connect,$updateStandarKompetensi);

if ($updateStandarKompetensi_query)
{
	header('location:../../../../halaman_utama.php?tabel_standar_kompetensi=$tabel_standar_kompetensi');
}
else
{
	echo "Update gagal dijalankan";
}

?>