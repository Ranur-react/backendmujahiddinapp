<?php
include '../koneksi.php';
if (isset($_POST['id_datainfak'])) {

    $kodkatgrinfak = $_POST['id_datainfak'];
    $namakatgrinfak = $_POST['tanggal_datainfak'];
    $namakatgrinfak = $_POST['idkatgr_datainfak'];
    $namakatgrinfak = $_POST['jumlah_datainfak'];

    $query = mysqli_query($conn, " INSERT INTO `tb_infak` (`kodkatgr_infak`, `namakatgr_infak`) 
    VALUES ('$kodkatgrinfak', '$namakatgrinfak'); ");

    if ($query) {
        $data['pesan'] = "Data Anda Berhasil";
        $data['status'] = true;
    } else {
        $data['pesan'] = "Data anda tidak valid";
        $data['status'] = false;
        $data['datatidakvakid'] = $_POST;
    }
} else {
    $data['pesan'] = "Data Tidak Dapat Diakses";
    $data['status'] = false;
}
echo json_encode($data);
?>