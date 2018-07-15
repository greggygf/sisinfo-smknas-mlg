<?php
include "../../../koneksi.php";
$kode_mp = $_POST['kode_mp'];
$nama_mp = $_POST['nama_mp'];

$insertMapel = "INSERT INTO mata_pelajaran values ('$kode_mp','$nama_mp')";

$insertMapel_query = mysqli_query($connect,$insertMapel);

if ($insertMapel_query)
{
	header('location:../../../halaman_utama.php?tabel_mapel=$tabel_mapel');
}
else
{
	echo "Insert gagal dijalankan";
}

?>