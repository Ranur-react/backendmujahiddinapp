<?php

require_once __DIR__ . '/../vendor/autoload.php';
$mpdf = new \Mpdf\Mpdf();
$html='
<link rel="stylesheet" href="../css/prints.css">
<table id="customers" align="center" border="1">
        <thead>
            <tr>
                <th style="text-align: center;" >ID uang masuk</th>
                <th style="text-align: center;" >Tanggal</th>
                <th style="text-align: center;" >ID Donatur</th>
                <th style="text-align: center;" >Nama Donatur</th>
                <th style="text-align: center;" >Jumlah (Rp)</th>
                <th style="text-align: center;" >Keteranganr</th>
            </tr>
   
        </thead>
        <tbody>';
        include '../koneksi.php';
        $query = mysqli_query($conn, " SELECT id_uangmasuk,tanggal_donmasuk as tgl,jumlah_donmasuk  as jumlah,tanggal_donmasuk,iddon_donmasuk,jumlah_donmasuk,ket_donmasuk,jumlah_donmasuk,nama_datadonatur FROM tb_donasimasuk join tb_datadonatur on kode_datadonatur=iddon_donmasuk;");


        while ($data = mysqli_fetch_array($query)) {
            $html.='
                <tr>
                <td style="text-align: center;">'.$data["id_uangmasuk"].'</td>
                <td style="text-align: left;">'.$data["tanggal_donmasuk"].'</td>
                <td style="text-align: center;">'.$data["iddon_donmasuk"].'</td>
                <td style="text-align: left;">'.$data["nama_datadonatur"].'</td>
                <td style="text-align: left;">'.$data["ket_donmasuk"].'</td>
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
