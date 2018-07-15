<body>
<?php
include "koneksi.php";
$aksi = strtolower($_POST['proses']);
$kode_mp = $_POST['kode_mp'];


if($aksi == "delete")
{
	
	$delete_mapel = "DELETE from mata_pelajaran where kode_mp='$kode_mp'";

	$delete_mapel_query = mysqli_query($connect,$delete_mapel);

	if ($delete_mapel_query)
	{
		header("location:halaman_utama.php?tabel_mapel=$tabel_mapel");
	}
	else
	{
		echo "Delete gagal dijalankan";
	}
}

else
{

include "koneksi.php";

$query=mysqli_query($connect,"select * from mata_pelajaran where kode_mp='$kode_mp'");
?>

<br>
<center><h2>Update Data Mata Pelajaran</h2></center><br>

 <form action="code/proses/update-delete/update/update_mapel.php" method="POST">
        
    <table id="tabel-pendaftaran">
    <?php
	while($isi=mysqli_fetch_array($query)){
	?>
    <tr>
        <td><b>Kode Mata Pelajaran</b></td>
    </tr>
    <tr>
        <td><input type="text" name='kode_mp' size="25px" maxlength="6" style="background-color:#E0DFDF" value="<?php echo $kode_mp;?>" readonly></td>
    </tr>
    
    <tr>
        <td><b>Nama Mata Pelajaran</b></td>
    </tr>
    <tr>
        <td><input type="text" name="nama_mp" size="25px" maxlength="35" placeholder="ketikkan nama jurusan." value="<?php echo $isi['nama_mp'];?>" required>&nbsp;&nbsp;&nbsp;  <input class="button" type="submit" value="Update"></td>
    </tr>
    <?php } ?> 
</table>
<?php
}
?>
</form>