<?php
include '../koneksi.php';
$key1 = '';
$key1 = $_POST['key'];
$key2 = '';
$key2 = $_POST['key'];
$query = mysqli_query($conn, " SELECT * FROM tb_datadonatur where kode_datadonatur like '%$key1%' OR nama_datadonatur like '%$key2%';");

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