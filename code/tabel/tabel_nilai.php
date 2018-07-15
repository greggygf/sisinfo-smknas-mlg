<b><font color="#2133F8"> NILAI</font></b> <br><br>
<hr color="#2133F8" size="3px" width="100%"><br>
<?php
if($_SESSION['type_user']=="Admin")
{
?>
<a href="halaman_utama.php?formulir_nilai=$formulir_nilai"><input class="button" type="button" value="Tambah"></a><br><br>
<?php }
else if($_SESSION['type_user']=="Guru")
{ ?>
<a href="halaman_utama.php?formulir_nilai_untuk_guru=$formulir_nilai_untuk_guru"><input class="button" type="button" value="Tambah"></a><br><br>
<?php } ?>

	<link type="text/css" href="development-bundle/themes/base/jquery.ui.all.css" rel="stylesheet" />

	<script type="text/javascript" src="development-bundle/jquery-1.4.2.js"></script>

	<script type="text/javascript" src="development-bundle/ui/jquery.ui.core.js"></script>

	<script type="text/javascript" src="development-bundle/ui/jquery.ui.widget.js"></script>

	<script type="text/javascript" src="development-bundle/ui/jquery.ui.tabs.js"></script>

	<script type="text/javascript">

 $(document).ready(function(){
	$("#tabs").tabs();
	});
	</script>

<div id="tabs">

	<ul>
		<li><a href="#tabs-1">RPL</a></li>
		<li><a href="#tabs-2">TKJ</a></li>
		<li><a href="#tabs-3">MM</a></li>
        <li><a href="#tabs-4">TPm</a></li>
        <li><a href="#tabs-5">TKR</a></li>
        <li><a href="#tabs-6">TSM</a></li>
        <li><a href="#tabs-7">TGB</a></li>
        <li><a href="#tabs-8">TITL</a></li>
	</ul>
    
    <!-- RPL -->
	<div id="tabs-1">
<form action="halaman_utama.php?tabel_nilai=$tabel_nilai" method="post">
   Search : <input type="search" name="cari" placeholder="" style=
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
	font-size:15px;">
</form>

<font face="Calibri" size="2"><u>Harap gunakan <b>Nama Siswa</b> dalam pencarian Nilai</u> !</font><br><br>

<table id="daftar-table" border='0' bordercolor="black" cellpading='2' cellspacing='2' width='100%'>
	<tr align='center'>
		<th class="normal">Nama </th>
        <th class="normal">Nama Guru</th>
        <th class="normal">Mata Pelajaran / Standar Kompetensi</th>
        <th class="normal">Nilai Angka</th>
        <th class="normal">Nilai Huruf</th>
        <?php
		if($_SESSION['type_user']=="Admin")
		{
		?>
        <th class="normal">Tools</th>
        <?php } ?>
	</tr>
	<?php
	include "koneksi.php";
		
	$tampilkan_isi = "select * from nilai n,siswa s,guru g,standar_kompetensi sk,mata_pelajaran mp,jurusan j
					  where s.nis=n.nis AND g.kode_guru=n.kode_guru AND sk.kode_sk=n.kode_sk AND mp.kode_mp=sk.kode_mp AND j.kode_jurusan=s.kode_jurusan AND s.kode_jurusan='JU0001';";
	
	if(isset($_POST['cari']) and $_POST['cari'] <> "")
	{
		$key = $_POST['cari'];
		$tampilkan_isi = "select * from nilai n,siswa s,guru g,standar_kompetensi sk,mata_pelajaran mp,jurusan j
					  where s.nis=n.nis AND g.kode_guru=n.kode_guru AND sk.kode_sk=n.kode_sk AND mp.kode_mp=sk.kode_mp AND j.kode_jurusan=s.kode_jurusan AND s.kode_jurusan='JU0001' and nama_siswa like '%$key%'";
		
		echo "<font size='3' face='Calibri'>Pencarian data nilai dengan kata '$key'</font>";
	}
	
	else if(isset($_POST['cari']) and $_POST['cari'] == "")
	{
		$tampilkan_isi = "select * from nilai n,siswa s,guru g,standar_kompetensi sk,mata_pelajaran mp,jurusan j
					  where s.nis=n.nis AND g.kode_guru=n.kode_guru AND sk.kode_sk=n.kode_sk AND mp.kode_mp=sk.kode_mp AND j.kode_jurusan=s.kode_jurusan AND s.kode_jurusan='JU0001';";
	}				  
	
	$tampilkan_isi_sql = mysqli_query($connect,$tampilkan_isi);
	
	while ($isi = mysqli_fetch_array($tampilkan_isi_sql))
	{
		$kode_nilai = $isi['kode_nilai'];
		$nama_siswa = $isi['nama_siswa'];
		$nama_guru = $isi['nama_guru'];
		$nama_mp = $isi['nama_mp'];
		$nama_sk = $isi['nama_sk'];
		$angka_nilai = $isi['angka_nilai'];
		
		?>
		<tr class="isi" align='left'> 
            <td><?php echo $nama_siswa ?>
			<td><?php echo $nama_guru ?></td>
            <td><?php echo $nama_mp ?> | <?php echo $nama_sk ?></td>
            <td>
			<?php 
			if ($angka_nilai <=75)
			{
				echo "<b><font color='red'>".$angka_nilai."</b></font>";
			}
			else
			{
				echo $angka_nilai;
			}
			?>
            </td>
            <td>
			<?php
			if ($angka_nilai >=101)
			{
				echo "Angka melebihi kriteria penilaian";
			}
			else if ($angka_nilai >= 96 AND $angka_nilai <=100)
			{
				echo "A";
			}
			else if ($angka_nilai >= 91 AND $angka_nilai <=95)
			{
				echo "A-";
			}
			else if ($angka_nilai >= 86 AND $angka_nilai <=90)
			{
				echo "B+";
			}
			else if ($angka_nilai >= 81 AND $angka_nilai <=85)
			{
				echo "B";
			}
			else if ($angka_nilai >= 76 AND $angka_nilai <=80)
			{
				echo "B-";
			}
			else if ($angka_nilai >= 71 AND $angka_nilai <=75)
			{
				echo "<b><font color='red'>C+</b></font>";
			}
			else if ($angka_nilai >= 66 AND $angka_nilai <=70)
			{
				echo "<b><font color='red'>C</font></b>";
			}
			else if ($angka_nilai >= 61 AND $angka_nilai <=65)
			{
				echo "<b><font color='red'>C-</font></b>";
			}
			else if ($angka_nilai >= 0 AND $angka_nilai <=60)
			{
				echo "<b><font color='red'>D</font></b>";
			}
			 ?>
             </td>
             <?php
			if($_SESSION['type_user']=="Admin")
			{
			?>     
            <td>
            <form action="halaman_utama.php?aksi_nilai=$aksi_nilai" method="post">
            <input type="hidden" name="kode_nilai" value="<?php echo $kode_nilai; ?>">
            <input class="update" name="proses" type="submit" value="Update" style="font-size:15px;">
            <input class="delete" name="proses" type="submit" value="Delete" style="font-size:15px;" onClick ="return confirm('Apakah Anda ingin menghapus data nilai <?php echo $kode_nilai; ?> ?')">
            </td>
            <?php } ?>
		</tr>
        </form>
		<?php
		;
	}
	?>
</table>
	</div>
	<!-- TKJ -->
	<div id="tabs-2">
		<form action="halaman_utama.php?tabel_nilai=$tabel_nilai" method="post">
   Search : <input type="search" name="cari" placeholder="" style=
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
	font-size:15px;">
</form>

<font face="Calibri" size="2"><u>Harap gunakan <b>Nama Siswa</b> dalam pencarian Nilai</u> !</font><br><br>

<table id="daftar-table" border='0' bordercolor="black" cellpading='2' cellspacing='2' width='100%'>
	<tr align='center'>
		<th class="normal">Nama </th>
        <th class="normal">Nama Guru</th>
        <th class="normal">Mata Pelajaran / Standar Kompetensi</th>
        <th class="normal">Nilai Angka</th>
        <th class="normal">Nilai Huruf</th>
        <?php
		if($_SESSION['type_user']=="Admin")
		{
		?> 
        <th class="normal">Tools</th>
        <?php } ?>
	</tr>
	<?php
	include "koneksi.php";
		
	$tampilkan_isi = "select * from nilai n,siswa s,guru g,standar_kompetensi sk,mata_pelajaran mp,jurusan j
					  where s.nis=n.nis AND g.kode_guru=n.kode_guru AND sk.kode_sk=n.kode_sk AND mp.kode_mp=sk.kode_mp AND j.kode_jurusan=s.kode_jurusan AND s.kode_jurusan='JU0008';";
	
	if(isset($_POST['cari']) and $_POST['cari'] <> "")
	{
		$key = $_POST['cari'];
		$tampilkan_isi = "select * from nilai n,siswa s,guru g,standar_kompetensi sk,mata_pelajaran mp,jurusan j
					  where s.nis=n.nis AND g.kode_guru=n.kode_guru AND sk.kode_sk=n.kode_sk AND mp.kode_mp=sk.kode_mp AND j.kode_jurusan=s.kode_jurusan AND s.kode_jurusan='JU0008' and nama_siswa like '%$key%'";
		
		echo "<font size='3' face='Calibri'>Pencarian data nilai dengan kata '$key'</font>";
	}
	
	else if(isset($_POST['cari']) and $_POST['cari'] == "")
	{
		$tampilkan_isi = "select * from nilai n,siswa s,guru g,standar_kompetensi sk,mata_pelajaran mp,jurusan j
					  where s.nis=n.nis AND g.kode_guru=n.kode_guru AND sk.kode_sk=n.kode_sk AND mp.kode_mp=sk.kode_mp AND j.kode_jurusan=s.kode_jurusan AND s.kode_jurusan='JU0008';";
	}				  
	
	$tampilkan_isi_sql = mysqli_query($connect,$tampilkan_isi);
	
	while ($isi = mysqli_fetch_array($tampilkan_isi_sql))
	{
		$kode_nilai = $isi['kode_nilai'];
		$nama_siswa = $isi['nama_siswa'];
		$nama_guru = $isi['nama_guru'];
		$nama_mp = $isi['nama_mp'];
		$nama_sk = $isi['nama_sk'];
		$angka_nilai = $isi['angka_nilai'];
		
		?>
		<tr class="isi" align='left'> 
            <td><?php echo $nama_siswa ?>
			<td><?php echo $nama_guru ?></td>
            <td><?php echo $nama_mp ?> | <?php echo $nama_sk ?></td>
            <td>
			<?php 
			if ($angka_nilai <=75)
			{
				echo "<b><font color='red'>".$angka_nilai."</b></font>";
			}
			else
			{
				echo $angka_nilai;
			}
			?>
            </td>
            <td>
			<?php
			if ($angka_nilai >=101)
			{
				echo "Angka melebihi kriteria penilaian";
			}
			else if ($angka_nilai >= 96 AND $angka_nilai <=100)
			{
				echo "A";
			}
			else if ($angka_nilai >= 91 AND $angka_nilai <=95)
			{
				echo "A-";
			}
			else if ($angka_nilai >= 86 AND $angka_nilai <=90)
			{
				echo "B+";
			}
			else if ($angka_nilai >= 81 AND $angka_nilai <=85)
			{
				echo "B";
			}
			else if ($angka_nilai >= 76 AND $angka_nilai <=80)
			{
				echo "B-";
			}
			else if ($angka_nilai >= 71 AND $angka_nilai <=75)
			{
				echo "<b><font color='red'>C+</b></font>";
			}
			else if ($angka_nilai >= 66 AND $angka_nilai <=70)
			{
				echo "<b><font color='red'>C</font></b>";
			}
			else if ($angka_nilai >= 61 AND $angka_nilai <=65)
			{
				echo "<b><font color='red'>C-</font></b>";
			}
			else if ($angka_nilai >= 0 AND $angka_nilai <=60)
			{
				echo "<b><font color='red'>D</font></b>";
			}
			 ?>
             </td>   
            <?php
			if($_SESSION['type_user']=="Admin")
			{
			?>   
            <td>
            <form action="halaman_utama.php?aksi_nilai=$aksi_nilai" method="post">
            <input type="hidden" name="kode_nilai" value="<?php echo $kode_nilai; ?>">
            <input class="update" name="proses" type="submit" value="Update" style="font-size:15px;">
            <input class="delete" name="proses" type="submit" value="Delete" style="font-size:15px;" onClick ="return confirm('Apakah Anda ingin menghapus data nilai <?php echo $kode_nilai; ?> ?')">
            </td>
            <?php } ?>
		</tr>
        </form>
		<?php
		;
	}
	?>
</table>
	</div>
	<!-- MM -->
	<div id="tabs-3">
		<form action="halaman_utama.php?tabel_nilai=$tabel_nilai" method="post">
   Search : <input type="search" name="cari" placeholder="" style=
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
	font-size:15px;">
</form>

<font face="Calibri" size="2"><u>Harap gunakan <b>Nama Siswa</b> dalam pencarian Nilai</u> !</font><br><br>

<table id="daftar-table" border='0' bordercolor="black" cellpading='2' cellspacing='2' width='100%'>
	<tr align='center'>
		<th class="normal">Nama </th>
        <th class="normal">Nama Guru</th>
        <th class="normal">Mata Pelajaran / Standar Kompetensi</th>
        <th class="normal">Nilai Angka</th>
        <th class="normal">Nilai Huruf</th>
        <?php
		if($_SESSION['type_user']=="Admin")
		{
		?>   
        <th class="normal">Tools</th>
        <?php } ?>
	</tr>
	<?php
	include "koneksi.php";
		
	$tampilkan_isi = "select * from nilai n,siswa s,guru g,standar_kompetensi sk,mata_pelajaran mp,jurusan j
					  where s.nis=n.nis AND g.kode_guru=n.kode_guru AND sk.kode_sk=n.kode_sk AND mp.kode_mp=sk.kode_mp AND j.kode_jurusan=s.kode_jurusan AND s.kode_jurusan='JU0007';";
	
	if(isset($_POST['cari']) and $_POST['cari'] <> "")
	{
		$key = $_POST['cari'];
		$tampilkan_isi = "select * from nilai n,siswa s,guru g,standar_kompetensi sk,mata_pelajaran mp,jurusan j
					  where s.nis=n.nis AND g.kode_guru=n.kode_guru AND sk.kode_sk=n.kode_sk AND mp.kode_mp=sk.kode_mp AND j.kode_jurusan=s.kode_jurusan AND s.kode_jurusan='JU0007' and nama_siswa like '%$key%'";
		
		echo "<font size='3' face='Calibri'>Pencarian data nilai dengan kata '$key'</font>";
	}
	
	else if(isset($_POST['cari']) and $_POST['cari'] == "")
	{
		$tampilkan_isi = "select * from nilai n,siswa s,guru g,standar_kompetensi sk,mata_pelajaran mp,jurusan j
					  where s.nis=n.nis AND g.kode_guru=n.kode_guru AND sk.kode_sk=n.kode_sk AND mp.kode_mp=sk.kode_mp AND j.kode_jurusan=s.kode_jurusan AND s.kode_jurusan='JU0007';";
	}				  
	
	$tampilkan_isi_sql = mysqli_query($connect,$tampilkan_isi);
	
	while ($isi = mysqli_fetch_array($tampilkan_isi_sql))
	{
		$kode_nilai = $isi['kode_nilai'];
		$nama_siswa = $isi['nama_siswa'];
		$nama_guru = $isi['nama_guru'];
		$nama_mp = $isi['nama_mp'];
		$nama_sk = $isi['nama_sk'];
		$angka_nilai = $isi['angka_nilai'];
		
		?>
		<tr class="isi" align='left'> 
            <td><?php echo $nama_siswa ?> 
			<td><?php echo $nama_guru ?></td>
            <td><?php echo $nama_mp ?> | <?php echo $nama_sk ?></td>
            <td>
			<?php 
			if ($angka_nilai <=75)
			{
				echo "<b><font color='red'>".$angka_nilai."</b></font>";
			}
			else
			{
				echo $angka_nilai;
			}
			?>
            </td>
            <td>
			<?php
			if ($angka_nilai >=101)
			{
				echo "Angka melebihi kriteria penilaian";
			}
			else if ($angka_nilai >= 96 AND $angka_nilai <=100)
			{
				echo "A";
			}
			else if ($angka_nilai >= 91 AND $angka_nilai <=95)
			{
				echo "A-";
			}
			else if ($angka_nilai >= 86 AND $angka_nilai <=90)
			{
				echo "B+";
			}
			else if ($angka_nilai >= 81 AND $angka_nilai <=85)
			{
				echo "B";
			}
			else if ($angka_nilai >= 76 AND $angka_nilai <=80)
			{
				echo "B-";
			}
			else if ($angka_nilai >= 71 AND $angka_nilai <=75)
			{
				echo "<b><font color='red'>C+</b></font>";
			}
			else if ($angka_nilai >= 66 AND $angka_nilai <=70)
			{
				echo "<b><font color='red'>C</font></b>";
			}
			else if ($angka_nilai >= 61 AND $angka_nilai <=65)
			{
				echo "<b><font color='red'>C-</font></b>";
			}
			else if ($angka_nilai >= 0 AND $angka_nilai <=60)
			{
				echo "<b><font color='red'>D</font></b>";
			}
			 ?>
             </td> 
             <?php
			if($_SESSION['type_user']=="Admin")
			{
			?>     
            <td>
            <form action="halaman_utama.php?aksi_nilai=$aksi_nilai" method="post">
            <input type="hidden" name="kode_nilai" value="<?php echo $kode_nilai; ?>">
            <input class="update" name="proses" type="submit" value="Update" style="font-size:15px;">
            <input class="delete" name="proses" type="submit" value="Delete" style="font-size:15px;" onClick ="return confirm('Apakah Anda ingin menghapus data nilai <?php echo $kode_nilai; ?> ?')">
            </td>
            <?php } ?>
		</tr>
        </form>
		<?php
		;
	}
	?>
</table>
	</div>
    <!-- TPm -->
    <div id="tabs-4">
		<form action="halaman_utama.php?tabel_nilai=$tabel_nilai" method="post">
   Search : <input type="search" name="cari" placeholder="" style=
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
	font-size:15px;">
</form>

<font face="Calibri" size="2"><u>Harap gunakan <b>Nama Siswa</b> dalam pencarian Nilai</u> !</font><br><br>

<table id="daftar-table" border='0' bordercolor="black" cellpading='2' cellspacing='2' width='100%'>
	<tr align='center'>
		<th class="normal">Nama </th>
        <th class="normal">Nama Guru</th>
        <th class="normal">Mata Pelajaran / Standar Kompetensi</th>
        <th class="normal">Nilai Angka</th>
        <th class="normal">Nilai Huruf</th>
        <?php
		if($_SESSION['type_user']=="Admin")
		{
		?>   
        <th class="normal">Tools</th>
        <?php } ?>
	</tr>
	<?php
	include "koneksi.php";
		
	$tampilkan_isi = "select * from nilai n,siswa s,guru g,standar_kompetensi sk,mata_pelajaran mp,jurusan j
					  where s.nis=n.nis AND g.kode_guru=n.kode_guru AND sk.kode_sk=n.kode_sk AND mp.kode_mp=sk.kode_mp AND j.kode_jurusan=s.kode_jurusan AND s.kode_jurusan='JU0002';";
	
	if(isset($_POST['cari']) and $_POST['cari'] <> "")
	{
		$key = $_POST['cari'];
		$tampilkan_isi = "select * from nilai n,siswa s,guru g,standar_kompetensi sk,mata_pelajaran mp,jurusan j
					  where s.nis=n.nis AND g.kode_guru=n.kode_guru AND sk.kode_sk=n.kode_sk AND mp.kode_mp=sk.kode_mp AND j.kode_jurusan=s.kode_jurusan AND s.kode_jurusan='JU0002' and nama_siswa like '%$key%'";
		
		echo "<font size='3' face='Calibri'>Pencarian data nilai dengan kata '$key'</font>";
	}
	
	else if(isset($_POST['cari']) and $_POST['cari'] == "")
	{
		$tampilkan_isi = "select * from nilai n,siswa s,guru g,standar_kompetensi sk,mata_pelajaran mp,jurusan j
					  where s.nis=n.nis AND g.kode_guru=n.kode_guru AND sk.kode_sk=n.kode_sk AND mp.kode_mp=sk.kode_mp AND j.kode_jurusan=s.kode_jurusan AND s.kode_jurusan='JU0002';";
	}				  
	
	$tampilkan_isi_sql = mysqli_query($connect,$tampilkan_isi);
	
	while ($isi = mysqli_fetch_array($tampilkan_isi_sql))
	{
		$kode_nilai = $isi['kode_nilai'];
		$nama_siswa = $isi['nama_siswa'];
		$nama_guru = $isi['nama_guru'];
		$nama_mp = $isi['nama_mp'];
		$nama_sk = $isi['nama_sk'];
		$angka_nilai = $isi['angka_nilai'];
		
		?>
		<tr class="isi" align='left'> 
            <td><?php echo $nama_siswa ?> 
			<td><?php echo $nama_guru ?></td>
            <td><?php echo $nama_mp ?> | <?php echo $nama_sk ?></td>
            <td>
			<?php 
			if ($angka_nilai <=75)
			{
				echo "<b><font color='red'>".$angka_nilai."</b></font>";
			}
			else
			{
				echo $angka_nilai;
			}
			?>
            </td>
            <td>
			<?php
			if ($angka_nilai >=101)
			{
				echo "Angka melebihi kriteria penilaian";
			}
			else if ($angka_nilai >= 96 AND $angka_nilai <=100)
			{
				echo "A";
			}
			else if ($angka_nilai >= 91 AND $angka_nilai <=95)
			{
				echo "A-";
			}
			else if ($angka_nilai >= 86 AND $angka_nilai <=90)
			{
				echo "B+";
			}
			else if ($angka_nilai >= 81 AND $angka_nilai <=85)
			{
				echo "B";
			}
			else if ($angka_nilai >= 76 AND $angka_nilai <=80)
			{
				echo "B-";
			}
			else if ($angka_nilai >= 71 AND $angka_nilai <=75)
			{
				echo "<b><font color='red'>C+</b></font>";
			}
			else if ($angka_nilai >= 66 AND $angka_nilai <=70)
			{
				echo "<b><font color='red'>C</font></b>";
			}
			else if ($angka_nilai >= 61 AND $angka_nilai <=65)
			{
				echo "<b><font color='red'>C-</font></b>";
			}
			else if ($angka_nilai >= 0 AND $angka_nilai <=60)
			{
				echo "<b><font color='red'>D</font></b>";
			}
			 ?>
             </td> 
             <?php
			if($_SESSION['type_user']=="Admin")
			{
			?>     
            <td>
            <form action="halaman_utama.php?aksi_nilai=$aksi_nilai" method="post">
            <input type="hidden" name="kode_nilai" value="<?php echo $kode_nilai; ?>">
            <input class="update" name="proses" type="submit" value="Update" style="font-size:15px;">
            <input class="delete" name="proses" type="submit" value="Delete" style="font-size:15px;" onClick ="return confirm('Apakah Anda ingin menghapus data nilai <?php echo $kode_nilai; ?> ?')">
            </td>
            <?php } ?>
		</tr>
        </form>
		<?php
		;
	}
	?>
</table>
	</div>
    <!-- TKR -->
    <div id="tabs-5">
		<form action="halaman_utama.php?tabel_nilai=$tabel_nilai" method="post">
   Search : <input type="search" name="cari" placeholder="" style=
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
	font-size:15px;">
</form>

<font face="Calibri" size="2"><u>Harap gunakan <b>Nama Siswa</b> dalam pencarian Nilai</u> !</font><br><br>

<table id="daftar-table" border='0' bordercolor="black" cellpading='2' cellspacing='2' width='100%'>
	<tr align='center'>
		<th class="normal">Nama </th>
        <th class="normal">Nama Guru</th>
        <th class="normal">Mata Pelajaran / Standar Kompetensi</th>
        <th class="normal">Nilai Angka</th>
        <th class="normal">Nilai Huruf</th>
        <?php
		if($_SESSION['type_user']=="Admin")
		{
		?>   
        <th class="normal">Tools</th>
        <?php } ?>
	</tr>
	<?php
	include "koneksi.php";
		
	$tampilkan_isi = "select * from nilai n,siswa s,guru g,standar_kompetensi sk,mata_pelajaran mp,jurusan j
					  where s.nis=n.nis AND g.kode_guru=n.kode_guru AND sk.kode_sk=n.kode_sk AND mp.kode_mp=sk.kode_mp AND j.kode_jurusan=s.kode_jurusan AND s.kode_jurusan='JU0003';";
	
	if(isset($_POST['cari']) and $_POST['cari'] <> "")
	{
		$key = $_POST['cari'];
		$tampilkan_isi = "select * from nilai n,siswa s,guru g,standar_kompetensi sk,mata_pelajaran mp,jurusan j
					  where s.nis=n.nis AND g.kode_guru=n.kode_guru AND sk.kode_sk=n.kode_sk AND mp.kode_mp=sk.kode_mp AND j.kode_jurusan=s.kode_jurusan AND s.kode_jurusan='JU0003' and nama_siswa like '%$key%'";
		
		echo "<font size='3' face='Calibri'>Pencarian data nilai dengan kata '$key'</font>";
	}
	
	else if(isset($_POST['cari']) and $_POST['cari'] == "")
	{
		$tampilkan_isi = "select * from nilai n,siswa s,guru g,standar_kompetensi sk,mata_pelajaran mp,jurusan j
					  where s.nis=n.nis AND g.kode_guru=n.kode_guru AND sk.kode_sk=n.kode_sk AND mp.kode_mp=sk.kode_mp AND j.kode_jurusan=s.kode_jurusan AND s.kode_jurusan='JU0003';";
	}				  
	
	$tampilkan_isi_sql = mysqli_query($connect,$tampilkan_isi);
	
	while ($isi = mysqli_fetch_array($tampilkan_isi_sql))
	{
		$kode_nilai = $isi['kode_nilai'];
		$nama_siswa = $isi['nama_siswa'];
		$nama_guru = $isi['nama_guru'];
		$nama_mp = $isi['nama_mp'];
		$nama_sk = $isi['nama_sk'];
		$angka_nilai = $isi['angka_nilai'];
		
		?>
		<tr class="isi" align='left'> 
            <td><?php echo $nama_siswa ?>> 
			<td><?php echo $nama_guru ?></td>
            <td><?php echo $nama_mp ?> | <?php echo $nama_sk ?></td>
            <td>
			<?php 
			if ($angka_nilai <=75)
			{
				echo "<b><font color='red'>".$angka_nilai."</b></font>";
			}
			else
			{
				echo $angka_nilai;
			}
			?>
            </td>
            <td>
			<?php
			if ($angka_nilai >=101)
			{
				echo "Angka melebihi kriteria penilaian";
			}
			else if ($angka_nilai >= 96 AND $angka_nilai <=100)
			{
				echo "A";
			}
			else if ($angka_nilai >= 91 AND $angka_nilai <=95)
			{
				echo "A-";
			}
			else if ($angka_nilai >= 86 AND $angka_nilai <=90)
			{
				echo "B+";
			}
			else if ($angka_nilai >= 81 AND $angka_nilai <=85)
			{
				echo "B";
			}
			else if ($angka_nilai >= 76 AND $angka_nilai <=80)
			{
				echo "B-";
			}
			else if ($angka_nilai >= 71 AND $angka_nilai <=75)
			{
				echo "<b><font color='red'>C+</b></font>";
			}
			else if ($angka_nilai >= 66 AND $angka_nilai <=70)
			{
				echo "<b><font color='red'>C</font></b>";
			}
			else if ($angka_nilai >= 61 AND $angka_nilai <=65)
			{
				echo "<b><font color='red'>C-</font></b>";
			}
			else if ($angka_nilai >= 0 AND $angka_nilai <=60)
			{
				echo "<b><font color='red'>D</font></b>";
			}
			 ?>
             </td> 
             <?php
			if($_SESSION['type_user']=="Admin")
			{
			?>     
            <td>
            <form action="halaman_utama.php?aksi_nilai=$aksi_nilai" method="post">
            <input type="hidden" name="kode_nilai" value="<?php echo $kode_nilai; ?>">
            <input class="update" name="proses" type="submit" value="Update" style="font-size:15px;">
            <input class="delete" name="proses" type="submit" value="Delete" style="font-size:15px;" onClick ="return confirm('Apakah Anda ingin menghapus data nilai <?php echo $kode_nilai; ?> ?')">
            </td>
            <?php } ?>
		</tr>
        </form>
		<?php
		;
	}
	?>
</table>
	</div>
    
    <!-- TSM -->
    <div id="tabs-6">
		<form action="halaman_utama.php?tabel_nilai=$tabel_nilai" method="post">
   Search : <input type="search" name="cari" placeholder="" style=
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
	font-size:15px;">
</form>

<font face="Calibri" size="2"><u>Harap gunakan <b>Nama Siswa</b> dalam pencarian Nilai</u> !</font><br><br>

<table id="daftar-table" border='0' bordercolor="black" cellpading='2' cellspacing='2' width='100%'>
	<tr align='center'>
		<th class="normal">Nama </th>
        <th class="normal">Nama Guru</th>
        <th class="normal">Mata Pelajaran / Standar Kompetensi</th>
        <th class="normal">Nilai Angka</th>
        <th class="normal">Nilai Huruf</th>
        <?php
		if($_SESSION['type_user']=="Admin")
		{
		?>   
        <th class="normal">Tools</th>
        <?php } ?>
	</tr>
	<?php
	include "koneksi.php";
		
	$tampilkan_isi = "select * from nilai n,siswa s,guru g,standar_kompetensi sk,mata_pelajaran mp,jurusan j
					  where s.nis=n.nis AND g.kode_guru=n.kode_guru AND sk.kode_sk=n.kode_sk AND mp.kode_mp=sk.kode_mp AND j.kode_jurusan=s.kode_jurusan AND s.kode_jurusan='JU0004';";
	
	if(isset($_POST['cari']) and $_POST['cari'] <> "")
	{
		$key = $_POST['cari'];
		$tampilkan_isi = "select * from nilai n,siswa s,guru g,standar_kompetensi sk,mata_pelajaran mp,jurusan j
					  where s.nis=n.nis AND g.kode_guru=n.kode_guru AND sk.kode_sk=n.kode_sk AND mp.kode_mp=sk.kode_mp AND j.kode_jurusan=s.kode_jurusan AND s.kode_jurusan='JU0004' and nama_siswa like '%$key%'";
		
		echo "<font size='3' face='Calibri'>Pencarian data nilai dengan kata '$key'</font>";
	}
	
	else if(isset($_POST['cari']) and $_POST['cari'] == "")
	{
		$tampilkan_isi = "select * from nilai n,siswa s,guru g,standar_kompetensi sk,mata_pelajaran mp,jurusan j
					  where s.nis=n.nis AND g.kode_guru=n.kode_guru AND sk.kode_sk=n.kode_sk AND mp.kode_mp=sk.kode_mp AND j.kode_jurusan=s.kode_jurusan AND s.kode_jurusan='JU0004';";
	}				  
	
	$tampilkan_isi_sql = mysqli_query($connect,$tampilkan_isi);
	
	while ($isi = mysqli_fetch_array($tampilkan_isi_sql))
	{
		$kode_nilai = $isi['kode_nilai'];
		$nama_siswa = $isi['nama_siswa'];
		$nama_guru = $isi['nama_guru'];
		$nama_mp = $isi['nama_mp'];
		$nama_sk = $isi['nama_sk'];
		$angka_nilai = $isi['angka_nilai'];
		
		?>
		<tr class="isi" align='left'> 
            <td><?php echo $nama_siswa ?>> 
			<td><?php echo $nama_guru ?></td>
            <td><?php echo $nama_mp ?> | <?php echo $nama_sk ?></td>
            <td>
			<?php 
			if ($angka_nilai <=75)
			{
				echo "<b><font color='red'>".$angka_nilai."</b></font>";
			}
			else
			{
				echo $angka_nilai;
			}
			?>
            </td>
            <td>
			<?php
			if ($angka_nilai >=101)
			{
				echo "Angka melebihi kriteria penilaian";
			}
			else if ($angka_nilai >= 96 AND $angka_nilai <=100)
			{
				echo "A";
			}
			else if ($angka_nilai >= 91 AND $angka_nilai <=95)
			{
				echo "A-";
			}
			else if ($angka_nilai >= 86 AND $angka_nilai <=90)
			{
				echo "B+";
			}
			else if ($angka_nilai >= 81 AND $angka_nilai <=85)
			{
				echo "B";
			}
			else if ($angka_nilai >= 76 AND $angka_nilai <=80)
			{
				echo "B-";
			}
			else if ($angka_nilai >= 71 AND $angka_nilai <=75)
			{
				echo "<b><font color='red'>C+</b></font>";
			}
			else if ($angka_nilai >= 66 AND $angka_nilai <=70)
			{
				echo "<b><font color='red'>C</font></b>";
			}
			else if ($angka_nilai >= 61 AND $angka_nilai <=65)
			{
				echo "<b><font color='red'>C-</font></b>";
			}
			else if ($angka_nilai >= 0 AND $angka_nilai <=60)
			{
				echo "<b><font color='red'>D</font></b>";
			}
			 ?>
             </td> 
             <?php
			if($_SESSION['type_user']=="Admin")
			{
			?>     
            <td>
            <form action="halaman_utama.php?aksi_nilai=$aksi_nilai" method="post">
            <input type="hidden" name="kode_nilai" value="<?php echo $kode_nilai; ?>">
            <input class="update" name="proses" type="submit" value="Update" style="font-size:15px;">
            <input class="delete" name="proses" type="submit" value="Delete" style="font-size:15px;" onClick ="return confirm('Apakah Anda ingin menghapus data nilai <?php echo $kode_nilai; ?> ?')">
            </td>
            <?php } ?>
		</tr>
        </form>
		<?php
		;
	}
	?>
</table>
	</div>
    
    <!-- TGB -->
    <div id="tabs-7">
		<form action="halaman_utama.php?tabel_nilai=$tabel_nilai" method="post">
   Search : <input type="search" name="cari" placeholder="" style=
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
	font-size:15px;">
</form>

<font face="Calibri" size="2"><u>Harap gunakan <b>Nama Siswa</b> dalam pencarian Nilai</u> !</font><br><br>

<table id="daftar-table" border='0' bordercolor="black" cellpading='2' cellspacing='2' width='100%'>
	<tr align='center'>
		<th class="normal">Nama </th>
        <th class="normal">Nama Guru</th>
        <th class="normal">Mata Pelajaran / Standar Kompetensi</th>
        <th class="normal">Nilai Angka</th>
        <th class="normal">Nilai Huruf</th>
        <?php
		if($_SESSION['type_user']=="Admin")
		{
		?>   
        <th class="normal">Tools</th>
        <?php } ?>
	</tr>
	<?php
	include "koneksi.php";
		
	$tampilkan_isi = "select * from nilai n,siswa s,guru g,standar_kompetensi sk,mata_pelajaran mp,jurusan j
					  where s.nis=n.nis AND g.kode_guru=n.kode_guru AND sk.kode_sk=n.kode_sk AND mp.kode_mp=sk.kode_mp AND j.kode_jurusan=s.kode_jurusan AND s.kode_jurusan='JU0006';";
	
	if(isset($_POST['cari']) and $_POST['cari'] <> "")
	{
		$key = $_POST['cari'];
		$tampilkan_isi = "select * from nilai n,siswa s,guru g,standar_kompetensi sk,mata_pelajaran mp,jurusan j
					  where s.nis=n.nis AND g.kode_guru=n.kode_guru AND sk.kode_sk=n.kode_sk AND mp.kode_mp=sk.kode_mp AND j.kode_jurusan=s.kode_jurusan AND s.kode_jurusan='JU0006' and nama_siswa like '%$key%'";
		
		echo "<font size='3' face='Calibri'>Pencarian data nilai dengan kata '$key'</font>";
	}
	
	else if(isset($_POST['cari']) and $_POST['cari'] == "")
	{
		$tampilkan_isi = "select * from nilai n,siswa s,guru g,standar_kompetensi sk,mata_pelajaran mp,jurusan j
					  where s.nis=n.nis AND g.kode_guru=n.kode_guru AND sk.kode_sk=n.kode_sk AND mp.kode_mp=sk.kode_mp AND j.kode_jurusan=s.kode_jurusan AND s.kode_jurusan='JU0006';";
	}				  
	
	$tampilkan_isi_sql = mysqli_query($connect,$tampilkan_isi);
	
	while ($isi = mysqli_fetch_array($tampilkan_isi_sql))
	{
		$kode_nilai = $isi['kode_nilai'];
		$nama_siswa = $isi['nama_siswa'];
		$nama_guru = $isi['nama_guru'];
		$nama_mp = $isi['nama_mp'];
		$nama_sk = $isi['nama_sk'];
		$angka_nilai = $isi['angka_nilai'];
		
		?>
		<tr class="isi" align='left'> 
            <td><?php echo $nama_siswa ?> 
			<td><?php echo $nama_guru ?></td>
            <td><?php echo $nama_mp ?> | <?php echo $nama_sk ?></td>
            <td>
			<?php 
			if ($angka_nilai <=75)
			{
				echo "<b><font color='red'>".$angka_nilai."</b></font>";
			}
			else
			{
				echo $angka_nilai;
			}
			?>
            </td>
            <td>
			<?php
			if ($angka_nilai >=101)
			{
				echo "Angka melebihi kriteria penilaian";
			}
			else if ($angka_nilai >= 96 AND $angka_nilai <=100)
			{
				echo "A";
			}
			else if ($angka_nilai >= 91 AND $angka_nilai <=95)
			{
				echo "A-";
			}
			else if ($angka_nilai >= 86 AND $angka_nilai <=90)
			{
				echo "B+";
			}
			else if ($angka_nilai >= 81 AND $angka_nilai <=85)
			{
				echo "B";
			}
			else if ($angka_nilai >= 76 AND $angka_nilai <=80)
			{
				echo "B-";
			}
			else if ($angka_nilai >= 71 AND $angka_nilai <=75)
			{
				echo "<b><font color='red'>C+</b></font>";
			}
			else if ($angka_nilai >= 66 AND $angka_nilai <=70)
			{
				echo "<b><font color='red'>C</font></b>";
			}
			else if ($angka_nilai >= 61 AND $angka_nilai <=65)
			{
				echo "<b><font color='red'>C-</font></b>";
			}
			else if ($angka_nilai >= 0 AND $angka_nilai <=60)
			{
				echo "<b><font color='red'>D</font></b>";
			}
			 ?>
             </td> 
             <?php
			if($_SESSION['type_user']=="Admin")
			{
			?>     
            <td>
            <form action="halaman_utama.php?aksi_nilai=$aksi_nilai" method="post">
            <input type="hidden" name="kode_nilai" value="<?php echo $kode_nilai; ?>">
            <input class="update" name="proses" type="submit" value="Update" style="font-size:15px;">
            <input class="delete" name="proses" type="submit" value="Delete" style="font-size:15px;" onClick ="return confirm('Apakah Anda ingin menghapus data nilai <?php echo $kode_nilai; ?> ?')">
            </td>
            <?php } ?>
		</tr>
        </form>
		<?php
		;
	}
	?>
</table>
	</div>
    
    <!-- TITL -->
    <div id="tabs-8">
		<form action="halaman_utama.php?tabel_nilai=$tabel_nilai" method="post">
   Search : <input type="search" name="cari" placeholder="" style=
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
	font-size:15px;">
</form>

<font face="Calibri" size="2"><u>Harap gunakan <b>Nama Siswa</b> dalam pencarian Nilai</u> !</font><br><br>

<table id="daftar-table" border='0' bordercolor="black" cellpading='2' cellspacing='2' width='100%'>
	<tr align='center'>
		<th class="normal">Nama </th>
        <th class="normal">Nama Guru</th>
        <th class="normal">Mata Pelajaran / Standar Kompetensi</th>
        <th class="normal">Nilai Angka</th>
        <th class="normal">Nilai Huruf</th>
        <?php
		if($_SESSION['type_user']=="Admin")
		{
		?>   
        <th class="normal">Tools</th>
        <?php } ?>
	</tr>
	<?php
	include "koneksi.php";
		
	$tampilkan_isi = "select * from nilai n,siswa s,guru g,standar_kompetensi sk,mata_pelajaran mp,jurusan j
					  where s.nis=n.nis AND g.kode_guru=n.kode_guru AND sk.kode_sk=n.kode_sk AND mp.kode_mp=sk.kode_mp AND j.kode_jurusan=s.kode_jurusan AND s.kode_jurusan='JU0005';";
	
	if(isset($_POST['cari']) and $_POST['cari'] <> "")
	{
		$key = $_POST['cari'];
		$tampilkan_isi = "select * from nilai n,siswa s,guru g,standar_kompetensi sk,mata_pelajaran mp,jurusan j
					  where s.nis=n.nis AND g.kode_guru=n.kode_guru AND sk.kode_sk=n.kode_sk AND mp.kode_mp=sk.kode_mp AND j.kode_jurusan=s.kode_jurusan AND s.kode_jurusan='JU0005' and nama_siswa like '%$key%'";
		
		echo "<font size='3' face='Calibri'>Pencarian data nilai dengan kata '$key'</font>";
	}
	
	else if(isset($_POST['cari']) and $_POST['cari'] == "")
	{
		$tampilkan_isi = "select * from nilai n,siswa s,guru g,standar_kompetensi sk,mata_pelajaran mp,jurusan j
					  where s.nis=n.nis AND g.kode_guru=n.kode_guru AND sk.kode_sk=n.kode_sk AND mp.kode_mp=sk.kode_mp AND j.kode_jurusan=s.kode_jurusan AND s.kode_jurusan='JU0005';";
	}				  
	
	$tampilkan_isi_sql = mysqli_query($connect,$tampilkan_isi);
	
	while ($isi = mysqli_fetch_array($tampilkan_isi_sql))
	{
		$kode_nilai = $isi['kode_nilai'];
		$nama_siswa = $isi['nama_siswa'];
		$nama_guru = $isi['nama_guru'];
		$nama_mp = $isi['nama_mp'];
		$nama_sk = $isi['nama_sk'];
		$angka_nilai = $isi['angka_nilai'];
		
		?>
		<tr class="isi" align='left'> 
            <td><?php echo $nama_siswa ?> 
			<td><?php echo $nama_guru ?></td>
            <td><?php echo $nama_mp ?> | <?php echo $nama_sk ?></td>
            <td>
			<?php 
			if ($angka_nilai <=75)
			{
				echo "<b><font color='red'>".$angka_nilai."</b></font>";
			}
			else
			{
				echo $angka_nilai;
			}
			?>
            </td>
            <td>
			<?php
			if ($angka_nilai >=101)
			{
				echo "Angka melebihi kriteria penilaian";
			}
			else if ($angka_nilai >= 96 AND $angka_nilai <=100)
			{
				echo "A";
			}
			else if ($angka_nilai >= 91 AND $angka_nilai <=95)
			{
				echo "A-";
			}
			else if ($angka_nilai >= 86 AND $angka_nilai <=90)
			{
				echo "B+";
			}
			else if ($angka_nilai >= 81 AND $angka_nilai <=85)
			{
				echo "B";
			}
			else if ($angka_nilai >= 76 AND $angka_nilai <=80)
			{
				echo "B-";
			}
			else if ($angka_nilai >= 71 AND $angka_nilai <=75)
			{
				echo "<b><font color='red'>C+</b></font>";
			}
			else if ($angka_nilai >= 66 AND $angka_nilai <=70)
			{
				echo "<b><font color='red'>C</font></b>";
			}
			else if ($angka_nilai >= 61 AND $angka_nilai <=65)
			{
				echo "<b><font color='red'>C-</font></b>";
			}
			else if ($angka_nilai >= 0 AND $angka_nilai <=60)
			{
				echo "<b><font color='red'>D</font></b>";
			}
			 ?>
             </td> 
             <?php
			if($_SESSION['type_user']=="Admin")
			{
			?>     
            <td>
            <form action="halaman_utama.php?aksi_nilai=$aksi_nilai" method="post">
            <input type="hidden" name="kode_nilai" value="<?php echo $kode_nilai; ?>">
            <input class="update" name="proses" type="submit" value="Update" style="font-size:15px;">
            <input class="delete" name="proses" type="submit" value="Delete" style="font-size:15px;" onClick ="return confirm('Apakah Anda ingin menghapus data nilai <?php echo $kode_nilai; ?> ?')">
            </td>
            <?php } ?>
		</tr>
        </form>
		<?php
		;
	}
	?>
</table>
	</div>

</body>
</html>