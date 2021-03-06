<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Kegiatan</title>
    <link rel="stylesheet" href="css/prints.css">
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
            <?php
            include '../koneksi.php';
            $query = mysqli_query($conn, "SELECT no_datakegtn,concat(`hari`,'-',waktu_datakegiatan) as infowaktu,nama_kegiatan,`waktu_datakegiatan`, hari_datakegiatan, kode_datakegiatan,id_datapemateri,nama_pemateri FROM tb_datakegiatan join `tb_kegiatan` on kode_kegiatan=kode_datakegiatan join tb_hari on hari_datakegiatan=id join tb_pemateri on kode_pemateri=id_datapemateri;");
            while ($data = mysqli_fetch_array($query)) {
            ?>
                <tr>
                    <td style="text-align: center;"><?php echo $data['no_datakegtn']; ?></td>
                    <td ><?php echo $data['nama_kegiatan']; ?></td>
                    <td style="text-align: center;"><?= $data['hari_datakegiatan'] == 1 ? 'V' : ''; ?></td>
                    <td style="text-align: center;"><?= $data['hari_datakegiatan'] == 2 ? 'V' : ''; ?></td>
                    <td style="text-align: center;"><?= $data['hari_datakegiatan'] == 3 ? 'V' : ''; ?></td>
                    <td style="text-align: center;"><?= $data['hari_datakegiatan'] == 4 ? 'V' : ''; ?></td>
                    <td style="text-align: center;"><?= $data['hari_datakegiatan'] == 5 ? 'V' : ''; ?></td>
                    <td style="text-align: center;"><?= $data['hari_datakegiatan'] == 6 ? 'V' : ''; ?></td>
                    <td style="text-align: center;"><?= $data['hari_datakegiatan'] == 7 ? 'V' : ''; ?></td>
                    <td style="text-align: center;"><?= $data['waktu_datakegiatan']; ?></td>
                    <td ><?= $data['nama_pemateri']; ?></td>
                </tr>
            <?php
            }
            ?>
        </tbody>


    </table>
</body>

</html>