<?php
include '../koneksi.php';
if (isset($_POST['kode_pemateri'])) {
    $kode_pemateri = $_POST['kode_pemateri'];
    $nama_pemateri = $_POST['nama_pemateri'];

   
    $query = mysqli_query($conn, "UPDATE tb_pemateri SET nama_pemateri='$nama_pemateri' WHERE kode_pemateri= '$kode_pemateri';");
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
?>
