<?php
include '../koneksi.php';
$query = mysqli_query($conn, " SELECT * FROM tb_kegiatan;");
foreach ($d = mysqli_fetch_array($query) as $d) :
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Laporan Kegiatan</title>
    </head>

    <body>
        <table border="1">
            <tr>
                <td rowspan="2">Kode kegiatan</td>
                <td rowspan="2">Nama kegiatan</td>
                <td colspan="7">Hari</td>
        
                <td rowspan="2">Waktu</td>
                <td rowspan="2">Nama Pemateri</td>
            </tr>
            <tr>
            <td>Senin</td>
                <td>Selasa</td>
                <td>Rabu</td>
                <td>Kamis</td>
                <td>Jum'at</td>
                <td>Sabtu</td>
                <td>Minggu</td>
            </tr>
        </table>
    </body>

    </html>
<?php
endforeach;
?>