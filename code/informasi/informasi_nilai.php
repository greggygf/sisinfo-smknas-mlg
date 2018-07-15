<b><font color="#2133F8"> NILAI</font></b> <br><br>
<hr color="#2133F8" size="3px" width="100%"><br>

<form action="halaman_utama.php?informasi_nilai=$informasi_nilai" method="post">
   <table width="100%">
   <tr>
   	<td><a href="pdf_nilai_siswa.php" target="_blank"><input class="button" type="button" value="Print"></a></td>
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
		<td align="right"><font face="Calibri" size="2"><u>Harap gunakan <b>Mata Pelajaran</b> dalam pencarian Nilai</u> !</font></td>
	   </tr>
	</table>
</form>

<br>

<table id="daftar-table" border='0' bordercolor="black" cellpading='2' cellspacing='2' width='100%'>
	<tr align='center'>
		<th class="normal">No</th>
        <th class="normal">Mata Pelajaran</th>
        <th class="normal">Standar Kompetensi</th>
        <th class="normal">Nilai Angka</th>
        <th class="normal">Nilai Huruf</th>
	</tr>
	<?php
	include "koneksi.php";
	$no=1;
	$informasi = $_SESSION['nis'];
		
	$tampilkan_isi = "select * from nilai n,siswa s,guru g,standar_kompetensi sk,mata_pelajaran mp,jurusan j
					  where s.nis=n.nis AND g.kode_guru=n.kode_guru AND sk.kode_sk=n.kode_sk AND mp.kode_mp=sk.kode_mp AND j.kode_jurusan=s.kode_jurusan AND n.nis='$informasi';";
	
	if(isset($_POST['cari']) and $_POST['cari'] <> "")
	{
		$key = $_POST['cari'];
		$tampilkan_isi = "select * from nilai n,siswa s,guru g,standar_kompetensi sk,mata_pelajaran mp,jurusan j
					  where s.nis=n.nis AND g.kode_guru=n.kode_guru AND sk.kode_sk=n.kode_sk AND mp.kode_mp=sk.kode_mp AND j.kode_jurusan=s.kode_jurusan AND n.nis='$informasi' and nama_mp like '%$key%'";
		
		echo "<font size='3' face='Calibri'>Pencarian data nilai dengan kata '$key'</font>";
	}
	
	else if(isset($_POST['cari']) and $_POST['cari'] == "")
	{
		$tampilkan_isi = "select * from nilai n,siswa s,guru g,standar_kompetensi sk,mata_pelajaran mp,jurusan j
					  where s.nis=n.nis AND g.kode_guru=n.kode_guru AND sk.kode_sk=n.kode_sk AND mp.kode_mp=sk.kode_mp AND j.kode_jurusan=s.kode_jurusan AND n.nis='$informasi'";
	}				  
	
	$tampilkan_isi_sql = mysqli_query($connect,$tampilkan_isi);
	
	while ($isi = mysqli_fetch_array($tampilkan_isi_sql))
	{
		$kode_nilai = $isi['kode_nilai'];
		$nama_guru = $isi['nama_guru'];
		$nama_mp = $isi['nama_mp'];
		$nama_sk = $isi['nama_sk'];
		$angka_nilai = $isi['angka_nilai'];
		
		?>
		<tr class="isi" align='left'> 
            <td><?php echo $no ?></td>
			<td><?php echo $nama_mp ?><br>
            <font size="3px"><b><i>Nama Guru : <?php echo $nama_guru ?></i></b></font></td>
            <td><?php echo $nama_sk ?></td>
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
				echo "C+";
			}
			else if ($angka_nilai >= 66 AND $angka_nilai <=70)
			{
				echo "C";
			}
			else if ($angka_nilai >= 61 AND $angka_nilai <=65)
			{
				echo "C-";
			}
			else if ($angka_nilai >= 0 AND $angka_nilai <=60)
			{
				echo "D";
			}
			 ?>
             </td>
		</tr>
        </form>
		<?php
		;
		$no++;
	}
	?>
</table>