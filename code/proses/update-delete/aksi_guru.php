<body>
<?php
include "koneksi.php";
$aksi = strtolower($_POST['proses']);
$kode_guru = $_POST['kode_guru'];

if($aksi == "delete")
{
	$delete_guru = "DELETE from guru where kode_guru='$kode_guru'";

	$delete_guru_query = mysqli_query($connect,$delete_guru);

	if ($delete_guru_query)
	{
		header("location:halaman_utama.php?tabel_guru=$tabel_guru");
	}
	else
	{
		echo "Delete gagal dijalankan";
	}
}

else
{

include "koneksi.php";

$query=mysqli_query($connect,"select * from guru g,mata_pelajaran mp where kode_guru='$kode_guru' and g.kode_mp=mp.kode_mp");
?>

<br>
<center><h2>Update Data Guru</h2></center><br>

 <form action="code/proses/update-delete/update/update_guru.php" method="POST">
        
    <table id="tabel-pendaftaran">
    <?php
	while($isi=mysqli_fetch_array($query)){
	?>
    <tr>
        <td><b>Kode Guru</b></td>
    </tr>
    <tr>
        <td><input type="text" name='kode_guru' size="25px" maxlength="6" style="background-color:#E0DFDF" value="<?php echo $kode_guru; ?>" readonly></td>
    </tr>
    
    <tr>
        <td><b>Nama Guru</b></td>
    </tr>
    <tr>
        <td><input type="text" name="nama_guru" size="25px" maxlength="50" placeholder="ketikkan nama guru.." value="<?php echo $isi['nama_guru']; ?>" required></td>
    </tr>
   
   	<tr>
        <td><b>Mata Pelajaran</b></td>
    </tr>
    <tr>
        <td><input type="text" name='nama_mp' size="25px" maxlength="6" style="background-color:#E0DFDF" value="<?php echo $isi['nama_mp']; ?>" readonly></td>
    </tr>
    
    <tr>
        <td><b>Tempat Lahir</b></td>
    </tr>
    <tr>
        <td><input type="text" name="tempat_lahir" size="25px" maxlength="15" placeholder="ketikkan tempat lahir.." value="<?php echo $isi['tempat_lahir']; ?>" required></td>
    </tr>
    
    <tr>
        <td><b>Tanggal Lahir</b></td>
    </tr>
    <tr>
        <td><input type="date" name="tanggal_lahir" size="25px" value="<?php echo $isi['tanggal_lahir']; ?>" required></td>
    </tr>
    
    <tr>
        <td><b>Jenis Kelamin</b></td>
    </tr>
    <tr>
        <td>
        <?php if ($isi['jenis_kelamin'] == "P") { ?>
        <input type="radio" name="jenis_kelamin" value="P" checked>&nbsp;Perempuan&nbsp;&nbsp;
        <input type="radio" name="jenis_kelamin" value="L">&nbsp;Laki-Laki
        <?php ;} else { ?>
        <input type="radio" name="jenis_kelamin" value="P">&nbsp;Perempuan&nbsp;&nbsp;
        <input type="radio" name="jenis_kelamin" value="L" checked>&nbsp;Laki-Laki
        <?php ;} ?></td>
    </tr>
    
    <tr>
        <td><b>Agama</b></td>
    </tr>
    <tr>
        <td>
    <select name="agama">
    <?php if ($isi['agama'] == "Islam") { ?>
    <option value="" disabled>Pilih Agama</option>
	<option value="Islam" selected>Islam</option>
    <option value="Kristen">Kristen</option>
    <option value="Katolik">Katolik</option>
    <option value="Hindu">Hindu</option>
    <option value="Buddha">Buddha</option>
    <?php ;} else if ($isi['agama'] == "Kristen") { ?>
    <option value="" disabled>Pilih Agama</option>
	<option value="Islam">Islam</option>
    <option value="Kristen" selected>Kristen</option>
    <option value="Katolik">Katolik</option>
    <option value="Hindu">Hindu</option>
    <option value="Buddha">Buddha</option>
    <?php ;} else if ($isi['agama'] == "Katolik") { ?>
    <option value="" disabled>Pilih Agama</option>
	<option value="Islam">Islam</option>
    <option value="Kristen">Kristen</option>
    <option value="Katolik" selected>Katolik</option>
    <option value="Hindu">Hindu</option>
    <option value="Buddha">Buddha</option>
    <?php ;} else if ($isi['agama'] == "Hindu") { ?>
    <option value="" disabled>Pilih Agama</option>
	<option value="Islam">Islam</option>
    <option value="Kristen">Kristen</option>
    <option value="Katolik">Katolik</option>
    <option value="Hindu" selected>Hindu</option>
    <option value="Buddha">Buddha</option>
    <?php ;} else if ($isi['agama'] == "Buddha") { ?>
    <option value="" disabled>Pilih Agama</option>
	<option value="Islam">Islam</option>
    <option value="Kristen">Kristen</option>
    <option value="Katolik">Katolik</option>
    <option value="Hindu">Hindu</option>
    <option value="Buddha" selected>Buddha</option>
    <?php ;} ?></td>
    </tr>
    
    <tr>
        <td><b>Alamat</b></td>
    </tr>
    <tr>
        <td><textarea name="alamat_guru" cols="28" rows="5" maxlength="50" placeholder="ketikkan alamat guru.." required><?php echo $isi['alamat_guru']; ?></textarea>&nbsp;&nbsp;&nbsp;  <input class="button" type="submit" value="Update"></td>
    </tr>
    <?php } ?> 
    
</table>
<?php } ?> 
</form>