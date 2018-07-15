<?php
include "../../../koneksi.php";
$nis = $_POST['nis'];
$nama_siswa = $_POST['nama_siswa'];
$kelas = $_POST['kelas'];
$kode_jurusan = $_POST['kode_jurusan'];
$tempat_lahir = $_POST['tempat_lahir'];
$tanggal_lahir = $_POST['tanggal_lahir'];
$jenis_kelamin = $_POST['jenis_kelamin'];
$agama = $_POST['agama'];
$alamat_siswa = $_POST['alamat_siswa'];

$insertSiswa = "INSERT INTO siswa values ('$nis','$nama_siswa','$kelas','$kode_jurusan','$tempat_lahir','$tanggal_lahir','$jenis_kelamin','$agama','$alamat_siswa')";

$insertSiswa_query = mysqli_query($connect,$insertSiswa);

if ($insertSiswa_query)
{
	header('location:../../../halaman_utama.php?tabel_siswa=$tabel_siswa');
}
else
{
	echo "Insert gagal dijalankan";
}

?>