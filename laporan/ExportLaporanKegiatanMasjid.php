<?php

require_once __DIR__ . '/../vendor/autoload.php';
$mpdf = new \Mpdf\Mpdf();

$html=`
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Kegiatan</title>
    <script>
        window.print()
    </script>
    <style>
        #customers {
            font-family: Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        #customers td,
        #customers th {
            border: 1px solid #ddd;
            padding: 8px;
        }
       .center {
            text-align: 'center';
        }

        #customers tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        #customers tr:hover {
            background-color: #ddd;
        }

        #customers th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color: #04AA6D;
            color: white;
        }
    </style>
</head>

<body>
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
                <th style="text-align: center;">Jum'at</th>
                <th style="text-align: center;">Sabtu</th>
                <th style="text-align: center;">Minggu</th>
            </tr>
        </thead>
        <tbody>

`;
$html+=`
</tbody>


</table>
</body>

</html>
`;
$mpdf->WriteHTML($html);
$mpdf->Output();
