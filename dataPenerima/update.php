<?php
include '../koneksi.php';
if (isset($_POST['id_dataspenerima'])) {

    $a = $_POST['id_dataspenerima'];
    $b = $_POST['nama_penerima'];
    $c = $_POST['alamat_penerima'];
    $d = $_POST['nohp_penerima'];

    $query = mysqli_query($conn, "UPDATE tb_datapenerima SET  nama_penerima= '$b', alamat_penerima= '$c', nohp_penerima= '$d' WHERE id_dataspenerima= '$a';");

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
