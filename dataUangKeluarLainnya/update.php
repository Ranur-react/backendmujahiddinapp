<?php
include '../koneksi.php';
if (isset($_POST['id_keluar'])) {

    $a = $_POST['id_keluar'];
    $b = $_POST['tanggal_keluar'];
    $c = $_POST['uraian_keluar'];
    $d = $_POST['jumlah_keluar'];

    $query = mysqli_query($conn, "UPDATE tb_uangkeluarlainnya SET  tanggal_keluar= '$b', uraian_keluar= '$c', jumlah_keluar= '$d' WHERE id_keluar= '$a';");

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
