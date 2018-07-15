<?php
include "../../../koneksi.php";
$kode_wali = $_POST['kode_wali'];
$nis = $_POST['nis'];
$nama_ayah = $_POST['nama_ayah'];
$pekerjaan_ayah = $_POST['pekerjaan_ayah'];
$nama_ibu = $_POST['nama_ibu'];
$pekerjaan_ibu = $_POST['pekerjaan_ibu'];
$alamat_wali = $_POST['alamat_wali'];
$no_telp = $_POST['no_telp'];

$insertWaliMurid = "INSERT INTO wali_murid values ('$kode_wali','$nis','$nama_ayah','$pekerjaan_ayah','$nama_ibu','$pekerjaan_ibu','$alamat_wali','$no_telp')";

$insertWaliMurid_query = mysqli_query($connect,$insertWaliMurid);

if ($insertWaliMurid_query)
{
	header('location:../../../halaman_utama.php?tabel_wali_murid=$tabel_wali_murid');
}
else
{
	echo "Insert gagal dijalankan";
}

?>