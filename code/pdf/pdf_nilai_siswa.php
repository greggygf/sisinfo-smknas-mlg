<?php

require_once("koneksi.php");
session_start();
$informasi = $_SESSION['nis'];

$sql2 = mysqli_query($connect,"select * from nilai n,siswa s,guru g,standar_kompetensi sk,mata_pelajaran mp,jurusan j
where s.nis=n.nis AND g.kode_guru=n.kode_guru AND sk.kode_sk=n.kode_sk AND mp.kode_mp=sk.kode_mp AND j.kode_jurusan=s.kode_jurusan AND n.nis='$informasi'");

while ($data2 = mysqli_fetch_array($sql2)){
$html = '
<img src="logo/kop.png" width="500">

<hr>

Nama &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : <b>'.$_SESSION['nama_siswa'].'</b> <br>
Kelas / Jurusan : <b>'.$data2['kelas'].'</b> / <b><i>'.$data2['nama_jurusan'].'</i></b> <br>

<br><br>
<b><i>DAFTAR NILAI</b></i>

<table border="1" bordercolor="#D3D3D3" style="width:100%">
 <!-- Ini Header Tabelnya -->
 <thead>
 <tr style="text-align:left" class="headerrow">
 <th width="140">Mata Pelajaran</th>
 <th>Standar Kompetensi</th>
 <th width="50">Nilai</th>
 </tr>
 </thead>
 <!-- Ini Body Tabelnya -->
 <tbody>';
}
 // Tampilkan Data Dari Tabel Siswa
 $sql = mysqli_query($connect,"select * from nilai n,siswa s,guru g,standar_kompetensi sk,mata_pelajaran mp,jurusan j
where s.nis=n.nis AND g.kode_guru=n.kode_guru AND sk.kode_sk=n.kode_sk AND mp.kode_mp=sk.kode_mp AND j.kode_jurusan=s.kode_jurusan AND n.nis='$informasi'");

 while ($data = mysqli_fetch_array($sql)){  
 
  $angka_nilai = $data['angka_nilai'];
  $html .= '<tr>';
  $html .= '<td>'.$data['nama_mp'].'</td>';
  $html .= '<td>'.$data['nama_sk'].'</td>';
  
  if ($angka_nilai <=75)
  {
	$html .= "<td><b><font color='red'>".$angka_nilai.'</font></b></td>';
  }
  else
  {
	$html .= '<td>'.$angka_nilai.'</td>';
  }
  
  $html .= '</tr>';

 }
$html .= '</tbody></table>';

$footer = '<div><div style="text-align:left; width:50; float:left;">'.$a.'</div>
           <div style="text-align:right; width:40; float:right;">Hal {PAGENO}</div></div>
		   <div style="float:right; text-align:right;">Printed by: Sisinfo SMK Nasional Malang</div>
          ';
$no++;

include("mpdf/mpdf.php");
ob_clean();
$mpdf = new mPDF('utf-8','A4','','Calibri'); 
$mpdf->SetDisplayMode('fullpage');
$mpdf->setHtmlFooter($footer);
$mpdf->SetWatermarkImage('smknasional.png', 0.02, 'F');
$mpdf->showWatermarkImage = true;
$mpdf->WriteHTML($html);
$mpdf->Output('standar_kompetensi_smk.pdf','I');
exit;

?>