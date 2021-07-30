<?php
include '../koneksi.php';
if (isset($_POST['kodkatgr_infak'])) {
    $kode_pemateri = $_POST['kodkatgr_infak'];

    $query = mysqli_query($conn, " DELETE FROM `tb_infak` WHERE `kodkatgr_infak`='$kode_pemateri'");

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