<?php
include '../koneksi.php';
if (isset($_POST['id_dataspenerima'])) {

    $id_dataspenerima = $_POST['id_dataspenerima'];
    $nama_penerima = $_POST['nama_penerima'];
    $alamat_penerima = $_POST['alamat_penerima'];
    $nohp_penerima = $_POST['nohp_penerima'];

    $query = mysqli_query($conn, " INSERT INTO `tb_datapenerima` 
    VALUES ('$id_dataspenerima', '$nama_penerima','$alamat_penerima','$nohp_penerima'); ");

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