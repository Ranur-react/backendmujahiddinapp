<?php
include '../koneksi.php';
if (isset($_POST['id_datainfak'])) {

    $id_datainfak = $_POST['id_datainfak'];
    $tanggal_datainfak = $_POST['tanggal_datainfak'];
    $idkatgr_datainfak = $_POST['idkatgr_datainfak'];
    $jumlah_datainfak = $_POST['jumlah_datainfak'];

    $query = mysqli_query($conn, " INSERT INTO `tb_infak` 
    VALUES ('$id_datainfak', '$tanggal_datainfak','$idkatgr_datainfak','$jumlah_datainfak'); ");

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