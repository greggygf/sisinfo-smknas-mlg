<br>
<center><h2>Tambah Data Jurusan</h2></center><br><br><hr><br>

 <form action="code/proses/input/input_jurusan.php" method="POST">
        
     <table id="tabel-pendaftaran">
    <tr>
        <td><b>Kode Jurusan</b></td>
    </tr>
    <tr>
        <td><?php include "koneksi.php";
	$tampilkan_isi = "select count(kode_jurusan) as jumlah from jurusan;";
	$tampilkan_isi_sql = mysqli_query($connect,$tampilkan_isi);
	$no = 1;
	
	while ($isi = mysqli_fetch_array($tampilkan_isi_sql))
	{
		$jumlah = $isi['jumlah'];
	?><input type="text" name='kode_jurusan' size="25px" maxlength="6" style="background-color:#E0DFDF" value="JU-<?php echo $no+$jumlah ?>" readonly></td>
    </tr>
    <?php ; } ?>
    
    <tr>
        <td><b>Nama Jurusan</b></td>
    </tr>
    <tr>
        <td><input type="text" name="nama_jurusan" size="25px" maxlength="20" placeholder="ketikkan nama jurusan.." required>&nbsp;&nbsp;&nbsp;  <input class="button" type="submit" value="Simpan"></td>
    </tr>
    
</table>

</form>

        
