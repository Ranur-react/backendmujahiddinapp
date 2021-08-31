<?php
include '../koneksi.php';
if (isset($_POST['kode_pemateri'])) {
    $kode_pemateri = $_POST['kode_pemateri'];
    $query = mysqli_query($conn, "UPDATE tb_pemateri SET status=CASE WHEN status='datang' THEN 'belum datang'
ELSE 'datang' END WHERE kode_pemateri='$kode_pemateri';");
    if ($query) {
        $data['pesan'] = "Data Anda Berhasil Update";
        $data['status'] = true;
    } else {
        $data['pesan'] = "Data anda tidak valid";
        $data['status'] = false;
        $data['data'] = $_POST;
    }
} else {
    $data['pesan'] = "Data Tidak Dapat Diakses";
    $data['status'] = false;
}
echo json_encode($data);
