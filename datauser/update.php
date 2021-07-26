<?php
include 'koneksi.php';
if (isset($_POST['kode_user'])) {

    $kodeuser = $_POST['kode_user'];
    $namauser = $_POST['nama_user'];
    $usernameuser = $_POST['username_user'];
    $passworduser = $_POST['password_user'];
    $leveluser = $_POST['level_user'];

    $query = mysqli_query($conn, " UPDATE tb_mujahiddin . db_user SET  nama_user= '$namauser', username_user= '$usernameuser', password_user= '$passworduser',   level_user= '$leveluser' WHERE kode_user= '$kodeuser';");

    if ($query) {
        $data['pesan'] = "Data anda tidak valid";
        $data['status'] = false;
    } else {
        $data['pesan'] = "Data Anda Berhail";
        $data['status'] = true;
    }
} else {
    $data['pesan'] = "Data Tidak Dapat Diakses";
    $data['status'] = false;
}
echo json_encode($data);
