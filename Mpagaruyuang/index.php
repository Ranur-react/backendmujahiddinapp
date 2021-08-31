<?php
include '../koneksi.php';
$query = mysqli_query($conn, "SELECT * FROM tb_config where options='pagaruyuang';");



if ($query) {
    $database = [];
        $database[] = $d = mysqli_fetch_row($query);
    $data['data'] = $database;

    $data['pesan'] = "";
    $data['status'] = true;
    date_default_timezone_set("Asia/Jakarta");
$lastdate = date_create();
mysqli_query($conn, " UPDATE tb_config SET  value= '$lastdate' WHERE options='pagaruyuangOnlineStatus';");

}else{
    $data['data'] = "";
    $data['pesan'] = "Data gagal diambil dari database";
    $data['status'] = false;
}
echo json_encode($data);
