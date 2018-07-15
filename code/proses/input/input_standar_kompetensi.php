<?php
include "../../../koneksi.php";
$kode_sk = $_POST['kode_sk'];
$kode_mp = $_POST['kode_mp'];
$nama_sk = $_POST['nama_sk'];
$kelas_sk = $_POST['kelas_sk'];

$insertSK = "INSERT INTO standar_kompetensi values ('$kode_sk','$kode_mp','$nama_sk','$kelas_sk')";

$insertSK_query = mysqli_query($connect,$insertSK);

if ($insertSK_query)
{
	header('location:../../../halaman_utama.php?tabel_standar_kompetensi=$tabel_standar_kompetensi');
}
else
{
	echo "Insert gagal dijalankan";
}

?>