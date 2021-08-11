<?php
include '../koneksi.php';
if (isset($_POST['id_datainfak'])) {

    $a = $_POST['id_datainfak'];
    $b = $_POST['tanggal_datainfak'];
    $c = $_POST['idkatgr_datainfak'];
    $d = $_POST['jumlah_datainfak'];


    $query = mysqli_query($conn, "UPDATE tb_datadonatur SET  tanggal_datainfak= '$b', idkatgr_datainfak= '$c', jumlah_datainfak= '$d'   WHERE id_datainfak= '$a';");

    if ($query) {
        $data['pesan'] = "Data Anda Berhail Update";
        $data['status'] = true;
    } else {
        $data['data'] =$_POST;
        $data['pesan'] = "Data anda tidak valid";
        $data['status'] = false;
    }
} else {
    $data['pesan'] = "Data Tidak Dapat Diakses";
    $data['status'] = false;
}
echo json_encode($data);
