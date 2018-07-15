<script type="text/javascript">
function validasi_input(form){
  if (form.password.value !== form.cpassword.value){
	alert("Konfirmasi Password harus sama dengan password sebelumnya!");
    form.cpassword.focus();
    return (false);
  }
return (true);
}
</script>

<br>
<center><h2>Tambah Data Akun Login</h2></center><br><br><hr><br>

 <form action="code/proses/input/input_login.php" method="POST" onsubmit="return validasi_input(this)">
        
    <table id="tabel-pendaftaran">
     
    <tr>
        <td><b>Siswa *</b></td>
    </tr>
    <tr>
        <td>
        <select name="nis">
        <option value="" disabled selected>Pilih Siswa</option>
        <?php include "koneksi.php";
		$tampilkan_isi = "select s.nis,nama_siswa from siswa s
				          left outer join login l
					      ON s.nis = l.nis
					      WHERE l.nis is NULL;";
						  
		$tampilkan_isi_sql = mysqli_query($connect,$tampilkan_isi);
	
		while ($isi = mysqli_fetch_array($tampilkan_isi_sql))
		{
			$nis = $isi['nis'];
			$nama_siswa = $isi['nama_siswa'];
		?>
		<option value="<?php echo $nis ?>"><?php echo $nis ?> | <?php echo $nama_siswa ?>
    	<?php
		;
		}
		?>
    	</option>
        </td>
    </tr>
    
    <tr>
        <td><b>Guru *</b></td>
    </tr>
    
    <tr>
        <td>
        <select name="kode_guru">
        <option value="" disabled selected>Pilih Guru</option>
        
		<?php include "koneksi.php";
		
		$tampilkan_isi = "select g.kode_guru,nama_guru from guru g
					  	  left outer join login l
					  	  ON g.kode_guru = l.kode_guru
					  	  WHERE l.kode_guru is NULL;";
						  
		$tampilkan_isi_sql = mysqli_query($connect,$tampilkan_isi);
	
		while ($isi = mysqli_fetch_array($tampilkan_isi_sql))
		{
			$kode_guru = $isi['kode_guru'];
			$nama_guru = $isi['nama_guru'];
		?>
		<option value="<?php echo $kode_guru ?>"><?php echo $kode_guru ?> | <?php echo $nama_guru ?>
    	<?php
		;
		}
		?>
    	</option>
        </td>
    </tr>
    
    <tr>
        <td><b>Username</b></td>
    </tr>
    
    <tr>
        <td><input type="text" name="username" size="25px" maxlength="20" placeholder="ketikkan username.." required></td>
    </tr>
    
    <tr>
        <td><b>Password</b></td>
    </tr>
    
    <tr>
        <td><input type="password" name="password" size="25px" maxlength="20" placeholder="ketikkan password.." required></td>
    </tr>
    
    <tr>
        <td><b>Ulangi Password</b></td>
    </tr>
    
    <tr>
        <td><input type="password" name="cpassword" size="25px" maxlength="20" placeholder="ulangi password sebelumnya.." required></td>
    </tr>
    
    <tr>
    	<td><b>Type User</b></td>
    </tr>
    
    <tr>
        <td>
        <select name="type_user" required>
    		<option value="" disabled selected>Pilih Type User</option>
			<option value="Admin">Admin</option>
    		<option value="Guru">Guru</option>
    		<option value="Siswa">Siswa</option>
    	</select>&nbsp;&nbsp;&nbsp;  <input class="button" type="submit" value="Simpan">
        </td>
    </tr>
    
    <tr>
    	<td><font size="3px" color="red"><b>* isi salah satu antara guru dan siswa</b></font></td>
    </tr>
    
	</table>

</form>