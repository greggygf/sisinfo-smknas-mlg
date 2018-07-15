<b><font color="#2133F8"> AKUN LOGIN</font></b> <br><br>
<hr color="#2133F8" size="3px" width="100%"><br>

<form action="halaman_utama.php?tabel_login=$tabel_login" method="post">
   <table width="100%">
   <tr>
   	<td>
	   <a href="halaman_utama.php?formulir_login=$formulir_login"><input class="button" type="button" value="Tambah"></a>
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
		<th class="normal">Username</th>
		<th class="normal">Password</th>
        <th class="normal">Type User</th>
        <th class="normal">Tools</th>
	</tr>
	<?php
	include "koneksi.php";
		
	$tampilkan_isi = "select * from `login`";
	
	if(isset($_POST['cari']) and $_POST['cari'] <> "")
	{
		$key = $_POST['cari'];
		$tampilkan_isi = "SELECT * from `login` where username LIKE '%$key%' OR password LIKE '%$key%' OR type_user LIKE '%$key%' ";
		
		echo "<font size='3' face='Calibri'>Pencarian data login dengan kata '$key'</font>";
	}
	
	else if(isset($_POST['cari']) and $_POST['cari'] == "")
	{
		$tampilkan_isi = "select * from `login`";
	}
	
	$tampilkan_isi_sql = mysqli_query($connect,$tampilkan_isi);
	
	while ($isi = mysqli_fetch_array($tampilkan_isi_sql))
	{
		$username = $isi['username'];
		$password = $isi['password'];
		$type_user = $isi['type_user'];
		
		?>
		<tr class="isi" align='left'>
			<td><?php echo $username ?></td> 
			<td><?php echo $password ?></td>
            <td><?php echo $type_user ?></td>   
            <td>
            <form action="halaman_utama.php?aksi_login=$aksi_login" method="post">
            <input type="hidden" name="username" value="<?php echo $username; ?>">
            <input class="update" name="proses" type="submit" value="Update">
            <input class="delete" name="proses" type="submit" value="Delete" onClick ="return confirm('Apakah Anda ingin menghapus akun login <?php echo $username; ?> ?')">
            </td>
		</tr>
        </form>
		<?php
		;
	}
	?>
</table>