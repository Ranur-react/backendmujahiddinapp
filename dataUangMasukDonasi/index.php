<?php
include '../koneksi.php';
$queryAlll = mysqli_query($conn, " SELECT * FROM tb_donasimasuk;");
$query = mysqli_query($conn, " SELECT id_uangmasuk,tanggal_donmasuk as tgl,jumlah_donmasuk  as jumlah,tanggal_donmasuk,iddon_donmasuk,jumlah_donmasuk,ket_donmasuk,jumlah_donmasuk FROM tb_donasimasuk;");

if ($query) {
    $database = [];
    $database2 = [];
    while ($d = mysqli_fetch_array($queryAlll)) {
        $database[] = $d;
    }
    while ($d = mysqli_fetch_array($query)) {
        $database2[] = $d;
    }
    $data['data'] = $database;
    $data['dataSmall'] = $database2;

    $data['pesan'] = "";
    $data['status'] = true;
}else{
    $data['data'] = "";
    $data['pesan'] = "Data gagal diambil dari database";
    $data['status'] = false;
}
echo json_encode($data);
?>