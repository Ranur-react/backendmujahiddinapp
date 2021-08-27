<?php
include '../koneksi.php';
if (isset($_POST['kodkatgr_infak'])) {

    $a = $_POST['kodkatgr_infak'];
    $b = $_POST['namakatgr_infak'];


    $query = mysqli_query($conn, "UPDATE tb_infak SET  namakatgr_infak= '$b' WHERE kodkatgr_infak= '$a';");

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
