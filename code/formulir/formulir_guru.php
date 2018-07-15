<br>
<center><h2>Tambah Data Guru</h2></center><br><br><hr><br>

<form action="code/proses/input/input_guru.php" method="POST">
        
    <table id="tabel-pendaftaran">
    <tr>
        <td><b>Kode Guru</b></td>
    </tr>
    
    <tr>
        <td>
        
		<?php include "koneksi.php";
		$tampilkan_isi = "select count(kode_guru) as jumlah from guru;";
		$tampilkan_isi_sql = mysqli_query($connect,$tampilkan_isi);
		$no = 1;
	
		while ($isi = mysqli_fetch_array($tampilkan_isi_sql))
		{
		$jumlah = $isi['jumlah'];
		?>
        
        <input type="text" name='kode_guru' size="25px" maxlength="6" style="background-color:#E0DFDF" value="GU-<?php echo $no+$jumlah ?>" readonly>
        
        </td>
    </tr>
    <?php ; } ?>
    
    <tr>
        <td><b>Nama Guru</b></td>
    </tr>
    
    <tr>
        <td><input type="text" name="nama_guru" size="25px" maxlength="50" placeholder="ketikkan nama guru.." required></td>
    </tr>
    
    <tr>
        <td><b>Mata Pelajaran yang diajar</b></td>
    </tr>
    
    <tr>
        <td>
        
        <select name="kode_mp" required>
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
    	</option>
    	</td>
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
        <input type="radio" name="jenis_kelamin" value="L">&nbsp;Laki-Laki
        </td>
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
    	<option value="Buddha">Buddha</option>
        </td>
    </tr>
    
    <tr>
        <td><b>Alamat</b></td>
    </tr>
    
    <tr>
        <td><textarea name="alamat_guru" cols="28" rows="5" maxlength="50" placeholder="ketikkan alamat guru.." required></textarea>&nbsp;&nbsp;&nbsp;  <input class="button" type="submit" value="Simpan">
        </td>
    </tr>
    
</table>

</form>