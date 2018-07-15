<?php
include "../../../../koneksi.php";
$kode_jurusan = $_POST['kode_jurusan'];
$nama_jurusan = $_POST['nama_jurusan'];

$updateJurusan = "UPDATE jurusan set kode_jurusan='$kode_jurusan' , nama_jurusan='$nama_jurusan' where kode_jurusan='$kode_jurusan'";

$updateJurusan_query = mysqli_query($connect,$updateJurusan);

if ($updateJurusan_query)
{
	header('location:../../../../halaman_utama.php?tabel_jurusan=$tabel_jurusan');
}
else
{
	echo "Update gagal dijalankan";
}

?>