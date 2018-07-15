<b><font color="#2133F8"> GURU</font></b> <br><br>
<hr color="#2133F8" size="3px" width="100%"><br>

<form action="halaman_utama.php?tabel_guru=$tabel_guru" method="post">
   <table width="100%">
   <tr>
   	<td>
   		<?php
		if($_SESSION['type_user']=="Admin")
		{
		?> 
		<a href="halaman_utama.php?formulir_guru=$formulir_guru"><input class="button" type="button" value="Tambah"></a>
		<?php } ?>
		<a href="code/pdf/pdf_guru.php" target="_blank"><input class="button" type="button" value="Print"></a>
		
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
		<td align="right"><font face="Calibri" size="2"><u>Harap gunakan <b>Nama Guru</b> dalam pencarian Guru</u>!</font></td>
	   </tr>
	</table>
</form>

<br>

<table id="daftar-table" border='0' bordercolor="black" cellpading='2' cellspacing='2' width='100%'>
	<tr align='center'>
		<th class="normal">Kode Guru</th>
		<th class="normal">Nama Guru</th>
        <th class="normal">Mata Pelajaran</th>
        <th class="normal">TTL</th>
        <th class="normal">Jenis Kelamin</th>
        <th class="normal">Agama</th>
        <th class="normal">Alamat</th>
        <th class="normal">Tools</th>
	</tr>
	<?php
	include "koneksi.php";
		
	$tampilkan_isi = "select * from `guru` g,`mata_pelajaran` mp where g.kode_mp=mp.kode_mp";
	
	if(isset($_POST['cari']) and $_POST['cari'] <> "")
	{
		$key = $_POST['cari'];
		$tampilkan_isi = "select * from guru g,mata_pelajaran mp where g.kode_mp=mp.kode_mp AND nama_guru LIKE '%$key%'";
		
		echo "<font size='3' face='Calibri'>Pencarian data guru dengan kata '$key'</font>";
	}
	
	else if(isset($_POST['cari']) and $_POST['cari'] == "")
	{
		$tampilkan_isi = "select * from `guru` g,`mata_pelajaran` mp where g.kode_mp=mp.kode_mp";
	}
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
		<tr class="isi" align='left'> 
			<td><?php echo $kode_guru ?></td> 
			<td><?php echo $nama_guru ?></td>
            <td><?php echo $nama_mp ?></td>
            <td><?php echo $tempat_lahir ?>, <?php echo $tanggal_lahir ?></td> 
            <td><?php echo $jenis_kelamin ?></td> 
            <td><?php echo $agama ?></td> 
            <td><?php echo $alamat_guru ?></td>   
            <td>
            <form action="halaman_utama.php?aksi_guru=$aksi_guru" method="post">
            <input type="hidden" name="kode_guru" value="<?php echo $kode_guru; ?>">
            <input class="update" name="proses" type="submit" value="Update">
            <input class="delete" name="proses" type="submit" value="Delete" onClick ="return confirm('Apakah Anda ingin menghapus data guru bernama <?php echo $nama_guru; ?> ?')">
            </td>
		</tr>
        </form>
		<?php
		;
	}
	?>
</table>