<?php
include "../../../../koneksi.php";
$kode_mp = $_POST['kode_mp'];
$nama_mp = $_POST['nama_mp'];

$updateMapel = "UPDATE mata_pelajaran set kode_mp='$kode_mp' , nama_mp='$nama_mp' where kode_mp='$kode_mp'";

$updateMapel_query = mysqli_query($connect,$updateMapel);

if ($updateMapel_query)
{
	header('location:../../../../halaman_utama.php?tabel_mapel=$tabel_mapel');
}
else
{
	echo "Update gagal dijalankan";
}

?>