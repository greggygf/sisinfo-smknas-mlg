<?php

require_once("koneksi.php");

// RPL

$html2 = '

<img src="logo/kop.png" width="500">

<hr>

<font face="Calibri">DAFTAR SISWA</font>

<br><br>

 <i><b>Rekayasa Perangkat Lunak</b></i>
 <table border="1" bordercolor="#D3D3D3" style="width:100%">
 <!-- Ini Header Tabelnya -->
 <thead>
 <tr style="text-align:left" class="headerrow">
 <th width="50">NIS</th>
 <th width="200">Nama</th>
 <th width="40">Kelas</th>
 <th width="150">TTL</th>
 <th width="50">Jenis Kelamin</th>
 <th width="40">Agama</th>
 <th width="40">Alamat</th>
 </tr>
 </thead>
 <!-- Ini Body Tabelnya -->
 <tbody>';
 // Tampilkan Data Dari Tabel Siswa
 
 $sql = mysqli_query($connect,"select * from siswa s,jurusan j where s.kode_jurusan='JU0001' and j.kode_jurusan='JU0001'");
 while ($data = mysqli_fetch_array($sql)){  
  $html2 .= '<tr>';
  $html2 .= '<td width="35">'.$data['nis'].'</td>';
  $html2 .= '<td>'.$data['nama_siswa'].'</td>';
  $html2 .= '<td>'.$data['kelas'].'</td>';
  $html2 .= '<td>'.$data['tempat_lahir'].','.$data['tanggal_lahir'].'</td>';
  $html2 .= '<td width="50">'.$data['jenis_kelamin'].'</td>';
  $html2 .= '<td>'.$data['agama'].'</td>';
  $html2 .= '<td>'.$data['alamat_siswa'].'</td>';
  $html2 .= '</tr>';
 $no++;
 }
$html2 .= '</tbody></table><br><br>';

// TKJ

$html3 = '

 <i><b>Teknik Komputer dan Jaringan</b></i>
 <table border="1" bordercolor="#D3D3D3" style="width:100%">
 <!-- Ini Header Tabelnya -->
 <thead>
 <tr style="text-align:left" class="headerrow">
 <th width="50">NIS</th>
 <th width="200">Nama</th>
 <th width="40">Kelas</th>
 <th width="150">TTL</th>
 <th>Jenis Kelamin</th>
 <th width="40">Agama</th>
 <th>Alamat</th>
 </tr>
 </thead>
 <!-- Ini Body Tabelnya -->
 <tbody>';
 // Tampilkan Data Dari Tabel Siswa
 
 $sql = mysqli_query($connect,"select * from siswa s,jurusan j where s.kode_jurusan='JU0008' and j.kode_jurusan='JU0008' order by kelas");
 while ($data = mysqli_fetch_array($sql)){  
  $html3 .= '<tr>';
  $html3 .= '<td width="35">'.$data['nis'].'</td>';
  $html3 .= '<td>'.$data['nama_siswa'].'</td>';
  $html3 .= '<td>'.$data['kelas'].'</td>';
  $html3 .= '<td>'.$data['tempat_lahir'].','.$data['tanggal_lahir'].'</td>';
  $html3 .= '<td width="50">'.$data['jenis_kelamin'].'</td>';
  $html3 .= '<td>'.$data['agama'].'</td>';
  $html3 .= '<td>'.$data['alamat_siswa'].'</td>';
  $html3 .= '</tr>';
 $no++;
 }
$html3 .= '</tbody></table><br><br>';

// MM

$html7 = '

 <i><b>Mutlimedia</b></i>
 <table border="1" bordercolor="#D3D3D3" style="width:100%">
 <!-- Ini Header Tabelnya -->
 <thead>
 <tr style="text-align:left" class="headerrow">
 <th width="50">NIS</th>
 <th width="200">Nama</th>
 <th width="40">Kelas</th>
 <th width="150">TTL</th>
 <th>Jenis Kelamin</th>
 <th width="40">Agama</th>
 <th>Alamat</th>
 </tr>
 </thead>
 <!-- Ini Body Tabelnya -->
 <tbody>';
 // Tampilkan Data Dari Tabel Siswa
 
 $sql = mysqli_query($connect,"select * from siswa s,jurusan j where s.kode_jurusan='JU0007' and j.kode_jurusan='JU0007' order by kelas");
 while ($data = mysqli_fetch_array($sql)){  
  $html7 .= '<tr>';
  $html7 .= '<td width="35">'.$data['nis'].'</td>';
  $html7 .= '<td>'.$data['nama_siswa'].'</td>';
  $html7 .= '<td>'.$data['kelas'].'</td>';
  $html7 .= '<td>'.$data['tempat_lahir'].','.$data['tanggal_lahir'].'</td>';
  $html7 .= '<td width="50">'.$data['jenis_kelamin'].'</td>';
  $html7 .= '<td>'.$data['agama'].'</td>';
  $html7 .= '<td>'.$data['alamat_siswa'].'</td>';
  $html7 .= '</tr>';
 $no++;
 }
$html7 .= '</tbody></table><br><br>';

// GB

$html4 = '

 <i><b>Teknik Gambar Bangunan</b></i>
 <table border="1" bordercolor="#D3D3D3" style="width:100%">
 <!-- Ini Header Tabelnya -->
 <thead>
 <tr style="text-align:left" class="headerrow">
 <th width="50">NIS</th>
 <th width="200">Nama</th>
 <th width="40">Kelas</th>
 <th width="150">TTL</th>
 <th>Jenis Kelamin</th>
 <th width="40">Agama</th>
 <th>Alamat</th>
 </tr>
 </thead>
 <!-- Ini Body Tabelnya -->
 <tbody>';
 // Tampilkan Data Dari Tabel Siswa
 
 $sql = mysqli_query($connect,"select * from siswa s,jurusan j where s.kode_jurusan='JU0006' and j.kode_jurusan='JU0006'");
 while ($data = mysqli_fetch_array($sql)){  
  $html4 .= '<tr>';
  $html4 .= '<td width="35">'.$data['nis'].'</td>';
  $html4 .= '<td>'.$data['nama_siswa'].'</td>';
  $html4 .= '<td>'.$data['kelas'].'</td>';
  $html4 .= '<td>'.$data['tempat_lahir'].','.$data['tanggal_lahir'].'</td>';
  $html4 .= '<td width="50">'.$data['jenis_kelamin'].'</td>';
  $html4 .= '<td>'.$data['agama'].'</td>';
  $html4 .= '<td>'.$data['alamat_siswa'].'</td>';
  $html4 .= '</tr>';
 $no++;
 }
$html4 .= '</tbody></table><br><br>';

// TPM

$html5 = '

 <i><b>Teknik Pemesinan</b></i>
 <table border="1" bordercolor="#D3D3D3" style="width:100%">
 <!-- Ini Header Tabelnya -->
 <thead>
 <tr style="text-align:left" class="headerrow">
 <th width="50">NIS</th>
 <th width="200">Nama</th>
 <th width="40">Kelas</th>
 <th width="150">TTL</th>
 <th>Jenis Kelamin</th>
 <th width="40">Agama</th>
 <th>Alamat</th>
 </tr>
 </thead>
 <!-- Ini Body Tabelnya -->
 <tbody>';
 // Tampilkan Data Dari Tabel Siswa
 
 $sql = mysqli_query($connect,"select * from siswa s,jurusan j where s.kode_jurusan='JU0002' and j.kode_jurusan='JU0002'");
 while ($data = mysqli_fetch_array($sql)){  
  $html5 .= '<tr>';
  $html5 .= '<td width="35">'.$data['nis'].'</td>';
  $html5 .= '<td>'.$data['nama_siswa'].'</td>';
  $html5 .= '<td>'.$data['kelas'].'</td>';
  $html5 .= '<td>'.$data['tempat_lahir'].','.$data['tanggal_lahir'].'</td>';
  $html5 .= '<td width="50">'.$data['jenis_kelamin'].'</td>';
  $html5 .= '<td>'.$data['agama'].'</td>';
  $html5 .= '<td>'.$data['alamat_siswa'].'</td>';
  $html5 .= '</tr>';
 $no++;
 }
$html5 .= '</tbody></table><br><br>';

// TIPTL

$html6 = '

 <i><b>Teknik Instalasi Tenaga Listrik</b></i>
 <table border="1" bordercolor="#D3D3D3" style="width:100%">
 <!-- Ini Header Tabelnya -->
 <thead>
 <tr style="text-align:left" class="headerrow">
 <th width="50">NIS</th>
 <th width="200">Nama</th>
 <th width="40">Kelas</th>
 <th width="150">TTL</th>
 <th>Jenis Kelamin</th>
 <th width="40">Agama</th>
 <th>Alamat</th>
 </tr>
 </thead>
 <!-- Ini Body Tabelnya -->
 <tbody>';
 // Tampilkan Data Dari Tabel Siswa
 
 $sql = mysqli_query($connect,"select * from siswa s,jurusan j where s.kode_jurusan='JU0005' and j.kode_jurusan='JU0005'");
 while ($data = mysqli_fetch_array($sql)){  
  $html6 .= '<tr>';
  $html6 .= '<td width="35">'.$data['nis'].'</td>';
  $html6 .= '<td>'.$data['nama_siswa'].'</td>';
  $html6 .= '<td>'.$data['kelas'].'</td>';
  $html6 .= '<td>'.$data['tempat_lahir'].','.$data['tanggal_lahir'].'</td>';
  $html6 .= '<td width="50">'.$data['jenis_kelamin'].'</td>';
  $html6 .= '<td>'.$data['agama'].'</td>';
  $html6 .= '<td>'.$data['alamat_siswa'].'</td>';
  $html6 .= '</tr>';
 $no++;
 }
$html6 .= '</tbody></table>';

// TKR

$html8 = '

 <i><b>Teknik Kendaraan Ringan</b></i>
 <table border="1" bordercolor="#D3D3D3" style="width:100%">
 <!-- Ini Header Tabelnya -->
 <thead>
 <tr style="text-align:left" class="headerrow">
 <th width="50">NIS</th>
 <th width="200">Nama</th>
 <th width="40">Kelas</th>
 <th width="150">TTL</th>
 <th>Jenis Kelamin</th>
 <th width="40">Agama</th>
 <th>Alamat</th>
 </tr>
 </thead>
 <!-- Ini Body Tabelnya -->
 <tbody>';
 // Tampilkan Data Dari Tabel Siswa
 
 $sql = mysqli_query($connect,"select * from siswa s,jurusan j where s.kode_jurusan='JU0003' and j.kode_jurusan='JU0003'");
 while ($data = mysqli_fetch_array($sql)){  
  $html8 .= '<tr>';
  $html8 .= '<td width="35">'.$data['nis'].'</td>';
  $html8 .= '<td>'.$data['nama_siswa'].'</td>';
  $html8 .= '<td>'.$data['kelas'].'</td>';
  $html8 .= '<td>'.$data['tempat_lahir'].','.$data['tanggal_lahir'].'</td>';
  $html8 .= '<td width="50">'.$data['jenis_kelamin'].'</td>';
  $html8 .= '<td>'.$data['agama'].'</td>';
  $html8 .= '<td>'.$data['alamat_siswa'].'</td>';
  $html8 .= '</tr>';
 $no++;
 }
$html8 .= '</tbody></table><br><br>';

// TSM

$html9 = '

 <i><b>Teknik Sepeda Motor</b></i>
 <table border="1" bordercolor="#D3D3D3" style="width:100%">
 <!-- Ini Header Tabelnya -->
 <thead>
 <tr style="text-align:left" class="headerrow">
 <th width="50">NIS</th>
 <th width="200">Nama</th>
 <th width="40">Kelas</th>
 <th width="150">TTL</th>
 <th>Jenis Kelamin</th>
 <th width="40">Agama</th>
 <th>Alamat</th>
 </tr>
 </thead>
 <!-- Ini Body Tabelnya -->
 <tbody>';
 // Tampilkan Data Dari Tabel Siswa
 
 $sql = mysqli_query($connect,"select * from siswa s,jurusan j where s.kode_jurusan='JU0004' and j.kode_jurusan='JU0004'");
 while ($data = mysqli_fetch_array($sql)){  
  $html9 .= '<tr>';
  $html9 .= '<td width="35">'.$data['nis'].'</td>';
  $html9 .= '<td>'.$data['nama_siswa'].'</td>';
  $html9 .= '<td>'.$data['kelas'].'</td>';
  $html9 .= '<td>'.$data['tempat_lahir'].','.$data['tanggal_lahir'].'</td>';
  $html9 .= '<td width="50">'.$data['jenis_kelamin'].'</td>';
  $html9 .= '<td>'.$data['agama'].'</td>';
  $html9 .= '<td>'.$data['alamat_siswa'].'</td>';
  $html9 .= '</tr>';
 $no++;
 }
$html9 .= '</tbody></table><br><br>';

$footer = '<div><div style="text-align:left; width:50; float:left;">'.$a.'</div>
           <div style="text-align:right; width:40; float:right;">Hal {PAGENO}</div></div>
		   <div style="float:right; text-align:right;">Printed by: Sisinfo SMK Nasional Malang</div>
          ';

include("mpdf/mpdf.php");
ob_clean();
$mpdf = new mPDF('utf-8','A4','','Calibri'); 
$mpdf->SetDisplayMode('fullpage');
$mpdf->setHtmlFooter($footer);
$mpdf->SetWatermarkImage('smknasional.png', 0.02, 'F');
$mpdf->showWatermarkImage = true;
$mpdf->WriteHTML($html);
$mpdf->WriteHTML($html2);
$mpdf->WriteHTML($html3);
$mpdf->WriteHTML($html7);
$mpdf->WriteHTML($html4);
$mpdf->WriteHTML($html8);
$mpdf->WriteHTML($html5);
$mpdf->WriteHTML($html9);
$mpdf->WriteHTML($html6);
$mpdf->Output('siswa_smk.pdf','I');
exit;

?>