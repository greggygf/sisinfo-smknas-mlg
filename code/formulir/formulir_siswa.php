<br>
<center><h2>Tambah Data Siswa</h2></center><br><br><hr><br>

<form action="code/proses/input/input_siswa.php" method="POST">
        
    <table id="tabel-pendaftaran">
    <tr>
        <td><b>NIS</b></td>
    </tr>
    
    <tr>
        <td><?php include "koneksi.php";
	$tampilkan_isi = "select count(nis) as jumlah from siswa;";
	$tampilkan_isi_sql = mysqli_query($connect,$tampilkan_isi);
	$no = 1;
	
	while ($isi = mysqli_fetch_array($tampilkan_isi_sql))
	{
		$jumlah = $isi['jumlah'];
	?><input type="text" name='nis' size="25px" maxlength="6" style="background-color:#E0DFDF" value="SS-<?php echo $no+$jumlah ?>" readonly></td>
    </tr>
    <?php ; } ?>
    
    <tr>
        <td><b>Nama Siswa</b></td>
    </tr>
    <tr>
        <td><input type="text" name="nama_siswa" size="25px" maxlength="50" placeholder="ketikkan nama siswa.." required></td>
    </tr>
    
    <tr>
    <td><b>Kelas</b></td>
    </tr>
    <tr>
        <td><select name="kelas" required>
    <option value="" disabled selected>Pilih Kelas</option>
	<option value="X">X</option>
    <option value="XI">XI</option>
    <option value="XII">XII</option>&nbsp;</select>&nbsp;&nbsp;</td>

    </tr>
    
    <tr>
        <td><b>Jurusan</b></td>
    </tr>
    <tr>
        <td><select name="kode_jurusan" required>
        <option value="" disabled selected>Pilih Jurusan</option>
                <?php include "koneksi.php";
	$tampilkan_isi = "select * from `jurusan`";
	$tampilkan_isi_sql = mysqli_query($connect,$tampilkan_isi);
	
	while ($isi = mysqli_fetch_array($tampilkan_isi_sql))
	{
		$kode_jurusan = $isi['kode_jurusan'];
		$nama_jurusan = $isi['nama_jurusan'];
	?>
	<option value="<?php echo $kode_jurusan ?>"><?php echo $kode_jurusan ?> | <?php echo $nama_jurusan ?>
    <?php
		;
	}
	?>
    </option></td>
    </tr>
    
    <tr>
        <td><b>Tempat Lahir</b></td>
    </tr>
    <tr>
        <td><input type="text" name="tempat_lahir" size="25px" maxlength="15" placeholder="ketikkan tempat lahir.." required></td>
    </tr>
    
    <tr>
        <td><b>Tanggal Lahir</b></td>
    </tr>
    <tr>
        <td><input type="date" name="tanggal_lahir" size="25px" required></td>
    </tr>
    
    <tr>
        <td><b>Jenis Kelamin</b></td>
    </tr>
    <tr>
        <td>
        <input type="radio" name="jenis_kelamin" value="P" required>&nbsp;Perempuan&nbsp;&nbsp;
        <input type="radio" name="jenis_kelamin" value="L">&nbsp;Laki-Laki</td>
    </tr>
    
    <tr>
        <td><b>Agama</b></td>
    </tr>
    <tr>
        <td>
    <select name="agama" required>
    <option value="" disabled selected>Pilih Agama</option>
	<option value="Islam">Islam</option>
    <option value="Kristen">Kristen</option>
    <option value="Katolik">Katolik</option>
    <option value="Hindu">Hindu</option>
    <option value="Buddha">Buddha</option></td>
    </tr>
    
    <tr>
        <td><b>Alamat</b></td>
    </tr>
    <tr>
        <td><textarea name="alamat_siswa" cols="28" rows="5" maxlength="50" placeholder="ketikkan alamat siswa.." required></textarea>&nbsp;&nbsp;&nbsp;  <input class="button" type="submit" value="Simpan"></td>
    </tr>
    
</table>

</form>