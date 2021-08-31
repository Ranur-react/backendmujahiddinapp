<?php
include '../koneksi.php';
$query = mysqli_query($conn, "SELECT * FROM tb_config where options='pagaruyuang';");

date_default_timezone_set("Asia/Jakarta");
$lastdate = date_create();
mysqli_query($conn, " UPDATE tb_config SET  value= '$lastdate' WHERE options='pagaruyuangOnlineStatus';");


if ($query) {
    $database = [];
        $database[] = $d = mysqli_fetch_row($query);
    $data['data'] = $database;

    $data['pesan'] = "";
    $data['status'] = true;
}else{
    $data['data'] = "";
    $data['pesan'] = "Data gagal diambil dari database";
    $data['status'] = false;
}
echo json_encode($data);
