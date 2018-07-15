<body>
<?php
include "koneksi.php";
$aksi = strtolower($_POST['proses']);
$kode_jurusan = $_POST['kode_jurusan'];


if($aksi == "delete")
{
	$delete_jurusan = "DELETE from jurusan where kode_jurusan='$kode_jurusan'";

	$delete_jurusan_query = mysqli_query($connect,$delete_jurusan);

	if ($delete_jurusan_query)
	{
		header("location:halaman_utama.php?tabel_jurusan=$tabel_jurusan");
	}
	else
	{
		echo "Delete gagal dijalankan";
	}
}

else
{

include "koneksi.php";

$query=mysqli_query($connect,"select * from jurusan where kode_jurusan='$kode_jurusan'");
?>

<br>
<center><h2>Update Data Jurusan</h2></center><br>

 <form action="code/proses/update-delete/update/update_jurusan.php" method="POST">
        
    <table id="tabel-pendaftaran">
    <?php
	while($isi=mysqli_fetch_array($query)){
	?>
    <tr>
        <td><b>Kode Jurusan</b></td>
    </tr>
    <tr>
        <td><input type="text" name='kode_jurusan' size="25px" maxlength="6" style="background-color:#E0DFDF" value="<?php echo $kode_jurusan;?>" readonly></td>
    </tr>
    
    <tr>
        <td><b>Nama Jurusan</b></td>
    </tr>
    <tr>
        <td><input type="text" name="nama_jurusan" size="25px" maxlength="35" placeholder="ketikkan nama jurusan." value="<?php echo $isi['nama_jurusan'];?>" required>&nbsp;&nbsp;&nbsp;  <input class="button" type="submit" value="Update"></td>
    </tr>
    <?php } ?> 
</table>
<?php
}
?>