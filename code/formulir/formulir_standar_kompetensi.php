<br>
<center><h2>Tambah Data Standar Kompetensi</h2></center><br><br><hr><br>

 <form action="code/proses/input/input_standar_kompetensi.php" method="POST">
        
     <table id="tabel-pendaftaran">
    <tr>
        <td><b>Kode Standar Kompetensi</b></td>
    </tr>
    <tr>
        <td><?php include "koneksi.php";
	$tampilkan_isi = "select count(kode_sk) as jumlah from standar_kompetensi;";
	$tampilkan_isi_sql = mysqli_query($connect,$tampilkan_isi);
	$no = 1;
	
	while ($isi = mysqli_fetch_array($tampilkan_isi_sql))
	{
		$jumlah = $isi['jumlah'];
	?><input type="text" name='kode_sk' size="25px" maxlength="6" style="background-color:#E0DFDF" value="SK-<?php echo $no+$jumlah ?>" readonly></td>
    </tr>
    <?php ; } ?>
    
    <tr>
        <td><b>Mata Pelajaran</b></td>
    </tr>
    <tr>
        <td><select name="kode_mp" required>
        <option value="" disabled selected>Pilih Mata Pelajaran</option>
                <?php include "koneksi.php";
	$tampilkan_isi = "select * from `mata_pelajaran`";
	$tampilkan_isi_sql = mysqli_query($connect,$tampilkan_isi);
	
	while ($isi = mysqli_fetch_array($tampilkan_isi_sql))
	{
		$kode_mp = $isi['kode_mp'];
		$nama_mp = $isi['nama_mp'];
	?>
	<option value="<?php echo $kode_mp ?>"><?php echo $kode_mp ?> | <?php echo $nama_mp ?>
    <?php
		;
	}
	?>
    </option></td>
    </tr>
    
    <td><b>Nama Standar Kompetensi</b></td>
    </tr>
    <tr>
        <td><input type="text" name="nama_sk" size="25px" maxlength="50" placeholder="ketikkan nama standar kompetensi.." required></td>
    </tr>
    <tr>
    <td><b>Kelas Standar Kompetensi</b></td>
    </tr>
    <tr>
        <td><select name="kelas_sk" required>
    <option value="" disabled selected>Pilih Kelas Standar Kompetensi</option>
	<option value="X">X</option>
    <option value="XI">XI</option>
    <option value="XII">XII</option>&nbsp;</select>&nbsp;&nbsp;<input class="button" type="submit" value="Simpan"></td>

    </tr>
    
</table>

</form>