<br>
<center><h2>Tambah Data Mata Pelajaran</h2></center><br><br><hr><br>

 <form action="code/proses/input/input_mapel.php" method="POST">
        
     <table id="tabel-pendaftaran">
    <tr>
        <td><b>Kode Mata Pelajaran</b></td>
    </tr>
    <tr>
        <td><?php include "koneksi.php";
	$tampilkan_isi = "select count(kode_mp) as jumlah from mata_pelajaran;";
	$tampilkan_isi_sql = mysqli_query($connect,$tampilkan_isi);
	$no = 1;
	
	while ($isi = mysqli_fetch_array($tampilkan_isi_sql))
	{
		$jumlah = $isi['jumlah'];
	?><input type="text" name='kode_mp' size="25px" maxlength="6" style="background-color:#E0DFDF" value="MP-<?php echo $no+$jumlah ?>" readonly></td>
    </tr>
    <?php ; } ?>
    
    <tr>
        <td><b>Nama Mata Pelajaran</b></td>
    </tr>
    <tr>
        <td><input type="text" name="nama_mp" size="25px" maxlength="20" placeholder="ketikkan nama mata pelajaran.." required>&nbsp;&nbsp;&nbsp;  <input class="button" type="submit" value="Simpan"></td>
    </tr>
    
</table>

</form>

        
