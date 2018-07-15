<?php
include "../../../koneksi.php";
$kode_jurusan = $_POST['kode_jurusan'];
$nama_jurusan = $_POST['nama_jurusan'];

$insertJurusan = "INSERT INTO jurusan values ('$kode_jurusan','$nama_jurusan')";

$insertJurusan_query = mysqli_query($connect,$insertJurusan);

if ($insertJurusan_query)
{
	header('location:../../../halaman_utama.php?tabel_jurusan=$tabel_jurusan');
}
else
{
	echo "Insert gagal dijalankan";
}

?>