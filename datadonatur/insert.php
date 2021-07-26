<?php
include '../koneksi.php';
if (isset($_POST['kode_user'])) {

    $kodeuser = $_POST['kode_user'];
    $namauser = $_POST['nama_user'];
    $usernameuser = $_POST['username_user'];
    $passworduser = $_POST['password_user'];
    $leveluser = $_POST['level_user'];

    $query = mysqli_query($conn, " INSERT INTO db_mujahiddin.tb_user (kode_user, nama_user, username_user, password_user, level_user)
    values ('$kodeuser', '$namauser', '$usernameuser', '$passworduser', '$leveluser');");

    if ($query) {
        $data['pesan'] = "Data Anda Berhasil";
        $data['status'] = true;
    } else {
        $data['pesan'] = "Data anda tidak valid";
        $data['status'] = false;
    }
} else {
    $data['pesan'] = "Data Tidak Dapat Diakses";
    $data['status'] = false;
}
echo json_encode($data);
?>
