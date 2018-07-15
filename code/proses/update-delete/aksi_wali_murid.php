<body>
<?php
include "koneksi.php";
$aksi = strtolower($_POST['proses']);
$kode_wali = $_POST['kode_wali'];


if($aksi == "delete")
{
	
	$delete_wali_murid = "DELETE from wali_murid where kode_wali='$kode_wali'";

	$delete_wali_murid_query = mysqli_query($connect,$delete_wali_murid);

	if ($delete_wali_murid_query)
	{
		header("location:halaman_utama.php?tabel_wali_murid=$tabel_wali_murid");
	}
	else
	{
		echo "Delete gagal dijalankan";
	}
}

else
{

include "koneksi.php";

$query=mysqli_query($connect,"select * from wali_murid w,siswa s where w.nis=s.nis and kode_wali='$kode_wali';");
?>

<br>
<center><h2>Update Data Wali Murid</h2></center><br>

 <form action="code/proses/update-delete/update/update_wali_murid.php" method="POST">
        
    <table id="tabel-pendaftaran">
    <?php
	while($isi=mysqli_fetch_array($query)){
	?>
    <tr>
        <td><b>Kode Wali</b></td>
    </tr>
    <tr>
        <td><input type="text" name="kode_wali" size="25px" maxlength="50" style="background-color:#E0DFDF" value="<?php echo $kode_wali ?>" readonly></td>
    </tr>
    
    <tr>
        <td><b>Nama Siswa</b></td>
    </tr>
    <tr>
        <td><input type="text" name="nis" size="25px" maxlength="50" style="background-color:#E0DFDF" value="<?php echo $isi['nis']; ?> | <?php echo $isi['nama_siswa']; ?>" readonly></td>
    </tr>
    
    <tr>
        <td><b>Nama Ayah</b></td>
    </tr>
    <tr>
        <td><input type="text" name="nama_ayah" size="25px" maxlength="50" value="<?php echo $isi['nama_ayah']; ?>" required></td>
    </tr>
    
    <tr>
        <td><b>Pekerjaan Ayah</b></td>
    </tr>
    <tr>
        <td><input type="text" name="pekerjaan_ayah" size="25px" maxlength="15" value="<?php echo $isi['pekerjaan_ayah']; ?>" required></td>
    </tr>
    
    <tr>
        <td><b>Nama Ibu</b></td>
    </tr>
    <tr>
        <td><input type="text" name="nama_ibu" size="25px" maxlength="50" value="<?php echo $isi['nama_ibu']; ?>" required></td>
    </tr>
    
    <tr>
        <td><b>Pekerjaan Ibu</b></td>
    </tr>
    <tr>
        <td><input type="text" name="pekerjaan_ibu" size="25px" maxlength="15" value="<?php echo $isi['pekerjaan_ibu']; ?>" required></td>
    </tr>
    
    <tr>
        <td><b>Alamat</b></td>
    </tr>
    <tr>
        <td><textarea name="alamat_wali" cols="28" rows="5" maxlength="50" placeholder="ketikkan alamat wali.." required><?php echo $isi['alamat_wali']; ?></textarea></td>
    </tr>
    
    <tr>
        <td><b>No.Telp</b></td>
    </tr>
    <tr>
        <td><input type="text" name="no_telp" size="25px" maxlength="15" value="<?php echo $isi['no_telp']; ?>" required>&nbsp;&nbsp;&nbsp;  <input class="button" type="submit" value="Update"></td>
    </tr>
    
    <?php } ?> 
</table>

</form>
<?php } ?> 