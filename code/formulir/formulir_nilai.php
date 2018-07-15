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
        <td><b>Siswa</b></td>
    </tr>
    
    <tr>
        <td>
        <select name="nis" required>
        <option value="" disabled selected>Pilih Siswa</option>
        
        <?php include "koneksi.php";
		
		$tampilkan_isi = "select * from `siswa`";
		$tampilkan_isi_sql = mysqli_query($connect,$tampilkan_isi);
	
		while ($isi = mysqli_fetch_array($tampilkan_isi_sql))
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
        <td><b>Guru</b></td>
    </tr>
    
    <tr>
        <td>
        <select name="kode_guru" required>
        <option value="" disabled selected>Pilih Guru</option>
                
		<?php 
		include "koneksi.php";
		$tampilkan_isi = "select * from `guru`";
		$tampilkan_isi_sql = mysqli_query($connect,$tampilkan_isi);
	
		while ($isi = mysqli_fetch_array($tampilkan_isi_sql))
		{
			$kode_guru = $isi['kode_guru'];
			$nama_guru = $isi['nama_guru'];
		?>
		<option value="<?php echo $kode_guru ?>"><?php echo $kode_guru ?> | <?php echo $nama_guru ?>
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
		$tampilkan_isi = "select * from standar_kompetensi s,mata_pelajaran m where s.kode_mp = m.kode_mp; ";
		$tampilkan_isi_sql = mysqli_query($connect,$tampilkan_isi);
	
		while ($isi = mysqli_fetch_array($tampilkan_isi_sql))
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