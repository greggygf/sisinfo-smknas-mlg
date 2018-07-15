<body>
<?php
include "koneksi.php";
$aksi = strtolower($_POST['proses']);
$kode_nilai = $_POST['kode_nilai'];

if($aksi == "delete")
{
	$delete_nilai = "DELETE from nilai where kode_nilai='$kode_nilai'";

	$delete_nilai_query = mysqli_query($connect,$delete_nilai);

	if ($delete_nilai_query)
	{
		header("location:halaman_utama.php?tabel_nilai=$tabel_nilai");
	}
	else
	{
		echo "Delete gagal dijalankan";
	}
}

else
{

include "koneksi.php";

$query=mysqli_query($connect,"select * from nilai n,siswa s,guru g,standar_kompetensi sk,jurusan j where  n.nis=s.nis and n.kode_guru=g.kode_guru and sk.kode_sk=n.kode_sk and s.kode_jurusan = j.kode_jurusan and kode_nilai='$kode_nilai';");
?>

<br>
<center><h2>Update Data Nilai</h2></center><br>

<form action="code/proses/update-delete/update/update_nilai.php" method="POST">
        
    <table id="tabel-pendaftaran">
    <?php
	while($isi=mysqli_fetch_array($query)){
	?>
    <tr>
        <td><b>Kode Nilai</b></td>
    </tr>
    
    <tr>
        <td><input type="text" name="kode_nilai" size="25px" maxlength="50" style="background-color:#E0DFDF" value="<?php echo $kode_nilai ?>" readonly></td>
    </tr>
    
    <tr>
        <td><b>Nama / Jurusan</b></td>
    </tr>
    
    <tr>
        <td><input type="text" name="nis" size="25px" maxlength="50" style="background-color:#E0DFDF" value="<?php echo $isi['nis']; ?> | <?php echo $isi['nama_siswa']; ?> | <?php echo $isi['nama_jurusan']; ?>" readonly></td>
    </tr>
    
    <tr>
        <td><b>Guru</b></td>
    </tr>
    
    <tr>
        <td><input type="text" name="kode_guru" size="25px" maxlength="50" style="background-color:#E0DFDF" value="<?php echo $isi['kode_guru']; ?> | <?php echo $isi['nama_guru']; ?>" readonly></td>
    </tr>
    
    <tr>
        <td><b>Standar Kompetensi</b></td>
    </tr>
    
    <tr>
        <td><input type="text" name="kode_sk" size="25px" maxlength="15" style="background-color:#E0DFDF" value="<?php echo $isi['kode_sk']; ?> | <?php echo $isi['nama_sk']; ?>" readonly></td>
    </tr>
    
    <tr>
        <td><b>Nilai (0-100)</b></td>
    </tr>
    
    <tr>
        <td><input type="text" name="angka_nilai" size="25px" maxlength="3" value="<?php echo $isi['angka_nilai']; ?>" required>&nbsp;&nbsp;&nbsp;  <input class="button" type="submit" value="Update"></td>
    </tr>
    
    <?php } ?> 
</table>

</form>
<?php } ?> 