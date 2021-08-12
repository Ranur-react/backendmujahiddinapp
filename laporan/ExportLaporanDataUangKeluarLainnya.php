<?php

require_once __DIR__ . '/../vendor/autoload.php';
$mpdf = new \Mpdf\Mpdf();
$html='
<link rel="stylesheet" href="../css/prints.css">
<table id="customers" align="center" border="1">
        <thead>
            <tr>
                <th style="text-align: center;" >ID Uang Keluar</th>
                <th style="text-align: center;" >Tanggal</th>
                <th style="text-align: center;" >Uraian</th>
                <th style="text-align: center;" >Jumlah (Rp)</th>
            </tr>
   
        </thead>
        <tbody>';
        include '../koneksi.php';
        $query = mysqli_query($conn, " SELECT * FROM tb_uangkeluarlainnya;");



        function rupiah($angka){
	
            $hasil_rupiah = "Rp " . number_format($angka,2,',','.');
            return $hasil_rupiah;
         
        }
        while ($data = mysqli_fetch_array($query)) {
            $html.='
                <tr>
                <td style="text-align: center;">'.$data["id_keluar"].'</td>
                <td style="text-align: left;">'.$data["tanggal_keluar"].'</td>
                <td style="text-align: center;">'.$data["uraian_keluar"].'</td>
                <td style="text-align: left;">'.$data["jumlah_keluar"].'</td>
            </tr>
                ';

        }
        $html.='
    
        </tbody>
        <tbody>
        </tbody>
</table>
TTD


<br>
<br>
<br>
  Ketua Umum
    </body>
    </html>

';

$mpdf->WriteHTML($html);
$mpdf->Output();
