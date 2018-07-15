	<?php
	include "koneksi.php";
	
	$informasi = $_SESSION['nis'];
		
	$tampilkan_isi = "select * from siswa s,jurusan j where s.kode_jurusan=j.kode_jurusan and nis='$informasi'  ";
	
	$tampilkan_isi_sql = mysqli_query($connect,$tampilkan_isi);
	
	while ($isi = mysqli_fetch_array($tampilkan_isi_sql))
	{
		$nis = $isi['nis'];
		$nama_siswa = $isi['nama_siswa'];
		$kelas = $isi['kelas'];
		$nama_jurusan = $isi['nama_jurusan'];
		$tempat_lahir = $isi['tempat_lahir'];
		$tanggal_lahir = $isi['tanggal_lahir'];
		$jenis_kelamin = $isi['jenis_kelamin'];
		$agama = $isi['agama'];
		$alamat_siswa = $isi['alamat_siswa'];
		
		?> 
        	<br><center><h2>Informasi Siswa</h2></center><br><br><hr><br>
            
        	<table border="0" height="400">
        	<tr>
        		<td><b>NIS&nbsp;</b></td>
                <td width="20">:</td>
                <td><?php echo $nis ?></td>
    		</tr>
            <tr>
        		<td><b>NAMA&nbsp;</b></td>
                <td width="20">:</td>
                <td><?php echo $nama_siswa ?></td>
    		</tr>
            <tr>
        		<td><b>KELAS&nbsp;</b></td>
                <td width="20">:</td>
                <td><?php echo $kelas ?></td>
    		</tr>
            <tr>
        		<td><b>JURUSAN&nbsp;</b></td>
                <td width="20">:</td>
                <td><?php echo $nama_jurusan ?></td>
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
                <td><?php echo $alamat_siswa ?></td>
    		</tr>			
            <form action="halaman_utama.php?aksi_siswa=$aksi_siswa" method="post">
            <input type="hidden" name="nis" value="<?php echo $nis; ?>">
            <tr>
            
            <td><input class="update" name="proses" type="submit" value="Update"></td>
		</tr>
        </form>
		<?php
		;
	}
	?>
</table>