<?php
include '../koneksi.php';
if (isset($_POST['iddon_penerima'])) {

    $a = $_POST['iddon_penerima'];
    $b = $_POST['tanggal_penerima'];
    $c = $_POST['id_penerima'];
    $d = $_POST['id_jenispenerima'];
    $e = $_POST['jumlah_donasi'];


    $query = mysqli_query($conn, "UPDATE tb_penerimaan SET  tanggal_penerima= '$b', id_penerima= '$c', id_jenispenerima= '$d',   jumlah_donasi= '$e' WHERE iddon_penerima= '$a';");

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
