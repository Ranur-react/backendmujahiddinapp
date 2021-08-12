<?php

require_once __DIR__ . '/../vendor/autoload.php';
$mpdf = new \Mpdf\Mpdf();
$html='
<link rel="stylesheet" href="../css/prints.css">
<table id="customers" align="center" border="1">
        <thead>
            <tr>
                <th style="text-align: center;" >Kode Donatur</th>
                <th style="text-align: center;" >Kode kegiatan</th>
                <th style="text-align: center;" >Kode kegiatan</th>
                <th style="text-align: center;" >Kode kegiatan</th>
            </tr>
   
        </thead>
        <tbody>';
        include '../koneksi.php';
        $query = mysqli_query($conn, " SELECT * FROM tb_datadonatur;");

        while ($data = mysqli_fetch_array($query)) {
            $html.='
                <tr>
                <td style="text-align: center;">'.$data["kode_datadonatur"].'</td>
                <td style="text-align: left;">'.$data["nama_datadonatur"].'</td>
                <td style="text-align: center;">'.$data["alamat_donatur"].'</td>
                <td style="text-align: left;">'.$data["nohp_donatur"].'</td>
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
