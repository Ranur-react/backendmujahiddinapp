<?php
include '../koneksi.php';
if (isset($_POST['key'])) {
    $k = $_POST['key'];

    $query = mysqli_query($conn, " DELETE FROM `tb_datainfak` WHERE `id_datainfak`='$k'");

    if ($query) {
        $data['pesan'] = "Data Anda Berhasil Dihapus";
        $data['status'] = true;
    } else {
        $data['pesan'] = "ID Data anda tidak valid Atau sudah digunakan Pada data lain";
        $data['status'] = false;
        $data['data'] = $_POST;
    }
} else {
    $data['pesan'] = "Data Tidak Dapat Diakses";
    $data['status'] = false;
}
echo json_encode($data);
?>