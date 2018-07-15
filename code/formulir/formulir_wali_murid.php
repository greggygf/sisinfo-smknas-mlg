<br>
<center><h2>Tambah Data Wali Murid</h2></center><br><br><hr><br>

 <form action="code/proses/input/input_wali_murid.php" method="POST">
        
     <table id="tabel-pendaftaran">
    <tr>
        <td><b>Kode Wali</b></td>
    </tr>
    <tr>
        <td><?php include "koneksi.php";
	$tampilkan_isi = "select count(kode_wali) as jumlah from wali_murid;";
	$tampilkan_isi_sql = mysqli_query($connect,$tampilkan_isi);
	$no = 1;
	
	while ($isi = mysqli_fetch_array($tampilkan_isi_sql))
	{
		$jumlah = $isi['jumlah'];
	?><input type="text" name='kode_wali' size="25px" maxlength="6" style="background-color:#E0DFDF" value="WA-<?php echo $no+$jumlah ?>" readonly></td>
    </tr>
    <?php ; } ?>
    
    <tr>
        <td><b>Siswa dari</b></td>
    </tr>
    <tr>
        <td><select name="nis" required>
        <option value="" disabled selected>Pilih Siswa</option>
                <?php include "koneksi.php";
	$tampilkan_isi = "select s.nis,nama_siswa from siswa s
					  left outer join wali_murid w
					  ON s.nis = w.nis
					  WHERE w.kode_wali is NULL;";
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
    </option></td>
    </tr>
    
    <tr>
        <td><b>Nama Ayah</b></td>
    </tr>
    <tr>
        <td><input type="text" name="nama_ayah" size="25px" maxlength="50" placeholder="ketikkan nama ayah.." required></td>
    </tr>
    
    <tr>
        <td><b>Pekerjaan Ayah</b></td>
    </tr>
    <tr>
        <td><input type="text" name="pekerjaan_ayah" size="25px" maxlength="15" placeholder="ketikkan pekerjaan ayah.." required></td>
    </tr>
    
    <tr>
        <td><b>Nama Ibu</b></td>
    </tr>
    <tr>
        <td><input type="text" name="nama_ibu" size="25px" maxlength="50" placeholder="ketikkan nama ibu.." required></td>
    </tr>
    
    <tr>
        <td><b>Pekerjaan Ibu</b></td>
    </tr>
    <tr>
        <td><input type="text" name="pekerjaan_ibu" size="25px" maxlength="15" placeholder="ketikkan pekerjaan ibu.." required></td>
    </tr>
    
    <tr>
        <td><b>Alamat Wali</b></td>
    </tr>
    <tr>
        <td><textarea name="alamat_wali" cols="28" rows="5" maxlength="50" placeholder="ketikkan alamat wali.." required></textarea></td>
    </tr>
    
    <tr>
        <td><b>No.Telepon</b></td>
    </tr>
    <tr>
        <td><input type="text" name="no_telp" size="25px" maxlength="13" placeholder="ketikkan no.telepon.." required>&nbsp;&nbsp;&nbsp;  <input class="button" type="submit" value="Simpan"></td>
    </tr>
    
</table>

</form>