<?php

require_once __DIR__ . '/../vendor/autoload.php';
$mpdf = new \Mpdf\Mpdf();
$html='
<link rel="stylesheet" href="../css/prints.css">
<table id="customers" align="center" border="1">
        <thead>
            <tr>
                <th style="text-align: center;" >ID Infak</th>
                <th style="text-align: center;" >Tanggal</th>
                <th style="text-align: center;" >ID Kategori</th>
                <th style="text-align: center;" >Nama kategori</th>
                <th style="text-align: center;" >Jumlah (Rp)</th>
            </tr>
   
        </thead>
        <tbody>';
        include '../koneksi.php';
        $query = mysqli_query($conn, "SELECT id_datainfak,CONCAT(namakatgr_infak,'~(',tanggal_datainfak,')') as info, jumlah_datainfak,idkatgr_datainfak,tanggal_datainfak,jumlah_datainfak,namakatgr_infak FROM tb_datainfak join tb_infak on kodkatgr_infak=idkatgr_datainfak;");


        while ($data = mysqli_fetch_array($query)) {
            $html.='
                <tr>
                <td style="text-align: center;">'.$data["id_datainfak"].'</td>
                <td style="text-align: left;">'.$data["tanggal_datainfak"].'</td>
                <td style="text-align: center;">'.$data["idkatgr_datainfak"].'</td>
                <td style="text-align: left;">'.$data["namakatgr_infak"].'</td>
                <td style="text-align: left;">'.$data["jumlah_datainfak"].'</td>
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
