<?php
include '../koneksi.php';
$key1 = '';
$key1 = $_POST['key'];

$query = mysqli_query($conn, "SELECT * FROM tb_pemateri where kode_pemateri like '%$key1%' or nama_pemateri like '%$key1%';");

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