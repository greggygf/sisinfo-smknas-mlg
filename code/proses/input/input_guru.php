<?php
include "../../../koneksi.php";
$kode_guru = $_POST['kode_guru'];
$nama_guru = $_POST['nama_guru'];
$kode_mp = $_POST['kode_mp'];
$tempat_lahir = $_POST['tempat_lahir'];
$tanggal_lahir = $_POST['tanggal_lahir'];
$jenis_kelamin = $_POST['jenis_kelamin'];
$agama = $_POST['agama'];
$alamat_guru = $_POST['alamat_guru'];

$insertGuru = "INSERT INTO guru values ('$kode_guru','$nama_guru','$kode_mp','$tempat_lahir','$tanggal_lahir','$jenis_kelamin','$agama','$alamat_guru')";

$insertGuru_query = mysqli_query($connect,$insertGuru);

if ($insertGuru_query)
{
	header('location:../../../halaman_utama.php?tabel_guru=$tabel_guru');
}
else
{
	echo "Insert gagal dijalankan";
}

?>