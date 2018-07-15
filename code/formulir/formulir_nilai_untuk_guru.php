<br>
<center><h2>Tambah Data Nilai</h2></center><br><br><hr><br>

<form action="code/proses/input/input_nilai.php" method="POST">
        
    <table id="tabel-pendaftaran">
    <tr>
        <td><b>Kode Nilai</b></td>
    </tr>
    
    <tr>
        <td>
        
		<?php include "koneksi.php";
		$informasi = $_SESSION['kode_guru'];
		
		$tampilkan_isi = "select count(kode_nilai) as jumlah from nilai;";
		$tampilkan_isi_sql = mysqli_query($connect,$tampilkan_isi);
		$no = 1;
	
		while ($isi = mysqli_fetch_array($tampilkan_isi_sql))
		{
			$jumlah = $isi['jumlah'];
		?>
        <input type="text" name='kode_nilai' size="25px" maxlength="6" style="background-color:#E0DFDF" value="NI-<?php echo $no+$jumlah ?>" readonly>
        
        </td>
    </tr>
    <?php ; } ?>  
    
    <tr>
        <td><b>Guru</b></td>
    </tr>
    
    <tr>
        <td>
      	<?php
		$tampilkan_isi = "select distinct nama_guru from login l,guru g
						  where g.kode_guru='$informasi'";
		$tampilkan_isi_sql = mysqli_query($connect,$tampilkan_isi);
	
		while ($isi = mysqli_fetch_array($tampilkan_isi_sql))
		{
			$nama_guru = $isi['nama_guru'];
		?>
        <input type="text" name='kode_guru' size="25px" maxlength="6" style="background-color:#E0DFDF" value="<?php echo $nama_guru; ?>" readonly>
        
        </td>
    </tr>
	<?php ;} ?>  
    
    <tr>
        <td><b>Siswa</b></td>
    </tr>
    
    <tr>
        <td>
        <select name="nis" required>
        <option value="" disabled selected>Pilih Siswa</option>
        
        <?php include "koneksi.php";
		
		$tampilkan_isi = "select * from `siswa`";
		$tampilkan_isi_sql = mysql_query($tampilkan_isi);
	
		while ($isi = mysql_fetch_array($tampilkan_isi_sql))
		{
			$nis = $isi['nis'];
			$nama_siswa = $isi['nama_siswa'];
		?>
		<option value="<?php echo $nis ?>"><?php echo $nis ?> | <?php echo $nama_siswa ?>
    	<?php
		;
		}
		?>
    	</option>
        </td>
    </tr>
        
    <tr>
        <td><b>Standar Kompetensi</b></td>
    </tr>
    
    <tr>
        <td>
        <select name="kode_sk" required>
        <option value="" disabled selected>Pilih Standar Kompetensi</option>
        <?php include "koneksi.php";
		$tampilkan_isi = "select distinct sk.kode_sk,sk.nama_sk,mp.nama_mp from login l,mata_pelajaran mp,guru g,standar_kompetensi sk
where g.kode_mp = mp.kode_mp and g.kode_guru='$informasi' and g.kode_mp=sk.kode_mp;";
		$tampilkan_isi_sql = mysql_query($tampilkan_isi);
	
		while ($isi = mysql_fetch_array($tampilkan_isi_sql))
		{
			$kode_sk = $isi['kode_sk'];
			$nama_sk = $isi['nama_sk'];
			$nama_mp = $isi['nama_mp'];
		?>
		<option value="<?php echo $kode_sk ?>"><?php echo $kode_sk ?> | <?php echo $nama_mp ?> - <?php echo $nama_sk ?>
    	<?php
		;
		}
		?>
    	</option>
        </td>
    </tr>
    
    <tr>
        <td><b>Nilai (0-100)</b></td>
    </tr>
    
    <tr>
        <td><input type="text" name="angka_nilai" size="25px" maxlength="3" placeholder="ketikkan nilai.." required>&nbsp;&nbsp;&nbsp;  <input class="button" type="submit" value="Simpan"></td>
    </tr>
    
	</table>

</form>