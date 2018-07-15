<body>
<?php
include "koneksi.php";
$aksi = strtolower($_POST['proses']);
$nis = $_POST['nis'];


if($aksi == "delete")
{
	
	$delete_siswa = "DELETE from siswa where nis='$nis'";

	$delete_siswa_query = mysqli_query($connect,$delete_siswa);

	if ($delete_siswa_query)
	{
		header("location:halaman_utama.php?tabel_siswa=$tabel_siswa");
	}
	else
	{
		echo "Delete gagal dijalankan";
	}
}

else
{

include "koneksi.php";

$query=mysqli_query($connect,"select * from siswa s,jurusan j where s.kode_jurusan=j.kode_jurusan and nis='$nis';");
?>

<br>
<center><h2>Update Data Siswa</h2></center><br>

 <form action="code/proses/update-delete/update/update_siswa.php" method="POST">
        
    <table id="tabel-pendaftaran">
    <?php
	while($isi=mysqli_fetch_array($query)){
	?>
    <tr>
        <td><b>NIS</b></td>
    </tr>
    <tr>
        <td><input type="text" name="nis" size="25px" maxlength="50" style="background-color:#E0DFDF" value="<?php echo $nis ?>" readonly></td>
    </tr>
    
    <tr>
        <td><b>Nama Siswa</b></td>
    </tr>
    <tr>
        <td><input type="text" name="nama_siswa" size="25px" maxlength="50" placeholder="ketikkan nama siswa.." value="<?php echo $isi['nama_siswa']; ?>" required></td>
    </tr>
    
    <tr>
        <td><b>Kelas </b></td>
    </tr>
    <tr>
        <td>
    <select name="kelas" required>
    <?php if ($isi['kelas'] == "X") { ?>
    <option value="" disabled>Pilih Kelas</option>
	<option value="X" selected>X</option>
    <option value="XI">XI</option>
    <option value="XII">XII</option>
    <?php ;} else if ($isi['kelas'] == "XI") { ?>
    <option value="" disabled>Pilih Kelas</option>
	<option value="X">X</option>
    <option value="XI" selected>XI</option>
    <option value="XII">XII</option>
    <?php ;} else if ($isi['kelas'] == "XII") { ?>
    <option value="" disabled>Pilih Kelas</option>
	<option value="X">X</option>
    <option value="XI">XI</option>
    <option value="XII" selected>XII</option>
    <?php ;} ?></td>
    </tr>
    
    <tr>
        <td><b>Jurusan</b></td>
    </tr>
    <tr>
        <td><input type="text" name="kode_jurusan" size="25px" maxlength="15" style="background-color:#E0DFDF" value="<?php echo $isi['kode_jurusan']; ?> | <?php echo $isi['nama_jurusan']; ?>" readonly></td>
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
        <input type="radio" name="jenis_kelamin" value="L">&nbsp;Laki-Laki</td>
        <?php ;} else { ?>
        <input type="radio" name="jenis_kelamin" value="P" >&nbsp;Perempuan&nbsp;&nbsp;
        <input type="radio" name="jenis_kelamin" value="L" checked>&nbsp;Laki-Laki</td>
        <?php ;} ?>
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
        <td><textarea name="alamat_siswa" cols="28" rows="5" maxlength="50" placeholder="ketikkan alamat siswa.." required><?php echo $isi['alamat_siswa']; ?></textarea>&nbsp;&nbsp;&nbsp;  <input class="button" type="submit" value="Update"></td>
    </tr>
    <?php } ?> 
</table>

</form>
<?php } ?> 