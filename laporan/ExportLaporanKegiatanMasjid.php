<?php

require_once __DIR__ . '/../vendor/autoload.php';
$mpdf = new \Mpdf\Mpdf();
$html='
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
 
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
                <th style="text-align: center;">Jumat</th>
                <th style="text-align: center;">Sabtu</th>
                <th style="text-align: center;">Minggu</th>
            </tr>
        </thead>
        <tbody>
';

$mpdf->WriteHTML($html);
$mpdf->Output();
