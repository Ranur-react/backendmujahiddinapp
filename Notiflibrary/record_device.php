<?php
include '../koneksi.php';
if (isset($_POST['token'])) {

    $token = $_POST['token'];
    $os = $_POST['os'];
    date_default_timezone_set("Asia/Jakarta");
    $lastdate = date_create();
    $lastOnline = date_format($lastdate, "Y-m-d H:i:s");

    $query = mysqli_query($conn, " INSERT INTO tb_FCM_Devices 
    values ('$token', '$platform', '$lastOnline');");
    $queryUpdate = mysqli_query($conn, " UPDATE tb_FCM_Devices SET  last_online= '$lastOnline' WHERE token_id= '$token';");

    if ($query) {
        $data['pesan'] = "Data Anda Berhasil Ditambah";
        $data['status'] = true;
    } else {
        if ($queryUpdate) {
            $data['pesan'] = "Data Anda Berhasil Di Update";
            $data['status'] = true;
        } else {
            $data['pesan'] = "Data anda tidak valid";
            $data['status'] = false;
        }
    }
} else {
    $data['pesan'] = "Data Tidak Dapat Diakses";
    $data['status'] = false;
}

echo json_encode($data);
