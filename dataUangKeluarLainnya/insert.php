<?php
include '../koneksi.php';
if (isset($_POST['id_keluar'])) {

    $id_keluar = $_POST['id_keluar'];
    $tanggal_keluar = $_POST['tanggal_keluar'];
    $uraian_keluar = $_POST['uraian_keluar'];
    $jumlah_keluar = $_POST['jumlah_keluar'];

    $query = mysqli_query($conn, " INSERT INTO `tb_uangkeluarlainnya` 
    VALUES ('$id_keluar', '$tanggal_keluar','$uraian_keluar','$jumlah_keluar'); ");
    

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