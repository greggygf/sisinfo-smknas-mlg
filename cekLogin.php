<?php
	include "koneksi.php";
	$username=$_POST['username']; // simpan data username dari form ke variabel
	$password=$_POST['password']; // simpan data password dari form ke variabel
	$login=
	"
	SELECT l.username,l.password,l.type_user,l.kode_guru,l.nis,g.nama_guru,s.nama_siswa FROM login l
	LEFT JOIN guru g
	ON g.kode_guru=l.kode_guru
	LEFT JOIN siswa s
	ON s.nis=l.nis
	where username='$username' AND BINARY password='$password'";
	
	$login_query=mysqli_query($connect,$login);
	$data=mysqli_fetch_array($login_query);
	
	if($data)
	{
		session_start();
		$_SESSION['username'] = $data['username'];
		$_SESSION['password'] = $data['password'];
		$_SESSION['type_user'] = $data['type_user'];
		$_SESSION['kode_guru'] = $data['kode_guru'];
		$_SESSION['nis'] = $data['nis'];
		$_SESSION['nama_guru'] = $data['nama_guru'];
		$_SESSION['nama_siswa'] = $data['nama_siswa'];
		header('location:halaman_utama.php?home=$home');
	}
	else
	{
		echo "
		<script type='text/javascript'>
		alert('Username atau Password anda salah!')
		window.location='index.php';
		</script>";
	}
?>