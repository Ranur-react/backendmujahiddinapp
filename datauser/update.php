<?php
include '../koneksi.php';
if (isset($_POST['kode_user'])) {

    $kodeuser = $_POST['kode_user'];
    $namauser = $_POST['nama_user'];
    $usernameuser = $_POST['username_user'];
    $passworduser = $_POST['password_user'];
    $leveluser = $_POST['level_user'];

    $query = mysqli_query($conn, " UPDATE tb_mujahiddin SET  nama_user= '$namauser', username_user= '$usernameuser', password_user= '$passworduser',   level_user= '$leveluser' WHERE kode_user= '$kodeuser';");

    if ($query) {
        $data['pesan'] = "Data Anda Berhasil";
        $data['status'] = true;
    } else {
        $data['pesan'] = "Data anda tidak valid";
        $data['status'] = false;
        $data['data']=$_POST;
    }
} else {
    $data['pesan'] = "Data Tidak Dapat Diakses";
    $data['status'] = false;
}
echo json_encode($data);
