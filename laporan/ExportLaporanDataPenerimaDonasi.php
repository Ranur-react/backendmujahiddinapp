<?php

require_once __DIR__ . '/../vendor/autoload.php';
$mpdf = new \Mpdf\Mpdf();
$html='
<link rel="stylesheet" href="../css/prints.css">
<table id="customers" align="center" border="1">
        <thead>
            <tr>
                <th style="text-align: center;" >ID Penerima Donasi</th>
                <th style="text-align: center;" >Nama penerima</th>
                <th style="text-align: center;" >Alamat</th>
                <th style="text-align: center;" >No Telp</th>
            </tr>
   
        </thead>
        <tbody>';
        include '../koneksi.php';
        $query = mysqli_query($conn, " SELECT * FROM tb_datapenerima;");


        function rupiah($angka){
	
            $hasil_rupiah = "Rp " . number_format($angka,2,',','.');
            return $hasil_rupiah;
         
        }
        while ($data = mysqli_fetch_array($query)) {
            $html.='
                <tr>
                <td style="text-align: center;">'.$data["id_dataspenerima"].'</td>
                <td style="text-align: left;">'.$data["nama_penerima"].'</td>
                <td style="text-align: center;">'.$data["alamat_penerima"].'</td>
                <td style="text-align: left;">'.$data["nohp_penerima"].'</td>
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
