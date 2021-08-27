<?php
include '../koneksi.php';
if (isset($_POST['iddon_penerima'])) {

    $a = $_POST['iddon_penerima'];
    $b = $_POST['tanggal_penerima'];
    $c = $_POST['id_penerima'];
    $d = $_POST['id_jenispenerima'];
    $e = $_POST['jumlah_donasi'];

    $query = mysqli_query($conn, " INSERT INTO `tb_penerimaan` VALUES ('$a', ' $b', '$c', '$d','$e'); ");

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