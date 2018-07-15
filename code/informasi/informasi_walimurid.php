	<?php
	include "koneksi.php";
	
	$informasi = $_SESSION['nis'];
		
	$tampilkan_isi = "select * from siswa s,wali_murid w where s.nis=w.nis and w.nis='$informasi'";
	
	$tampilkan_isi_sql = mysqli_query($connect,$tampilkan_isi);
	
	while ($isi = mysqli_fetch_array($tampilkan_isi_sql))
	{
		$kode_wali = $isi['kode_wali'];
		$nama_siswa = $isi['nama_siswa'];
		$nama_ayah = $isi['nama_ayah'];
		$pekerjaan_ayah = $isi['pekerjaan_ayah'];
		$nama_ibu = $isi['nama_ibu'];
		$pekerjaan_ibu = $isi['pekerjaan_ibu'];
		$alamat_wali = $isi['alamat_wali'];
		$no_telp = $isi['no_telp'];
		
		?> 
        	<br><center><h2>Informasi Wali Murid</h2></center><br><br><hr><br>
        	<table border="0" height="400">
        	<tr>
        		<td><b>NAMA AYAH&nbsp;</b></td>
                <td width="20">:</td>
                <td><?php echo $nama_ayah ?></td>
    		</tr>
            <tr>
        		<td><b>PEKERJAAN AYAH&nbsp;</b></td>
                <td width="20">:</td>
                <td><?php echo $pekerjaan_ayah ?></td>
    		</tr>
            <tr>
        		<td><b>NAMA IBU&nbsp;</b></td>
                <td width="20">:</td>
                <td><?php echo $nama_ibu ?></td>
    		</tr>
            <tr>
        		<td><b>PEKERJAAN IBU&nbsp;</b></td>
                <td width="20">:</td>
                <td><?php echo $pekerjaan_ibu ?></td>
    		</tr>
            <tr>
        		<td><b>ALAMAT&nbsp;</b></td>
                <td width="20">:</td>
                <td><?php echo $alamat_wali ?></td>
    		</tr>
            <tr>
        		<td><b>NO TELP&nbsp;</b></td>
                <td width="20">:</td>
                <td><?php echo $no_telp ?></td>
    		</tr>		
            <form action="halaman_utama.php?aksi_wali_murid=$aksi_wali_murid" method="post">
            <input type="hidden" name="kode_wali" value="<?php echo $kode_wali; ?>">
            <tr>
            
            <td><input class="update" name="proses" type="submit" value="Update"></td>
		</tr>
        </form>
		<?php
		;
	}
	?>
</table>