<?php
include '../koneksi.php';
if (isset($_POST['id_uangmasuk'])) {
    $a = $_POST['id_uangmasuk'];
    $b = $_POST['tanggal_donmasuk'];
    $c = $_POST['iddon_donmasuk'];
    $d = $_POST['jumlah_donmasuk'];
    $e = $_POST['ket_donmasuk'];

    $query = mysqli_query($conn, "UPDATE tb_donasimasuk SET  tanggal_donmasuk= '$b', iddon_donmasuk= '$c', jumlah_donmasuk= '$d',ket_donmasuk= '$e' WHERE id_uangmasuk= '$a';");

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
