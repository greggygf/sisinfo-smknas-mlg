<?php
include "../../../../koneksi.php";
$kode_nilai = $_POST['kode_nilai'];
$nis = $_POST['nis'];
$kode_guru = $_POST['kode_guru'];
$kode_sk = $_POST['kode_sk'];
$angka_nilai = $_POST['angka_nilai'];

$updateNilai = "UPDATE nilai set angka_nilai='$angka_nilai' where kode_nilai='$kode_nilai'";

$updateNilai_query = mysqli_query($connect,$updateNilai);

if ($updateNilai_query)
{
	header('location:../../../../halaman_utama.php?tabel_nilai=$tabel_nilai');
}
else
{
	echo "Update gagal dijalankan";
}

?>