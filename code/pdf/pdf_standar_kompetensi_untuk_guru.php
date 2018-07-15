<?php

require_once("koneksi.php");
session_start();
$informasi = $_SESSION['kode_guru'];
$html = '
<img src="logo/kop.png" width="500">

<hr>

DAFTAR STANDAR KOMPETENSI ('.$_SESSION['nama_guru'].')

<br><br>

<table border="1" bordercolor="#D3D3D3" style="width:100%">
 <!-- Ini Header Tabelnya -->
 <thead>
 <tr style="text-align:left" class="headerrow">
 <th>Kode SK</th>
 <th>Mata Pelajaran</th>
 <th>Nama SK</th>
 <th>Kelas SK</th>
 </tr>
 </thead>
 <!-- Ini Body Tabelnya -->
 <tbody>';
 // Tampilkan Data Dari Tabel Siswa
 $sql = mysqli_query($connect,"select distinct sk.kode_sk,mp.kode_mp,mp.nama_mp,sk.nama_sk,sk.kelas_sk from login l,standar_kompetensi sk,mata_pelajaran mp,guru g
where g.kode_guru='$informasi' and g.kode_mp=mp.kode_mp and sk.kode_mp=mp.kode_mp");

 while ($data = mysqli_fetch_array($sql)){  
  $html .= '<tr>';
  $html .= '<td>'.$data['kode_sk'].'</td>';
  $html .= '<td>'.$data['nama_mp'].'</td>';
  $html .= '<td>'.$data['nama_sk'].'</td>';
  $html .= '<td>'.$data['kelas_sk'].'</td>';
  $html .= '</tr>';
 $no++;
 }
$html .= '</tbody></table>';

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
$mpdf->Output('standar_kompetensi_smk.pdf','I');
exit;

?>