<?php
include '../koneksi.php';
if (isset($_POST['kodkatgr_infak'])) {

    $kodkatgrinfak = $_POST['kodkatgr_infak'];
    $namakatgrinfak = $_POST['namakatgr_infak'];

    $query = mysqli_query($conn, " INSERT INTO `db_mujahiddin`.`tb_infak` (`kodkatgr_infak`, `namakatgr_infak`) 
    VALUES ('$kodkatgrinfak', '$namakatgrinfak'); ");

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