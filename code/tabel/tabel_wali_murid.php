<b><font color="#2133F8"> WALI MURID</font></b> <br><br>
<hr color="#2133F8" size="3px" width="100%"><br>

<form action="halaman_utama.php?tabel_wali_murid=$tabel_wali_murid" method="post">
   <table width="100%">
   <tr>
   	<td>
   		<?php
		if($_SESSION['type_user']=="Admin")
		{
		?> 
		<a href="halaman_utama.php?formulir_wali_murid=$formulir_wali_murid"><input class="button" type="button" value="Tambah"></a>
		<?php } ?>
		<a href="pdf_wali_murid.php" target="_blank"><input class="button" type="button" value="Print"></a>
		
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
		<td align="right"><font face="Calibri" size="2"><u>Harap gunakan <b>Nama Siswa</b> dalam pencarian Wali Murid</u> !</font></td>
	   </tr>
	</table>
</form>

<br>

<table id="daftar-table" border='0' bordercolor="black" cellpading='2' cellspacing='2' width='100%'>
	<tr align='center'>
		<th class="normal">Nama Siswa</th>
        <th class="normal">Ayah / Pekerjaan</th>
        <th class="normal">Ibu / Pekerjaan</th>
        <th class="normal">Alamat</th>
        <th class="normal">No.Telp</th>
        <?php
		if($_SESSION['type_user']=="Admin")
		{
		?>
        <th class="normal">Tools</th>
        <?php } ?>
	</tr>
	<?php
	include "koneksi.php";
		
	$tampilkan_isi = "select * from siswa s,wali_murid w where s.nis=w.nis order by nama_siswa;";
	
	if(isset($_POST['cari']) and $_POST['cari'] <> "")
	{
		$key = $_POST['cari'];
		$tampilkan_isi = "select * from siswa s,wali_murid w where s.nis=w.nis and nama_siswa like '%$key%'";
		
		echo "<font size='3' face='Calibri'>Pencarian data wali murid dengan kata '$key'</font>";
	}
	
	else if(isset($_POST['cari']) and $_POST['cari'] == "")
	{
		$tampilkan_isi = "select * from siswa s,wali_murid w where s.nis=w.nis;";
	}
	
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
		<tr class="isi" align='left'> 
            <td><?php echo $nama_siswa ?></td> 
			<td><?php echo $nama_ayah ?> | <?php echo $pekerjaan_ayah ?></td>
            <td><?php echo $nama_ibu ?> | <?php echo $pekerjaan_ibu ?></td>
            <td><?php echo $alamat_wali ?></td>
            <td><?php echo $no_telp ?></td>  
             <?php
			if($_SESSION['type_user']=="Admin")
			{
			?>
            <td>
            <form action="halaman_utama.php?aksi_wali_murid=$aksi_wali_murid" method="post">
            <input type="hidden" name="kode_wali" value="<?php echo $kode_wali; ?>">
            <input class="update" name="proses" type="submit" value="Update">
            <input class="delete" name="proses" type="submit" value="Delete" onClick ="return confirm('Apakah Anda ingin menghapus data walimurid <?php echo $nama_siswa; ?> ?')">
            </td>
            <?php } ?>
		</tr>
        </form>
		<?php
		;
	}
	?>
</table>