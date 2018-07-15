<?php
include "../../../../koneksi.php";
$kode_wali = $_POST['kode_wali'];
$nama_ayah = $_POST['nama_ayah'];
$pekerjaan_ayah = $_POST['pekerjaan_ayah'];
$nama_ibu = $_POST['nama_ibu'];
$pekerjaan_ibu = $_POST['pekerjaan_ibu'];
$alamat_wali = $_POST['alamat_wali'];
$no_telp = $_POST['no_telp'];

session_start();
$informasi = $_SESSION['nis'];

$updateWaliMurid = "UPDATE wali_murid set kode_wali='$kode_wali', nama_ayah='$nama_ayah', pekerjaan_ayah='$pekerjaan_ayah' , nama_ibu='$nama_ibu' , pekerjaan_ibu='$pekerjaan_ibu', alamat_wali='$alamat_wali' , no_telp='$no_telp'  where kode_wali='$kode_wali'";

$updateWaliMurid_query = mysqli_query($connect,$updateWaliMurid);

if ($updateWaliMurid_query)
{
	if($informasi)
	{
	header('location:../../../../halaman_utama.php?informasi_walimurid=$informasi_walimurid');
	}
	else
	{
	header('location:../../../../halaman_utama.php?tabel_wali_murid=$tabel_wali_murid');
	}
}
else
{
	echo "Update gagal dijalankan";
}

?>