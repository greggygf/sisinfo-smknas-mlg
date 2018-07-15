<?php

require_once("../../koneksi.php");

$html = '
<img src="../../logo/kop.png" width="500">

<hr>

<font face="Calibri">DAFTAR GURU</font>

<br><br>

<table border="1" bordercolor="#D3D3D3" style="width:100%">
 <!-- Ini Header Tabelnya -->
 <thead>
 <tr style="text-align:left" class="headerrow">
 <th>Kode Guru</th>
 <th>Nama</th>
 <th>Mapel</th>
 <th>TTL</th>
 <th>Jenis Kelamin</th>
 <th>Agama</th>
 <th>Alamat</th>
 </tr>
 </thead>
 <!-- Ini Body Tabelnya -->
 <tbody>';
 // Tampilkan Data Dari Tabel Siswa
 $no=1;
 $sql = mysqli_query($connect,"select * from `guru` g,`mata_pelajaran` mp where g.kode_mp=mp.kode_mp");
 while ($data = mysqli_fetch_array($sql)){  
  $html .= '<tr>';
  $html .= '<td width="35">'.$data['kode_guru'].'</td>';
  $html .= '<td>'.$data['nama_guru'].'</td>';
  $html .= '<td>'.$data['nama_mp'].'</td>';
  $html .= '<td>'.$data['tempat_lahir'].','.$data['tanggal_lahir'].'</td>';
  $html .= '<td width="50">'.$data['jenis_kelamin'].'</td>';
  $html .= '<td>'.$data['agama'].'</td>';
  $html .= '<td>'.$data['alamat_guru'].'</td>';
  $html .= '</tr>';
 $no++;
 }
$html .= '</tbody></table>';

$footer = '<div><div style="text-align:left; width:85; float:left;">{DATE j-M-Y}</div>
           <div style="text-align:right; width:40; float:right;">Hal {PAGENO}</div></div>
		   <div style="float:center; text-align:right;">Printed by: Sisinfo SMK Nasional Malang</div>
          ';

include("../../mpdf/mpdf.php");
ob_clean();

$mpdf = new mPDF('utf-8','A4','','Calibri'); 
$mpdf->SetDisplayMode('fullpage');
$mpdf->setHtmlFooter($footer);
$mpdf->SetWatermarkImage('smknasional.png', 0.02, 'F');
$mpdf->showWatermarkImage = true;
$mpdf->WriteHTML($html);
$mpdf->Output('guru_smk.pdf','I');

exit;

?>