<?php
include '../koneksi.php';
$query = mysqli_query($conn, "SELECT kode_user,nama_level,nama_user,username_user,password_user,level_user FROM tb_user join tb_level on id=level_user;");

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