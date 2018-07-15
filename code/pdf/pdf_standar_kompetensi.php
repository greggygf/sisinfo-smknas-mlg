<?php

require_once("koneksi.php");

$html = '
<img src="logo/kop.png" width="500">

<hr>

<font face="Calibri">DAFTAR STANDAR KOMPETENSI</font>

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
 $no=1;
 $sql = mysqli_query($connect,"select * from standar_kompetensi s,mata_pelajaran m where s.kode_mp=m.kode_mp order by m.nama_mp,nama_sk");
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