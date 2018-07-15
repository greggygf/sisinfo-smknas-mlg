<b><font color="#2133F8"> STANDAR KOMPETENSI</font></b> <br><br>
<hr color="#2133F8" size="3px" width="100%"><br>


<form action="halaman_utama.php?tabel_standar_kompetensi_untuk_guru=$tabel_standar_kompetensi_untuk_guru" method="post">
   <table width="100%">
   <tr>
   	<td>
		<a href="pdf_standar_kompetensi_untuk_guru.php" target="_blank"><input class="button" type="button" value="Print"></a>
		
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
		<td align="right"><font face="Calibri" size="2"><u>Harap gunakan <b>Nama Standar Kompetensi</b> dalam pencarian Standar Kompetensi</u> !</font></td>
	   </tr>
	</table>
</form>

<br>

<table id="daftar-table" border='0' bordercolor="black" cellpading='2' cellspacing='2' width='100%'>
	<tr align='center'>
		<th class="normal">Kode Standar Kompetensi</th>
		<th class="normal">Mata Pelajaran</th>
        <th class="normal">Nama Standar Kompetensi</th>
        <th class="normal">Kelas Standar Kompetensi</th>
        <?php
		if($_SESSION['type_user']=="Admin")
		{
		?> 
        <th class="normal">Tools</th>
        <?php } ?>
	</tr>
	<?php
	include "koneksi.php";
	$informasi = $_SESSION['kode_guru'];
		
	$tampilkan_isi = "select distinct sk.kode_sk,mp.kode_mp,mp.nama_mp,sk.nama_sk,sk.kelas_sk from login l,standar_kompetensi sk,mata_pelajaran mp,guru g
where g.kode_guru='$informasi' and g.kode_mp=mp.kode_mp and sk.kode_mp=mp.kode_mp;";
	
	if(isset($_POST['cari']) and $_POST['cari'] <> "")
	{
		$key = $_POST['cari'];
		$tampilkan_isi = "select distinct sk.kode_sk,mp.kode_mp,mp.nama_mp,sk.nama_sk,sk.kelas_sk from login l,standar_kompetensi sk,mata_pelajaran mp,guru g
where g.kode_guru='$informasi' and g.kode_mp=mp.kode_mp and sk.kode_mp=mp.kode_mp AND sk.nama_sk LIKE '%$key%'";
		
		echo "<font size='3' face='Calibri'>Pencarian data standar kompetensi dengan kata '$key'</font>";
	}
	
	else if(isset($_POST['cari']) and $_POST['cari'] == "")
	{
		$tampilkan_isi = "select distinct sk.kode_sk,mp.kode_mp,mp.nama_mp,sk.nama_sk,sk.kelas_sk from login l,standar_kompetensi sk,mata_pelajaran mp,guru g
where g.kode_guru='$informasi' and g.kode_mp=mp.kode_mp and sk.kode_mp=mp.kode_mp;";
	}
	
	$tampilkan_isi_sql = mysqli_query($connect,$tampilkan_isi);
	
	while ($isi = mysqli_fetch_array($connect,$tampilkan_isi_sql))
	{
		$kode_sk = $isi['kode_sk'];
		$kode_mp = $isi['kode_mp'];
		$nama_mp = $isi['nama_mp'];
		$nama_sk = $isi['nama_sk'];
		$kelas_sk = $isi['kelas_sk'];
		
		?>
		<tr class="isi" align='left'> 
			<td><?php echo $kode_sk ?></td> 
			<td><?php echo $nama_mp ?></td>
            <td><?php echo $nama_sk ?></td> 
            <td><?php echo $kelas_sk ?></td>
            <?php
			if($_SESSION['type_user']=="Admin")
			{
			?>    
            <td>
            <form action="halaman_utama.php?aksi_standar_kompetensi=$aksi_kompetensi" method="post">
            <input type="hidden" name="kode_sk" value="<?php echo $kode_sk; ?>">
            <input class="update" name="proses" type="submit" value="Update">
            <input class="delete" name="proses" type="submit" value="Delete" onClick ="return confirm('Apakah Anda ingin menghapus standar kompetensi <?php echo $nama_sk; ?> ?')">
            </td>
            <?php } ?>
		</tr>
        </form>
		<?php
		;
	}
	?>
</table>
