<body>
<?php
include "koneksi.php";
$aksi = strtolower($_POST['proses']);
$kode_sk = $_POST['kode_sk'];

if($aksi == "delete")
{	
	$delete_standar_kompetensi = "DELETE from standar_kompetensi where kode_sk='$kode_sk'";

	$delete_standar_kompetensi_query = mysqli_query($connect,$delete_standar_kompetensi);

	if ($delete_standar_kompetensi_query)
	{
		header("location:halaman_utama.php?tabel_standar_kompetensi=$tabel_standar_kompetensi");
	}
	else
	{
		echo "Delete gagal dijalankan";
	}
}

else
{

include "koneksi.php";

$query=mysqli_query($connect,"select * from mata_pelajaran m,standar_kompetensi s where kode_sk='$kode_sk' and s.kode_mp=m.kode_mp");
?>

<br>
<center><h2>Update Data Standar Kompetensi</h2></center><br>

<form action="code/proses/update-delete/update/update_standar_kompetensi.php" method="POST">
        
    <table id="tabel-pendaftaran">
    <?php
	while($isi=mysqli_fetch_array($query)){
	?>
    <tr>
        <td><b>Kode Standar Kompetensi</b></td>
    </tr>
    
    <tr>
        <td><input type="text" name='kode_sk' size="25px" maxlength="6" style="background-color:#E0DFDF" value="<?php echo $kode_sk; ?>" readonly></td>
    </tr>
    
    <tr>
        <td><b>Mata Pelajaran</b></td>
    </tr>
    
    <tr>
        <td><input type="text" name="kode_mp" size="25px" maxlength="50" style="background-color:#E0DFDF" value="<?php echo $isi['kode_mp']; ?> | <?php echo $isi['nama_mp']; ?>" readonly></td>
    </tr>
    
    <tr>
        <td><b>Nama Standar Kompetensi</b></td>
    </tr>

    <tr>
        <td><input type="text" name='nama_sk' size="25px" maxlength="50" value="<?php echo $isi['nama_sk']; ?>" required></td>
    </tr>
    
    <tr>
        <td><b>Kelas Standar Kompetensi</b></td>
    </tr>
    
    <tr>
        <td>
    <select name="kelas_sk">
    <?php if ($isi['kelas_sk'] == "X") { ?>
    <option value="" disabled>Pilih Kelas</option>
	<option value="X" selected>X</option>
    <option value="XI">XI</option>
    <option value="XII">XII</option>
    <?php ;} else if ($isi['kelas_sk'] == "XI") { ?>
    <option value="" disabled>Pilih Kelas</option>
	<option value="X">X</option>
    <option value="XI" selected>XI</option>
    <option value="XII">XII</option>
    <?php ;} else if ($isi['kelas_sk'] == "XII") { ?>
    <option value="" disabled>Pilih Kelas</option>
	<option value="X">X</option>
    <option value="XI">XI</option>
    <option value="XII" selected>XII</option>
    </select>&nbsp;&nbsp;
    <?php ;} ?><input class="button" type="submit" value="Update"></td>
    </tr>
  
    <?php } ?> 
    
</table>
<?php } ?> 
</form>