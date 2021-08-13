<?php

require_once __DIR__ . '/../vendor/autoload.php';
$mpdf = new \Mpdf\Mpdf();
$html='
<link rel="stylesheet" href="../css/prints.css">
<table id="customers" align="center" border="1">
        <thead>
            <tr>
                <th style="text-align: center;" >No</th>
                <th style="text-align: center;" >Uang Masuk</th>
                <th style="text-align: center;" >Tanggal</th>
                <th style="text-align: center;" >Jumlah (Rp)</th>
            </tr>
   
        </thead>
        <tbody>';
        include '../koneksi.php';
        $queryDonasi = mysqli_query($conn, " select*from tb_donasimasuk join tb_datadonatur on iddon_donmasuk=kode_datadonatur;");
        $queryPenermaan = mysqli_query($conn, " SELECT * FROM tb_penerimaan;");
        $queryInfak = mysqli_query($conn, " SELECT * FROM tb_datainfak;");
        $queryKeluar = mysqli_query($conn, " SELECT * FROM tb_uangkeluarlainnya;");



        function rupiah($angka){
	
            $hasil_rupiah = "Rp " . number_format($angka,2,',','.');
            return $hasil_rupiah;
         
        }
        $n=0;
        while ($queryDonasi = mysqli_fetch_array($query)) {
            $n+=1;
            $html.='
                <tr>
                <td style="text-align: center;">'.$n.'</td>
                <td style="text-align: left;"> Donasi Masuk ('.$data["ket_donmasuk"].')</td>
                <td style="text-align: center;">'.$data["tanggal_donmasuk"].'</td>
                <td style="text-align: left;">'.rupiah($data["jumlah_donmasuk"]).'</td>
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
