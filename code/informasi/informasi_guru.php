	<?php
	include "koneksi.php";
	
	$informasi = $_SESSION['kode_guru'];
		
	$tampilkan_isi = "select * from `guru` g,`mata_pelajaran` mp where g.kode_mp=mp.kode_mp and kode_guru='$informasi'";
	
	$tampilkan_isi_sql = mysqli_query($connect,$tampilkan_isi);
	
	while ($isi = mysqli_fetch_array($tampilkan_isi_sql))
	{
		$kode_guru = $isi['kode_guru'];
		$nama_guru = $isi['nama_guru'];
		$kode_mp = $isi['kode_mp'];
		$nama_mp = $isi['nama_mp'];
		$tempat_lahir = $isi['tempat_lahir'];
		$tanggal_lahir = $isi['tanggal_lahir'];
		$jenis_kelamin = $isi['jenis_kelamin'];
		$agama = $isi['agama'];
		$alamat_guru = $isi['alamat_guru'];
		
		?> 
        	<br><center><h2>Informasi Guru</h2></center><br><br><hr><br>
        	<table border="0" height="400">
        	<tr>
        		<td><b>KODE GURU&nbsp;</b></td>
                <td width="20">:</td>
                <td><?php echo $kode_guru ?></td>
    		</tr>
            <tr>
        		<td><b>NAMA GURU&nbsp;</b></td>
                <td width="20">:</td>
                <td><?php echo $nama_guru ?></td>
    		</tr>
            <tr>
        		<td><b>MATA PELAJARAN&nbsp;</b></td>
                <td width="20">:</td>
                <td><?php echo $nama_mp ?></td>
    		</tr>
            <tr>
        		<td><b>TTL&nbsp;</b></td>
                <td width="20">:</td>
                <td><?php echo $tempat_lahir ?>, <?php echo $tanggal_lahir ?></td>
    		</tr>
            <tr>
        		<td><b>JENIS KELAMIN&nbsp;</b></td>
                <td width="20">:</td>
                <td><?php echo $jenis_kelamin ?></td>
    		</tr>
            <tr>
        		<td><b>AGAMA&nbsp;</b></td>
                <td width="20">:</td>
                <td><?php echo $agama ?></td>
    		</tr>		
            <tr>
        		<td><b>ALAMAT&nbsp;</b></td>
                <td width="20">:</td>
                <td><?php echo $alamat_guru ?></td>
    		</tr>	
            <form action="halaman_utama.php?aksi_guru=$aksi_guru" method="post">
            <input type="hidden" name="kode_guru" value="<?php echo $kode_guru; ?>">
            <tr>
            
            <td><input class="update" name="proses" type="submit" value="Update"></td>
		</tr>
        </form>
		<?php
		;
	}
	?>
</table>