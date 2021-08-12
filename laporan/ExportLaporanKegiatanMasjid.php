<?php

require_once __DIR__ . '/../vendor/autoload.php';
$mpdf = new \Mpdf\Mpdf();
$html='
<link rel="stylesheet" href="../css/prints.css">
<table id="customers" align="center" border="1">
        <thead>
            <tr>
                <th style="text-align: center;" rowspan="2">Kode kegiatan</th>
                <th style="text-align: center;" rowspan="2">Nama kegiatan</th>
                <th colspan="7" style="text-align: center;">Hari</th>

                <th style="text-align: center;" rowspan="2">Waktu</th>
                <th style="text-align: center;" rowspan="2">Nama Pemateri</th>
            </tr>
            <tr>
                <th style="text-align: center;" >Senin</th>
                <th style="text-align: center;">Selasa</th>
                <th style="text-align: center;">Rabu</th>
                <th style="text-align: center;">Kamis</th>
                <th style="text-align: center;">Jumat</th>
                <th style="text-align: center;">Sabtu</th>
                <th style="text-align: center;">Minggu</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
';
include '../koneksi.php';
            $query = mysqli_query($conn, "SELECT no_datakegtn,concat(`hari`,'-',waktu_datakegiatan) as infowaktu,nama_kegiatan,`waktu_datakegiatan`, hari_datakegiatan, kode_datakegiatan,id_datapemateri,nama_pemateri FROM tb_datakegiatan join `tb_kegiatan` on kode_kegiatan=kode_datakegiatan join tb_hari on hari_datakegiatan=id join tb_pemateri on kode_pemateri=id_datapemateri;");
            function hariceklis($d,$var)
                {
                    if($d == $var){
                        return 'V';
                    }
                    
                }
            while ($data = mysqli_fetch_array($query)) {
                 
         
            }
$html+='
        <tbody>
        </table>
    </body>
    
    </html>

';

$mpdf->WriteHTML($html);
$mpdf->Output();
