<?php
include '../koneksi.php';
$query = mysqli_query($conn, " SELECT tanggal_donmasuk,jumlah_donmasuk,* FROM tb_donasimasuk;");

if ($query) {
    $database = [];
    while ($d = mysqli_fetch_array($query)) {
        $database[] = $d;
    }
    $data['data'] = $database;

    $data['pesan'] = "";
    $data['status'] = true;
}else{
    $data['data'] = "";
    $data['pesan'] = "Data gagal diambil dari database";
    $data['status'] = false;
}
echo json_encode($data);
?>