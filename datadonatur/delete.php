<?php
include '../koneksi.php';
if (isset($_POST['kode_datadonatur'])) {
    $kode_datadonatur = $_POST['kode_datadonatur'];

    $query = mysqli_query($conn, " DELETE FROM `tb_datadonatur` WHERE `kode_datadonatur`='$kode_datadonatur'");

    if ($query) {
        $data['pesan'] = "Data Anda Berhasil Dihapus";
        $data['status'] = true;
    } else {
        $data['pesan'] = "ID Data anda tidak valid";
        $data['status'] = false;
        $data['data'] = $_POST;
    }
} else {
    $data['pesan'] = "Data Tidak Dapat Diakses";
    $data['status'] = false;
}
echo json_encode($data);
?>