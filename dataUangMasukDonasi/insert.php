<?php
include '../koneksi.php';
if (isset($_POST['id_uangmasuk'])) {
    $id_uangmasuk = $_POST['id_uangmasuk'];
    $tanggal_donmasuk = $_POST['tanggal_donmasuk'];
    $iddon_donmasuk = $_POST['iddon_donmasuk'];
    $ket_donmasuk = $_POST['ket_donmasuk'];

    $query = mysqli_query($conn, "INSERT INTO `tb_donasimasuk` VALUES ('$id_uangmasuk', '$tanggal_donmasuk','$iddon_donmasuk','$ket_donmasuk');");

    if ($query) {
        $data['pesan'] = "Data Anda Berhasil";
        $data['status'] = true;
    } else {
        $data['pesan'] = "Data anda tidak valid";
        $data['status'] = false;
        $data['data'] = $_POST;
    }
} else {
    $data['pesan'] = "Data Tidak Dapat Diakses";
    $data['status'] = false;
}
echo json_encode($data);
