<?php
include '../koneksi.php';
if (isset($_POST['kode_pemateri'])) {
    $kode_pemateri = $_POST['kode_pemateri'];

    $query = mysqli_query($conn, " DELETE FROM `tb_pemateri` WHERE `kode_pemateri`='$kode_pemateri'");

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
