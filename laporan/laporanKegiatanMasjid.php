<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Kegiatan</title>
</head>

<body>
    <table align="center" border="1">
        <thead>
            <tr>
                <th rowspan="2">Kode kegiatan</th>
                <th rowspan="2">Nama kegiatan</th>
                <th colspan="7">Hari</th>

                <th rowspan="2">Waktu</th>
                <th rowspan="2">Nama Pemateri</th>
            </tr>
            <tr>
                <th>Senin</th>
                <th>Selasa</th>
                <th>Rabu</th>
                <th>Kamis</th>
                <th>Jum'at</th>
                <th>Sabtu</th>
                <th>Minggu</th>
            </tr>
        </thead>
        <tbody>
            <?php
            include '../koneksi.php';
            $query = mysqli_query($conn, "SELECT no_datakegtn,concat(`hari`,'-',waktu_datakegiatan) as infowaktu,nama_kegiatan,`waktu_datakegiatan`, hari_datakegiatan, kode_datakegiatan,id_datapemateri,nama_pemateri FROM tb_datakegiatan join `tb_kegiatan` on kode_kegiatan=kode_datakegiatan join tb_hari on hari_datakegiatan=id join tb_pemateri on kode_pemateri=id_datapemateri;");
            while ($data = mysqli_fetch_array($query) ) {
            ?>
            <tr>
                <td><?php echo $data['no_datakegtn']; ?></td>
                <td><?php echo $data['nama_kegiatan']; ?></td>
                <td><?php echo $data['hari_datakegiatan']; ?></td>
                <td><?php echo $data['no_datakegtn']; ?></td>
                <td><?php echo $data['no_datakegtn']; ?></td>
                <td><?php echo $data['no_datakegtn']; ?></td>
                <td><?php echo $data['no_datakegtn']; ?></td>
                </tr>
            <?php
            }
            ?>
        </tbody>


    </table>
</body>

</html>