<b><font color="#2133F8"> SISWA</font></b> <br><br>
<hr color="#2133F8" size="3px" width="100%"><br>

<form action="halaman_utama.php?tabel_siswa=$tabel_siswa" method="post">
   <table width="100%">
   <tr>
   	<td>
   		<?php
		if($_SESSION['type_user']=="Admin")
		{
		?> 
		<a href="halaman_utama.php?formulir_siswa=$formulir_siswa"><input class="button" type="button" value="Tambah"></a>
		<?php } ?>
		<a href="pdf_siswa.php" target="_blank"><input class="button" type="button" value="Print"></a>
		
   	</td>
   	<td align="right">Search : <input type="search" name="cari" placeholder="" style=
   	"
    width: 200px;
    padding: 10px 10px;
    height:40px;
    margin: 5px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
	font-family:Calibri;
		font-size:15px;"></td>
	    
	   </tr>
	<tr>
		<td></td>
		<td align="right"><font face="Calibri" size="2"><u>Harap gunakan <b>Nama Siswa</b> dalam pencarian Siswa</u> !</font></td>
	   </tr>
	</table>
</form>

<br>

<table id="daftar-table" border='0' bordercolor="black" cellpading='2' cellspacing='2' width='100%'>
	<tr align='center'>
		<th class="normal">NIS</th>
		<th class="normal">Nama Siswa</th>
        <th class="normal">Kelas/Jurusan</th>
        <th class="normal">TTL</th>
        <th class="normal">Jenis Kelamin</th>
        <th class="normal">Agama</th>
        <th class="normal">Alamat</th>
        <?php
		if($_SESSION['type_user']=="Admin")
		{
		?> 
        <th class="normal">Tools</th>
        <?php } ?>
	</tr>
	<?php
	include "koneksi.php";
		
	$tampilkan_isi = "select * from siswa s,jurusan j where s.kode_jurusan=j.kode_jurusan;";
	
	if(isset($_POST['cari']) and $_POST['cari'] <> "")
	{
		$key = $_POST['cari'];
		$tampilkan_isi = "select * from siswa s,jurusan j where s.kode_jurusan=j.kode_jurusan AND nama_siswa LIKE '%$key%'";
		
		echo "<font size='3' face='Calibri'>Pencarian data siswa dengan kata '$key'</font>";
	}
	
	else if(isset($_POST['cari']) and $_POST['cari'] == "")
	{
		$tampilkan_isi = "select * from siswa s,jurusan j where s.kode_jurusan=j.kode_jurusan;";
	}
	
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
		<tr class="isi" align='left'> 
			<td><?php echo $nis ?></td>
            <td><?php echo $nama_siswa ?></td> 
			<td><?php echo $kelas ?> | <?php echo $nama_jurusan ?></td>
            <td><?php echo $tempat_lahir ?>, <?php echo $tanggal_lahir ?></td> 
            <td><?php echo $jenis_kelamin ?></td>
            <td><?php echo $agama ?></td> 
            <td><?php echo $alamat_siswa ?></td>
            <?php
			if($_SESSION['type_user']=="Admin")
			{
			?>    
            <td>
            <form action="halaman_utama.php?aksi_siswa=$aksi_siswa" method="post">
            <input type="hidden" name="nis" value="<?php echo $nis; ?>">
            <input class="update" name="proses" type="submit" value="Update">
            <input class="delete" name="proses" type="submit" value="Delete" onClick ="return confirm('Apakah Anda ingin menghapus data siswa <?php echo $nama_siswa; ?> ?')">
            </td>
            <?php } ?>
		</tr>
        </form>
		<?php
		;
	}
	?>
</table>