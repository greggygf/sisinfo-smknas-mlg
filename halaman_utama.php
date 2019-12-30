<?php
session_start();
if (empty($_SESSION['username']) and empty($_SESSION['password'])) {
	echo "<script type='text/javascript'>
	alert('SILAKAN LOGIN TERLEBIH DAHULU!')
	window.location='index.php';
	</script>";
} else {
?>

	<!doctype html>
	<html>

	<head>
		<meta charset="utf-8">
		<title>SMK Nasional Malang</title>
		<link rel="stylesheet" type="text/css" href="css/style.css" />
		<link href='logo/smk.png' rel='SHORTCUT ICON' />
	</head>

	<body>

		<div id="luar">
			<div id="welcome">
				Selamat Datang ,
				<?php
				if ($_SESSION['type_user'] == "Guru") {
				?><b><?php echo $_SESSION['nama_guru']; ?></b> <a href="logout.php" onClick="return confirm('Apakah anda yakin untuk logout, <?php echo $_SESSION['nama_guru']; ?>?')">Logout</a>
				<?php } else if ($_SESSION['type_user'] == "Siswa") { ?>
					<b><?php echo $_SESSION['nama_siswa']; ?></b> <a href="logout.php" onClick="return confirm('Apakah anda yakin untuk logout, <?php echo $_SESSION['nama_siswa']; ?>?')">Logout</a>
				<?php } else { ?>
					<b><?php echo $_SESSION['username']; ?></b> <a href="logout.php" onClick="return confirm('Apakah anda yakin untuk logout, <?php echo $_SESSION['username']; ?>?')">Logout</a>
				<?php } ?>



			</div>

			<div id="header">
			</div>

			<div id="menu">
				<nav>
					<ul>
						<?php
						if ($_SESSION['type_user'] != "Siswa") {
						?>
							<a href="halaman_utama.php?tabel_nilai=$tabel_nilai">
								<li>NILAI</li>
							</a>
						<?php } else if ($_SESSION['type_user'] == "Siswa") {
						?>
							<a href="halaman_utama.php?informasi_nilai=$informasi_nilai">
								<li>NILAI</li>
							</a>
						<?php } ?>
						<?php
						if ($_SESSION['type_user'] != "Siswa") {
						?>
							<a href="halaman_utama.php?tabel_wali_murid=$tabel_wali_murid">
								<li>WALI MURID</li>
							</a>
						<?php } else if ($_SESSION['type_user'] == "Siswa") {
						?>
							<a href="halaman_utama.php?informasi_walimurid=$informasi_walimurid">
								<li>WALI MURID</li>
							</a>
						<?php } ?>
						<?php
						if ($_SESSION['type_user'] != "Siswa") {
						?>
							<a href="halaman_utama.php?tabel_siswa=$tabel_siswa">
								<li>SISWA</li>
							</a>
						<?php } else if ($_SESSION['type_user'] == "Siswa") {
						?>
							<a href="halaman_utama.php?informasi_siswa=$informasi_siswa">
								<li>SISWA</li>
							</a>
						<?php } ?>
						<?php if ($_SESSION['type_user'] == "Admin") { ?>
							<a href="halaman_utama.php?tabel_guru=$tabel_guru">
								<li>GURU</li>
							</a>
						<?php } else if ($_SESSION['type_user'] == "Guru") { ?>
							<a href="halaman_utama.php?informasi_guru=$informasi_guru">
								<li>GURU</li>
							</a>
						<?php } ?>
						<?php
						if ($_SESSION['type_user'] == "Admin") { ?>
							<a href="halaman_utama.php?tabel_standar_kompetensi=$tabel_standar_kompetensi">
								<li>STANDAR KOMPETENSI</li>
							</a>
						<?php } else if ($_SESSION['type_user'] == "Guru") { ?>
							<a href="halaman_utama.php?tabel_standar_kompetensi_untuk_guru=$tabel_standar_kompetensi_untuk_guru">
								<li>STANDAR KOMPETENSI</li>
							</a>
						<?php } ?>
						<?php if ($_SESSION['type_user'] != "Siswa") { ?>
							<a href="halaman_utama.php?tabel_jurusan=$tabel_jurusan">
								<li>JURUSAN</li>
							</a>
						<?php } ?>
						<a href="halaman_utama.php?tabel_mapel=$tabel_mapel">
							<li>MATA PELAJARAN</li>
						</a>
						<?php
						if ($_SESSION['type_user'] == "Admin") {
						?>
							<a href="halaman_utama.php?tabel_login=$tabel_login">
								<li>ACCOUNT</li>
							</a>
						<?php } ?>
						<a href="halaman_utama.php?home=$home">
							<li>HOME</li>
						</a>


					</ul>
				</nav>
			</div>

			<?php
			$aksi_guru = "code/proses/update-delete/aksi_guru.php";
			$aksi_login = "code/proses/update-delete/aksi_login.php";
			$aksi_jurusan = "code/proses/update-delete/aksi_jurusan.php";
			$aksi_mapel = "code/proses/update-delete/aksi_mapel.php";
			$aksi_nilai = "code/proses/update-delete/aksi_nilai.php";
			$aksi_standar_kompetensi = "code/proses/update-delete/aksi_standar_kompetensi.php";
			$aksi_siswa = "code/proses/update-delete/aksi_siswa.php";
			$aksi_wali_murid = "code/proses/update-delete/aksi_wali_murid.php";
			$formulir_guru = "code/formulir/formulir_guru.php";
			$formulir_jurusan = "code/formulir/formulir_jurusan.php";
			$formulir_login = "code/formulir/formulir_login.php";
			$formulir_mapel = "code/formulir/formulir_mapel.php";
			$formulir_nilai = "code/formulir/formulir_nilai.php";
			$formulir_nilai_untuk_guru = "code/formulir/formulir_nilai_untuk_guru.php";
			$formulir_standar_kompetensi = "code/formulir/formulir_standar_kompetensi.php";
			$formulir_siswa = "code/formulir/formulir_siswa.php";
			$formulir_wali_murid = "code/formulir/formulir_wali_murid.php";
			$informasi_guru = "code/informasi/informasi_guru.php";
			$informasi_nilai = "code/informasi/informasi_nilai.php";
			$informasi_siswa = "code/informasi/informasi_siswa.php";
			$informasi_walimurid = "code/informasi/informasi_walimurid.php";
			$home = "home.php";
			$pdf_jurusan = "pdf_jurusan.php";
			$tabel_guru = "code/tabel/tabel_guru.php";
			$tabel_jurusan = "code/tabel/tabel_jurusan.php";
			$tabel_login = "code/tabel/tabel_login.php";
			$tabel_mapel = "code/tabel/tabel_mapel.php";
			$tabel_nilai = "code/tabel/tabel_nilai.php";
			$tabel_siswa = "code/tabel/tabel_siswa.php";
			$tabel_standar_kompetensi = "code/tabel/tabel_standar_kompetensi.php";
			$tabel_standar_kompetensi_untuk_guru = "code/tabel/tabel_standar_kompetensi_untuk_guru.php";
			$tabel_wali_murid = "code/tabel/tabel_wali_murid.php";
			?>


			<div id="konten">
				<?php
				if (isset($_GET['home'])) {
					require_once $home;
				} else if (isset($_GET['formulir_guru'])) {
					require_once $formulir_guru;
				} else if (isset($_GET['formulir_jurusan'])) {
					require_once $formulir_jurusan;
				} else if (isset($_GET['formulir_login'])) {
					require_once $formulir_login;
				} else if (isset($_GET['formulir_mapel'])) {
					require_once $formulir_mapel;
				} else if (isset($_GET['formulir_nilai'])) {
					require_once $formulir_nilai;
				} else if (isset($_GET['formulir_nilai_untuk_guru'])) {
					require_once $formulir_nilai_untuk_guru;
				} else if (isset($_GET['formulir_siswa'])) {
					require_once $formulir_siswa;
				} else if (isset($_GET['formulir_standar_kompetensi'])) {
					require_once $formulir_standar_kompetensi;
				} else if (isset($_GET['formulir_wali_murid'])) {
					require_once $formulir_wali_murid;
				} else if (isset($_GET['informasi_guru'])) {
					require_once $informasi_guru;
				} else if (isset($_GET['informasi_nilai'])) {
					require_once $informasi_nilai;
				} else if (isset($_GET['informasi_siswa'])) {
					require_once $informasi_siswa;
				} else if (isset($_GET['informasi_walimurid'])) {
					require_once $informasi_walimurid;
				} else if (isset($_GET['tabel_guru'])) {
					require_once $tabel_guru;
				} else if (isset($_GET['tabel_jurusan'])) {
					require_once $tabel_jurusan;
				} else if (isset($_GET['tabel_login'])) {
					require_once $tabel_login;
				} else if (isset($_GET['tabel_mapel'])) {
					require_once $tabel_mapel;
				} else if (isset($_GET['tabel_nilai'])) {
					require_once $tabel_nilai;
				} else if (isset($_GET['tabel_siswa'])) {
					require_once $tabel_siswa;
				} else if (isset($_GET['tabel_standar_kompetensi'])) {
					require_once $tabel_standar_kompetensi;
				} else if (isset($_GET['tabel_standar_kompetensi_untuk_guru'])) {
					require_once $tabel_standar_kompetensi_untuk_guru;
				} else if (isset($_GET['tabel_wali_murid'])) {
					require_once $tabel_wali_murid;
				} else if (isset($_GET['aksi_jurusan'])) {
					require_once $aksi_jurusan;
				} else if (isset($_GET['aksi_mapel'])) {
					require_once $aksi_mapel;
				} else if (isset($_GET['aksi_guru'])) {
					require_once $aksi_guru;
				} else if (isset($_GET['aksi_nilai'])) {
					require_once $aksi_nilai;
				} else if (isset($_GET['aksi_standar_kompetensi'])) {
					require_once $aksi_standar_kompetensi;
				} else if (isset($_GET['aksi_siswa'])) {
					require_once $aksi_siswa;
				} else if (isset($_GET['aksi_wali_murid'])) {
					require_once $aksi_wali_murid;
				} else if (isset($_GET['aksi_login'])) {
					require_once $aksi_login;
				} else if (isset($_GET['pdf_jurusan'])) {
					require_once $pdf_jurusan;
				}
				?>

			</div>
		</div>

	<?php } ?>