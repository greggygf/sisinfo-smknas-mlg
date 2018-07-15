<?php
include "../../../../koneksi.php";
$nis = $_POST['nis'];
$nama_siswa = $_POST['nama_siswa'];
$kelas = $_POST['kelas'];
$kode_jurusan = $_POST['kode_jurusan'];
$tempat_lahir = $_POST['tempat_lahir'];
$tanggal_lahir = $_POST['tanggal_lahir'];
$jenis_kelamin = $_POST['jenis_kelamin'];
$agama = $_POST['agama'];
$alamat_siswa = $_POST['alamat_siswa'];

session_start();
$informasi = $_SESSION['nis'];

$updateSiswa = "UPDATE siswa set nis='$nis' , nama_siswa='$nama_siswa', kelas='$kelas', kode_jurusan='$kode_jurusan' , tempat_lahir='$tempat_lahir' , tanggal_lahir='$tanggal_lahir', jenis_kelamin='$jenis_kelamin' , agama='$agama' , alamat_siswa='$alamat_siswa'  where nis='$nis'";

$updateSiswa_query = mysqli_query($connect,$updateSiswa);

if ($updateSiswa_query)
{
	if($informasi)
	{
	header('location:../../../../halaman_utama.php?informasi_siswa=$informasi_siswa');
	}
	else
	{
	header('location:../../../../halaman_utama.php?tabel_siswa=$tabel_siswa');
	}
}
else
{
	echo "Update gagal dijalankan";
}

?>