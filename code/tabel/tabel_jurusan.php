<b><font color="#2133F8"> JURUSAN</font></b> <br><br>
<hr color="#2133F8" size="3px" width="100%"><br>

<form action="halaman_utama.php?tabel_jurusan=$tabel_jurusan" method="post">
   <table width="100%">
   <tr>
   	<td>
   		<?php
		if($_SESSION['type_user']=="Admin")
		{
		?>
		<a href="halaman_utama.php?formulir_jurusan=$formulir_jurusan"><input class="button" type="button" value="Tambah"></a>
		<?php } ?>
  		<a href="pdf_jurusan.php" target="_blank"><input class="button" type="button" value="Print"></a>
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
	</table>
</form>

<br>

<table id="daftar-table" border='0' bordercolor="black" cellpading='2' cellspacing='2' width='100%'>
	<tr align='center'>
		<th class="normal">Kode Jurusan</th>
		<th class="normal">Nama Jurusan</th>
        <?php
		if($_SESSION['type_user']=="Admin")
		{
		?> 
        <th class="normal">Tools</th>
        <?php } ?>
	</tr>
	<?php
	include "koneksi.php";
		
	$tampilkan_isi = "select * from `jurusan`";
	
	if(isset($_POST['cari']) and $_POST['cari'] <> "")
	{
		$key = $_POST['cari'];
		$tampilkan_isi = "SELECT * from `jurusan` where kode_jurusan LIKE '%$key%' OR nama_jurusan LIKE '%$key%' ";
		
		echo "<font size='3' face='Calibri'>Pencarian data jurusan dengan kata '$key'</font>";
	}
	
	else if(isset($_POST['cari']) and $_POST['cari'] == "")
	{
		$tampilkan_isi = "select * from `jurusan`";
	}
	
	$tampilkan_isi_sql = mysqli_query($connect,$tampilkan_isi);
	
	while ($isi = mysqli_fetch_array($tampilkan_isi_sql))
	{
		$kode_jurusan = $isi['kode_jurusan'];
		$nama_jurusan = $isi['nama_jurusan'];
		
		?>
		<tr class="isi" align='left'>
			<td><?php echo $kode_jurusan ?></td> 
			<td><?php echo $nama_jurusan ?></td>
            <?php
			if($_SESSION['type_user']=="Admin")
			{
			?>  
            <td>
            <form action="halaman_utama.php?aksi_jurusan=$aksi_jurusan" method="post">
            <input type="hidden" name="kode_jurusan" value="<?php echo $kode_jurusan; ?>">
            <input class="update" name="proses" type="submit" value="Update">
            <input class="delete" name="proses" type="submit" value="Delete" onClick ="return confirm('Apakah Anda ingin menghapus jurusan <?php echo $nama_jurusan; ?> ?')">
            </td>
            <?php } ?>
		</tr>
        </form>
		<?php
		;
	}
	?>
</table>