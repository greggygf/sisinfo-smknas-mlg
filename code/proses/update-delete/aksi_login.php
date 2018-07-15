<body>
<?php
include "koneksi.php";
$aksi = strtolower($_POST['proses']);
$username = $_POST['username'];

if($aksi == "delete")
{
	$delete_login = "DELETE from login where username='$username'";

	$delete_login_query = mysqli_query($connect,$delete_login);

	if ($delete_login_query)
	{
		header("location:halaman_utama.php?tabel_login=$tabel_login");
	}
	else
	{
		echo "Delete gagal dijalankan";
	}
}

else
{

include "koneksi.php";

$query=mysqli_query($connect,"select * from login where username='$username'");
?>

<br>
<center><h2>Update Data Akun Login</h2></center><br>

 <form action="code/proses/update-delete/update/update_login.php" method="POST">
        
    <table id="tabel-pendaftaran">
    <?php
	while($isi=mysqli_fetch_array($query)){
	?>
    <tr>
        <td><b>Username</b></td>
    </tr>
    <tr>
        <td><input type="text" name='username' size="25px" maxlength="6" style="background-color:#E0DFDF" value="<?php echo $username;?>" readonly></td>
    </tr>
    
    <tr>
        <td><b>Password</b></td>
    </tr>
    <tr>
        <td><input type="text" name="password" size="25px" maxlength="35" placeholder="ketikkan nama jurusan." value="<?php echo $isi['password'];?>" required></td>
    </tr>
    
    <tr>
    	<td><b>Type User</b></td>
    </tr>
    <tr>
        <td>
        <select name="type_user">
    	<option value="" disabled selected>Pilih Type User</option>
    	<?php if($isi['type_user'] == "Admin") { ?>
		<option value="Admin" selected>Admin</option>
    	<option value="Siswa">Siswa</option>
    	<?php ;} else { ?>
    	<option value="Admin">Admin</option>
    	<option value="Siswa" selected>Siswa</option>
    	<?php ;} ?>
    	</select>&nbsp;&nbsp;&nbsp;  <input class="button" type="submit" value="Update">
        </td>
    </tr>
    
    <?php } ?> 
</table>
<?php
}
?>
</form>